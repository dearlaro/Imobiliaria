<?php
require_once 'Banco.php';
require_once 'Conexao.php';

class Galeria extends Banco
{
    private $id;
    private $arquivo;
    private $data;
    private $idImovel;

    public function getIdImovel()
    {
        return $this->idImovel;
    }

    public function setIdImovel($idImovel)
    {
        $this->idImovel = $idImovel;
    }



    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getArquivo()
    {
        return $this->arquivo;
    }

    public function setArquivo($arquivo)
    {
        $this->arquivo = $arquivo;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function save() {
        $result = false;
        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        if($conn = $conexao->getConection()){

        //cria query de inserção passando os atributos que serão armazenados
        $query = "insert into galeria (id, arquivo, data, idImovel) 
        values (null,:arquivo,now(),:idImovel)";
        //Prepara a query para execução
        $stmt = $conn->prepare($query);
        //executa a query
        if ($stmt->execute(array(':arquivo' => $this->arquivo,  ':idImovel' => $this->idImovel))) {
            $result = $stmt->rowCount();
        }
            
        }
        return $result;
    }

    public function remove($id) {

        $result = false;
        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dadosgi
        $conn = $conexao->getConection();
        //cria query de remoção
        $query = "DELETE FROM galeria where id = :id";
        //Prepara a query para execução
        $stmt = $conn->prepare($query);
        //executa a query
        if ($stmt->execute(array(':id'=> $id))) {
            $result = true;
        }
        return $result;
    }
    public function find($id) {

        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        $conn = $conexao->getConection();
        //cria query de seleção
        $query = "SELECT * FROM galeria where id = :id";
        //Prepara a query para execução
        $stmt = $conn->prepare($query);
        //executa a query
        if ($stmt->execute(array(':id'=> $id))) {
            //verifica se houve algum registro encontrado
            if ($stmt->rowCount() > 0) {
                //o resultado da busca será retornado como um objeto da classe
                $result = $stmt->fetchObject(Imovel::class);
            }else{
                $result = false;
            }
        }
        return $result;
    }

    public function count() {
        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        $conn = $conexao->getConection();
        //cria query de seleção
        $query = "SELECT count(*) FROM galeria";
        //Prepara a query para execução
        $stmt = $conn->prepare($query);
        $count = $stmt->execute();
        if (isset($count) && !empty($count)) {
            return $count;
        }
        return false;
    }

    public function listAll() {

        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        $conn = $conexao->getConection();
        //cria query de seleção
        $query = "SELECT * FROM galeria";
        //Prepara a query para execução
        $stmt = $conn->prepare($query);
        //Cria um array para receber o resultado da seleção
        $result = array();
        //executa a query
        if ($stmt->execute()) {
            //o resultado da busca será retornado como um objeto da classe
            while ($rs = $stmt->fetchObject(Galeria::class)) {
                //armazena esse objeto em uma posição do vetor
                $result[] = $rs;
            }
        }else{
            $result = false;
        }

        return $result;
    }

    public function listImages() {

        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        $conn = $conexao->getConection();
        //cria query de seleção
        $query = "SELECT arquivo FROM galeria";
        //Prepara a query para execução
        $stmt = $conn->prepare($query);
        //Cria um array para receber o resultado da seleção
        $result = array();
        //executa a query
        if ($stmt->execute()) {
            //o resultado da busca será retornado como um objeto da classe
            while ($rs = $stmt->fetchObject(Galeria::class)) {
                //armazena esse objeto em uma posição do vetor
                $result[] = $rs;
            }
        }else{
            $result = false;
        }

        return $result;
    }

    /**
     * Get the value of path
     */ 
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set the value of path
     *
     * @return  self
     */ 
    public function setPath($path)
    {
        $this->path = $path;
    }
}

