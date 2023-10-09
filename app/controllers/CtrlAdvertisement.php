<?php

use core\database\Where;
use models\Advertisement;

$url = parse_url($_SERVER['REQUEST_URI']);
$uriPath = $url['path'];


    if ($uriPath == '/advertisement/add'){
    if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
        // n entendi direito isso aq
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

                $id          = $data['id'];
                $cod         = $data['cod'];
                $name        = $data['name'];
                $description = $data['description'];
                $price       = $data['price'];
                $category_id = $data['category_id'];
                $measurement = $data['measurement'];
                $size        = $data['size'];
                $videoUrl    = $data['videoUrl'];

                $advertisement = new Advertisement(0, $cod, $name, $description, $price, $category_id, $measurement, $size, $videoUrl);
    
                    if ($advertisement->save()) {
                        echo json_encode(array('message' => '0'));
                    } else {
                        echo json_encode(array('message' => '1'));
                    }

               

            }
        }

    } else {
        echo json_encode(array('message' => 'Method not allowed'));
    }
}

if ($uriPath == '/advertisement/search'){
    if (strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
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

if ($uriPath == '/advertisement/delete'){
    if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
        // n entendi direito isso aq
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
                $id = $data['id'];

                $advertisement = new Advertisement($id, '','','','','','','','');
                $advertisement -> delete($id);
            }
        }

    } else {
        echo json_encode(array('message' => 'Method not allowed'));
    }
}
