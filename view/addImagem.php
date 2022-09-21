<?php
ob_start();
$imagens = call_user_func(array('GaleriaController', 'listar'));

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
<div class="container">
    <form name="addImagem" id="addImagem" action="" method="post" enctype="multipart/form-data">
        <div class="card" style="top:40px">


            <div class="card-header">
                <span class="card-title">Imagens</span>
            </div>
            <?php
            echo '<p align="center"><img class="img-thumbnail" style="width: 500px; height:250px" src="data:' . $imovel->getFotoTipo() . ';base64,' . base64_encode($imovel->getFoto()) . '"></p><br>';;
            ?>
            <div class="card-body">
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Foto:</label>
                <input type="file" multiple="multiple" class="form-control col-sm-8" name="foto" id="foto" />

            </div>
            <input type="hidden" name="idImovel" id="idImovel" value="<?php echo $imovel->getId(); ?>" />
            <table class="table" style="top:40px;">
                <tbody>
                    <?php
                    $cont = 0;
                    foreach ($imagens as $galeria) {
                        if($imovel->getId() == $galeria->getIdImovel()){
                            if($galeria->getArquivo() != null){
                        if ($cont == 0) {
                            echo '<tr>';
                        }
                        echo '<p align="center"><img class="img-thumbnail" style="width: 500px; height:250px" src="'.$galeria->getArquivo().'"></p><br>';;

                        if ($cont == 4)
                            $cont = 0;
                        }
                    }
                }
                    ?>
                </tbody>
            </table>
            <div class="row">
            <div class="col text-end mt-2">
                <button type="submit" class="btn btn-success btn-lg px-3" name="btnSalvar" id="btnSalvar" value="Salvar">Salvar</button>
            </div>
        </div>
        </div>
        

</div>
</form>
</div>

<?php
//Verifica se o botão submit foi acionado
if (isset($_POST['btnSalvar'])) {

    //Chama uma função PHP que permite informar a classe e o Método que será acionado

    call_user_func(array('GaleriaController', 'salvar'));


    header('Location: index.php?action=listar&page=imovel');
}

ob_end_flush();

?>