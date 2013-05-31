<?php

namespace LL\HBTBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use LL\HBTBundle\Entity\Entry;

class DefaultController extends Controller
{
    protected $timezone;
    protected $start;
    protected $end;
    protected $categories;
    
    public function __construct() {
        $this->timezone = new \DateTimeZone('US/Pacific');
    }
    
    public function indexAction()
    {
        $response = $this->getEntriesAction('this-month');
        return $response;
    }
    
    private function getCategories() {
        $conn = $this->get('database_connection');
        $query = "SELECT * FROM category ORDER BY name ASC, type ASC";
        $categories = $conn->fetchAll($query);
        $cats = Array();
        foreach ($categories as $cat) {
            $cats[] = Array('category'=>$cat['name'], 'label'=>$cat['type']);
        }
        return $cats;
    }
    
/**
* Method: getEntriesAction
* @param undefined $start
* @param undefined $end
* 
* Call the appropriate helper function to the date range for this request
*/
    public function getEntriesAction($start, $end=null) {
        $this->categories = $this->getCategories();
        $response = Array();
        if (empty($end)) {
            switch($start) {
                case 'today':
                    $response = $this->getThisDay();
                    break;
                case 'this-week':
                    $response = $this->getThisWeek();
                    break;
                case 'this-month':
                    $response = $this->getThisMonth();
                    break;
                case 'this-year':
                    $response = $this->getThisYear();
                    break;
                case 'past-week':
                    $response = $this->getPastWeek();
                    break;
                case 'past-month':
                    $response = $this->getPastMonth();
                    break;
                case 'past-year':
                    $response = $this->getPastYear();
                    break;
                default:
                    try {
                        $start = new \DateTime($start, $this->timezone);
                        $response = $this->getEntryByRange($start, $start);
                    } catch (Exception $e) {
                        echo $e->getMessage();
                        exit(1);
                    }
            }
        } else {
            try {
                $start = new \DateTime($start, $this->timezone);
                $end = new \DateTime($end, $this->timezone);               
                $response = $this->getEntryByRange($start, $end);
            } catch (Excepton $e) {
                echo $e->getMessage();
                exit(1);
            }
        }
        
        return $this->render('LLHBTBundle:Default:index.html.twig', Array('categories'=>$this->categories, 'entries'=>$response,'range'=>Array('start'=>$this->start, 'end'=>$this->end)));
    }
    
/**
* Method: getEntryAction
* @param undefined $id
* 
* Returns a single entry
*/
    public function getEntryAction($id) {
        $entry = $this->getDoctrine()
            ->getRepository('LLHBTBundle:Entry')
            ->find($id);
            
        return new Response(json_encode($entry));
    }
    
/**
* Method: updateEntryAction
* @param undefined $id
* 
* Creates/Updates an entry
*/
    public function updateEntryAction(Request $request, $id=null) {
        $rId = $request->request->get('id');
        $rDate = $request->request->get('date');
        $rCategory = $request->request->get('category');
        $rType = $request->request->get('type');
        $rNote = $request->request->get('note');
        $rAmount = $request->request->get('amount');
        
        $em = $this->getDoctrine()->getManager();
        for ($x=0; $x<count($rDate); $x++) {
            if (empty($rId[$x])) {
                $entry = new Entry();
            } else {
                $entry = $em->getRepository('LLHBTBundle:Entry')->find($rId[$x]);
            }
            
            $rDate[$x] = new \DateTime($rDate[$x], $this->timezone);
            $entry->setDate($rDate[$x]);
            $entry->setCategory($rCategory[$x]);
            $entry->setType($rType[$x]);
            $entry->setNote($rNote[$x]);
            $entry->setAmount($rAmount[$x]);
            
            $em->persist($entry);
            $em->flush();
            $this->saveEntryCategory($rCategory[$x], $rType[$x]);
        }
        
        return new Response(json_encode($entry));
    }

/**
* Method: deleteEntryAction
* @param undefined $id
* 
* Deletes an entry
*/
    public function deleteEntryAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entry = $em->getRepository('LLHBTBundle:Entry')->find($id);
        if ($entry) {
            $em->remove($entry);
            $em->flush();
        }
        return new Response(json_encode(TRUE));
    }
    
/**
* Method: getChartEntries
* @param undefined $start
* @param undefined $end
* 
* Gets entry data formatted for the Google DataVisualization Object for use in chart rendering
*/
    public function getChartEntriesAction($start, $end, $chart) {
        $data = Array();
        switch ($chart) {
        	case "PieChart":
        		$data = $this->formatPieChart($start, $end);
        		break;
        	default:
        		$data = $this->formatLineChart($start, $end);
        }
        
        return $data;
    }
    
    private function formatPieChart($start, $end) {
        $conn = $this->get('database_connection');
        
        $start = new \DateTime($start, $this->timezone);
        $end = new \DateTime($end, $this->timezone);
        $diff = $start->diff($end);
        
        $entries = Array();
        
        $legend = Array('Category', 'Amount');
        $query = "SELECT category, sum(amount) AS amount FROM `entry` WHERE date >= '".$start->format('Y-m-d')."' AND date <= '".$end->format('Y-m-d')."' GROUP BY category ORDER BY category ASC";
        $results = $conn->query($query);
        $entries = $results->fetchAll();
        
        $data = Array();
        foreach ($entries as $entry) {
        	$arr = Array($entry['category'], $entry['amount']);
        	$data[] = $arr;
        }
        array_unshift($data, $legend);
        
        return new Response(json_encode($data, JSON_NUMERIC_CHECK));
    }
    
    private function formatLineChart($start, $end) {
        $conn = $this->get('database_connection');
        
        $start = new \DateTime($start, $this->timezone);
        $end = new \DateTime($end, $this->timezone);
        $diff = $start->diff($end);
        
        // Build Legend Array
        $legend = Array('x',);
        $query = "SELECT distinct category FROM entry WHERE date >= '".$start->format('Y-m-d')."' AND date <= '".$end->format('Y-m-d')."' ORDER BY category ASC";
        $results = $conn->query($query);
        $categories = $results->fetchAll();
        $cats = Array();
        foreach ($categories as $cat) {
            $cats[] = $cat['category'];
        }
        $legend = array_merge($legend, $cats);
        
        // Get the daily totals for each category
        $entries = Array();
        for ($x=0; $x<=$diff->days; $x++) {
            $query = "SELECT date, category, sum(amount) as total FROM entry WHERE date = '".$start->format('Y-m-d')."' GROUP BY category ORDER BY category ASC";
            $results = $conn->query($query);
            $dailyRaw = $results->fetchAll();
            $daily = Array($start->format('m/d'));
            foreach ($cats as $cat) {
                $total = null;
                foreach ($dailyRaw as $dr) {
                    if ($dr['category'] == $cat) {
                        $total = $dr['total'];
                        break;
                    }
                }
                $daily[] = $total;
            }
            $entries[] = $daily;
            $int = new \DateInterval('P1D');
            $start->add($int);
        }
        array_unshift($entries, $legend);
        
        return new Response(json_encode($entries, JSON_NUMERIC_CHECK));
    }
    
