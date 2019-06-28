<?php

namespace AppBundle\Entity;

/**
 * Block
 */
class Block
{
    /**
     * @var int
     */
    private $id;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public static function getTypes()
    {
        return array(
            't001' => 't001',
            't004' => 't004',
            't015' => 't015',
            't021' => 't021',
            't030' => 't030',
            't107' => 't107',            
            't142' => 't142',
            't183' => 't183',
            't188' => 't188',
            't208' => 't208',
            't216' => 't216',
            't223' => 't223',
            't228' => 't228',
            't250' => 't250',
            't251' => 't251',
            't345' => 't345',
            't404' => 't404',
            't415' => 't415',
            't468' => 't468',
            't470' => 't470',
            't474' => 't474',
            't492' => 't492',
            't494' => 't494',
            't547' => 't547',
            't552' => 't552',
            't594' => 't594',
            't604' => 't604',
            't667' => 't667',
            't670' => 't670',
            't698' => 't698',
            't734' => 't734',
            't738' => 't738',
            't795' => 't795',
            't0001' => 't0001',
            't0002' => 't0002',
            't0004' => 't0004',
            't0223' => 't0223',
            't0552' => 't0552',
            't1552' => 't1552',
            't0795' => 't0795',
        );
    }

    public static function getTypeValues()
    {
        return array_keys(self::getTypes());
    }

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $type;


    /**
     * Set path.
     *
     * @param string $path
     *
     * @return Block
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
     * Set type.
     *
     * @param string $type
     *
     * @return Block
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @var string|null
     */
    private $custstrattr01;


    /**
     * Set custstrattr01.
     *
     * @param string|null $custstrattr01
     *
     * @return Block
     */
    public function setCuststrattr01($custstrattr01 = null)
    {
        $this->custstrattr01 = $custstrattr01;

        return $this;
    }

    /**
     * Get custstrattr01.
     *
     * @return string|null
     */
    public function getCuststrattr01()
    {
        return $this->custstrattr01;
    }
    /**
     * @var string|null
     */
    private $custstrattr02;

    /**
     * @var string|null
     */
    private $custstrattr03;


    /**
     * Set custstrattr02.
     *
     * @param string|null $custstrattr02
     *
     * @return Block
     */
    public function setCuststrattr02($custstrattr02 = null)
    {
        $this->custstrattr02 = $custstrattr02;

        return $this;
    }

    /**
     * Get custstrattr02.
     *
     * @return string|null
     */
    public function getCuststrattr02()
    {
        return $this->custstrattr02;
    }

    /**
     * Set custstrattr03.
     *
     * @param string|null $custstrattr03
     *
     * @return Block
     */
    public function setCuststrattr03($custstrattr03 = null)
    {
        $this->custstrattr03 = $custstrattr03;

        return $this;
    }

    /**
     * Get custstrattr03.
     *
     * @return string|null
     */
    public function getCuststrattr03()
    {
        return $this->custstrattr03;
    }
    /**
     * @var int
     */
    private $order = 0;


    /**
     * Set order.
     *
     * @param int $order
     *
     * @return Block
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order.
     *
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }
    /**
     * @var string|null
     */
    private $comment;


    /**
     * Set comment.
     *
     * @param string|null $comment
     *
     * @return Block
     */
    public function setComment($comment = null)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment.
     *
     * @return string|null
     */
    public function getComment()
    {
        return $this->comment;
    }
    /**
     * @var bool|null
     */
    private $custboolattr01;

    /**
     * @var bool|null
     */
    private $custboolattr02;

    /**
     * @var bool|null
     */
    private $custboolattr03;

    /**
     * @var string|null
     */
    private $custtextattr01;

    /**
     * @var string|null
     */
    private $custtextattr02;

    /**
     * @var string|null
     */
    private $custtextattr03;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    private $custmediattr01;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    private $custmediattr02;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    private $custmediattr03;


    /**
     * Set custboolattr01.
     *
     * @param bool|null $custboolattr01
     *
     * @return Block
     */
    public function setCustboolattr01($custboolattr01 = null)
    {
        $this->custboolattr01 = $custboolattr01;

        return $this;
    }

    /**
     * Get custboolattr01.
     *
     * @return bool|null
     */
    public function getCustboolattr01()
    {
        return $this->custboolattr01;
    }

    /**
     * Set custboolattr02.
     *
     * @param bool|null $custboolattr02
     *
     * @return Block
     */
    public function setCustboolattr02($custboolattr02 = null)
    {
        $this->custboolattr02 = $custboolattr02;

        return $this;
    }

