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
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link href="style/style.css" rel="stylesheet" media="all">
</head>

<body>
<div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <div class="p-t-30">
                        <h2 class="title">Menu</h2><br><br><br>
                    </div>
                    <div class="p-t-30">
                        <a class="btn btn--radius btn--green" href="index.php?page=usuario&action=listar">Usuário</a>
                    </div>
                    <div class="p-t-30">
                        <a class="btn btn--radius btn--green" href="index.php?page=imovel&action=listar">Imóvel</a>
                    </div>
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