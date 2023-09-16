<?php

namespace classes\database;

ini_set('display_errors', 1);
error_reporting(E_ALL);

use FTP\Connection;
use PDO;
use PDOException;

class DBConnection
{

    private $host;
    private $user;
    private $password;
    private $database;

    public function __construct()
    {
        $this->host = "51.79.72.47";
        $this->user = "hostdeprojetos";
        $this->password = "ifspgru@2022";
        $this->database = "hostdeprojetos_aquarelaimports";
    }

    public function Connect()
    {
        try {
            $connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $connection;
    }
}
