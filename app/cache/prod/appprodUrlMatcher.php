<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appprodUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appprodUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        // llhbt_read_entry
        if (0 === strpos($pathinfo, '/view') && preg_match('#^/view/(?P<id>[^/]+)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_llhbt_read_entry;
            }

            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'LL\\HBTBundle\\Controller\\DefaultController::getEntryAction',)), array('_route' => 'llhbt_read_entry'));
        }
        not_llhbt_read_entry:

        // llhbt_create_entry
        if ($pathinfo === '/create') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_llhbt_create_entry;
            }

            return array (  '_controller' => 'LL\\HBTBundle\\Controller\\DefaultController::updateEntryAction',  '_route' => 'llhbt_create_entry',);
        }
        not_llhbt_create_entry:

        // llhbt_update_entry
        if (0 === strpos($pathinfo, '/update') && preg_match('#^/update/(?P<id>[^/]+)$#s', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_llhbt_update_entry;
            }

            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'LL\\HBTBundle\\Controller\\DefaultController::updateEntryAction',)), array('_route' => 'llhbt_update_entry'));
        }
        not_llhbt_update_entry:

        // llhbt_delete_entry
        if (0 === strpos($pathinfo, '/delete') && preg_match('#^/delete/(?P<id>[^/]+)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_llhbt_delete_entry;
            }

            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'LL\\HBTBundle\\Controller\\DefaultController::deleteEntryAction',)), array('_route' => 'llhbt_delete_entry'));
        }
        not_llhbt_delete_entry:

        // llhbt_get_chart
        if (0 === strpos($pathinfo, '/chart') && preg_match('#^/chart/(?P<start>[^/]+)/(?P<end>[^/]+)(?:/(?P<chart>[^/]+))?$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_llhbt_get_chart;
            }

            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'LL\\HBTBundle\\Controller\\DefaultController::getChartEntriesAction',  'chart' => 'PieChart',)), array('_route' => 'llhbt_get_chart'));
        }
        not_llhbt_get_chart:

        // llhbt_get_entries
        if (preg_match('#^/(?P<start>[^/]+)(?:/(?P<end>[^/]+))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'LL\\HBTBundle\\Controller\\DefaultController::getEntriesAction',  'end' => '',)), array('_route' => 'llhbt_get_entries'));
        }

        // llhbt_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'llhbt_homepage');
            }

            return array (  '_controller' => 'LL\\HBTBundle\\Controller\\DefaultController::indexAction',  '_route' => 'llhbt_homepage',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
