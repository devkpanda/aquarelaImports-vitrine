<?php 

Class Advertisement {
    
    private $id;
    private $name;
    private $description;
    private $price;
    private $category;
    private $measurement;
    private $size;
    private $videoUrl;
    
    public function __construct() {
        $this->id = '';
        $this->name = '';
        $this->description = '';
        $this->price = 0;
        $this->category = new Category();
        $this->measurement = '';
        $this->size = 0;
        $this->videoUrl = '';
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

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
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        $this->category = $category;

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
?>