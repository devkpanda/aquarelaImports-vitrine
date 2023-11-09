<?php

use core\database\Where;
use models\UserLevel;

// accept CORS requests

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
  header('HTTP/1.1 200 OK');
  exit;
}

$url = parse_url($_SERVER['REQUEST_URI']);
$uriPath = strtolower($url['path']);

if ($uriPath == '/user_level/listall'){
    if (strtolower($_SERVER['REQUEST_METHOD']) == 'get'){
        $user_level = new UserLevel('', '');

        $user_levels = $user_level->listUser_level();

        $json = array();

        foreach ($user_levels as $user_level) {
            $user_levelArray = array(
                "id" => $user_level->getId(),
                "description" => $user_level->getDescription()
            );

            $json[] = $user_levelArray;
        }

        echo json_encode($json);
    } else {
        echo json_encode(array('message' => 'Method not allowed'));
    }
}

if ($uriPath == '/user_level/add') {
    if (strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
        $json = file_get_contents('php://input');

        if ($json === false){
            http_response_code(400);
            echo json_encode(array('message' => 'Error receiving json'));
        } else {
            $data = json_decode($json, true);

            if ($data === null) {
                http_response_code(400);
                echo json_encode(array('message' => 'Empty json'));
            } else {
                $description  = $data['description'];

                $user_level = new UserLevel(0, $description);

                if ($user_level->save()) {
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

?>