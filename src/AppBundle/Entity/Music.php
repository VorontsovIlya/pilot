<?php

namespace AppBundle\Entity;

/**
 * Music
 */
class Music
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
    private $code;

    /**
     * @var bool|null
     */
    private $active;

    /**
     * @var bool|null
     */
    private $starred;


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
     * @return Music
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
     * Set code.
     *
     * @param string|null $code
     *
     * @return Music
     */
    public function setCode($code = null)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code.
     *
     * @return string|null
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set active.
     *
     * @param bool|null $active
     *
     * @return Music
     */
    public function setActive($active = null)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active.
     *
     * @return bool|null
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set starred.
     *
     * @param bool|null $starred
     *
     * @return Music
     */
    public function setStarred($starred = null)
    {
        $this->starred = $starred;

        return $this;
    }

    /**
     * Get starred.
     *
     * @return bool|null
     */
    public function getStarred()
    {
        return $this->starred;
    }
}
