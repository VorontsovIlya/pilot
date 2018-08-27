<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feedback
 */
class Feedback
{
    /**
     * @var int
     */
    private $id;


    /**
     * @var \DateTime
     */
    private $createdAt;


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
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return Feedback
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
    * @ORM\PrePersist
    */
    public function setCreatedAtValue()
    {
        if(!$this->getCreatedAt())
        {
            $this->createdAt = new \DateTime();
        }
    }

    /**
     * Get createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public static function getTypes()
    {
        return [
            'Артист' => 'artist',
            'Менеджер артиста' => 'manager'
        ];
    }

    public static function getTypeValues()
    {
        return array_keys(self::getTypes());
    }
    /**
     * @var string|null
     */
    private $field01;

    /**
     * @var string|null
     */
    private $field02;

    /**
     * @var string|null
     */
    private $field03;

    /**
     * @var string|null
     */
    private $field04;

    /**
     * @var string|null
     */
    private $field05;

    /**
     * @var string|null
     */
    private $field06;

    /**
     * @var string|null
     */
    private $field07;

    /**
     * @var string|null
     */
    private $field08;

    /**
     * @var string|null
     */
    private $field09;

    /**
     * @var string|null
     */
    private $field10;


    /**
     * Set field01.
     *
     * @param string|null $field01
     *
     * @return Feedback
     */
    public function setField01($field01 = null)
    {
        $this->field01 = $field01;

        return $this;
    }

    /**
     * Get field01.
     *
     * @return string|null
     */
    public function getField01()
    {
        return $this->field01;
    }

    /**
     * Set field02.
     *
     * @param string|null $field02
     *
     * @return Feedback
     */
    public function setField02($field02 = null)
    {
        $this->field02 = $field02;

        return $this;
    }

    /**
     * Get field02.
     *
     * @return string|null
     */
    public function getField02()
    {
        return $this->field02;
    }

    /**
     * Set field03.
     *
     * @param string|null $field03
     *
     * @return Feedback
     */
    public function setField03($field03 = null)
    {
        $this->field03 = $field03;

        return $this;
    }

    /**
     * Get field03.
     *
     * @return string|null
     */
    public function getField03()
    {
        return $this->field03;
    }

    /**
     * Set field04.
     *
     * @param string|null $field04
     *
     * @return Feedback
     */
    public function setField04($field04 = null)
    {
        $this->field04 = $field04;

        return $this;
    }

    /**
     * Get field04.
     *
     * @return string|null
     */
    public function getField04()
    {
        return $this->field04;
    }

    /**
     * Set field05.
     *
     * @param string|null $field05
     *
     * @return Feedback
     */
    public function setField05($field05 = null)
    {
        $this->field05 = $field05;

        return $this;
    }

    /**
     * Get field05.
     *
     * @return string|null
     */
    public function getField05()
    {
        return $this->field05;
    }

    /**
     * Set field06.
     *
     * @param string|null $field06
     *
     * @return Feedback
     */
    public function setField06($field06 = null)
    {
        $this->field06 = $field06;

        return $this;
    }

    /**
     * Get field06.
     *
     * @return string|null
     */
    public function getField06()
    {
        return $this->field06;
    }

    /**
     * Set field07.
     *
     * @param string|null $field07
     *
     * @return Feedback
     */
    public function setField07($field07 = null)
    {
        $this->field07 = $field07;

        return $this;
    }

    /**
     * Get field07.
     *
     * @return string|null
     */
    public function getField07()
    {
        return $this->field07;
    }

    /**
     * Set field08.
     *
     * @param string|null $field08
     *
     * @return Feedback
     */
    public function setField08($field08 = null)
    {
        $this->field08 = $field08;

        return $this;
    }

    /**
     * Get field08.
     *
     * @return string|null
     */
    public function getField08()
    {
        return $this->field08;
    }

    /**
     * Set field09.
     *
     * @param string|null $field09
     *
     * @return Feedback
     */
    public function setField09($field09 = null)
    {
        $this->field09 = $field09;

        return $this;
    }

    /**
     * Get field09.
     *
     * @return string|null
     */
    public function getField09()
    {
        return $this->field09;
    }

    /**
     * Set field10.
     *
     * @param string|null $field10
     *
     * @return Feedback
     */
    public function setField10($field10 = null)
    {
        $this->field10 = $field10;

        return $this;
    }

    /**
     * Get field10.
     *
     * @return string|null
     */
    public function getField10()
    {
        return $this->field10;
    }
}
