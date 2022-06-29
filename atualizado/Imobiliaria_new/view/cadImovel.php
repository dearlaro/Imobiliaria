<?php
require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CadImovel</title>
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
                    <h2 class="title">Cadastrar Imóveis</h2><br><br><br>
                </div>
                <form name="cadUsuario" id="cadUsuario" action="" method="post">
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Descrição" id="descricao" name="descricao">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Valor" id="valor" name="valor">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Foto" id="foto" name="foto">
                        </div>
                        <div class="form-group form-row">
                                <p class="input--style-2">Tipo:</p>
                                <select name="tipo" id="tipo" class="input--style-2">
                                    <option value="0"></option>
                                    <option value="A">Apartamento</option>
                                    <option value="C">Casa</option>
                                </select>
                        </div>
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit" id="btnSalvar" name="btnSalvar">Enviar</button>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="<?php echo isset($imovel) ? $imovel->getId() : ''; ?>">
                        </div>
                    </div>
                </form>
            </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php
if(isset($_POST['btnSalvar'])){
    call_user_func(array('ImovelController','salvar'));
    header('index.php?page=imovel&action=listar');
}