/**
* Method: getThisDay
* Gets all entries for the current date 
*/
    private function getThisDay() {
        $start = new \DateTime('now', $this->timezone);
        $start->setTime(0, 0, 0);
        $end = new \DateTime('now', $this->timezone);
        return $this->getEntryByRange($start, $end);
    }
    
/**
* Method: getThisWeek
* Gets all entries for the current week (Sunday to current weekday)
*/
    private function getThisWeek() {
        $start = new \DateTime('now', $this->timezone);
        $start->setTime(0, 0, 0);
        $end = new \DateTime('now', $this->timezone);
        $offset = $end->format('w');
        $interval = new \DateInterval('P'.$offset.'D');
        $start->sub($interval);
        
        return $this->getEntryByRange($start, $end);
    }
    
/**
* Method: getThisMonth
* Gets all entries for the current month (beginning from the first of the month)
*/
    private function getThisMonth() {
        $start = new \DateTime('now', $this->timezone);
        $start->setTime(0, 0, 0);
        $end = new \DateTime('now', $this->timezone);
        $offset = $end->format('j');
        $interval = new \DateInterval('P'.($offset-1).'D');
        $start->sub($interval);
        return $this->getEntryByRange($start, $end);
    }
    
/**
* Method: getThisYear
* Gets all entries for the current year (beginning from the first of the year)
*/
    private function getThisYear() {
        $start = new \DateTime('now', $this->timezone);
        $start->setTime(0, 0, 0);
        $end = new \DateTime('now', $this->timezone);
        $offset = $end->format('z');
        $interval = new \DateInterval('P'.$offset.'D');
        $start = $start->sub($interval);
        return $this->getEntryByRange($start, $end);
    }
    
/**
* Method: getPastWeek
* Gets all entries for the past 7 days
*/
    private function getPastWeek() {
        $start = new \DateTime('now', $this->timezone);
        $start->setTime(0, 0, 0);
        $end = new \DateTime('now', $this->timezone);
        $interval = new \DateInterval('P7D');
        $start = $start->sub($interval);
        return $this->getEntryByRange($start, $end);
    }

/**
* Method: getPastMonth
* Gets all entries since current day last month
*/
    private function getPastMonth() {
        $start = new \DateTime('now', $this->timezone);
        $start->setTime(0, 0, 0);
        $end = new \DateTime('now', $this->timezone);
        $interval = new \DateInterval('P1M');
        $start = $start->sub($interval);
        return $this->getEntryByRange($start, $end);
    }

/**
* Method: getPastYear
* Gets all entries since current day last year
*/
    private function getPastYear() {
        $start = new \DateTime('now', $this->timezone);
        $start->setTime(0, 0, 0);
        $end = new \DateTime('now', $this->timezone);
        $interval = new \DateInterval('P1Y');
        $start = $start->sub($interval);
        return $this->getEntryByRange($start, $end);
    }
    
/**
* Method: getEntryByRange
* @param undefined $start
* @param undefined $end
* 
* Gets all entries for specified date range
*/
    private function getEntryByRange(\DateTime $start, \DateTime $end) {
        if ($start->diff($end)->days < 0) {
            list($start, $end) = Array($end, $start);
        }
        $this->start = $start;
        $this->end = $end;
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT e FROM LLHBTBundle:Entry e WHERE e.date >= :start AND e.date <= :end ORDER BY e.category ASC, e.date DESC, e.type ASC, e.id ASC')
        ->setParameter('start', $start->format('Y-m-d'))->setParameter('end', $end->format('Y-m-d'));
        $entries = $query->getResult();
        
        return $this->formatEntries($entries);
    }
    
    private function formatEntries($entries) {
    	$bucket = Array();
    	foreach ($entries as $entry) {
    		$name = $entry->getCategory();
    		$bucket[$name]['entries'][] = $entry;
    		$bucket[$name]['name'] = $name;
    	}
    	foreach ($bucket as &$cat) {
    		$cat['subtotal'] = 0;
    		foreach ($cat['entries'] as $e) {
    			$cat['subtotal'] += $e->getAmount();
    		}
    	}
    	
    	return $bucket;
    }
    
    private function saveEntryCategory($category, $type) {
        $conn = $this->get('database_connection');
        $query = "INSERT IGNORE INTO category (name, type) VALUES ('$category', '$type')";
        $conn->query($query);
    }
}
