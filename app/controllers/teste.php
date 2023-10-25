<?php
use core\database\Where;
use models\User;

$url = parse_url($_SERVER['REQUEST_URI']);
$uriPath = strtolower($url['path']);


        if(isset($_POST["login"])) {
            echo ("foi");

            if (isset($_POST["email"]) && isset($_POST["password"])) {
                echo $email     = $_POST["email"];
                echo $password  = $_POST["password"];
        
            }
        }


        
if (strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
    $json = file_get_contents('php://input');

    echo ("foi");

    if (isset($_POST["email"]) && isset($_POST["password"])) {
        echo $email     = $_POST["email"];
        echo $password  = $_POST["password"];

    }

    $email    = $_POST["email"];
    $password = $_POST["password"];

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
                echo json_encode(array('message' => '1'));
            }

            $_SESSION['idNivelUsuario'] = $user->getIdNivelUsuario();

            echo json_encode($json);
        }
    } 
} else {
    echo json_encode(array('message' => 'Method not allowed'));
}



?>