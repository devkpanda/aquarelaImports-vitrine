<?php

namespace classes\database;

ini_set('display_errors', 1);
error_reporting(E_ALL);

use PDO;
use PDOException;

class Connection
{

    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=51.79.72.47;dbname=hostdeprojetos_aquarelaimports", "hostdeprojetos", "ifspgru@2022");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
