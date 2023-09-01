<?php
include_once('/home/cecilia/html/aquarelaImports-vitrine.old/src/Classes/Connection.php');

/*$advertisement_id   = $_POST['advertisement_id'];
$name               = $_POST['name'];
$description        = $_POST['description'];
$price              = $_POST['price'];
$category_id        = $_POST['category_id'];
$sub_category_id    = $_POST['sub_category_id'];
$measurement        = $_POST['advertisement_id'];
$size               = $_POST['size'];
$videoUrl           = $_POST['videoUrl']; */

function listarAnuncios()
{
    $commandSQL = "SELECT advertisement_id,name,description,price,category_id,sub_category_id,measurement,size,videoUrl FROM hostdeprojetos_aquarelaimports.advertisement";
    $resultSet  = getPDOConnection()->query($commandSQL);
    $rows = $resultSet->fetchAll();

    foreach ($rows as $row) {
        print_r($row);
        echo "<br>";
    }
}

function inserirAnuncio($advertisement_id, $name, $description, $price, $category_id, $sub_category_id, $measurement, $size, $videoUrl)
{

    $commandSQL = "SELECT  advsertisement_id,name,description,price,category_id,sub_category_id,measurement,size,videoUrl FROM hostdeprojetos_aquarelaimports.advertisement";

    $data = [
        'advertisement_id'  => $advertisement_id,
        'name'              => $name,
        'description'       => $description,
        'price'             => $price,
        'category_id'       => $category_id,
        'sub_category_id'   => $sub_category_id,
        'measurement'       => $measurement,
        'size'              => $size,
        'videoUrl'          => $videoUrl
    ];

    $commandSQL = "INSERT INTO hostdeprojetos_aquarelaimports.advertisement (advertisement_id,name,description,price,category_id,sub_category_id,measurement,size,videoUrl) VALUES (:advertisement_id,:name,:description,:price,:category_id,:sub_category_id,:measurement,:size,:videoUrl)";
    $stmt = getPDOConnection()->prepare($commandSQL);
    //$stmt->bindValue(':advertisement_id', $advertisement_id, ':name', $name, ':description', $description, ':price', $price, ':category_id', $category_id, ':sub_category_id', $sub_category_id, ':measurement', $measurement, ':size', $size, ':videoUrl', $videoUrl);
    $stmt->execute($data);
}

function alterarAnuncio($advertisement_id, $name, $description, $price, $category_id, $sub_category_id, $measurement, $size, $videoUrl)
{

    $data = [
        'advertisement_id'  => $advertisement_id,
        'name'              => $name,
        'description'       => $description,
        'price'             => $price,
        'category_id'       => $category_id,
        'sub_category_id'   => $sub_category_id,
        'measurement'       => $measurement,
        'size'              => $size,
        'videoUrl'          => $videoUrl
    ];

    $commandSQL = "UPDATE 
        advertisement SET name  = :name, 
        description             = :description,
        price                   = :price,
        category_id             = :category_id,
        sub_category_id         = :sub_category_id,
        measurement             = :measurement,
        size                    = :size,
        videoUrl                = :videoUrl
        WHERE advertisement_id  = :advertisement_id;";

    $stmt = getPDOConnection()->prepare($commandSQL);
    $stmt->execute($data);
}

function excluirAnuncio($advertisement_id)
{
    $commandSQL = "DELETE FROM advertisement WHERE advertisement_id = $advertisement_id;";
    $stmt = getPDOConnection()->prepare($commandSQL);
    $stmt->execute();
}

listarAnuncios();