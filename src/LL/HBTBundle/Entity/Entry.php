<?php
// src/LL/HBTBundle/Entity/Entry.php
namespace LL\HBTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="entry")
*/
class Entry {
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;
    /**
    * @ORM\Column(type="date")
    */
    protected $date;
    /**
    * @ORM\Column(type="string", length=64)
    */
    protected $category;
    /**
    * @ORM\Column(type="string", length=64)
    */
    protected $type;
    /**
    * @ORM\Column(type="string", length=512)
    */
    protected $note;
    /**
    * @ORM\Column(type="decimal", scale=2, precision=12)
    */
    protected $amount;
    
    public function __construct() {
        
    }   

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Entry
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return Entry
     */
    public function setCategory($category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Entry
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return Entry
     */
    public function setNote($note)
    {
        $this->note = $note;
    
        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return Entry
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    
        return $this;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount()
    {
        return $this->amount;
    }
    
    public function toJSON() {
        $props = Array(
            'id'=>$this->id,
            'date'=>$this->date,
            'category'=>$this->category,
            'type'=>$this->type,
            'note'=>$this->note,
            'amount'=>$this->amount,
        );
        return json_encode($props);
    }
}