    /**
     * Get custboolattr02.
     *
     * @return bool|null
     */
    public function getCustboolattr02()
    {
        return $this->custboolattr02;
    }

    /**
     * Set custboolattr03.
     *
     * @param bool|null $custboolattr03
     *
     * @return Block
     */
    public function setCustboolattr03($custboolattr03 = null)
    {
        $this->custboolattr03 = $custboolattr03;

        return $this;
    }

    /**
     * Get custboolattr03.
     *
     * @return bool|null
     */
    public function getCustboolattr03()
    {
        return $this->custboolattr03;
    }

    /**
     * Set custtextattr01.
     *
     * @param string|null $custtextattr01
     *
     * @return Block
     */
    public function setCusttextattr01($custtextattr01 = null)
    {
        $this->custtextattr01 = $custtextattr01;

        return $this;
    }

    /**
     * Get custtextattr01.
     *
     * @return string|null
     */
    public function getCusttextattr01()
    {
        return $this->custtextattr01;
    }

    /**
     * Set custtextattr02.
     *
     * @param string|null $custtextattr02
     *
     * @return Block
     */
    public function setCusttextattr02($custtextattr02 = null)
    {
        $this->custtextattr02 = $custtextattr02;

        return $this;
    }

    /**
     * Get custtextattr02.
     *
     * @return string|null
     */
    public function getCusttextattr02()
    {
        return $this->custtextattr02;
    }

    /**
     * Set custtextattr03.
     *
     * @param string|null $custtextattr03
     *
     * @return Block
     */
    public function setCusttextattr03($custtextattr03 = null)
    {
        $this->custtextattr03 = $custtextattr03;

        return $this;
    }

    /**
     * Get custtextattr03.
     *
     * @return string|null
     */
    public function getCusttextattr03()
    {
        return $this->custtextattr03;
    }

    /**
     * Set custmediattr01.
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media|null $custmediattr01
     *
     * @return Block
     */
    public function setCustmediattr01(\Application\Sonata\MediaBundle\Entity\Media $custmediattr01 = null)
    {
        $this->custmediattr01 = $custmediattr01;

        return $this;
    }

    /**
     * Get custmediattr01.
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media|null
     */
    public function getCustmediattr01()
    {
        return $this->custmediattr01;
    }

    /**
     * Set custmediattr02.
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media|null $custmediattr02
     *
     * @return Block
     */
    public function setCustmediattr02(\Application\Sonata\MediaBundle\Entity\Media $custmediattr02 = null)
    {
        $this->custmediattr02 = $custmediattr02;

        return $this;
    }

    /**
     * Get custmediattr02.
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media|null
     */
    public function getCustmediattr02()
    {
        return $this->custmediattr02;
    }

    /**
     * Set custmediattr03.
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media|null $custmediattr03
     *
     * @return Block
     */
    public function setCustmediattr03(\Application\Sonata\MediaBundle\Entity\Media $custmediattr03 = null)
    {
        $this->custmediattr03 = $custmediattr03;

        return $this;
    }

    /**
     * Get custmediattr03.
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media|null
     */
    public function getCustmediattr03()
    {
        return $this->custmediattr03;
    }
    /**
     * @var string|null
     */
    private $custstrattr04;

    /**
     * @var bool|null
     */
    private $custboolattr04;


    /**
     * Set custstrattr04.
     *
     * @param string|null $custstrattr04
     *
     * @return Block
     */
    public function setCuststrattr04($custstrattr04 = null)
    {
        $this->custstrattr04 = $custstrattr04;

        return $this;
    }

    /**
     * Get custstrattr04.
     *
     * @return string|null
     */
    public function getCuststrattr04()
    {
        return $this->custstrattr04;
    }

    /**
     * Set custboolattr04.
     *
     * @param bool|null $custboolattr04
     *
     * @return Block
     */
    public function setCustboolattr04($custboolattr04 = null)
    {
        $this->custboolattr04 = $custboolattr04;

        return $this;
    }

    /**
     * Get custboolattr04.
     *
     * @return bool|null
     */
    public function getCustboolattr04()
    {
        return $this->custboolattr04;
    }
    /**
     * @var string|null
     */
    private $custstrattr05;

    /**
     * @var string|null
     */
    private $custstrattr06;


    /**
     * Set custstrattr05.
     *
     * @param string|null $custstrattr05
     *
     * @return Block
     */
    public function setCuststrattr05($custstrattr05 = null)
    {
        $this->custstrattr05 = $custstrattr05;

        return $this;
    }

