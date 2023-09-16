<?php

use classes\database\Connection;
use classes\database\DBConnection;

include_once('Connection.php');

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
        try {
            $commandSQL = "SELECT * FROM hostdeprojetos_aquarelaimports.category";

            $connection = new Connection();
            $pdo = $connection->getConnection();

            $stmt = $pdo->prepare($commandSQL);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    function add()
    {
        $c = new Connection();
        $data = [
            'id'       => $this->id,
            'name'     => $this->description,
            'sub_id'   => $this->parent_id
        ];
        try {

            $commandSQL = "insert into hostdeprojetos_aquarelaimports.category (`id`, `description`, `parent_id`) values (:id, :description, :parent_id);";
            $connection = new Connection();
            $pdo = $connection->getConnection();
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
