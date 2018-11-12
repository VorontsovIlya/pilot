<?php

namespace MenuBundle\Entity;

/**
 * MenuType
 */
class MenuType
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $typeId;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->typeId = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return MenuType
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
     * Add typeId.
     *
     * @param \MenuBundle\Entity\Menu $typeId
     *
     * @return MenuType
     */
    public function addTypeId(\MenuBundle\Entity\Menu $typeId)
    {
        $this->typeId[] = $typeId;

        return $this;
    }

    /**
     * Remove typeId.
     *
     * @param \MenuBundle\Entity\Menu $typeId
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTypeId(\MenuBundle\Entity\Menu $typeId)
    {
        return $this->typeId->removeElement($typeId);
    }

    /**
     * Get typeId.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    public function __toString()
    {
        if ($this->title) return $this->title;
            else return "";
    }

}
