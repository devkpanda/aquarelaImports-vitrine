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

if ($uriPath == '/category/add'){
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
                $description = $data['description'];
                $parent_id   = $data['parent_id'];

                $category = new Category(0, $description, $parent_id );
            
                if ($category->save()) {
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