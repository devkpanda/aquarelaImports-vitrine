<?php
use core\database\Where;
use models\User;

$url = parse_url($_SERVER['REQUEST_URI']);
$uriPath = strtolower($url['path']);

echo ("oi");
/*if ($uriPath == '/login/teste') {
    echo("oi2");

    if(isset($_POST["login"])) {
        echo ("foi");

        if (isset($_POST["email"]) && isset($_POST["password"])) {
            echo $email     = $_POST["email"];
            echo $password  = $_POST["password"];
    
        }
    }
} */

        if(isset($_POST["login"])) {
            echo ("foi");

            if (isset($_POST["email"]) && isset($_POST["password"])) {
                echo $email     = $_POST["email"];
                echo $password  = $_POST["password"];
        
            }
        } 


?>