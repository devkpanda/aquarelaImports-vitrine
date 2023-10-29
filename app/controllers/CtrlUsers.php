<?php

use core\database\Where;
use models\User;

$url = parse_url($_SERVER['REQUEST_URI']);
$uriPath = strtolower($url['path']);

if ($uriPath == '/user/add') {
    if (isset($_SESSION['idNivelUsuario']) && $_SESSION['idNivelUsuario'] == 1){
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
                    $idNivelUsuario  = $data['idNivelUsuario'];
                    $name            = $data['name'];
                    $email           = $data['email'];
                    $password        = $data['password'];
                    $active_code     = $data['active_code'];
                    $recovery_phrase = $data['recovery_phrase'];
    
                    $user = new User(0, $idNivelUsuario, $name, $email, $password, 0, $active_code, $recovery_phrase);
    
                    if ($user->save()) {
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
}

if ($uriPath == '/login/auth') {
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
                $email = $data['email'];
                $password = $data['password'];

                $where = new Where();
                $where->addCondition('AND', 'email', '=', $email);
                $where->addCondition('AND', 'password', '=', $password);

                // uncomment line below here when email send work correctly to activate users

                // $where->addCondition('AND', 'active', '=', 1);

                $user = new User('','','','','','','','','');
                $result = $user->listUsuarios($where);

                $json = array();

                if (count($result) == 1) {
                    foreach ($result as $Ruser) {
                        $user->setId($Ruser->getId());
                        $user->setIdNivelUsuario($Ruser->getIdNivelUsuario());
                        $user->setName($Ruser->getName());
                        $user->setEmail($Ruser->getEmail());

                        $userArray = array(
                            "id" => $user->getId(),
                            "Name" => $user->getName(),
                            "email" => $user->getEmail()
                        );

                        $json[] = $userArray;
                    }
                } else {
                    return json_encode(array('message' => '1'));
                }

                $_SESSION['idNivelUsuario'] = $user->getIdNivelUsuario();

                die(json_encode($json[0])); 
            }
        } 
    } else {
        die(json_encode(array('message' => 'Method not allowed')));
    }
}

?>