<?php

use core\database\Where;
use models\Category;

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

if ($uriPath == '/category/add') {
    if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
        $json = file_get_contents('php://input');

        if ($json === false) {
            http_response_code(400);
            die(json_encode(array('message' => 'Error receiving json')));
        } else {
            $data = json_decode($json, true);

            if ($data === null) {
                http_response_code(400);
                echo json_encode(array('message' => 'Empty json'));
            } else {
                if (!isset($data['description']) || !isset($data['parent_id'])) {
                    die(json_encode(array('message' => 'unexpected JSON')));
                } else {
                    try {
                        $description = $data['description'];
                        $parent_id   = $data['parent_id'];

                        $category = new Category(0, $description, $parent_id);

                        if (!$category->save()) {
                            die(json_encode(array('message' => '1')));
                        } else {
                            die(json_encode(array('message' => '0')));
                        }
                    } catch (Exception $e) {
                        die(json_encode(array('message' => $e->getMessage())));
                    } catch (InvalidArgumentException $iae) {
                        die(json_encode(array('message' => $iae->getMessage())));
                    }
                }
            }
        }
    } else {
        echo json_encode(array('message' => 'Method not allowed'));
    }
}

if ($uriPath == '/category/listall') {
    if (strtolower($_SERVER['REQUEST_METHOD']) == 'get') {
        $category = new Category(0, '', '');

        $categories = $category->listCategory();

        $json = array();

        foreach ($categories as $category) {
            $categoryArray = array(
                "id" => $category->getId(),
                "description" => $category->getDescription(),
                "parent_id" => $category->getParent_id()
            );

            $json[] = $categoryArray;
        }

        die(json_encode($json));
    } else {
        die(json_encode(array('message' => 'Method not allowed')));
    }
}

if ($uriPath == '/category/update') {
    if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
        $json = file_get_contents('php://input');

        if ($json === false) {
            http_response_code(400);
            echo json_encode(array('message' => 'Error receiving json'));
        } else {
            $data = json_decode($json, true);

            if ($data === null) {
                http_response_code(400);
                echo json_encode(array('message' => 'Empty json'));
            } else {
                if (!isset($data['id']) || !isset($data['description']) || !isset($data['parent_id'])) {
                    die(json_encode(array('message' => 'unexpected JSON')));
                } else {
                    try {
                        $id             = $data['id'];
                        $description    = $data['description'];
                        $parent_id      = $data['parent_id'];

                        $category = new Category($id, $description, $parent_id);

                        if (!$category->save()->rowCount() == 1) {
                            die(json_encode(array('message' => '1')));
                        } else {
                            die(json_encode(array('message' => '0')));
                        }
                    } catch (Exception $e) {
                        die(json_encode(array('message' => $e->getMessage())));
                    } catch (InvalidArgumentException $iae) {
                        die(json_encode(array('message' => $iae->getMessage())));
                    }
                }
            }
        }
    } else {
        die(json_encode(array('message' => 'Method not allowed')));
    }
}

if ($uriPath == '/category/delete') {
    if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
        $json = file_get_contents('php://input');

        if ($json === false) {
            http_response_code(400);
            echo json_encode(array('message' => 'Error receiving json'));
        } else {
            $data = json_decode($json, true);

            if ($data === null) {
                http_response_code(400);
                echo json_encode(array('message' => 'Empty json'));
            } else {
                if (!isset($data['id'])) {
                    die(json_encode(array('message' => 'unexpected JSON')));
                } else {
                    try {
                        $id = $data['id'];

                        $category = new Category($id, '', '');
                        $category->setId($id);

                        if (!$category->delete()->rowCount() == 1) {
                            die(json_encode(array('message' => '1')));
                        } else {
                            die(json_encode(array('message' => '0')));
                        }
                    } catch (Exception $e) {
                        die(json_encode(array('message' => $e->getMessage())));
                    } catch (InvalidArgumentException $iae) {
                        die(json_encode(array('message' => $iae->getMessage())));
                    }
                }
            }
        }
    } else {
        die(json_encode(array('message' => 'Method not allowed'))); 
    }
}

?>