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
 * @ORM\Entity(repositoryClass="SysBackenBundle\Entity\MroTaskRepository")
 * @ORM\Table(name="mrotask") *
 */
class MroTask {

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
     *
     * @var bool
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive = true;

    /**
     * @ORM\ManyToOne(targetEntity="Mro")
     * @ORM\JoinColumn(name="mro", referencedColumnName="id")
     */
    protected $mro;

    /**
     * @ORM\Column(name="expirationdate",type="datetime")
     */
    private $expirationdate;


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
     * Set expirationdate
     *
     * @param \DateTime $expirationdate
     * @return MroTask
     */
    public function setExpirationdate($expirationdate)
    {
        $this->expirationdate = $expirationdate;

        return $this;
    }

    /**
     * Get expirationdate
     *
     * @return \DateTime 
     */
    public function getExpirationdate()
    {
        return $this->expirationdate;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return MroTask
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
     * @return MroTask
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
     * @return MroTask
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
     * @return MroTask
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
     * Set type
     *
     * @param \SysBackenBundle\Entity\Nomencladores $type
     * @return MroTask
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
     * Set mro
     *
     * @param \SysBackenBundle\Entity\Mro $mro
     * @return MroTask
     */
    public function setMro(\SysBackenBundle\Entity\Mro $mro = null)
    {
        $this->mro = $mro;

        return $this;
    }

    /**
     * Get mro
     *
     * @return \SysBackenBundle\Entity\Mro 
     */
    public function getMro()
    {
        return $this->mro;
    }

    /**
     * Set status
     *
     * @param \SysBackenBundle\Entity\Nomencladores $status
     * @return MroTask
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
     * Set isActive
     *
     * @param boolean $isActive
     * @return MroTask
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
     * Set inspector
     *
     * @param \SysBackenBundle\Entity\Inspector $inspector
     * @return MroTask
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
     * @return MroTask
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
