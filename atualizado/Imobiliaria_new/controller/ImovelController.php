<?php
require_once 'model/Imovel.php';

class ImovelController{

    public static function salvar(){

        $imovel = new Imovel();
        $imovel->setId($_POST['id']);
        $imovel->setDescricao($_POST['descricao']);
        $imovel->setValor($_POST['valor']);
        $imovel->setTipo($_POST['tipo']);
        $imovel->setFoto($_POST['foto']);
        $imovel->save();
    }

    public function editar($id){
        //cria um objeto do tipo Usuario
        $imovel = new Imovel;

        $imoveis = $imovel->find($id);
        return $imovel;
    }

    public function listar(){

        $imoveis = new Imovel;

        return $imoveis->listAll();
    }

    public function excluir($id){
        //cria um objeto do tipo usuario
        $imovel = new Imovel;

        $imovel = $imovel->remove($id);
    }
}

?>