<?php
include_once('/home/cecilia/html/aquarelaImports-vitrine.old/src/Classes/Connection.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

// use classes\database\DBQuery;

class Advertisement
{

    private $advertisement_id;
    private $name;
    private $description;
    private $price;
    private $category_id;
    private $sub_category_id;
    private $measurement;
    private $size;
    private $videoUrl;

    public function __construct()
    {
        $this->advertisement_id = '';
        $this->name = '';
        $this->description = '';
        $this->price = 0;
        $this->category_id = 0;
        $this->sub_category_id  = 0;
        $this->measurement = '';
        $this->size = 0;
        $this->videoUrl = '';
    }



    /**
     * Get the value of id
     */
    public function getAdvertisement_id()
    {
        return $this->advertisement_id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setAdvertisement_id($advertisement_id)
    {
        $this->advertisement_id = $advertisement_id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of category
     */
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    public function getSub_category_id()
    {
        return $this->sub_category_id;
    }

    /**
     * Set the value of sub_category_id
     *
     * @return  self
     */
    public function setSub_category_id($sub_category_id)
    {
        $this->sub_category_id = $sub_category_id;

        return $this;
    }

    /**
     * Get the value of measurement
     */
    public function getMeasurement()
    {
        return $this->measurement;
    }

    /**
     * Set the value of measurement
     *
     * @return  self
     */
    public function setMeasurement($measurement)
    {
        $this->measurement = $measurement;

        return $this;
    }

    /**
     * Get the value of size
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set the value of size
     *
     * @return  self
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get the value of videoUrl
     */
    public function getVideoUrl()
    {
        return $this->videoUrl;
    }

    /**
     * Set the value of videoUrl
     *
     * @return  self
     */
    public function setVideoUrl($videoUrl)
    {
        $this->videoUrl = $videoUrl;

        return $this;
    }

}