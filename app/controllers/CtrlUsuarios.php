<?php

use models\Usuarios;

$usuario = new Usuarios("", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");

$linhas = $usuario->list("");

foreach ($linhas as $linha) {
    echo  
               $linha['idUsuario']
        ." | ".$linha['nome']
        ." | ".$linha['cpf']
        ." | ".$linha['dtNasc']
        ." | ".$linha['idGenero']
        ." | ".$linha['idEscolaridade']
        ." | ".$linha['idEstadoCivil']
        ." | ".$linha['qtdFilhos']
        ." | ".$linha['siglaUF']
        ." | ".$linha['telefone']
        ." | ".$linha['email']
        ." | ".$linha['senha']
        ." | ".$linha['aceitaContrato']
        ." | ".$linha['dthrContrato']
        ." | ".$linha['activeCode']
        ." | ".$linha['ativo']
        ." | ".$linha['idNivelUsuario']
        ." | ".$linha['fraseRecupera'];
}


    
    
    

?>