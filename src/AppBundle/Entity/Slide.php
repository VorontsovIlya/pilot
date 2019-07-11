<?php

namespace AppBundle\Entity;

/**
 * Slide
 */
class Slide
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
     * @var string|null
     */
    private $link;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    private $image;


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
     * @return Slide
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
     * Set link.
     *
     * @param string|null $link
     *
     * @return Slide
     */
    public function setLink($link = null)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link.
     *
     * @return string|null
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set image.
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media|null $image
     *
     * @return Slide
     */
    public function setImage(\Application\Sonata\MediaBundle\Entity\Media $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image.
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media|null
     */
    public function getImage()
    {
        return $this->image;
    }

    public function __toString()
    {
        if ($this->title) return $this->title;
            else return "";
    }

    /**
     * @var string|null
     */
    private $slide_title;

    /**
     * @var string|null
     */
    private $slide_descr;

    /**
     * @var string|null
     */
    private $button;


    /**
     * Set slideTitle.
     *
     * @param string|null $slideTitle
     *
     * @return Slide
     */
    public function setSlideTitle($slideTitle = null)
    {
        $this->slide_title = $slideTitle;

        return $this;
    }

    /**
     * Get slideTitle.
     *
     * @return string|null
     */
    public function getSlideTitle()
    {
        return $this->slide_title;
    }

    /**
     * Set slideDescr.
     *
     * @param string|null $slideDescr
     *
     * @return Slide
     */
    public function setSlideDescr($slideDescr = null)
    {
        $this->slide_descr = $slideDescr;

        return $this;
    }

    /**
     * Get slideDescr.
     *
     * @return string|null
     */
    public function getSlideDescr()
    {
        return $this->slide_descr;
    }

    /**
     * Set button.
     *
     * @param string|null $button
     *
     * @return Slide
     */
    public function setButton($button = null)
    {
        $this->button = $button;

        return $this;
    }

    /**
     * Get button.
     *
     * @return string|null
     */
    public function getButton()
    {
        return $this->button;
    }

    public function __clone() {
        $this->id = null;
    }
    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    private $video;


    /**
     * Set video.
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media|null $video
     *
     * @return Slide
     */
    public function setVideo(\Application\Sonata\MediaBundle\Entity\Media $video = null)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video.
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media|null
     */
    public function getVideo()
    {
        return $this->video;
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $children;

    /**
     * @var \AppBundle\Entity\Slide
     */
    private $root;

    /**
     * @var \AppBundle\Entity\Slide
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
     * Set lft.
     *
     * @param int $lft
     *
     * @return Slide
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
     * @return Slide
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
     * @return Slide
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

    /**
     * Add child.
     *
     * @param \AppBundle\Entity\Slide $child
     *
     * @return Slide
     */
    public function addChild(\AppBundle\Entity\Slide $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child.
     *
     * @param \AppBundle\Entity\Slide $child
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeChild(\AppBundle\Entity\Slide $child)
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
     * @param \AppBundle\Entity\Slide|null $root
     *
     * @return Slide
     */
    public function setRoot(\AppBundle\Entity\Slide $root = null)
    {
        $this->root = $root;

        return $this;
    }

    /**
     * Get root.
     *
     * @return \AppBundle\Entity\Slide|null
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * Set parent.
     *
     * @param \AppBundle\Entity\Slide|null $parent
     *
     * @return Slide
     */
    public function setParent(\AppBundle\Entity\Slide $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent.
     *
     * @return \AppBundle\Entity\Slide|null
     */
    public function getParent()
    {
        return $this->parent;
    }

    public function getLaveledTitle()
    {
        $prefix = "";
        for ($i=1; $i<= $this->lvl; $i++){
            $prefix .= "--";
        }
        return $prefix . $this->title;
    }
}
