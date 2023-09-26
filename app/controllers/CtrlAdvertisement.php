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
            echo json_encode(array('message' => 'Error receiving json'));
        } else {
            $data = json_decode($json, true);

            if ($data === null){
                http_response_code(400);
                echo json_encode(array('message' => 'Empty json'));
            } else {
                $search = $data['search'];

                $where = new Where();
                $where->addLike('', 'name', $search);

                $advertisement = new Advertisement('','','','','','','','','','');
                $advertisementResult = $advertisement->listAdvertisements($where);

                $json = array();

                foreach ($advertisementResult as $ad) {
                    $adArray = array(
                        "id"            => $ad->getId(),
                        "cod"           => $ad->getCod(),
                        "name"          => $ad->getName(),
                        "description"   => $ad->getDescription(),
                        "price"         => $ad->getPrice(),
                        "category_id"   => $ad->getCategory_id(),
                        "measurement"   => $ad->getMeasurement(),
                        "size"          => $ad->getSize(),
                        "videoUrl"      => $ad->getVideoUrl(),
                    );

                    $json[] = $adArray;
                }
            
                echo json_encode($json);
            }
        }
    
    } else {
        echo json_encode(array('message' => 'Method not allowed'));
    }
}