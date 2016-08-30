<?php

namespace SysBackenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="SysBackenBundle\Entity\ChangeOfRepository")
 * @ORM\Table(name="changeof")
 */
class ChangeOf
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Nomencladores")
     * @ORM\JoinColumn(name="type", referencedColumnName="id")
     */
    protected $type;

    /**
     * @ORM\ManyToOne(targetEntity="Airecraft")
     * @ORM\JoinColumn(name="aircraft", referencedColumnName="id")
     */
    protected $aircraft;

    /**
     * @ORM\Column(name="model",type="string", length=255)
     */
    protected $model;

    /**
     * @ORM\Column(name="current",type="string", length=255)
     */
    protected $current;

    /**
     * @ORM\Column(name="new",type="string", length=255)
     */
    protected $new;

    /**
     * @ORM\Column(name="new_mark",type="string", length=255)
     */
    protected $new_mark;


    /**
     * @ORM\ManyToOne(targetEntity="Nomencladores")
     * @ORM\JoinColumn(name="inspector", referencedColumnName="id")
     */
    protected $inspector;

    /**
     * @ORM\ManyToOne(targetEntity="Nomencladores")
     * @ORM\JoinColumn(name="assignedto", referencedColumnName="id")
     */
    protected $assignedto;

    /**
     * @ORM\ManyToOne(targetEntity="Nomencladores")
     * @ORM\JoinColumn(name="status", referencedColumnName="id")
     */
    protected $status;

    /**
     * @ORM\Column(name="body",type="string", length=255)
     */
    protected $remarks;

    /**
     *
     * @var bool
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive = true;

    /**
     * @ORM\Column(name="date",type="datetime", unique=true)
     */
    private $date;

    /**
     *
     */
    public function __construct()
    {
        $this->isActive = true;
        $this->date = new \DateTime();
        $this->new_mark = 'null';
        $this->new = 'null';

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
     * Set model
     *
     * @param string $model
     * @return ChangeOf
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string 
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set current
     *
     * @param string $current
     * @return ChangeOf
     */
    public function setCurrent($current)
    {
        $this->current = $current;

        return $this;
    }

    /**
     * Get current
     *
     * @return string 
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * Set new
     *
     * @param string $new
     * @return ChangeOf
     */
    public function setNew($new)
    {
        $this->new = $new;

        return $this;
    }

    /**
     * Get new
     *
     * @return string 
     */
    public function getNew()
    {
        return $this->new;
    }

    /**
     * Set remarks
     *
     * @param string $remarks
     * @return ChangeOf
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * Get remarks
     *
     * @return string 
     */
    public function getRemarks()
    {
        return $this->remarks;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return ChangeOf
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return ChangeOf
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
     * Set type
     *
     * @param \SysBackenBundle\Entity\Nomencladores $type
     * @return ChangeOf
     */
    public function setType(\SysBackenBundle\Entity\Nomencladores $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \SysBackenBundle\Entity\Nomencladores 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set aircraft
     *
     * @param \SysBackenBundle\Entity\Airecraft $aircraft
     * @return ChangeOf
     */
    public function setAircraft(\SysBackenBundle\Entity\Airecraft $aircraft = null)
    {
        $this->aircraft = $aircraft;

        return $this;
    }

    /**
     * Get aircraft
     *
     * @return \SysBackenBundle\Entity\Airecraft 
     */
    public function getAircraft()
    {
        return $this->aircraft;
    }

    /**
     * Set inspector
     *
     * @param \SysBackenBundle\Entity\Nomencladores $inspector
     * @return ChangeOf
     */
    public function setInspector(\SysBackenBundle\Entity\Nomencladores $inspector = null)
    {
        $this->inspector = $inspector;

        return $this;
    }

    /**
     * Get inspector
     *
     * @return \SysBackenBundle\Entity\Nomencladores 
     */
    public function getInspector()
    {
        return $this->inspector;
    }

    /**
     * Set assignedto
     *
     * @param \SysBackenBundle\Entity\Nomencladores $assignedto
     * @return ChangeOf
     */
    public function setAssignedto(\SysBackenBundle\Entity\Nomencladores $assignedto = null)
    {
        $this->assignedto = $assignedto;

        return $this;
    }

    /**
     * Get assignedto
     *
     * @return \SysBackenBundle\Entity\Nomencladores 
     */
    public function getAssignedto()
    {
        return $this->assignedto;
    }

    /**
     * Set status
     *
     * @param \SysBackenBundle\Entity\Nomencladores $status
     * @return ChangeOf
     */
    public function setStatus(\SysBackenBundle\Entity\Nomencladores $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \SysBackenBundle\Entity\Nomencladores 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set new_mark
     *
     * @param string $newMark
     * @return ChangeOf
     */
    public function setNewMark($newMark)
    {
        $this->new_mark = $newMark;

        return $this;
    }

    /**
     * Get new_mark
     *
     * @return string 
     */
    public function getNewMark()
    {
        return $this->new_mark;
    }

    public function getNewSelect(){
        if($this->getType()->getTitle() == 'Change of Registration Marks')
        return $this->getNewMark();
        return $this->getNew();
    }
}
