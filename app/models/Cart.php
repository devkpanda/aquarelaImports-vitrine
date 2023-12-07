<?php

namespace models;

use core\database\DBQuery;

    class Cart {
        private $id;
        private $advertisement_id;
        private $advertisement_name;
        private $cart_id;

        private $dbquery;

        function __construct ($id, $advertisement_id, $advertisement_name, $cart_id) {
            $tableName = "cart";
            $fieldsName = "id, advertisement_id, advsertisement_name, cart_id";
            $fieldKey = "id";
            $this->dbquery = new DBQuery($tableName, $fieldsName, $fieldKey);
    
            $this->setId($id);
            $this->setAdvertisement_id($advertisement_id);
            $this->setAdvertisement_name($advertisement_name);
            $this->setCart_id($cart_id);
        }

        public function toArray(){
            return array(
                $this->getId(),
                $this->getAdvertisement_id(),
                $this->getAdvertisement_name(),
                $this->getCart_id()
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

        public function listCarts($where = null) : array {
            $carts = array();
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
                    $advertisement_name = $linha['advertisement_name'];
                    $cart_id            = $linha['cart_id'];
                    
                    $carts[] = new Cart($id, $advertisement_id, $advertisement_name, $cart_id);
                }
            } else {
                $carts[] = array();
                echo  "{'message': no carts found'.\n'}";
            }
            return $photos;
        }

        public function delete() {
            if($this->getId() != 0){
                return( $this->dbquery->delete($this->toArray()));
            }
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

        public function getAdvertisement_name()
        {
                return $this->advertisement_name;
        }

        public function setAdvertisement_name($advertisement_name)
        {
                $this->advertisement_name = $advertisement_name;

                return $this;
        }

        public function getCart_id()
        {
                return $this->cart_id;
        }

        public function setCart_id($cart_id)
        {
                $this->cart_id = $cart_id;

                return $this;
        }
    }

?>