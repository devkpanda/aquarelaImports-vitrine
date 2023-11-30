<?php

use core\database\Where;
use models\User;

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

if ($uriPath == '/user/listall'){
    if (strtolower($_SERVER['REQUEST_METHOD']) == 'get'){
        $user = new User(0, '', '', '', '', 0, '', '');

        $users = $user->listUsuarios();

        $json = array();

        foreach ($users as $user) {
            $userArray = array(
                "id" => $user->getId(),
                "idNivelUsuario" => $user->getIdNivelUsuario(),
                "name" => $user->getName(),
                "email" => $user->getEmail(),
                "active" => $user->getActive()
            );

            $json[] = $userArray;
        }
        http_response_code(200);
        die(json_encode($json));
    } else {
        http_response_code(400);
        die(json_encode(array('message' => 'Method not allowed')));
    }
}

if ($uriPath == '/user/add') {
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
                if (!isset($data['idNivelUsuario']) || !isset($data['name']) || !isset($data['email']) || !isset($data['password'])) {
                    http_response_code(400);
                    die(json_encode(array('message' => 'unexpected JSON')));
                } else {
                    try {
                        $idNivelUsuario     = $data['idNivelUsuario'];
                        $name               = $data['name'];
                        $email              = $data['email'];
                        $password           = $data['password'];

                        $user = new User(0, $idNivelUsuario, $name, $email, $password, 0, 0, '');

                        if (!$user->save()) {
                            http_response_code(400);
                            die(json_encode(array('message' => 'Houve um erro ao adicionar o usuário')));
                        } else {
                            http_response_code(400);
                            die(json_encode(array('message' => 'Usuário adicionado com sucesso')));
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
        http_response_code(400);
        echo json_encode(array('message' => 'Method not allowed'));
    }
}


if ($uriPath == '/user/enable') {
    // if (isset($_SESSION['idNivelUsuario']) && $_SESSION['idNivelUsuario'] == 1){
        if (strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
            $json = file_get_contents('php://input');
    
            if ($json === false){
                http_response_code(400);
                die(json_encode(array('message' => 'Error receiving json')));
            } else {
                $data = json_decode($json, true);
    
                if ($data === null) {
                    http_response_code(400);
                    die(json_encode(array('message' => 'Empty json')));
                } else {
                    if (!isset($data['id'])) {
                        http_response_code(400);
                        die(json_encode(array('message' => 'unexpected JSON')));
                    } else {
                        try {
                            $id = $data['id'];

                            $where = new Where();
                            $where->addCondition('AND', 'id', '=', $id);
        
                            $user = new User($id, '', '', '', '', 0, '', '');
                            $userList = $user->listUsuarios($where);

                            if (!count($userList) == 1) {
                                die(json_encode(array("message" => "unexpected id")));
                            } else {
                                $userList[0]->setActive("1");
            
                                if (!$userList[0]->save()) {
                                    http_response_code(400);
                                    die(json_encode(array('message' => 'Houve um erro ao desativar o usuario')));
                                } else {~
                                    http_response_code(200);
                                    die(json_encode(array('message' => 'Usuário desativado com sucesso')));
                                }
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
            echo json_encode(array('message' => 'Method not allowed'));
        }
    // }
}

if ($uriPath == '/user/disable') {
    // if (isset($_SESSION['idNivelUsuario']) && $_SESSION['idNivelUsuario'] == 1){
        if (strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
            $json = file_get_contents('php://input');
    
            if ($json === false){
                http_response_code(400);
                die(json_encode(array('message' => 'Error receiving json')));
            } else {
                $data = json_decode($json, true);
    
                if ($data === null) {
                    http_response_code(400);
                    die(json_encode(array('message' => 'Empty json')));
                } else {
                    if (!isset($data['id'])) {
                        http_response_code(400);
                        die(json_encode(array('message' => 'unexpected JSON')));
                    } else {
                        try {
                            $id = $data['id'];

                            $where = new Where();
                            $where->addCondition('AND', 'id', '=', $id);
        
                            $user = new User($id, '', '', '', '', 0, '', '');
                            $userList = $user->listUsuarios($where);

                            if (!count($userList) == 1) {
                                die(json_encode(array("message" => "unexpected id")));
                            } else {
                                $userList[0]->setActive("0");
            
                                if (!$userList[0]->save()) {
                                    http_response_code(400);
                                    die(json_encode(array('message' => 'Houve um erro ao desativar o usuário')));
                                } else {
                                    http_response_code(200);
                                    die(json_encode(array('message' => 'Usuário desativado com sucesso')));
                                }
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
            http_response_code(400);
            echo json_encode(array('message' => 'Method not allowed'));
        }
    // }
}

if ($uriPath == '/user/update') {
    if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
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
                if (!isset($data['id']) || !isset($data['idNivelUsuario']) || !isset($data['name'])  || !isset($data['email'])){
                    http_response_code(400);
                    die(json_encode(array('message' => 'unexpected JSON')));
                } else {
                    try {
                        $id = $data['id'];
                        $idNivelUsuario = $data['idNivelUsuario'];
                        $name = $data['name'];
                        $email = $data['email'];
                        $active = $data['active'];

                        $where = new Where();
                        $where->addCondition('AND', 'id', '=', $id);

                        $user = new User('', '', '', '', '', '', '', '');
                        $result = $user->listUsuarios($where);

                        $result[0]->setIdNivelUsuario($idNivelUsuario);
                        $result[0]->setName($name);
                        $result[0]->setEmail($email);
                        $result[0]->setActive($active);
                        
                        if (!$result[0]->save()) {
                            http_response_code(400);
                            die(json_encode(array('message' => 'Houve um erro ao editar o usuário')));
                        } else {
                            http_response_code(200);
                            die(json_encode(array('message' => 'Usuário editado com sucesso')));
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
        http_response_code(400);
        die(json_encode(array('message' => 'Method not allowed')));
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
                if (!isset($data['email']) || !isset($data['password'])) {
                    http_response_code(400);
                    die(json_encode(array('message' => 'unexpected JSON')));
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
                                "message"   => "0",
                                "id"        => $user->getId(),
                                "Name"      => $user->getName(),
                                "email"     => $user->getEmail()
                            );
    
                            $json[] = $userArray;
                        }
                    } else {
                        http_response_code(400);
                        die(json_encode(array('message' => '1')));
                    }
    
                    $_SESSION['idUsuario'] = $user->getId();
                    $_SESSION['idNivelUsuario'] = $user->getIdNivelUsuario();
                    http_response_code(200);
                    die(json_encode($json[0])); 
                }
            }
        } 
    } else {
        http_response_code(400);
        die(json_encode(array('message' => 'Method not allowed')));
    }
}

?>