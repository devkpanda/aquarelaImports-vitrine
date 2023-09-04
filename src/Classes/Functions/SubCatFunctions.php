<?php
include_once('/home/cecilia/html/aquarelaImports-vitrine.old/src/Classes/Connection.php');

function listarSubCategorias()
{
    $commandSQL = "SELECT sub_category_id, category_id, name FROM hostdeprojetos_aquarelaimports.sub_category";
    $resultSet  = getPDOConnection()->query($commandSQL);
    $rows = $resultSet->fetchAll();

    foreach ($rows as $row) {
        print_r($row);
        echo "<br>";
    }
}

function listarSubCategoriasEsp($sub_category_id) {
    $commandSQL = "SELECT sub_category_id, category_id, name FROM hostdeprojetos_aquarelaimports.sub_category
    WHERE sub_category_id = $sub_category_id";
    $resultSet  = getPDOConnection()->query($commandSQL);
    $rows = $resultSet->fetchAll();

    foreach ($rows as $row) {
        print_r($row);
        echo "<br>";
    }


}

function inserirSubCategoria($sub_category_id, $category_id, $name)
{

    $commandSQL = "SELECT  sub_category_id,category_id,name FROM hostdeprojetos_aquarelaimports.sub_category";

    $data = [
        'sub_category_id'  => $sub_category_id,
        'category_id'      => $category_id,
        'name'             => $name
    ];

    $commandSQL = "INSERT INTO hostdeprojetos_aquarelaimports.sub_category (sub_category_id, category_id, name) VALUES (:sub_category_id, :category_id, :name)";
    $stmt = getPDOConnection()->prepare($commandSQL);
    $stmt->execute($data);
}

function alterarSubCategoria($sub_category_id, $category_id, $name)
{

    $data = [
        'sub_category_id'   => $sub_category_id,
        'category_id'       => $category_id,
        'name'              => $name
    ];


    $commandSQL = "UPDATE 
        sub_category SET name  = :name,
        category_id = :category_id
        WHERE sub_category_id  = :sub_category_id;";

    $stmt = getPDOConnection()->prepare($commandSQL);
    $stmt->execute($data);
}

function excluirSubCategoria($sub_category_id)
{
    $commandSQL = "DELETE FROM sub_category WHERE sub_category_id = $sub_category_id;";
    $stmt = getPDOConnection()->prepare($commandSQL);
    $stmt->execute();
}

listarSubCategoriasEsp(1);