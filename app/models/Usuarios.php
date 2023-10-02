<?php

namespace models;

use core\database\DBQuery;

class Usuarios {
    
    private $id;
    private $name;
    private $phone_number;
    private $email;
    private $password;
    private $active;
    private $id_user_level;
    
    private $dbquery;
    
    function __construct( $id, $name, $phone_number, $email, $password, $active, $id_user_level){
        
        $tableName  = "user";
        $fieldsName = "id, name, phone_number, email, password, active, id_user_level";
        $fieldKey   = "id";
        $this->dbquery = new DBQuery($tableName, $fieldsName, $fieldKey);
        
        $this->setId( $id );
        $this->setName( $name );
        $this->setPhoneNumber( $phone_number );
        $this->setEmail( $email );
        $this->setPassword( $password );
        $this->setActive( $active );
        $this->setIdUserLevel( $id_user_level );
    }
    
    public function toArray(){
        return array(
            $this->getId(),
            $this->getName(),
            $this->getPhoneNumber(),
            $this->getEmail(),
            $this->getPassword(),
            $this->getActive(),
            $this->getIdUserLevel()
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
    
    public function listUsuarios($where = null) : array {
        $usuarios = array();
        $rSet = null;
        if ( $where == null){
            $rSet = $this->dbquery->select();
        }else{
            $rSet = $this->dbquery->selectFiltered($where);   
        }
        
        if ($rSet) {
            foreach ($rSet as $linha) {
                $id             = $linha['id'];
                $name           = $linha['name'];
                $phone_number   = $linha['phone_number'];
                $email          = $linha['email'];
                $password       = $linha['senha'];
                $active         = $linha['active'];
                $id_user_level  = $linha['id_user_level'];
                
                $usuarios[] = new Usuarios($id, $name, $phone_number, $email, $password, $active, $id_user_level);                }
        } else {
            $usuarios[] = array();
            echo  "{'msg':'Nenhum usuário encontrado.\n'}";
        }
        return( $usuarios );
    }
    
    public function delete() {
        if($this->getId() != 0){
            return( $this->dbquery->delete($this->toArray()));
        }
    }
    
    public function setId ($id ){
        $this->id = $id;
    }
    
    public function getId(){
        return( $this->id );
    }
    
    public function setName( $name ){
        $this->name = $name;
    }
    
    public function getName(){
        return( $this->name );
    }

    public function setPhoneNumber( $phone_number ){
        $this->phone_number = $phone_number;
    }
    
    public function getPhoneNumber(){
        return( $this->phone_number );
    }
    
    public function setEmail( $email ){
        $this->email = $email;
    }
    
    public function getEmail(){
        return( $this->email );
    }
    
    public function setPassword( $password ){
        $this->password = $password;
    }
    
    public function getPassword(){
        return( $this->password );
    }
    
    public function setActive( $active ){
        $this->active = $active;
    }
    
    public function getActive(){
        return( $this->active );
    }
    
    public function setIdUserLevel( $id_user_level ){
        $this->id_user_level = $id_user_level;
    }
    
    public function getIdUserLevel(){
        return( $this->id_user_level );
    }
    
}


?>
