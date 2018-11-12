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
}
