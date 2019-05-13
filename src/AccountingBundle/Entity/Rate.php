<?php

namespace AccountingBundle\Entity;

/**
 * Rate
 */
class Rate
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTime
     */
    private $dateInsert;

    /**
     * @var float
     */
    private $summ;

    /**
     * @var string
     */
    private $category;

    protected $rate;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    public function setRate($rate){
        $this->rate = $rate;
    }
    /**
     * Set name
     *
     * @param string $name
     *
     * @return Rate
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set dateInsert
     *
     * @param \DateTime $dateInsert
     *
     * @return Rate
     */
    public function setDateInsert($dateInsert)
    {
        $this->dateInsert = $dateInsert;

        return $this;
    }

    /**
     * Get dateInsert
     *
     * @return \DateTime
     */
    public function getDateInsert()
    {
        return $this->dateInsert;
    }

    /**
     * Set summ
     *
     * @param float $summ
     *
     * @return Rate
     */
    public function setSumm($summ)
    {
        $this->summ = $summ;

        return $this;
    }

    /**
     * Get summ
     *
     * @return float
     */
    public function getSumm()
    {
        return $this->summ;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Rate
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }
}

