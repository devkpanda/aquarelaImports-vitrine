<?php
header('Content-type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);

echo ("OI");

function getPDOConnection()
{
    $host = "51.79.72.47";
    $user = "hostdeprojetos";
    $pass = "ifspgru@2022";
    $dbname = "hostdeprojetos_aquarelaimports";
    $connection = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $pass);
    return ($connection);
}

/* 

-> TESTES LIST
listarAnuncio();
listarCategoria();
listarSubCategoria();

-> TESTES INSERT
inserirCategoria(2, "vestimenta");
inserirSubCategoria(2, 1, "luva");
inserirAnuncio(4, "nomeeee", "descricaoooo", 56.8, 0, 1, 60, 70, "videoor");

-> TESTES UPDATE
alterarAnuncio(4, "nomealterado333", "descricaoooo", 56.8, 0, 1, 60, 70, "videoor");
alterarCategoria(1, "motocicletas");
alterarSubCategoria(2, 1, "bicicletaAero");

-> TESTES DELETE
excluirAnuncio(1);
excluirCategoria();
excluirSubCategoria(2);


*/
