<?php

require_once 'Banco.php';
require_once 'Conexao.php';

class Usuario extends Banco{

    private $id;
    private $login;
    private $senha;
    private $permissao;

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setLogin($login){
        $this->login = $login;
    }

    public function getLogin(){
        return $this->login;
    }

    public function setSenha($senha){
        $this->senha = md5($senha);
    }

    public function getSenha(){
        return $this->senha;
    }

    public function getPermissao(){

        if($this->permissao == 'A'){
            $res = "Administrador";
        }else{
            $res = "Comum";
        }
        return $res;
    }

    public function setPermissao($permissao){
        $this->permissao = $permissao;
    }

    public function save(){
        $result = false;

        $conexao = new Conexao();
        if($conn = $conexao->getConection()){
            if($this->id > 0){
                //alteração
                $query = "update usuario set login = :login, senha = :senha, permissao = :permissao where id = :id";
                $stmt = $conn->prepare($query);
                if($stmt->execute(array(':login'=>$this->login, ':senha' => $this->senha, ':permissao' => $this->permissao, ':id' => $this->id))){
                    $result = $stmt->rowCount();
                }

            }else{
                //cadastro
                $query = "insert into usuario (login, senha, permissao) values (:login, :senha, :permissao)";
                $stmt = $conn->prepare($query);
                if($stmt->execute(array(':login'=>$this->login, ':senha' => $this->senha, ':permissao' => $this->permissao))){
                    $result = $stmt->rowCount();
                }
            }
            
        }

        return $result;
    }

    public function remove($id){
        $result = false;
        $conexao = new Conexao();
        $conn = $conexao->getConection();
        $query = "delete from usuario where id = :id";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':id' => $id))){
            $result = true;
        }

        return $result;
    }

    public function find($id){
        $result = false;
        $conexao = new Conexao();
        $conn = $conexao->getConection();

        $query = "select * from usuario where id = :id";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':id' => $id))){
            if($stmt->rowCount() > 0){
                $result = $stmt->fetchObject(Usuario::class);
            }
        }
        return $result;
    }

    public function count(){

    }

    public function listAll(){
        $result = false;
        $conexao = new Conexao();
        $conn = $conexao->getConection();

        $query = "select * from usuario";

        $stmt = $conn->prepare($query);

        $result = array();

        if($stmt->execute()){
            while ($rs = $stmt->fetchObject(Usuario::class)){
                $result[] = $rs;
            }
        }

        return $result;
    }

    public function logar(){

        $result = false;
        $conexao = new Conexao();
        $conn = $conexao->getConection();
        $query = "select * from usuario where login = :login and senha = :senha";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':login' => $this->getLogin(), ':senha' => $this->getSenha()))){
            if($stmt->rowCount()>0){
                $result = true;
            }
        }
        return $result;

    }


}


?>