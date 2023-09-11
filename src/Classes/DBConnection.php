<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

use FTP\Connection;
use mysqli;

class DBConnection
{

    private $host;
    private $port;
    private $schema;
    private $user;
    private $password;

    private $connection = null;

    public function __construct($host, $port, $schema, $user, $password)
    {
        $this->setHost($host);
        $this->setPort($port);
        $this->setSchema($schema);
        $this->setUser($user);
        $this->setPassword($password);
        $this->doConnection();
    }

    public function Connection()
    {
        $this->setHost("51.79.72.47");
        $this->setPort("3306");
        $this->setSchema("hostdeprojetos_aquarelaimports");
        $this->setUser("hostdeprojetos");
        $this->setPassword("ifspgru@2022");
        $this->doConnection();
    }


    private function doConnection()
    {
        $timezone = "&useTimezone=true&serverTimezone=UTC";
        $url = "mysql:host={$this->host};port={$this->port};dbname={$this->schema}";
        $url .= "?user={$this->user}&password={$this->password}{$timezone}";

        try {
            $this->connection = new mysqli($this->host, $this->user, $this->password, $this->schema, $this->port);

            if ($this->connection->connect_error) {
                die("Connection failed: " . $this->connection->connect_error);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getHost()
    {
        return $this->host;
    }

    public function setHost($host)
    {
        $this->host = empty($host) ? "hostdeprojetos" : $host;
    }

    public function getPort()
    {
        return $this->port;
    }

    public function setPort($port)
    {
        $this->port = empty($port) ? "3306" : $port;
    }

    public function getSchema()
    {
        return $this->schema;
    }

    public function setSchema($schema)
    {
        $this->schema = $schema;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
