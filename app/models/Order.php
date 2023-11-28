<?php

class Order {
    private $id;
    private $advertisement_id;

    private $dbQuery;

    public function __construct($id, $advertisement_id) {
        $tableName = "category";
            $fieldsName = "id, description, parent_id";
            $fieldKey = "id";
            $this->dbquery = new DBQuery($tableName, $fieldsName, $fieldKey);
    
            $this->setId($id);
            $this->setAdvertisement_id($advertisement_id);

    }

    public function toArray()
    {
        return array(
            $this->getId(),
            $this->getAdvertisement_id(),
            
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
        if($this->getId() != 0 ) {
            return ($this->dbquery->delete($this->toArray()));
        }
        
    }
    
    public function listOrder($where = null): array
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
                $id                  = $line['id'];
                $advertisement_id    = $line['advertisement_id'];
                $order[] = new Order($id, $advertisement_id);
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
}
    


?>