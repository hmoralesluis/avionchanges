<?php
/**
 * Created by PhpStorm.
 * User: roster
 * Date: 7/2/16
 * Time: 12:53 AM
 */

namespace SysBackenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="SysBackenBundle\Entity\AuditRepository")
 * @ORM\Table(name="audit") *
 */
class Audit {

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     * @var bool
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive = true;

    /**
     * @ORM\ManyToOne(targetEntity="Operator")
     * @ORM\JoinColumn(name="operator", referencedColumnName="id")
     */
    protected $operator;


    /**
     * @ORM\Column(name="location",type="string", length=255)
     */
    private $location;

    /**
     * @ORM\Column(name="startdate",type="datetime")
     */
    private $startdate;

    /**
     * @ORM\Column(name="endingdate",type="datetime")
     */
    private $endingdate;


    /**
     * @ORM\ManyToOne(targetEntity="Inspector")
     * @ORM\JoinColumn(name="inspector", referencedColumnName="id")
     */
    protected $inspector;

    /**
     * @ORM\ManyToOne(targetEntity="AssignedTo")
     * @ORM\JoinColumn(name="assignedto", referencedColumnName="id")
     */
    protected $assignedto;

    /**
     * @ORM\ManyToOne(targetEntity="Nomencladores")
     * @ORM\JoinColumn(name="status", referencedColumnName="id")
     */
    protected $status;

    /**
     * @ORM\Column(name="remark", type="string", length=255)
     */
    protected $remark;


    /**
     *
     */
    public function __construct()
    {
        $this->isActive = true;
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
     * Set isActive
     *
     * @param boolean $isActive
     * @return Audit
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
     * Set location
     *
     * @param string $location
     * @return Audit
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set startdate
     *
     * @param \DateTime $startdate
     * @return Audit
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;

        return $this;
    }

    /**
     * Get startdate
     *
     * @return \DateTime 
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Set endingdate
     *
     * @param \DateTime $endingdate
     * @return Audit
     */
    public function setEndingdate($endingdate)
    {
        $this->endingdate = $endingdate;

        return $this;
    }

    /**
     * Get endingdate
     *
     * @return \DateTime 
     */
    public function getEndingdate()
    {
        return $this->endingdate;
    }

    /**
     * Set remark
     *
     * @param string $remark
     * @return Audit
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;

        return $this;
    }

    /**
     * Get remark
     *
     * @return string 
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Set operator
     *
     * @param \SysBackenBundle\Entity\Operator $operator
     * @return Audit
     */
    public function setOperator(\SysBackenBundle\Entity\Operator $operator = null)
    {
        $this->operator = $operator;

        return $this;
    }

    /**
     * Get operator
     *
     * @return \SysBackenBundle\Entity\Operator 
     */
    public function getOperator()
    {
        return $this->operator;
    }


    /**
     * Set status
     *
     * @param \SysBackenBundle\Entity\Nomencladores $status
     * @return Audit
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
     * Set inspector
     *
     * @param \SysBackenBundle\Entity\Inspector $inspector
     * @return Audit
     */
    public function setInspector(\SysBackenBundle\Entity\Inspector $inspector = null)
    {
        $this->inspector = $inspector;

        return $this;
    }

    /**
     * Get inspector
     *
     * @return \SysBackenBundle\Entity\Inspector 
     */
    public function getInspector()
    {
        return $this->inspector;
    }

    /**
     * Set assignedto
     *
     * @param \SysBackenBundle\Entity\AssignedTo $assignedto
     * @return Audit
     */
    public function setAssignedto(\SysBackenBundle\Entity\AssignedTo $assignedto = null)
    {
        $this->assignedto = $assignedto;

        return $this;
    }

    /**
     * Get assignedto
     *
     * @return \SysBackenBundle\Entity\AssignedTo 
     */
    public function getAssignedto()
    {
        return $this->assignedto;
    }
}
