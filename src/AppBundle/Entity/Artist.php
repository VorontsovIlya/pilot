<?php

namespace AppBundle\Entity;

use Symfony\Cmf\Component\Routing\RouteObjectInterface;
use Symfony\Cmf\Component\Routing\RouteReferrersInterface;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Artist
 */
class Artist implements RouteReferrersInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $title;

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
     * Set path.
     *
     * @param string $path
     *
     * @return Artist
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Artist
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
    private $video01;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    private $video02;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $slides01;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $slides02;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->slides01 = new \Doctrine\Common\Collections\ArrayCollection();
        $this->slides02 = new \Doctrine\Common\Collections\ArrayCollection();
        $this->routes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set descr.
     *
     * @param string|null $descr
     *
     * @return Artist
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
     * @return Artist
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
     * Set video01.
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media|null $video01
     *
     * @return Artist
     */
    public function setVideo01(\Application\Sonata\MediaBundle\Entity\Media $video01 = null)
    {
        $this->video01 = $video01;

        return $this;
    }

    /**
     * Get video01.
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media|null
     */
    public function getVideo01()
    {
        return $this->video01;
    }

    /**
     * Set video02.
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media|null $video02
     *
     * @return Artist
     */
    public function setVideo02(\Application\Sonata\MediaBundle\Entity\Media $video02 = null)
    {
        $this->video02 = $video02;

        return $this;
    }

    /**
     * Get video02.
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media|null
     */
    public function getVideo02()
    {
        return $this->video02;
    }

    /**
     * Add slides01.
     *
     * @param \AppBundle\Entity\Slide $slides01
     *
     * @return Artist
     */
    public function addSlides01(\AppBundle\Entity\Slide $slides01)
    {
        $this->slides01[] = $slides01;

        return $this;
    }

    /**
     * Remove slides01.
     *
     * @param \AppBundle\Entity\Slide $slides01
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSlides01(\AppBundle\Entity\Slide $slides01)
    {
        return $this->slides01->removeElement($slides01);
    }

    /**
     * Get slides01.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSlides01()
    {
        return $this->slides01;
    }

    /**
     * Add slides02.
     *
     * @param \AppBundle\Entity\Slide $slides02
     *
     * @return Artist
     */
    public function addSlides02(\AppBundle\Entity\Slide $slides02)
    {
        $this->slides02[] = $slides02;

        return $this;
    }

    /**
     * Remove slides02.
     *
     * @param \AppBundle\Entity\Slide $slides02
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSlides02(\AppBundle\Entity\Slide $slides02)
    {
        return $this->slides02->removeElement($slides02);
    }

    /**
     * Get slides02.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSlides02()
    {
        return $this->slides02;
    }
    /**
     * @var string|null
     */
    private $videodescr01;

    /**
     * @var string|null
     */
    private $videodescr02;

    /**
     * Set videodescr01.
     *
     * @param string|null $videodescr01
     *
     * @return Artist
     */
    public function setVideodescr01($videodescr01 = null)
    {
        $this->videodescr01 = $videodescr01;

        return $this;
    }

    /**
     * Get videodescr01.
     *
     * @return string|null
     */
    public function getVideodescr01()
    {
        return $this->videodescr01;
    }

    /**
     * Set videodescr02.
     *
     * @param string|null $videodescr02
     *
     * @return Artist
     */
    public function setVideodescr02($videodescr02 = null)
    {
        $this->videodescr02 = $videodescr02;

        return $this;
    }

    /**
     * Get videodescr02.
     *
     * @return string|null
     */
    public function getVideodescr02()
    {
        return $this->videodescr02;
    }

    public function __toString()
    {
        if ($this->title) {
            return $this->title;
        } else {
            return "";
        }

    }

    /**
     * @var string|null
     */
    private $social_fb;

    /**
     * @var string|null
     */
    private $social_vk;

    /**
     * @var string|null
     */
    private $social_tw;

    /**
     * @var string|null
     */
    private $social_ytube;

    /**
     * @var string|null
     */
    private $social_inst;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    private $image;

    /**
     * Set socialFb.
     *
     * @param string|null $socialFb
     *
     * @return Artist
     */
    public function setSocialFb($socialFb = null)
    {
        $this->social_fb = $socialFb;

        return $this;
    }

    /**
     * Get socialFb.
     *
     * @return string|null
     */
    public function getSocialFb()
    {
        return $this->social_fb;
    }

    /**
     * Set socialVk.
     *
     * @param string|null $socialVk
     *
     * @return Artist
     */
    public function setSocialVk($socialVk = null)
    {
        $this->social_vk = $socialVk;

        return $this;
    }

    /**
     * Get socialVk.
     *
     * @return string|null
     */
    public function getSocialVk()
    {
        return $this->social_vk;
    }

    /**
     * Set socialTw.
     *
     * @param string|null $socialTw
     *
     * @return Artist
     */
    public function setSocialTw($socialTw = null)
    {
        $this->social_tw = $socialTw;

        return $this;
    }

    /**
     * Get socialTw.
     *
     * @return string|null
     */
    public function getSocialTw()
    {
        return $this->social_tw;
    }

    /**
     * Set socialYtube.
     *
     * @param string|null $socialYtube
     *
     * @return Artist
     */
    public function setSocialYtube($socialYtube = null)
    {
        $this->social_ytube = $socialYtube;

        return $this;
    }

    /**
     * Get socialYtube.
     *
     * @return string|null
     */
    public function getSocialYtube()
    {
        return $this->social_ytube;
    }

    /**
     * Set socialInst.
     *
     * @param string|null $socialInst
     *
     * @return Artist
     */
    public function setSocialInst($socialInst = null)
    {
        $this->social_inst = $socialInst;

        return $this;
    }

    /**
     * Get socialInst.
     *
     * @return string|null
     */
    public function getSocialInst()
    {
        return $this->social_inst;
    }

    /**
     * Set image.
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media|null $image
     *
     * @return Artist
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
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $music;

    /**
     * Add music.
     *
     * @param \AppBundle\Entity\Music $music
     *
     * @return Artist
     */
    public function addMusic(\AppBundle\Entity\Music $music)
    {
        $this->music[] = $music;

        return $this;
    }

    /**
     * Remove music.
     *
     * @param \AppBundle\Entity\Music $music
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeMusic(\AppBundle\Entity\Music $music)
    {
        return $this->music->removeElement($music);
    }

    /**
     * Get music.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMusic()
    {
        return $this->music;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $video;

    /**
     * Add video.
     *
     * @param \AppBundle\Entity\Video $video
     *
     * @return Artist
     */
    public function addVideo(\AppBundle\Entity\Video $video)
    {
        $this->video[] = $video;

        return $this;
    }

    /**
     * Remove video.
     *
     * @param \AppBundle\Entity\Video $video
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeVideo(\AppBundle\Entity\Video $video)
    {
        return $this->video->removeElement($video);
    }

    /**
     * Get video.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVideo()
    {
        return $this->video;
    }
    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    private $poster;

    /**
     * Set poster.
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media|null $poster
     *
     * @return Artist
     */
    public function setPoster(\Application\Sonata\MediaBundle\Entity\Media $poster = null)
    {
        $this->poster = $poster;

        return $this;
    }

    /**
     * Get poster.
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media|null
     */
    public function getPoster()
    {
        return $this->poster;
    }

    /**
     * @var RouteObjectInterface[]|ArrayCollection
     */
    private $routes;

    /**
     * @param RouteObjectInterface $route
     *
     * @return $this
     */
    public function addRoute($route)
    {
        $this->routes[] = $route;

        return $this;
    }

    /**
     * @param RouteObjectInterface $route
     *
     * @return $this
     */
    public function removeRoute($route)
    {
        return $this->routes->removeElement($route);
    }

    /**
     * @return RouteObjectInterface[]|ArrayCollection
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * @param RouteObjectInterface[]|ArrayCollection $routes
     */
    public function setRoutes($routes)
    {
        $this->routes = $routes;
    }

    public function getRoute()
    {
        if (count($this->routes)) {
            return $this->routes[0];
        } else {
            return null;
        }
    }

    /**
     * @var Container
     */
    private $container;

    /**
     * @var string
     */
    private $path_sec;

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
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    private $poster_sq;

    /**
     * @Gedmo\TreeRoot(identifierMethod="getRoot")    
     * @var \AppBundle\Entity\Artist
     */
    private $root;

    /**
     * @var \AppBundle\Entity\Artist
     */
    private $parent;


    /**
     * Set pathSec.
     *
     * @param string $pathSec
     *
     * @return Artist
     */
    public function setPathSec($pathSec)
    {
        $this->path_sec = $pathSec;

        return $this;
    }

    /**
     * Get pathSec.
     *
     * @return string
     */
    public function getPathSec()
    {
        return $this->path_sec;
    }

    /**
     * Set lft.
     *
     * @param int $lft
     *
     * @return Artist
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
     * @return Artist
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
     * @return Artist
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
     * @param \AppBundle\Entity\Artist $child
     *
     * @return Artist
     */
    public function addChild(\AppBundle\Entity\Artist $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child.
     *
     * @param \AppBundle\Entity\Artist $child
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeChild(\AppBundle\Entity\Artist $child)
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
     * Set posterSq.
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media|null $posterSq
     *
     * @return Artist
     */
    public function setPosterSq(\Application\Sonata\MediaBundle\Entity\Media $posterSq = null)
    {
        $this->poster_sq = $posterSq;

        return $this;
    }

    /**
     * Get posterSq.
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media|null
     */
    public function getPosterSq()
    {
        return $this->poster_sq;
    }

    /**
     * Set root.
     *
     * @param \AppBundle\Entity\Artist|null $root
     *
     * @return Artist
     */
    public function setRoot(\AppBundle\Entity\Artist $root = null)
    {
        $this->root = $root;

        return $this;
    }

    /** 
     * @return \AppBundle\Entity\Artist|null
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * Set parent.
     *
     * @param \AppBundle\Entity\Artist|null $parent
     *
     * @return Artist
     */
    public function setParent(\AppBundle\Entity\Artist $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent.
     *
     * @return \AppBundle\Entity\Artist|null
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
    /**
     * @var string
     */
    private $page_keywords;

    /**
     * @var string
     */
    private $page_description;

    /**
     * @var string
     */
    private $page_title;


    /**
     * Set pageKeywords.
     *
     * @param string $pageKeywords
     *
     * @return Artist
     */
    public function setPageKeywords($pageKeywords)
    {
        $this->page_keywords = $pageKeywords;

        return $this;
    }

    /**
     * Get pageKeywords.
     *
     * @return string
     */
    public function getPageKeywords()
    {
        return $this->page_keywords;
    }

    /**
     * Set pageDescription.
     *
     * @param string $pageDescription
     *
     * @return Artist
     */
    public function setPageDescription($pageDescription)
    {
        $this->page_description = $pageDescription;

        return $this;
    }

    /**
     * Get pageDescription.
     *
     * @return string
     */
    public function getPageDescription()
    {
        return $this->page_description;
    }

    /**
     * Set pageTitle.
     *
     * @param string $pageTitle
     *
     * @return Artist
     */
    public function setPageTitle($pageTitle)
    {
        $this->page_title = $pageTitle;

        return $this;
    }

    /**
     * Get pageTitle.
     *
     * @return string
     */
    public function getPageTitle()
    {
        return $this->page_title;
    }
}
