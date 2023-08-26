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
        $this->id = 0;
        $this->name = '';
        $this->description = '';
        $this->price = 0;
        $this->category = new Category;
        $this->measurement = '';
        $this->size = 0;
        $this->videoUrl = '';
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function getPrice() {
        return $this->price;
    }
    
    public function setPrice($price) {
        $this->price = $price;
    }
    
    public function getMeasurement() {
        return $this->measurement;
    }
    
    public function setMeasurement($measurement) {
        $this->measurement = $measurement;
    }
    
    public function getSize() {
        return $this->size;
    }
    
    
    public function setSize($size) {
        $this->size = $size;
    }
    
    public function getVideoUrl() {
        return $this->videoUrl;
    }
    
    public function setVideoUrl($videoUrl) {
        $this->videoUrl = $videoUrl;
    }
    
}


?>