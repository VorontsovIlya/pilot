<?php

namespace AppBundle\Entity;

/**
 * News
 */
class News
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var string|null
     */
    private $tag;

    /**
     * @var string|null
     */
    private $link;

    /**
     * @var \DateTime|null
     */
    private $newsdate;

    /**
     * @var string|null
     */
    private $descr;

    /**
     * @var string|null
     */
    private $content;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    private $picture;

    public function __construct()
    {
        $this->newsdate = new \DateTime();
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
     * @param string|null $title
     *
     * @return News
     */
    public function setTitle($title = null)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set tag.
     *
     * @param string|null $tag
     *
     * @return News
     */
    public function setTag($tag = null)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag.
     *
     * @return string|null
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set link.
     *
     * @param string|null $link
     *
     * @return News
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
     * Set newsdate.
     *
     * @param \DateTime|null $newsdate
     *
     * @return News
     */
    public function setNewsdate($newsdate = null)
    {
        $this->newsdate = $newsdate;

        return $this;
    }

    /**
     * Get newsdate.
     *
     * @return \DateTime|null
     */
    public function getNewsdate()
    {
        return $this->newsdate;
    }

    /**
     * Set descr.
     *
     * @param string|null $descr
     *
     * @return News
     */
    public function setDescr($descr = null)
    {
        $this->descr = $descr;

        return $this;
    }

    /**
     * Get descr.
     *
     * @return string|null
     */
    public function getDescr()
    {
        return $this->descr;
    }

    /**
     * Set content.
     *
     * @param string|null $content
     *
     * @return News
     */
    public function setContent($content = null)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content.
     *
     * @return string|null
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set picture.
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media|null $picture
     *
     * @return News
     */
    public function setPicture(\Application\Sonata\MediaBundle\Entity\Media $picture = null)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture.
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media|null
     */
    public function getPicture()
    {
        return $this->picture;
    }
    /**
     * @var bool|null
     */
    private $public;


    /**
     * Set public.
     *
     * @param bool|null $public
     *
     * @return News
     */
    public function setPublic($public = null)
    {
        $this->public = $public;

        return $this;
    }

    /**
     * Get public.
     *
     * @return bool|null
     */
    public function getPublic()
    {
        return $this->public;
    }
}
