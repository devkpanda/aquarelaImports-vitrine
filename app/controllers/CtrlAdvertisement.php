<?php

use core\database\Where;
use models\Advertisement;

$url = parse_url($_SERVER['REQUEST_URI']);
$uriPath = $url['path'];

if ($uriPath == '/advertisement/search'){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $json = file_get_contents('php://input');

        if ($json === false){
            http_response_code(400);
            echo json_encode(array('message' => 'Erro ao receber JSON'));
        } else {
            $data = json_decode($json, true);

            if ($data === null){
                http_response_code(400);
                echo json_encode(array('message' => 'JSON vazio'));
            } else {
                $search = $data['search'];

                $where = new Where();
                $where->addLike('', 'name', $search);

                $advertisement = new Advertisement('','','','','','','','','','');
                $advertisementResult = $advertisement->listAdvertisements($where);
            
                echo json_encode($advertisementResult);
            }
        }
    
    } else {
        echo json_encode(array('message' => 'Método não permitido'));
    }
}