<?php

namespace models;

use core\database\DBQuery;

class UserLevel{
    private $id;
    private $description;

    private $dbquery;

    function __construct($id, $description) {
        $tableName  = "user_level";
        $fieldsName = "id, description";
        $fieldKey   = "id";
        $this->dbquery = new DBQuery($tableName, $fieldsName, $fieldKey);

        $this->setId($id);
        $this->setDescription($description);
    }

    public function toArray(){
        return array(
            $this->getId(),
            $this->getDescription()
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

    public function listUser_level($where = null) : array {
        $usuarios = array();
        $rSet = null;
        if ( $where == null){
            $rSet = $this->dbquery->select();
        }else{
            $rSet = $this->dbquery->selectFiltered($where);   
        }
        
        if ($rSet) {
            foreach ($rSet as $linha) {
                $id                 = $linha['id'];
                $description        = $linha['description'];
                
                $user_levels[] = new UserLevel($id, $description);
            }
        } else {
            $user_levels[] = array();
            echo  "{'msg':'Nenhum usuário encontrado.\n'}";
        }
        return( $user_levels );
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

?>