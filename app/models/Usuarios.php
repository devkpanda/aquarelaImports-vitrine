<?php

namespace models;

use core\database\DBQuery;

class Usuarios {
    
    private $idUsuario;
    private $nome;
    private $cpf;
    private $dtNasc;
    private $idGenero;
    private $idEscolaridade;
    private $idEstadoCivil;
    private $qtdFilhos;
    private $siglaUF;
    private $telefone;
    private $email;
    private $senha;
    private $aceitaContrato;
    private $dthrContrato;
    private $activeCode;
    private $ativo;
    private $idNivelUsuario;
    private $fraseRecupera;
    
    private $dbquery;
    
    function __construct( $idUsuario, $nome, $cpf, $dtNasc, $idGenero, $idEscolaridade, $idEstadoCivil, $qtdFilhos, $siglaUF, $telefone, $email, $senha, $aceitaContrato, $dthrContrato, $activeCode, $ativo, $idNivelUsuario, $fraseRecupera){
        
        $tableName  = "usuarios";
        $fieldsName = "idUsuario, nome, cpf, dtNasc, idGenero, idEscolaridade, idEstadoCivil, qtdFilhos, siglaUF, telefone, email, senha, aceitaContrato, dthrContrato, activeCode, ativo, idNivelUsuario, fraseRecupera";
        $fieldKey   = "idUsuario";
        $this->dbquery = new DBQuery($tableName, $fieldsName, $fieldKey);
        
        $this->setIdUsuario( $idUsuario );
        $this->setNome( $nome );
        $this->setCpf( $cpf );
        $this->setDtNasc( $dtNasc );
        $this->setIdGenero( $idGenero );
        $this->setIdEscolaridade( $idEscolaridade );
        $this->setIdEstadoCivil( $idEstadoCivil );
        $this->setQtdFilhos( $qtdFilhos );
        $this->setSiglaUF( $siglaUF );
        $this->setTelefone( $telefone );
        $this->setEmail( $email );
        $this->setSenha( $senha );
        $this->setAceitaContrato( $aceitaContrato );
        $this->setDthrContrato( $dthrContrato );
        $this->setActiveCode( $activeCode );
        $this->setAtivo( $ativo );
        $this->setIdNivelUsuario( $idNivelUsuario );
        $this->setFraseRecupera( $fraseRecupera );
    }
    
    public function toArray(){
        return array(
            $this->getIdUsuario(),
            $this->getNome(),
            $this->getCpf(),
            $this->getDtNasc(),
            $this->getIdGenero(),
            $this->getIdEscolaridade(),
            $this->getIdEstadoCivil(),
            $this->getQtdFilhos(),
            $this->getSiglaUF(),
            $this->getTelefone(),
            $this->getEmail(),
            $this->getSenha(),
            $this->getAceitaContrato(),
            $this->getDthrContrato(),
            $this->getActiveCode(),
            $this->getAtivo(),
            $this->getIdNivelUsuario(),
            $this->getFraseRecupera()
        );
    }
    
    public function toString(){
        return("\n\t\t\t\t". implode(", ",$this->toArray()));
    }
    
    
    public function save() {
        if($this->getIdUsuario() == 0){
            return( $this->dbquery->insert($this->toArray()));
        }else{
            return( $this->dbquery->update($this->toArray()));
        }
    }
    
    public function list($where) {
        if ( $where == ""){
            $rSet = $this->dbquery->select();
        }else{
            $rSet = $this->dbquery->selectFiltered($where);
        }
        return( $rSet );
    }
    
