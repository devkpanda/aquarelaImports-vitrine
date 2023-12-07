<?php

namespace models;

use core\database\DBQuery;

    class Cart {
        private $id;
        private $product_id;
        private $product_name;
        private $product_qty;
        private $cart_id;

        private $dbquery;

        function __construct ($id, $product_id, $product_name, $product_qty, $cart_id) {
            $tableName = "cart";
            $fieldsName = "id, product_id, product_name, product_qty, cart_id";
            $fieldKey = "id";
            $this->dbquery = new DBQuery($tableName, $fieldsName, $fieldKey);
    
            $this->setId($id);
            $this->setProduct_id($product_id);
            $this->setProduct_name($product_name);
            $this->setProduct_qty($product_qty);
            $this->setCart_id($cart_id);
        }

        public function toArray(){
            return array(
                $this->getId(),
                $this->getProduct_id(),
                $this->getProduct_name(),
                $this->getProduct_qty(),
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
                    $id           = $linha['id'];
                    $product_id   = $linha['product_id'];
                    $product_name = $linha['product_name'];
                    $product_qty  = $linha['product_qty'];
                    $cart_id      = $linha['cart_id'];
                    
                    $carts[] = new Cart($id, $product_id, $product_name, $product_qty, $cart_id);
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

        public function getProduct_id()
        {
                return $this->product_id;
        }

        public function setProduct_id($product_id)
        {
                $this->product_id = $product_id;

                return $this;
        }

        public function getProduct_name()
        {
                return $this->product_name;
        }

        public function setProduct_name($product_name)
        {
                $this->product_name = $product_name;

                return $this;
        }

        public function getProduct_qty()
        {
                return $this->product_qty;
        }

        public function setProduct_qty($product_qty)
        {
                $this->product_qty = $product_qty;

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