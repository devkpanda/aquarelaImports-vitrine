<?php

namespace models;

use core\database\DBQuery;

ini_set('display_errors', 1);
error_reporting(E_ALL);

class Category {
        private $id;
        private $description;
        private $parent_id;

        private $dbquery;

        public function __construct($id, $description, $parent_id)
        {
            $tableName = "category";
            $fieldsName = "id, description, parent_id";
            $fieldKey = "id";
            $this->dbquery = new DBQuery($tableName, $fieldsName, $fieldKey);
    
            $this->setId($id);
            $this->setDescription($description);
            $this->setParent_id($parent_id);
        
        }

        public function toArray()
    {
        return array(
            $this->getId(),
            $this->getDescription(),
            $this->getParent_id(),
            
        );
    }

    public function toString()
    {
        return ("\n\t\t\t\t" . implode(", ", $this->toArray()));
    }

    public function list($where)
    {
        if ($where == "") {
            $result = $this->dbquery->select();
        } else {
            $result = $this->dbquery->selectFiltered($where);
        }
        return $result;
    }

    public function save()
    {
        if ($this->getId() == 0) {
            return ($this->dbquery->insert($this->toArray()));
        } else {
            return ($this->dbquery->update($this->toArray()));
        }
    }

    public function delete() {
        if($this->getId() != 0){
            return( $this->dbquery->delete($this->toArray()));
        }
    }


    public function listCategory($where = null): array
    {
        $category = array();
        $result = null;

        if ($where == null) {
            $result = $this->dbquery->select();
        } else {
            $result = $this->dbquery->selectFiltered($where);
        }

        if ($result) {
            foreach ($result as $line) {
                $id             = $line['id'];
                $description    = $line['description'];
                $parent_id      = $line['parent_id'];
                $category[] = new Category($id, $description, $parent_id);
            }
        } else {
            $category[] = array();
            echo "{'msg':'Nenhum anuncio encontrado.\n'}";
        }

        return $category;
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
         * Get the value of parent_id
         */ 
        public function getParent_id()
        {
                return $this->parent_id;
        }

        /**
         * Set the value of parent_id
         *
         * @return  self
         */ 
        public function setParent_id($parent_id)
        {
                $this->parent_id = $parent_id;

                return $this;
        }
 }
 