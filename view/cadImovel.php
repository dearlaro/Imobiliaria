<?php
require_once 'header.php';
?>
<div class="container">
    <form name="cadUsuario" id="cadUsuario" action="" method="post">
            <div class="card-header">
                <span class="card-title">Imóveis</span>
            </div>
            <div class="card-body">
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Descrição:</label>
                <input type="text" class="form-control col-sm-8" name="descricao" id="descricao" value="" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Valor:</label>
                <input type="text" class="form-control col-sm-8" name="valor" id="valor" value="" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Foto:</label>
                <input type="text" class="form-control col-sm-8" name="foto" id="foto" value="" />
            </div>
            <div class="form-group form-row">
            <label class="col-sm-2 col-form-label text-right">Tipo:</label>
                    <select name="tipo" id="tipo" class="form-control col-sm-8">
                        <option value="0"></option>
                        <option value="A">Apartamento</option>
                        <option value="C">Casa</option>
                    </select>
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-success" name="btnSalvar" id="btnSalvar">
            </div>
            <div class="form-group">
                <input type="hidden" name="id" id="id" value="<?php echo isset($imovel) ? $imovel->getId() : ''; ?>">
            </div>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php
if(isset($_POST['btnSalvar'])){
    call_user_func(array('ImovelController','salvar'));
    header('index.php?page=imovel&action=listar');
}