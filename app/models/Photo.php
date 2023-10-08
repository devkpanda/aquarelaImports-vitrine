<?php

namespace models;

use core\database\DBQuery;

class Photo {
    private $id;
    private $advertisement_id;
    private $base64_data;
    private $description;
    private $upload_date;

    private $dbquery;

    function __construct($id, $advertisement_id, $base64_data, $description, $upload_date) {
        $tableName = "photos";
        $fieldsName = "id, advertisement_id, base64_data, upload_date, description";
        $fieldKey = "id";
        $this->dbquery =new DBQuery($tableName, $fieldsName, $fieldKey);

        $this->setId($id);
        $this->setAdvertisement_id($advertisement_id);
        $this->setBase64_data($base64_data);
        $this->setDescription($description);
    }

    public function toArray(){
        return array(
            $this->getId(),
            $this->getAdvertisement_id(),
            $this->getBase64_data(),
            $this->getDescription(),
            $this->getUpload_date()
        );
    }

    public function toString(){
        return("\n\t\t\t\t". implode(", ",$this->toArray()));
    }

    public function save() {
        if($this->getId() == 0){
            return( $this->dbquery->insert($this->toArray()));
        }else{
            return( $this->dbquery->update($this->toArray()));
        }
    }

    public function list($where) {
        if ( $where == ""){
            $rSet = $this->dbquery->select();
        }else{
            $rSet = $this->dbquery->selectFiltered($where);
        }
        return( $rSet );
    }

    public function listPhotos($where = null) : array {
        $usuarios = array();
        $rSet = null;
        if ( $where == null){
            $rSet = $this->dbquery->select();
        } else {
            $rSet = $this->dbquery->selectFiltered($where);   
        }
        
        if ($rSet) {
            foreach ($rSet as $linha) {
                $id                 = $linha['id'];
                $advertisement_id   = $linha['advertisement_id'];
                $base64_data        = $linha['base64_data'];
                $description        = $linha['description'];
                $upload_date        = $linha['upload_date'];
                
                $photos[] = new Photo($id, $advertisement_id, $base64_data, $description, $upload_date);
            }
        } else {
            $photos[] = array();
            echo  "{'message': no photos found'.\n'}";
        }
        return( $photos );
    }

    public function delete() {
        if($this->getId() != 0){
            return( $this->dbquery->delete($this->toArray()));
        }
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
     * Get the value of advertisement_id
     */ 
    public function getAdvertisement_id()
    {
        return $this->advertisement_id;
    }

    /**
     * Set the value of advertisement_id
     *
     * @return  self
     */ 
    public function setAdvertisement_id($advertisement_id)
    {
        $this->advertisement_id = $advertisement_id;

        return $this;
    }

    /**
     * Get the value of base64_data
     */ 
    public function getBase64_data()
    {
        return $this->base64_data;
    }

    /**
     * Set the value of base64_data
     *
     * @return  self
     */ 
    public function setBase64_data($base64_data)
    {
        $this->base64_data = $base64_data;

        return $this;
    }

    /**
     * Get the value of upload_date
     */ 
    public function getUpload_date()
    {
        return $this->upload_date;
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
}