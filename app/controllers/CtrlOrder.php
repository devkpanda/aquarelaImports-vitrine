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

if ($uriPath == '/order/listall'){
    if (strtolower($_SERVER['REQUEST_METHOD']) == 'get'){
        // por que alguns 'new __ ()' possuem 0 no primeiro elemento e outros apenas vazio?
        $order = new Order('','');
        $orders = $order->listOrders();

        $json = array();

        foreach ($orders as $order) {
            $advertisementArray = array(
                "id"                => $advertisement->getId(),
                "advertisement_id"  => $advertisement->getAdvertisement_id()
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