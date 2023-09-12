<?php

use classes\database\DBConnection;

include_once('DBConnection.php');
include_once('Category.php');


ini_set('display_errors', 1);
error_reporting(E_ALL);


class Advertisement
{
    private $advertisement_id;
    private $name;
    private $description;
    private $price;
    private $category;
    private $measurement;
    private $size;
    private $videoUrl;

    public function __construct()
    {
        $this->advertisement_id = '';
        $this->name = '';
        $this->description = '';
        $this->price = 0;
        $this->category = new Category();
        $this->measurement = '';
        $this->size = 0;
        $this->videoUrl = '';
    }

    function list()
    {
        $c = new DBConnection();
        $commandSQL = "SELECT * FROM hostdeprojetos_aquarelaimports.advertisement";
        $result  = $c -> Connect() -> query($commandSQL);
        $numRows = $result->num_rows;

        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data [] = $row;
            }
        }
        print_r($data);
        /*foreach ($rows as $row) {
            print_r($row);
            echo "<br>";
        } */
        
    }

    function search($search)
    {
        $data = [
            'search' => $search
        ];

        $commandSQL = "SELECT * FROM advertisement WHERE name LIKE ':search'";
        $stmt = getPDOConnection()->prepare($commandSQL);
        $stmt->execute($data);
    }



    /*
    function listById($advertisement_id)
    {
        $commandSQL = "SELECT advertisement_id,name,description,price,category_id,sub_category_id,measurement,size,videoUrl FROM hostdeprojetos_aquarelaimports.advertisement
        WHERE advertisement_id = $advertisement_id";
        //$resultSet  = getPDOConnection()->query($commandSQL);
        //$rows = $resultSet->fetchAll();

        foreach ($rows as $row) {
            print_r($row);
            echo "<br>";
        }
    }

    function add()
    {
        $data = [
            'advertisement_id'  => $this->advertisement_id,
            'name'              => $this->name,
            'description'       => $this->description,
            'price'             => $this->price,
            'category_id'       => $this->category->getId(),
            'sub_category_id'   => $this->category->getSub_id(),
            'measurement'       => $this->measurement,
            'size'              => $this->size,
            'videoUrl'          => $this->videoUrl
        ];

        $commandSQL = "INSERT INTO hostdeprojetos_aquarelaimports.advertisement (advertisement_id,name,description,price,category_id,sub_category_id,measurement,size,videoUrl) VALUES (:advertisement_id,:name,:description,:price,:category_id,:sub_category_id,:measurement,:size,:videoUrl)";
        $stmt = getPDOConnection()->prepare($commandSQL);
        //$stmt->bindValue(':advertisement_id', $advertisement_id, ':name', $name, ':description', $description, ':price', $price, ':category_id', $category_id, ':sub_category_id', $sub_category_id, ':measurement', $measurement, ':size', $size, ':videoUrl', $videoUrl);
        $stmt->execute($data);
    }

    function update($advertisement_id, $name, $description, $price, $category_id, $sub_category_id, $measurement, $size, $videoUrl)
    {

        $data = [
            'advertisement_id'  => $advertisement_id,
            'name'              => $name,
            'description'       => $description,
            'price'             => $price,
            'category_id'       => $category_id,
            'sub_category_id'   => $sub_category_id,
            'measurement'       => $measurement,
            'size'              => $size,
            'videoUrl'          => $videoUrl
        ];

        $commandSQL = "UPDATE 
            advertisement SET name  = :name, 
            description             = :description,
            price                   = :price,
            category_id             = :category_id,
            sub_category_id         = :sub_category_id,
            measurement             = :measurement,
            size                    = :size,
            videoUrl                = :videoUrl
            WHERE advertisement_id  = :advertisement_id;";

        $stmt = getPDOConnection()->prepare($commandSQL);
        $stmt->execute($data);
    }

    function delete($advertisement_id)
    {
        $commandSQL = "DELETE FROM advertisement WHERE advertisement_id = $advertisement_id;";
        $stmt = getPDOConnection()->prepare($commandSQL);
        $stmt->execute();
    } */

    /**
     * Get the value of id
     */
    public function getAdvertisement_id()
    {
        return $this->advertisement_id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setAdvertisement_id($advertisement_id)
    {
        $this->advertisement_id = $advertisement_id;

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
}