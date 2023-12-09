<?php

use core\database\Where;
use models\Cart;

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


if ($uriPath == '/cart/add') {
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
                 if (!isset($data['product_id']) || !isset($data['product_name']) || !isset($data['product_qty']) || !isset($data['cart_id'])) {
                    http_response_code(400);
                    die(json_encode(array('message' => 'unexpected JSON')));
                } else {
                    $product_id   = $data['product_id'];
                    $product_name = $data['product_name'];
                    $product_qty  = $data ['product_qty'];
                    $cart_id      = $data ['cart_id'];

                    $cart = new Cart(0, $product_id, $product_name, $product_qty, $cart_id);

                    if ($cart->save()) {
                        echo json_encode(array(
                            'product_id' => $product_id
                        ));
                        $where = new Where();
                        $where->addCondition('AND', 'product_id', '=', $product_id);
                        $result = $cart->listCarts($where);
                        
                        $success = "";

                        foreach ($product_name as $order) {
                            echo json_encode(array(
                                'advertisement_id' => $result[0]->getProduct_id(),
                                'order' => $order
                            ));
                            $order = new Order(0, $result[0]->getProduct_id(), $order);
                            if ($order->save()) {
                                echo json_encode(array('message' => 'pedido inserido'));
                            } else {
                                $success = false;
                            }
                        } 

                        if ($success === false){
                            http_response_code(400);
                            die(json_encode(array('message' => 'Houve um erro ao adicionar o carrinho')));
                        } else {
                            http_response_code(200);
                            die(json_encode(array('message' => 'Carrinho inserido com sucesso')));
                        }
                    } else {
                        http_response_code(400);
                        die(json_encode(array('message' => 'Houve um erro ao adicionar o anúncio')));
                    }
                }   
            }
        }
        } else {
            http_response_code(400);
            echo json_encode(array('message' => 'Method not allowed'));
        }
    }