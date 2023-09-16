<?php

use classes\database\DBConnection;

include_once('DBConnection.php');

class Category
{
    private $id;
    private $description;
    private $parent_id;

    public function __construct()
    {
        $this->id = 0;
        $this->description = '';
        $this->parent_id = 0;
    }

    function list()
    {
        $connection = new DBConnection();
        $commandSQL = "SELECT * FROM hostdeprojetos_aquarelaimports.category";
        $result  = $connection->Connect()->query($commandSQL);
        $numRows = $result->num_rows;

        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        print_r($data);
        /*foreach ($rows as $row) {
            print_r($row);
            echo "<br>";
        } */
    }


    function add()
    {
        $c = new DBConnection();
        try {
            $data = [
                'id'       => $this->id,
                'name'     => $this->description,
                'sub_id'   => $this->parent_id
            ];

            $commandSQL = "insert into hostdeprojetos_aquarelaimports.category (`id`, `description`, `parent_id`) values (:id, :description, :parent_id);";
            $result  = $c->Connect()->query($commandSQL);

            if ($result) {
                echo "insert succesfully";
            } else {
                echo "insert failed";
            }
        } catch (PDOException $error) {
            echo "Erro :" . $error;
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

    /**
     * Get the value of parent_id
     */
    public function getParent_id()
    {
        return $this->parent_id;
    }

    /**
     * Set the value of parent_id
     *
     * @return  self
     */
    public function setParent_id($parent_id)
    {
        $this->parent_id = $parent_id;

        return $this;
    }
}
