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

    // ------------ SEARCH ENGINE TEST, UNCOMMENT TO TRY ------------

    // This line `$search = '%' . $search . '%';` concats % to make mysql sintax rule correctly, when make real product, will be the same as test to work correctly

    // $search = "bicicleta";
    // $search = '%' . $search . '%';
    // $result = $ad->search($search);
    // print_r($result);

    // ------------ ADD TEST, UNCOMMENT TO TRY ------------

    // i dont set the id because its autoincrement

    // $ad->setCod('BIKEMOT113');
    // $ad->setName('bicicleta motorizada shaneray');
    // $ad->setDescription('bicicleta motorizada da shaneray');
    // $ad->setPrice(1399.90);
    // $ad->setCategory_id(2);
    // $ad->setMeasurement('L');
    // $ad->setSize(100);
    // $ad->setVideoUrl('');

    // echo $ad->getName();
    // $ad->add();

    // ------------ DELETE TEST, UNCOMMENT TO TRY ------------

    // $id = 3;
    // if ($ad->delete($id)) {
    //     echo "delete successfully";
    // }

    ?>


</body>

</html>