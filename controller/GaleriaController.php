<?php
require_once 'model/Galeria.php';

class GaleriaController
{
    public static function salvar()
    {

        $galeria = new Galeria();
        $imagem = $_FILES['foto'];   

        if(is_uploaded_file($_FILES['foto']['tmp_name'])){
            $imagem['path'] = 'imagens/' . $_FILES['foto']['name'];
            move_uploaded_file($_FILES['foto']['tmp_name'], $imagem['path']);
        }
        $galeria->setArquivo($imagem['path']);
        $galeria->setIdImovel($_POST['idImovel']);

        $galeria->save();
    }
    public static function editar($id)
    {
        $imovel = new Imovel();

        $imovel = $imovel->find($id);

        return $imovel;
    }
    public static function listar(){
        $imagens = new Galeria();
        return $imagens->listAll();
    }
    public static function listarFotos(){
        $imagens = new Galeria();
        return $imagens->listImages();
    }
}
