<?php

use models\User;

$url = parse_url($_SERVER['REQUEST_URI']);
$uriPath = $url['path'];

if ($uriPath == 'user/add') {
    if ($_SERVER['REQUEST_METHOD'] == 'post'){
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
                $idNivelUsuario  = $data['idNivelUsuario'];
                $name            = $data['name'];
                $email           = $data['email'];
                $password        = $data['password'];
                $active_code     = $data['active_code'];
                $recovery_phrase = $data['recovery_phrase'];

                $user = new User(0, $idNivelUsuario, $name, $email, $password, 0, $active_code, $recovery_phrase);
                if ($user->save()) {
                    echo json_encode(array('status_code' => '0'));
                } else {
                    echo json_encode(array('status_code' => '1'));
                }
            }   
        }
    } else {
        echo json_encode(array('message' => 'Method not allowed'));
    }
}

?>