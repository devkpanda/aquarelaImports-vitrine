<?php
include_once('/home/cecilia/html/aquarelaImports-vitrine.old/src/Classes/Connection.php');

function listarCategorias()
{
    $commandSQL = "SELECT category_id, name FROM hostdeprojetos_aquarelaimports.category";
    $resultSet  = getPDOConnection()->query($commandSQL);
    $rows = $resultSet->fetchAll();

    foreach ($rows as $row) {
        print_r($row);
        echo "<br>";
    }
}

function inserirCategoria($category_id, $name)
{

    $commandSQL = "SELECT  category_id,name FROM hostdeprojetos_aquarelaimports.category";

    $data = [
        'category_id'       => $category_id,
        'name'              => $name
    ];

    $commandSQL = "INSERT INTO hostdeprojetos_aquarelaimports.category (category_id,name) VALUES (:category_id, :name)";
    $stmt = getPDOConnection()->prepare($commandSQL);
    $stmt->execute($data);
}

function alterarCategoria($category_id, $name)
{

    $data = [
        'category_id'       => $category_id,
        'name'              => $name
    ];


    $commandSQL = "UPDATE 
        category SET name  = :name
        WHERE category_id  = :category_id;";

    $stmt = getPDOConnection()->prepare($commandSQL);
    $stmt->execute($data);
}

function excluirCategoria($category_id)
{
    $commandSQL = "DELETE FROM category WHERE category_id = $category_id;";
    $stmt = getPDOConnection()->prepare($commandSQL);
    $stmt->execute();
}
