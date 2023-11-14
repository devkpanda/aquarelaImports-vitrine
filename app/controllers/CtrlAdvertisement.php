<?php

use core\database\Where;
use models\Advertisement;
use models\Photo;

// accept CORS requests

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
  header('HTTP/1.1 200 OK');
  exit;
}

$url = parse_url($_SERVER['REQUEST_URI']);
$uriPath = $url['path'];

    // if (isset($_SESSION['idNivelUsuario']) && $_SESSION['idNivelUsuario'] == 1) {
    if ($uriPath == '/advertisement/add'){
        
        if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
            $json = file_get_contents('php://input');

            if ($json === false){
                die(json_encode(array('message' => 'Error receiving json')));
            } else {
                $data = json_decode($json, true);

                if ($data === null) {
                    http_response_code(400);
                    die(json_encode(array("message" => "empty data")));
                } else {
                    if (!isset($data['cod']) || !isset($data['name']) || !isset($data['description']) || !isset($data['price']) || !isset($data['category_id']) || !isset($data['measurement']) || !isset($data['size']) || !isset($data['videoUrl']) || !isset($data['base64_data'])) {
                        die(json_encode(array('message' => 'unexpected JSON')));
                    } else {
                        $cod         = $data['cod'];
                        $name        = $data['name'];
                        $description = $data['description'];
                        $price       = $data['price'];
                        $category_id = $data['category_id'];
                        $measurement = $data['measurement'];
                        $size        = $data['size'];
                        $videoUrl    = $data['videoUrl'];
                        $base64_data = $data['base64_data'];
    
                        $advertisement = new Advertisement(0, $cod, $name, $description, $price, $category_id, $measurement, $size, $videoUrl, 1);
    
                        if ($advertisement->save()) {
                            $where = new Where();
                            $where->addCondition('AND', 'cod', '=', $cod);
    
                            $result = $advertisement->listAdvertisements($where);
    
                            $success = "";
    
                            foreach ($base64_data as $photo) {
                                $photo = new Photo(0, $result[0]->getId(), $photo, '', '');
                                if ($photo->save()) {
                                } else {
                                    $success = false;
                                }
                            }
    
                            if ($success === false){
                                die(json_encode(array('message' => '1')));
                            } else {
                                die(json_encode(array('message' => '0')));
                            }
                        } else {
                            die(json_encode(array('message' => '1')));
                        }
                    }
                }
            }
        } else {
            die(json_encode(array('message' => 'Method not allowed')));
        }
    }


    if ($uriPath == '/advertisement/update') {
       // if (isset($_SESSION['idNivelUsuario']) && $_SESSION['idNivelUsuario'] == 1){
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
                $json = file_get_contents('php://input');
        
                if ($json === false){
                    http_response_code(400);
                    die(json_encode(array('message' => 'Error receiving json')));
                } else {
                    $data = json_decode($json, true);
                    
                    if ($data === null)  {
                        die (json_encode(array('message' => 'Empty data')));
                    } else {
                        if (!isset($data['id']) || !isset($data['cod']) || !isset($data['name']) || !isset($data['description']) || !isset($data['price']) || !isset($data['category_id']) || !isset($data['measurement']) || !isset($data['size']) || !isset($data['videoUrl']) || !isset($data['base64_data'])) {
                            die(json_encode(array('message' => 'unexpected JSON')));
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
                            $base64_data = $data['base64_data'];
    
                            $exist = false;
                            $advertisement = new Advertisement($id, $cod, $name, $description, $price, $category_id, $measurement, $size, $videoUrl, 1);
                            if($id !== 0) {
                                $exist = true; 
                                $rSet = $advertisement->save();
                            if ($rSet->rowCount() == 1) {
                                    die(json_encode(array('message' => '1')));
                                } else {
                                    die(json_encode(array('message' => '0')));
                                }
                            } else {
                                die(json_encode(array('message' => '0')));
                            }
                        }   
                    }
                }
            } else {
                die(json_encode(array('message' => 'Method not allowed')));
            }
        }
    //}

    if ($uriPath == '/advertisement/listbycategory') {
        if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
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
    
                    $where = new Where();
                    $where->addCondition('AND', 'category_id', '=', $id);
    
                    $advertisement = new Advertisement('','','','','','','','','', '');
                    $result = $advertisement->listAdvertisements($where);
    
                    $json = array();
    
                    foreach ($result as $ad) {
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
                            "isActive"      => $ad->getIsActive()
                        );
    
                        $json[] = $adArray;
                    }
    
                    die(json_encode($json));
                }
            }
        } else {
            die(json_encode(array('message' => 'Method not allowed')));
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
                if (!isset($data['search'])) {
                    die(json_encode(array('message' => 'unexpected JSON')));
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
                        "isActive"      => $ad->getIsActive()
                    );

                    $json[] = $adArray;
                }
            
                die(json_encode($json));
                }
            }
        }
    
    } else {
        echo json_encode(array('message' => 'Method not allowed'));
    }
}

if ($uriPath == '/advertisement/enable'){
    if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
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
                if (!isset($data['id'])){ 
                    die(json_encode(array('message' => 'unexpected JSON')));
                } else {
                    $id = $data['id'];

                    $where = new Where();
                    $where->addCondition('AND', 'id', '=', $id);
    
                    $advertisement = new Advertisement('','','','','','','','','','');
                    $advertisementList = $advertisement->listAdvertisements($where);

                    if (!count($advertisementList) == 1) {
                        die(json_encode(array("message" => "unexpected id")));
                    } else {
                        $advertisementList[0]->setIsActive('1');
    
                        if ($advertisementList[0]->save()) {
                            die(json_encode(array('message' => '0')));
                        } else {
                            die(json_encode(array('message' => '1')));
                        }
                    }
                }
            }
        }

    } else {
        echo json_encode(array('message' => 'Method not allowed'));
    }
}

if ($uriPath == '/advertisement/disable'){
    if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
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
                if (!isset($data['id'])){ 
                    die(json_encode(array('message' => 'unexpected JSON')));
                } else {
                    $id = $data['id'];

                    $where = new Where();
                    $where->addCondition('AND', 'id', '=', $id);
    
                    $advertisement = new Advertisement('','','','','','','','','','');
                    $advertisementList = $advertisement->listAdvertisements($where);

                    if (!count($advertisementList) == 1) {
                        die(json_encode(array("message" => "unexpected id")));
                    } else {
                        $advertisementList[0]->setIsActive('0');
    
                        if ($advertisementList[0]->save()) {
                            die(json_encode(array('message' => '0')));
                        } else {
                            die(json_encode(array('message' => '1')));
                        }
                    }
                }
            }
        }

    } else {
        echo json_encode(array('message' => 'Method not allowed'));
    }
}
