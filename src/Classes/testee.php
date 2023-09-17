<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>TESTE</h1>
    <?php

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    include_once('./Advertisement.php');

    $ad = new Advertisement();

    $search = 'BICICLETA MOTORIZADA';
    $result = $ad->search($search);
    print_r($result);

    ?>


</body>

</html>