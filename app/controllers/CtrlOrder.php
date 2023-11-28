<?php

use core\database\Where;
use models\Order;

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


if ($uriPath == '/order/add') {
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
                $advertisement_id = $data['advertisement_id'];

                $order = new Order(0, $advertisement_id);

                if ($order->save()) {
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

if ($uriPath == '/order/listall'){
    if (strtolower($_SERVER['REQUEST_METHOD']) == 'get'){
        // por que alguns 'new __ ()' possuem 0 no primeiro elemento e outros apenas vazio?
        $order = new Order('','');
        $orders = $order->listOrders();

        $json = array();

        foreach ($orders as $order) {
            $orderArray = array(
                "id"                => $order->getId(),
                "advertisement_id"  => $order->getAdvertisement_id()
            );
        }

            $json[] = $orderArray;

        }
        http_response_code(200);
        die(json_encode($json));
    } else {
        die(json_encode(array('message' => 'Method not allowed')));
    }





?>