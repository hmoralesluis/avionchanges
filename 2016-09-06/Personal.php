<?php

namespace SysBackenBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Util\ClassUtils;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="SysBackenBundle\Entity\PersonalRepository")
 * @ORM\Table(name="personal") *
 */
class Personal
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="full_name",type="string", length=255)
     */
    private $full_name;


    /**
     * @ORM\Column(name="job_title",type="string", length=255)
     */
    private $job_title;

    /**
     * @ORM\ManyToOne(targetEntity="Nomencladores")
     * @ORM\JoinColumn(name="ocupation", referencedColumnName="id")
     */
    protected $ocupation;

    /**
     * @ORM\ManyToOne(targetEntity="Nomencladores")
     * @ORM\JoinColumn(name="category", referencedColumnName="id")
     */
    protected $category;

    /**
     * @ORM\ManyToOne(targetEntity="Continent")
     * @ORM\JoinColumn(name="continent", referencedColumnName="id")
     */
    protected $continent;


    /**
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumn(name="country", referencedColumnName="id")
     */
    protected $country;






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
     * Set full_name
     *
     * @param string $fullName
     * @return Personal
     */
    public function setFullName($fullName)
    {
        $this->full_name = $fullName;

        return $this;
    }

    /**
     * Get full_name
     *
     * @return string 
     */
    public function getFullName()
    {
        return $this->full_name;
    }

    /**
     * Set job_title
     *
     * @param string $jobTitle
     * @return Personal
     */
    public function setJobTitle($jobTitle)
    {
        $this->job_title = $jobTitle;

        return $this;
    }

    /**
     * Get job_title
     *
     * @return string 
     */
    public function getJobTitle()
    {
        return $this->job_title;
    }

    /**
     * Set ocupation
     *
     * @param \SysBackenBundle\Entity\Nomencladores $ocupation
     * @return Personal
     */
    public function setOcupation(\SysBackenBundle\Entity\Nomencladores $ocupation = null)
    {
        $this->ocupation = $ocupation;

        return $this;
    }

    /**
     * Get ocupation
     *
     * @return \SysBackenBundle\Entity\Nomencladores 
     */
    public function getOcupation()
    {
        return $this->ocupation;
    }

    /**
     * Set category
     *
     * @param \SysBackenBundle\Entity\Nomencladores $category
     * @return Personal
     */
    public function setCategory(\SysBackenBundle\Entity\Nomencladores $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \SysBackenBundle\Entity\Nomencladores 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set continent
     *
     * @param \SysBackenBundle\Entity\Continent $continent
     * @return Personal
     */
    public function setContinent(\SysBackenBundle\Entity\Continent $continent = null)
    {
        $this->continent = $continent;

        return $this;
    }

    /**
     * Get continent
     *
     * @return \SysBackenBundle\Entity\Continent 
     */
    public function getContinent()
    {
        return $this->continent;
    }

    /**
     * Set country
     *
     * @param \SysBackenBundle\Entity\Country $country
     * @return Personal
     */
    public function setCountry(\SysBackenBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \SysBackenBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }
}
