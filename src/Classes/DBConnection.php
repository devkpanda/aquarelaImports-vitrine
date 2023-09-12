<?php

namespace classes\database;

ini_set('display_errors', 1);
error_reporting(E_ALL);

use FTP\Connection;
use mysqli;

class DBConnection
{

    private $host;
    private $dbname;
    private $user;
    private $pass;

    public function Connect () {
        $this->host = "51.79.72.47";
        $this->dbname = "hostdeprojetos_aquarelaimports";
        $this->user = "hostdeprojetos";
        $this->pass = "ifspgru@2022";
        

        try {
            $connection = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return $connection;
    }

    }