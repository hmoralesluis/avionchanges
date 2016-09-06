<?php

namespace SysBackenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="SysBackenBundle\Entity\MenuCategoriesRepository")
 * @ORM\Table(name="menu_categories") *
 */
class MenuCategories
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="title",type="string", length=64)
     */
    private $name;

    /**
     * The user who made the purchase.
     *
     * @var Type circular
     * @ORM\ManyToOne(targetEntity="MenuCategories")
     * @ORM\JoinColumn(name="parent", referencedColumnName="id")
     */
    protected $parent;


    /**
     * @ORM\Column(name="url",type="string", length=64)
     */
    private $url;

    /**
     * @ORM\Column(name="keymenu",type="string", length=64)
     */
    private $keymenu;

    public function __toString(){
        return $this->getName();
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
     * Set name
     *
     * @param string $name
     * @return MenuCategories
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set parent
     *
     * @param \SysBackenBundle\Entity\MenuCategories $parent
     * @return MenuCategories
     */
    public function setParent(\SysBackenBundle\Entity\MenuCategories $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \SysBackenBundle\Entity\MenuCategories 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return MenuCategories
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set keymenu
     *
     * @param string $keymenu
     * @return MenuCategories
     */
    public function setKeymenu($keymenu)
    {
        $this->keymenu = $keymenu;

        return $this;
    }

    /**
     * Get keymenu
     *
     * @return string 
     */
    public function getKeymenu()
    {
        return $this->keymenu;
    }
}
