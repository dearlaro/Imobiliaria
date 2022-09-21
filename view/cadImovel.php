<?php
ob_start();
?>
<div class="container">
        <form name="cadImovel" id="cadImovel" action="" method="post" enctype="multipart/form-data">
            <div class="card" style="top:40px">
                <div class="card-header">
                    <span class="card-title">Imovéis</span>
                </div>
                <div class="card-body">
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Descrição:</label>
                    <textarea class="form-control col-sm-8" name="descricao" id="descricao"><?php echo isset($imovel)?$imovel->getDescricao():''; ?></textarea>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Foto:</label>
                    <input type="file" class="form-control col-sm-8" name="foto" id="foto"/>
                </div>
                <?php
                    if(isset($imovel) && !empty($imovel->getPath())){
                ?>
                <div class="form-group form-row">
                    <div class="text-center">
                    <?php echo '<p align="center"><img class="img-thumbnail" style="width: 500px; height:250px" src="data:'.$imovel->getFotoTipo().';base64,'.base64_encode($imovel->getFoto()).'"></p><br>';;?>
                    </div>
                </div>
                <?php
                    }
                ?>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Valor:</label>
                    <input type="text" class="form-control col-sm-8" name="valor" id="valor"
                    value="<?php echo isset($imovel)?$imovel->getValor():'';?>" />
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Tipo:</label>
                    <select name="tipo" id="tipo" class="form-control col-sm-8">
                        <option value="0"></option>
                        <option value="A"<?php echo isset($imovel) && $imovel->getTipo()=='A'?'selected':'';?>>Alugar</option>
                        <option value="V"<?php echo isset($imovel) && $imovel->getTipo()=='V'?'selected':'';?>>Vender</option>
                    </select>
                </div>
                <div class="card-footer">
                    <input type="hidden" name="id" id="id" value="<?php echo isset($imovel)?$imovel->getId():''; ?>" />
                    <input type="hidden" name="path" id="path" value="<?php echo isset($imovel)?$imovel->getPath():''; ?>" />
                    <input type="submit" class="btn btn-success" name="btnSalvar" id="btnSalvar">
                </div>
            </div>
        </form>
    </div>


<?php

//Verifica se o botão submit foi acionado
if(isset($_POST['btnSalvar'])){

    //Chama uma função PHP que permite informar a classe e o Método que será acionado
    if(isset($imovel)){
        call_user_func(array('ImovelController','salvar'),$imovel->getFoto(),$imovel->getFotoTipo());
    }else{
        call_user_func(array('ImovelController','salvar'));
    }

    header('Location: index.php?action=listar&page=imovel');
}

ob_end_flush();

?>