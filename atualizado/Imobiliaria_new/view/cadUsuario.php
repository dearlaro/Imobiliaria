<?php
require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CadUsuario</title>
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
                <form name="cadUsuario" id="cadUsuario" method="post">
                        <div class="p-t-30">
                            <h2 class="title">Usuário</h2><br><br><br>
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Login" id="login" name="login" value="<?php echo isset($usuario) ? $usuario->getLogin() : ''; ?>" >
                            <input type="hidden" name="id" id="id" value="<?php echo isset($usuario) ? $usuario->getId() : ''; ?>" />
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="password" placeholder="Senha" id="senha1" name="senha1" value="<?php echo isset($usuario) ? $usuario->getSenha() : ''; ?>" >
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="password" placeholder="Confirme a senha" id="senha2" name="senha2" >
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="password" placeholder="Confirme a senha" id="senha2" name="senha2" >
                        </div>
                        <div class="form-group form-row">
                            <p class="input--style-2">Permissão:</p>
                            <select name="permissao" id="permissao" class="input--style-2">
                                <option value="0"></option>
                                <option value="A" <?php echo isset($usuario) && $usuario->getPermissao() == 'Administrador' ? 'selected' : ''; ?>>Administrador</option>
                                <option value="C" <?php echo isset($usuario) && $usuario->getPermissao() == 'Comum' ? 'selected' : ''; ?>>Comum</option>
                            </select>
                        </div>
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit" id="btnSalvar" name="btnSalvar">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
    
</body>
</html>
<?php
if(isset($_POST['btnSalvar'])){

    call_user_func(array('UsuarioController','salvar'));
    header('index.php?page=usuario&action=listar');
}
