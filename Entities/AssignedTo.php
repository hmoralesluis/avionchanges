<?php
/**
 * Created by PhpStorm.
 * User: roster
 * Date: 7/27/16
 * Time: 4:09 PM
 */

namespace SysBackenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="assignedto")
 */
class AssignedTo {

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="acronym", type="string", unique=true)
     */
    protected $acronym;

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
     * Set acronym
     *
     * @param string $acronym
     *
     * @return Inspector
     */
    public function setAcronym($acronym)
    {
        $this->acronym = $acronym;

        return $this;
    }

    /**
     * Get acronym
     *
     * @return string
     */
    public function getAcronym()
    {
        return $this->acronym;
    }

    public function __toString(){
        return $this->getAcronym();
    }
}
