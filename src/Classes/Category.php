<?php 

Class Category {
    
    private $id;
    private $subCategoryId;
    
    public function __construct(){
        $this-> id = 0;
        $this-> subCategoryId = 0;
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
     * Get the value of subCategoryId
     */ 
    public function getSubCategoryId()
    {
        return $this->subCategoryId;
    }

    /**
     * Set the value of subCategoryId
     *
     * @return  self
     */ 
    public function setSubCategoryId($subCategoryId)
    {
        $this->subCategoryId = $subCategoryId;

        return $this;
    }
}

?>