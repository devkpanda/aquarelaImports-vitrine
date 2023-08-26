<?php 

Class Category {
    private $id;
    private $subCategoryId;
    private $name;
    private $subCategoryName;
    
    public function __construct(){
        $this-> id = 0;
        $this-> subCategoryId = 0;
        $this-> name = '';
        $this->subCategoryName = '';
    }
    
}

?>