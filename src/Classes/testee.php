<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>bolita de baska</h1>
    <?php

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    include_once('./Advertisement.php');

    $ad = new Advertisement();

    $result = $ad->list();

    foreach ($result as $results) {
        echo ": " . $result['id'] . ", Nome: " . $result['name'] . "<br>";
    }
    ?>


</body>

</html>