    public function listUsuarios($where = null) : array {
        $usuarios = array();
        $rSet = null;
        if ( $where == null){
            $rSet = $this->dbquery->select();
        }else{
            $rSet = $this->dbquery->selectFiltered($where);   
        }
        
        if ($rSet) {
            foreach ($rSet as $linha) {
                $idUsuario      = $linha['idUsuario'];
                $nome           = $linha['nome'];
                $cpf            = $linha['cpf'];
                $dtNasc         = $linha['dtNasc'];
                $idGenero       = $linha['idGenero'];
                $idEscolaridade = $linha['idEscolaridade'];
                $idEstadoCivil  = $linha['idEstadoCivil'];
                $qtdFilhos      = $linha['qtdFilhos'];
                $siglaUF        = $linha['siglaUF'];
                $telefone       = $linha['telefone'];
                $email          = $linha['email'];
                $senha          = $linha['senha'];
                $aceitaContrato = $linha['aceitaContrato'];
                $dthrContrato   = $linha['dthrContrato'];
                $activeCode     = $linha['activeCode'];
                $ativo          = $linha['ativo'];
                $idNivelUsuario = $linha['idNivelUsuario'];
                $fraseRecupera  = $linha['fraseRecupera'];
                $usuarios[] = new Usuarios($idUsuario, $nome, $cpf, $dtNasc, $idGenero, $idEscolaridade, $idEstadoCivil, $qtdFilhos, $siglaUF, $telefone, $email, $senha, $aceitaContrato, $dthrContrato, $activeCode, $ativo, $idNivelUsuario, $fraseRecupera );                }
        } else {
            $usuarios[] = array();
            echo  "{'msg':'Nenhum usuário encontrado.\n'}";
        }
        return( $usuarios );
    }
    
    public function delete() {
        if($this->getIdUsuario() != 0){
            return( $this->dbquery->delete($this->toArray()));
        }
    }
    
    public function setIdUsuario( $idUsuario ){
        $this->idUsuario = $idUsuario;
    }
    
    public function getIdUsuario(){
        return( $this->idUsuario );
    }
    
    public function setNome( $nome ){
        $this->nome = $nome;
    }
    
    public function getNome(){
        return( $this->nome );
    }
    
    public function setCpf( $cpf ){
        $this->cpf = $cpf;
    }
    
    public function getCpf(){
        return( $this->cpf );
    }
    
    public function setDtNasc( $dtNasc ){
        $this->dtNasc = $dtNasc;
    }
    
    public function getDtNasc(){
        return( $this->dtNasc );
    }
    
    public function setIdGenero( $idGenero ){
        $this->idGenero = $idGenero;
    }
    
    public function getIdGenero(){
        return( $this->idGenero );
    }
    
    public function setIdEscolaridade( $idEscolaridade ){
        $this->idEscolaridade = $idEscolaridade;
    }
    
    public function getIdEscolaridade(){
        return( $this->idEscolaridade );
    }
    
    public function setIdEstadoCivil( $idEstadoCivil ){
        $this->idEstadoCivil = $idEstadoCivil;
    }
    
    public function getIdEstadoCivil(){
        return( $this->idEstadoCivil );
    }
    
    public function setQtdFilhos( $qtdFilhos ){
        $this->qtdFilhos = $qtdFilhos;
    }
    
    public function getQtdFilhos(){
        return( $this->qtdFilhos );
    }
    
    public function setSiglaUF( $siglaUF ){
        $this->siglaUF = $siglaUF;
    }
    
    public function getSiglaUF(){
        return( $this->siglaUF );
    }
    
    public function setTelefone( $telefone ){
        $this->telefone = $telefone;
    }
    
    public function getTelefone(){
        return( $this->telefone );
    }
    
    public function setEmail( $email ){
        $this->email = $email;
    }
    
    public function getEmail(){
        return( $this->email );
    }
    
    public function setSenha( $senha ){
        $this->senha = $senha;
    }
    
    public function getSenha(){
        return( $this->senha );
    }
    
    public function setAceitaContrato( $aceitaContrato ){
        $this->aceitaContrato = $aceitaContrato;
    }
    
    public function getAceitaContrato(){
        return( $this->aceitaContrato );
    }
    
    public function setDthrContrato( $dthrContrato ){
        $this->dthrContrato = $dthrContrato;
    }
    
    public function getDthrContrato(){
        return( $this->dthrContrato );
    }
    
    public function setActiveCode( $activeCode ){
        $this->activeCode = $activeCode;
    }
    
    public function getActiveCode(){
        return( $this->activeCode );
    }
    
    public function setAtivo( $ativo ){
        $this->ativo = $ativo;
    }
    
    public function getAtivo(){
        return( $this->ativo );
    }
    
    public function setIdNivelUsuario( $idNivelUsuario ){
        $this->idNivelUsuario = $idNivelUsuario;
    }
    
    public function getIdNivelUsuario(){
        return( $this->idNivelUsuario );
    }
    
    public function setFraseRecupera( $fraseRecupera ){
        $this->fraseRecupera = $fraseRecupera;
    }
    
    public function getFraseRecupera(){
        return( $this->fraseRecupera );
    }
    
}


?>
