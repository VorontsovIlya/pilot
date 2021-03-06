<?php

namespace MenuBundle\Entity;

/**
 * Menu
 */
class Menu
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $route;

    /**
     * @var string|null
     */
    private $alias;

    /**
     * @var bool
     */
    private $static;

    /**
     * @var \MenuBundle\Entity\MenuType
     */
    private $menuTypeId;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Menu
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set route.
     *
     * @param string $route
     *
     * @return Menu
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route.
     *
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Set alias.
     *
     * @param string|null $alias
     *
     * @return Menu
     */
    public function setAlias($alias = null)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias.
     *
     * @return string|null
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set static.
     *
     * @param bool $static
     *
     * @return Menu
     */
    public function setStatic($static)
    {
        $this->static = $static;

        return $this;
    }

    /**
     * Get static.
     *
     * @return bool
     */
    public function getStatic()
    {
        return $this->static;
    }

    /**
     * Set menuTypeId.
     *
     * @param \MenuBundle\Entity\MenuType|null $menuTypeId
     *
     * @return Menu
     */
    public function setMenuTypeId(\MenuBundle\Entity\MenuType $menuTypeId = null)
    {
        $this->menuTypeId = $menuTypeId;

        return $this;
    }

    /**
     * Get menuTypeId.
     *
     * @return \MenuBundle\Entity\MenuType|null
     */
    public function getMenuTypeId()
    {
        return $this->menuTypeId;
    }
    /**
     * @var int
     */
    private $lft;

    /**
     * @var int
     */
    private $rgt;

    /**
     * @var int
     */
    private $lvl;


    /**
     * Set lft.
     *
     * @param int $lft
     *
     * @return Menu
     */
    public function setLft($lft)
    {
        $this->lft = $lft;

        return $this;
    }

    /**
     * Get lft.
     *
     * @return int
     */
    public function getLft()
    {
        return $this->lft;
    }

    /**
     * Set rgt.
     *
     * @param int $rgt
     *
     * @return Menu
     */
    public function setRgt($rgt)
    {
        $this->rgt = $rgt;

        return $this;
    }

    /**
     * Get rgt.
     *
     * @return int
     */
    public function getRgt()
    {
        return $this->rgt;
    }

    /**
     * Set lvl.
     *
     * @param int $lvl
     *
     * @return Menu
     */
    public function setLvl($lvl)
    {
        $this->lvl = $lvl;

        return $this;
    }

    /**
     * Get lvl.
     *
     * @return int
     */
    public function getLvl()
    {
        return $this->lvl;
    }

    public function setLevels()
    {
        if (!$this->getLft()) $this->setLft(0);
        if (!$this->getRgt()) $this->setRgt(0);
        if (!$this->getLvl()) $this->setLvl(0);
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $children;

    /**
     * @var \Entity\Menu
     */
    private $root;

    /**
     * @var \Entity\Menu
     */
    private $parent;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add child.
     *
     * @param \MenuBundle\Entity\Menu $child
     *
     * @return Menu
     */
    public function addChild(\MenuBundle\Entity\Menu $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child.
     *
     * @param \MenuBundle\Entity\Menu $child
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeChild(\MenuBundle\Entity\Menu $child)
    {
        return $this->children->removeElement($child);
    }

    /**
     * Get children.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set root.
     *
     * @param \MenuBundle\Entity\Menu|null $root
     *
     * @return Menu
     */
    public function setRoot(\MenuBundle\Entity\Menu $root = null)
    {
        $this->root = $root;

        return $this;
    }

    /**
     * Get root.
     *
     * @return \Entity\Menu|null
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * Set parent.
     *
     * @param \MenuBundle\Entity\Menu|null $parent
     *
     * @return Menu
     */
    public function setParent(\MenuBundle\Entity\Menu $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent.
     *
     * @return \Entity\Menu|null
     */
    public function getParent()
    {
        return $this->parent;
    }

    public function __toString()
    {
        if ($this->title) return $this->title;
            else return "";
    }

    public function getLaveledTitle()
    {
        $prefix = "";
        for ($i=1; $i<= $this->lvl; $i++){
            $prefix .= "--";
        }
        return $prefix . $this->title;
    }

    public function getRouteChoice()
    {
        return $this->route;
    }

    public function setRouteChoice($route)
    {        
        if ($route != '') $this->route = $route;
        return $this;
    }
    
}
