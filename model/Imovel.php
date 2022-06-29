<?php

require_once 'Banco.php';
require_once 'Conexao.php';

class Imovel extends Banco{

    private $id;
    private $descricao;
    private $foto;
    private $tipo;
    private $valor;

    //métodos de acesso

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getFoto(){
        return $this->foto;
    }

    public function setFoto($foto){
        $this->foto = $foto;
    }

    public function getTipo(){
        if($this->tipo == 'A'){
            $res = "Apartamento";
        }else{
            $res = "Casa";
        }
        return $res;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }


    public function save(){
        
        $result = false;
        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        if($conn = $conexao->getConection()){
            //cria query de update passadno os atributos que serão atualizados
            if($this->id > 0){
                $query = "UPDATE imovel SET descricao = :descricao, foto = :foto, valor = :valor, tipo = :tipo WHERE id = :id";
                //prepara a query para a execução
                $stmt = $conn -> prepare($query);
                //executa a query
                if($stmt->execute(array(':descricao' => $this->descricao, ':foto' => $this -> foto, ':valor' => $this -> valor, ':tipo' => $this -> tipo, ':id' => $this->id))){
                    $result = $stmt -> rowCount();
                }
            }
            else{
                //cria a query de inserção passando os atributos que serão armazenados
                $query = "insert into imovel (id, descricao, foto, valor, tipo) values (null, :descricao, :foto, :valor, :tipo)";
                // prepara a query para a execução
                $stmt = $conn->prepare($query);
                //execição da query
                if($stmt -> execute(array(':descricao' => $this-> descricao, ':foto' => $this->foto, ':valor' => $this->valor, ':tipo' => $this->tipo))){
                    $result = $stmt -> rowCount();
                }
            }
        }
        return $result;
    }

    public function edit(){
        
    }

    public function find($id){
        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        $conn = $conexao->getConection();
        //cria query de seleção
        $query = "SELECT * FROM imovel WHERE id = :id";
        //Prepara a query para execução
        $stmt =  $conn->prepare($query);
        //executa a query
        if($stmt -> execute(array(':id' => $id))){
            //verifica se houve algum registro encontrado
            if($stmt ->rowCount() > 0){
                //o resultado da busca será retornado como um objeto da classe
                $result = $stmt -> fetchObject(Imovel::class);
            }
            else{
                $result = false;
            }
            }
        return $result;
    }

    public function remove($id){
        $result = false;

        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        $conn = $conexao->getConection();

        //cria a query de remoção
        $query = "DELETE FROM imovel WHERE id = :id";

        //prepara a query para a execução
        $stmt = $conn->prepare($query);

        //executa a query
        if($stmt->execute(array(':id' => $id))){
            $result = true;
        }
        return $result;
    }

    public function count(){
        
    }

    public function listAll(){
    
        $conexao = new Conexao();
        $conn = $conexao->getConection();
        $query = "SELECT * FROM imovel";
        $stmt = $conn->prepare($query);
        $result = array();
    
        if ($stmt->execute()){
            while ($rs = $stmt->fetchObject(Imovel::class)){
                $result[] = $rs;
            }
        }else{
            $result = false;
        }
        return $result;
    }
  
}

?>