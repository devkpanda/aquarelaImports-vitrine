<?php

use classes\database\DBConnection;

include_once('DBConnection.php');

class Category
{
    private $id;
    private $name;
    private $sub_id;
    private $sub_name;

    public function __construct()
    {
        $this->id = 0;
        $this->name = '';
        $this->sub_id = 0;
        $this->sub_name = '';
    }
    
    function list()
    {
        $c = new DBConnection();
        $commandSQL = "SELECT * FROM hostdeprojetos_aquarelaimports.category";
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


    function add()
    {
        $c = new DBConnection();
        try {
            $data = [
                'id'       => $this->id,
                'name'     => $this->name,
                'sub_id'   => $this->sub_id,
                'sub_name' => $this->sub_name
            ];

            $commandSQL = "insert into hostdeprojetos_aquarelaimports.category (`category_id`, `name`, `sub_category_id`, `sub_category_name`) values (:id, :name, :sub_id, :sub_name);";
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
     * Get the value of sub_id
     */
    public function getSub_id()
    {
        return $this->sub_id;
    }

    /**
     * Set the value of sub_id
     *
     * @return  self
     */
    public function setSub_id($sub_id)
    {
        $this->sub_id = $sub_id;

        return $this;
    }

    /**
     * Get the value of sub_name
     */
    public function getSub_name()
    {
        return $this->sub_name;
    }

    /**
     * Set the value of sub_name
     *
     * @return  self
     */
    public function setSub_name($sub_name)
    {
        $this->sub_name = $sub_name;

        return $this;
    }
}