    /**
     * Get custstrattr05.
     *
     * @return string|null
     */
    public function getCuststrattr05()
    {
        return $this->custstrattr05;
    }

    /**
     * Set custstrattr06.
     *
     * @param string|null $custstrattr06
     *
     * @return Block
     */
    public function setCuststrattr06($custstrattr06 = null)
    {
        $this->custstrattr06 = $custstrattr06;

        return $this;
    }

    /**
     * Get custstrattr06.
     *
     * @return string|null
     */
    public function getCuststrattr06()
    {
        return $this->custstrattr06;
    }
    /**
     * @var \DateTime|null
     */
    private $custdtattr01;

    /**
     * @var \DateTime|null
     */
    private $custdtattr02;


    /**
     * Set custdtattr01.
     *
     * @param \DateTime|null $custdtattr01
     *
     * @return Block
     */
    public function setCustdtattr01($custdtattr01 = null)
    {
        $this->custdtattr01 = $custdtattr01;

        return $this;
    }

    /**
     * Get custdtattr01.
     *
     * @return \DateTime|null
     */
    public function getCustdtattr01()
    {
        return $this->custdtattr01;
    }

    /**
     * Set custdtattr02.
     *
     * @param \DateTime|null $custdtattr02
     *
     * @return Block
     */
    public function setCustdtattr02($custdtattr02 = null)
    {
        $this->custdtattr02 = $custdtattr02;

        return $this;
    }

    /**
     * Get custdtattr02.
     *
     * @return \DateTime|null
     */
    public function getCustdtattr02()
    {
        return $this->custdtattr02;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $slides;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->slides = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add slide.
     *
     * @param \AppBundle\Entity\Slide $slide
     *
     * @return Block
     */
    public function addSlide(\AppBundle\Entity\Slide $slide)
    {
        $this->slides[] = $slide;

        return $this;
    }

    /**
     * Remove slide.
     *
     * @param \AppBundle\Entity\Slide $slide
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSlide(\AppBundle\Entity\Slide $slide)
    {
        return $this->slides->removeElement($slide);
    }

    /**
     * Get slides.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSlides()
    {
        return $this->slides;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $slides01;


    /**
     * Add slides01.
     *
     * @param \AppBundle\Entity\Slide $slides01
     *
     * @return Block
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contacts01;


    /**
     * Add contacts01.
     *
     * @param \AppBundle\Entity\Contact $contacts01
     *
     * @return Block
     */
    public function addContacts01(\AppBundle\Entity\Contact $contacts01)
    {
        $this->contacts01[] = $contacts01;

        return $this;
    }

    /**
     * Remove contacts01.
     *
     * @param \AppBundle\Entity\Contact $contacts01
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeContacts01(\AppBundle\Entity\Contact $contacts01)
    {
        return $this->contacts01->removeElement($contacts01);
    }

    /**
     * Get contacts01.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContacts01()
    {
        return $this->contacts01;
    }
    /**
     * @var string|null
     */
    private $custstrattr07;


    /**
     * Set custstrattr07.
     *
     * @param string|null $custstrattr07
     *
     * @return Block
     */
    public function setCuststrattr07($custstrattr07 = null)
    {
        $this->custstrattr07 = $custstrattr07;

        return $this;
    }

    /**
     * Get custstrattr07.
     *
     * @return string|null
     */
    public function getCuststrattr07()
    {
        return $this->custstrattr07;
    }

    public function __clone() {
        $this->id = null;
    }
    /**
     * @var \MenuBundle\Entity\Menu
     */
    private $menu;


    /**
     * Set menu.
     *
     * @param \MenuBundle\Entity\Menu|null $menu
     *
     * @return Block
     */
    public function setMenu(\MenuBundle\Entity\Menu $menu = null)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * Get menu.
     *
     * @return \MenuBundle\Entity\Menu|null
     */
    public function getMenu()
    {
        return $this->menu;
    }
    /**
     * @var \MenuBundle\Entity\Menu
     */
    private $menu01;


    /**
     * Set menu01.
     *
     * @param \MenuBundle\Entity\Menu|null $menu01
     *
     * @return Block
     */
    public function setMenu01(\MenuBundle\Entity\Menu $menu01 = null)
    {
        $this->menu01 = $menu01;

        return $this;
    }

    /**
     * Get menu01.
     *
     * @return \MenuBundle\Entity\Menu|null
     */
    public function getMenu01()
    {
        return $this->menu01;
    }
}
