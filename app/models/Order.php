<?php

namespace models;

use core\database\DBQuery;

ini_set('display_errors', 1);
error_reporting(E_ALL);

class Order {
    private $id;
    private $advertisement_id;
    private $advertisement_name;

    private $dbquery;

    public function __construct($id, $advertisement_id, $advertisement_name) {
            $tableName     = "orders";
            $fieldsName = "id, advertisement_id, advertisement_name";
            $fieldKey      = "id";
            $this->dbquery = new DBQuery($tableName, $fieldsName, $fieldKey);
    
            $this->setId($id);
            $this->setAdvertisement_id($advertisement_id);
            $this->setAdvertisement_name($advertisement_name);
    }

    public function toArray()
    {
        return array(
            $this->getId(),
            $this->getAdvertisement_id(),
            $this->getAdvertisement_name()
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


    public function save() {
        if($this->getId() == 0){
            return( $this->dbquery->insert($this->toArray()));
        }else{
            return( $this->dbquery->update($this->toArray()));
        }
    }

    public function delete() {
        if($this->getId() != 0 ) {
            return ($this->dbquery->delete($this->toArray()));
        }
        
    }
    
    public function listOrders($where = null): array
    {
        $order = array();
        $result = null;

        if ($where == null) {
            $result = $this->dbquery->select();
        } else {
            $result = $this->dbquery->selectFiltered($where);
        }

        if ($result) {
            foreach ($result as $line) {
                $id                     = $line['id'];
                $advertisement_id       = $line['advertisement_id'];
                $advertisement_name     = $line['advertisement_name'];
                $order[] = new Order($id, $advertisement_id, $advertisement_name);
            }
        } else {
            $order[] = array();
            echo "{'msg':'Nenhum pedido encontrado.\n'}";
        }

        return $order;
    }

   
    public function getId()
    {
        return $this->id;
    }

   
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    
    public function getAdvertisement_id()
    {
        return $this->advertisement_id;
    }

   
    public function setAdvertisement_id($advertisement_id)
    {
        $this->advertisement_id = $advertisement_id;

        return $this;
    }

    /**
     * Get the value of advertisement_name
     */ 
    public function getAdvertisement_name()
    {
        return $this->advertisement_name;
    }

    /**
     * Set the value of advertisement_name
     *
     * @return  self
     */ 
    public function setAdvertisement_name($advertisement_name)
    {
        $this->advertisement_name = $advertisement_name;

        return $this;
    }
}
    


?>