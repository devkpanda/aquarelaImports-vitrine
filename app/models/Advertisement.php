<?php

namespace models;

use core\database\DBQuery;

ini_set('display_errors', 1);
error_reporting(E_ALL);

class Advertisement
{
    private $id;
    private $cod;
    private $name;
    private $description;
    private $price;
    private $category_id;
    private $measurement;
    private $size;
    private $videoUrl;
    private $isActive;

    private $dbquery;

    public function __construct($id, $cod, $name, $description, $price, $category_id, $measurement, $size, $videoUrl, $isActive)
    {
        $tableName = "advertisement";
        $fieldsName = "id, cod, name, description, price, category_id, measurement, size, videoUrl, isActive";
        $fieldKey = "id";
        $this->dbquery = new DBQuery($tableName, $fieldsName, $fieldKey);

        $this->setId($id);
        $this->setCod($cod);
        $this->setName($name);
        $this->setDescription($description);
        $this->setPrice($price);
        $this->setCategory_id($category_id);
        $this->setMeasurement($measurement);
        $this->setSize($size);
        $this->setVideoUrl($videoUrl);
        $this->setIsActive($isActive);
    }

    public function toArray()
    {
        return array(
            $this->getId(),
            $this->getCod(),
            $this->getName(),
            $this->getDescription(),
            $this->getPrice(),
            $this->getCategory_id(),
            $this->getMeasurement(),
            $this->getSize(),
            $this->getVideoUrl(),
            $this->getIsActive()
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

    public function listAdvertisements($where = null): array
    {
        $advertisements = array();
        $result = null;

        if ($where == null) {
            $result = $this->dbquery->select();
        } else {
            $result = $this->dbquery->selectFiltered($where);
        }

        if ($result) {
            foreach ($result as $line) {
                $id             = $line['id'];
                $cod            = $line['cod'];
                $name           = $line['name'];
                $description    = $line['description'];
                $price          = $line['price'];
                $category_id    = $line['category_id'];
                $measurement    = $line['measurement'];
                $size           = $line['size'];
                $videoUrl       = $line['videoUrl'];
                $isActive       = $line['isActive'];
                $advertisements[] = new Advertisement($id, $cod, $name, $description, $price, $category_id, $measurement, $size, $videoUrl, $isActive);
            }
        } else {
            $advertisements[] = array();
            echo "{'msg':'Nenhum anuncio encontrado.\n'}";
        }

        return $advertisements;
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
     * Get the value of cod
     */
    public function getCod()
    {
        return $this->cod;
    }

    /**
     * Set the value of cod
     *
     * @return  self
     */
    public function setCod($cod)
    {
        $this->cod = $cod;

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
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of category_id
     */
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get the value of measurement
     */
    public function getMeasurement()
    {
        return $this->measurement;
    }

    /**
     * Set the value of measurement
     *
     * @return  self
     */
    public function setMeasurement($measurement)
    {
        $this->measurement = $measurement;

        return $this;
    }

    /**
     * Get the value of size
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set the value of size
     *
     * @return  self
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get the value of videoUrl
     */
    public function getVideoUrl()
    {
        return $this->videoUrl;
    }

    /**
     * Set the value of videoUrl
     *
     * @return  self
     */
    public function setVideoUrl($videoUrl)
    {
        $this->videoUrl = $videoUrl;

        return $this;
    }

    /**
     * Get the value of videoUrl
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set the value of videoUrl
     *
     * @return  self
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }
}
