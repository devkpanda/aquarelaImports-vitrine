<?php

namespace models;

use core\database\DBQuery;

class User {
    
    private $id;
    private $idNivelUsuario;
    private $name;
    private $email;
    private $password;
    private $active;
    private $active_code;
    private $recovery_phrase;
    
    private $dbquery;
    
    function __construct($id, $idNivelUsuario, $name, $email, $password, $active, $active_code, $recovery_phrase){
        
        $tableName  = "user";
        $fieldsName = "id, idNivelUsuario, name, email, password, active, active_code, recovery_phrase";
        $fieldKey   = "id";
        $this->dbquery = new DBQuery($tableName, $fieldsName, $fieldKey);
        
        $this->setId( $id );
        $this->setIdNivelUsuario( $idNivelUsuario );
        $this->setName( $name );
        $this->setEmail( $email );
        $this->setPassword( $password );
        $this->setActive( $active );
        $this->setActive_code( $active_code );
        $this->setRecovery_phrase( $recovery_phrase );
    }
    
    public function toArray(){
        return array(
            $this->getId(),
            $this->getIdNivelUsuario(),
            $this->getName(),
            $this->getEmail(),
            $this->getPassword(),
            $this->getActive(),
            $this->getActive_code(),
            $this->getRecovery_phrase()
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
                $id                 = $linha['id'];
                $idNivelUsuario     = $linha['idNivelUsuario'];
                $name               = $linha['name'];
                $email              = $linha['email'];
                $password           = $linha['senha'];
                $active             = $linha['active'];
                $active_code        = $linha['active_code'];
                $recovery_phrase    = $linha['recovery_phrase'];
                
                $usuarios[] = new User($id, $idNivelUsuario, $name, $email, $password, $active, $active_code, $recovery_phrase);
            }
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
     * Get the value of idNivelUsuario
     */ 
    public function getIdNivelUsuario()
    {
        return $this->idNivelUsuario;
    }

    /**
     * Set the value of idNivelUsuario
     *
     * @return  self
     */ 
    public function setIdNivelUsuario($idNivelUsuario)
    {
        $this->idNivelUsuario = $idNivelUsuario;

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
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of active
     */ 
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set the value of active
     *
     * @return  self
     */ 
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get the value of active_code
     */ 
    public function getActive_code()
    {
        return $this->active_code;
    }

    /**
     * Set the value of active_code
     *
     * @return  self
     */ 
    public function setActive_code($active_code)
    {
        $this->active_code = $active_code;

        return $this;
    }

    /**
     * Get the value of recovery_phrase
     */ 
    public function getRecovery_phrase()
    {
        return $this->recovery_phrase;
    }

    /**
     * Set the value of recovery_phrase
     *
     * @return  self
     */ 
    public function setRecovery_phrase($recovery_phrase)
    {
        $this->recovery_phrase = $recovery_phrase;

        return $this;
    }
}


?>
