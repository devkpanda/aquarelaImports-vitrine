<?php

use classes\database\Connection;

include_once('Connection.php');
include_once('Category.php');


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

    public function __construct()
    {
        $this->id = '';
        $this->cod = '';
        $this->name = '';
        $this->description = '';
        $this->price = 0;
        $this->category_id = '';
        $this->measurement = '';
        $this->size = 0;
        $this->videoUrl = '';
    }

    public function list()
    {
        try {
            $commandSQL = "SELECT * FROM hostdeprojetos_aquarelaimports.advertisement";

            $connection = new Connection();
            $pdo = $connection->getConnection();

            $stmt = $pdo->prepare($commandSQL);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            $e->getMessage();
            die('Error: ' . $e);
        }
    }

    public function search($search)
    {
        try {
            $commandSQL = "SELECT * FROM advertisement WHERE name LIKE lower(:search)";

            $connection = new Connection();
            $pdo = $connection->getConnection();

            $stmt = $pdo->prepare($commandSQL);
            $stmt->bindValue(':search', $search, PDO::PARAM_STR);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            $e->getMessage();
            die('Error: ' . $e);
        }
    }


    public function add()
    {
        try {
            $data = [
                'cod'          => $this->cod,
                'name'         => $this->name,
                'description'  => $this->description,
                'price'        => $this->price,
                'category_id'  => $this->category_id,
                'measurement'  => $this->measurement,
                'size'         => $this->size,
                'videoUrl'     => $this->videoUrl
            ];

            $commandSQL = "INSERT INTO advertisement (cod,name,description,price,category_id,measurement,size,videoUrl) VALUES (:cod,:name,:description,:price,:category_id,:measurement,:size,:videoUrl);";

            $connection = new Connection();
            $pdo = $connection->getConnection();

            $stmt = $pdo->prepare($commandSQL);
            $stmt->execute($data);
            return true;
        } catch (PDOException $e) {
            $e->getMessage();
            die('Error: ' . $e);
        }
    }

    public function delete($id)
    {
        try {
            $data = [
                'id' => $id
            ];

            $commandSQL = "DELETE FROM advertisement WHERE id = :id;";

            $connection = new Connection();
            $pdo = $connection->getConnection();

            $stmt = $pdo->prepare($commandSQL);
            $stmt->execute($data);
            return true;
        } catch (PDOException $e) {
            $e->getMessage();
            die('Error: ' . $e);
        }
    }


    // function listById($advertisement_id)
    // {
    //     $commandSQL = "SELECT advertisement_id,name,description,price,category_id,sub_category_id,measurement,size,videoUrl FROM hostdeprojetos_aquarelaimports.advertisement
    //     WHERE advertisement_id = $advertisement_id";
    //     //$resultSet  = getPDOConnection()->query($commandSQL);
    //     //$rows = $resultSet->fetchAll();

    //     foreach ($rows as $row) {
    //         print_r($row);
    //         echo "<br>";
    //     }
    // }


    // function update($advertisement_id, $name, $description, $price, $category_id, $sub_category_id, $measurement, $size, $videoUrl)
    // {

    //     $data = [
    //         'advertisement_id'  => $advertisement_id,
    //         'name'              => $name,
    //         'description'       => $description,
    //         'price'             => $price,
    //         'category_id'       => $category_id,
    //         'sub_category_id'   => $sub_category_id,
    //         'measurement'       => $measurement,
    //         'size'              => $size,
    //         'videoUrl'          => $videoUrl
    //     ];

    //     $commandSQL = "UPDATE 
    //         advertisement SET name  = :name, 
    //         description             = :description,
    //         price                   = :price,
    //         category_id             = :category_id,
    //         sub_category_id         = :sub_category_id,
    //         measurement             = :measurement,
    //         size                    = :size,
    //         videoUrl                = :videoUrl
    //         WHERE advertisement_id  = :advertisement_id;";

    //     $stmt = getPDOConnection()->prepare($commandSQL);
    //     $stmt->execute($data);
    // }





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
}
