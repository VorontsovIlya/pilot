<?php

namespace AppBundle\Entity;

/**
 * Video
 */
class Video
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
     * @var \AppBundle\Entity\Artist
     */
    private $artist;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    private $video;


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
     * @return Video
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
     * Set artist.
     *
     * @param \AppBundle\Entity\Artist|null $artist
     *
     * @return Video
     */
    public function setArtist(\AppBundle\Entity\Artist $artist = null)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get artist.
     *
     * @return \AppBundle\Entity\Artist|null
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * Set video.
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media|null $video
     *
     * @return Video
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
     * @var bool|null
     */
    private $active;

    /**
     * @var bool|null
     */
    private $starred;


    /**
     * Set active.
     *
     * @param bool|null $active
     *
     * @return Video
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
     * @return Video
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
    /**
     * @var \DateTime|null
     */
    private $releasedate = '2018-01-01';


    /**
     * Set releasedate.
     *
     * @param \DateTime|null $releasedate
     *
     * @return Video
     */
    public function setReleasedate($releasedate = null)
    {
        $this->releasedate = $releasedate;

        return $this;
    }

    /**
     * Get releasedate.
     *
     * @return \DateTime|null
     */
    public function getReleasedate()
    {
        return $this->releasedate;
    }
}
