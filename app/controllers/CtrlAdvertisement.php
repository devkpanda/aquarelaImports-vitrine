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
        if ($uriPath == '/advertisement/listall'){
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'get'){
                $where = new Where();
                $where->addCondition('AND', 'isActive', '=', 1);
                $advertisement = new Advertisement('','','','','','','','','','');
                $advertisements = $advertisement->listAdvertisements($where);
        
                $json = array();
        
                foreach ($advertisements as $advertisement) {
                    $wherePhotos = new Where();
                    $wherePhotos->addCondition('AND', 'advertisement_id', '=', $advertisement->getId());

                    $photo = new Photo('','','','','');
                    $photos = $photo->listPhotos($wherePhotos);
                    
                    $photosArray = array();
                    foreach ($photos as $photo) {
                        array_push($photosArray, $photo->getBase64_data());
                    }
                    $advertisementArray = array(
                        "id"            => $advertisement->getId(),
                        "cod"           => $advertisement->getCod(),
                        "name"          => $advertisement->getName(),
                        "description"   => $advertisement->getDescription(),
                        "price"         => $advertisement->getPrice(),
                        "category_id"   => $advertisement->getCategory_id(),
                        "measurement"   => $advertisement->getMeasurement(),
                        "size"          => $advertisement->getSize(),
                        "videoUrl"      => $advertisement->getVideoUrl(),
                        "isActive"      => $advertisement->getIsActive(),
                        "base64_data"   => $photosArray
                    );

                    $json[] = $advertisementArray;

                }
                http_response_code(200);
                die(json_encode($json));
            } else {
                die(json_encode(array('message' => 'Method not allowed')));
            }
        }

    if ($uriPath == '/advertisement/add'){
        
        if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
            $json = file_get_contents('php://input');

            if ($json === false){
                http_response_code(400);
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
                                $photo = new Photo(0, $result[0]->getId(), $photo, '');
                                if ($photo->save()) {
                                } else {
                                    $success = false;
                                }
                            }
    
                            if ($success === false){
                                http_response_code(400);
                                die(json_encode(array('message' => 'Houve um erro ao adicionar o anúncio')));
                            } else {
                                http_response_code(200);
                                die(json_encode(array('message' => 'Anúncio inserido com sucesso')));
                            }
                        } else {
                            http_response_code(400);
                            die(json_encode(array('message' => 'Houve um erro ao adicionar o anúncio')));
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
                        http_response_code(400);
                        die (json_encode(array('message' => 'Empty data')));
                    } else {
                        if (!isset($data['id']) || !isset($data['cod']) || !isset($data['name']) || !isset($data['description']) || !isset($data['price']) || !isset($data['category_id']) || !isset($data['measurement']) || !isset($data['size']) || !isset($data['videoUrl'])) {
                            die(json_encode(array('message' => 'unexpected JSON')));
                        } else {
                            try {
                                $id          = $data['id'];
                                $cod         = $data['cod'];
                                $name        = strtolower($data['name']);
                                $description = $data['description'];
                                $price       = $data['price'];
                                $category_id = $data['category_id'];
                                $measurement = $data['measurement'];
                                $size        = $data['size'];
                                $videoUrl    = $data['videoUrl'];

                                $advertisement = new Advertisement($id, $cod, $name, $description, $price, $category_id, $measurement, $size, $videoUrl, 1);

                                if(!$advertisement->save()->rowCount() == 1) {
                                    http_response_code(400);
                                    die(json_encode(array('message' => 'Houve um erro ao editar o anúncio')));
                                } else {
                                    http_response_code(200);
                                    die(json_encode(array('message' => 'Anuncio editado com sucesso')));
                                }
                            } catch (Exception $e) {
                                http_response_code(400);
                                die(json_encode(array('message' => $e->getMessage())));
                            } catch (InvalidArgumentException $iae) {
                                http_response_code(400);
                                die(json_encode(array('message' => $iae->getMessage())));
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
                    http_response_code(200);
                    die(json_encode($json));
                }
            }
        } else {
            http_response_code(400);
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
                    http_response_code(400);
                    die(json_encode(array('message' => 'unexpected JSON')));
                } else {
                    $search = strtolower($data['search']);

                $where = new Where();
                $where->addLike('', 'lower(name)', $search);

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
                http_response_code(200);
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
                        die(json_encode(array("message" => "id inesperado")));
                    } else {
                        $advertisementList[0]->setIsActive('1');
    
                        if ($advertisementList[0]->save()) {
                            http_response_code(200);
                            die(json_encode(array('message' => 'Anúncio ativado com sucesso')));
                        } else {
                            http_response_code(400);
                            die(json_encode(array('message' => 'Houve um erro ao ativar o anúncio')));
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
                    http_response_code(400);
                    die(json_encode(array('message' => 'unexpected JSON')));
                } else {
                    $id = $data['id'];

                    $where = new Where();
                    $where->addCondition('AND', 'id', '=', $id);
    
                    $advertisement = new Advertisement('','','','','','','','','','');
                    $advertisementList = $advertisement->listAdvertisements($where);

                    if (!count($advertisementList) == 1) {
                        die(json_encode(array("message" => "id inesperado")));
                    } else {
                        $advertisementList[0]->setIsActive('0');
    
                        if ($advertisementList[0]->save()) {
                            http_response_code(200);
                            die(json_encode(array('message' => 'Anúncio desativado com sucesso')));
                        } else {
                            http_response_code(400);
                            die(json_encode(array('message' => 'Houve um erro ao desativar o anúncio')));
                        }
                    }
                }
            }
        }

    } else {
        echo json_encode(array('message' => 'Method not allowed'));
    }
}
