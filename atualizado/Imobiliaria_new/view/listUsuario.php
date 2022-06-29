<?php
require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listUsuario</title>
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link href="style/style.css" rel="stylesheet" media="all">
</head>
<body>
<br><br><br><hr><br><br>
                <div class="p-t-30">
                    <h2 class="title">Usuários</h2><br><br><br>
                </div>
                <hr />
                <div>
                <div>
                    <table class="table table-bordered table-striped" style="top:40px;">
                        <thead>
                            <tr>
                                <th>Login</th>
                                <th>Permissão</th>
                                <th><a href="index.php?page=usuario&action=cadUsuario">Novo</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $usuarios = call_user_func(array('UsuarioController', 'listar'));
                            if (isset($usuarios) && !empty($usuarios)) {
                                foreach ($usuarios as $usuario) {
                            ?>
                                    <tr>
                                        <td><?php echo $usuario->getLogin(); ?></td>
                                        <td><?php echo $usuario->getPermissao(); ?></td>
                                        <td>
                                            <a href="index.php?page=usuario&action=editar&id=<?php echo $usuario->getId(); ?>" class="btn btn-primary btn-sm">Editar</a>
                                            <a href="index.php?page=usuario&action=excluir&id=<?php echo $usuario->getId(); ?>" class="btn btn-primary btn-sm">Excluir</a>

                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="3">Nenhum registro cadastrado</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
    
</body>
</html>