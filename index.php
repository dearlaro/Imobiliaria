<?php
require_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>
    <link href="style/style.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
<div class="container">
        <div class="card-header">
            <span class="card-title">Menu</span>
        </div>
        <a href="index.php?page=usuario&action=listar">Usuário</a><br>
        <a href="index.php?page=imovel&action=listar">Imóvel</a>
        <?php

if(isset($_GET['page'])){
    if ($_GET['page'] == 'usuario'){
        if($_GET['action'] == 'editar'){
            $usuario = call_user_func(array('UsuarioController','editar'),$_GET['id']);
            require_once 'view/cadUsuario.php';
        }

        if($_GET['action'] == 'listar'){
            require_once 'view/listUsuario.php';
        }

        if($_GET['action'] == 'excluir'){
            $usuario = call_user_func(array('UsuarioController','excluir'),$_GET['id']);
            require_once 'view/listUsuario.php';

        }
        if($_GET['action'] == 'cadUsuario'){
            require_once 'view/cadUsuario.php';
        }
    }
    }

    if(isset($_GET['page'])){
        if ($_GET['page'] == 'imovel'){
            if($_GET['action'] == 'editar'){
                $imovel = call_user_func(array('ImovelController','editar'),$_GET['id']);
                require_once 'view/cadImovel.php';
            }
    
            if($_GET['action'] == 'listar'){
                require_once 'view/listImovel.php';
            }
    
            if($_GET['action'] == 'excluir'){
                $imovel = call_user_func(array('ImovelController','excluir'),$_GET['id']);
                require_once 'view/listImovel.php';
    
            }
            if($_GET['action'] == 'cadImovel'){
                require_once 'view/cadImovel.php';
            }
        }
        }
        ?>