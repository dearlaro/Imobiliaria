<?php
require_once 'header.php';
?>
<h1>Imóveis</h1>
<hr />
<div>
    <table class="table table-bordered table-striped" style="top:40px;">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Tipo</th>
                <th><a href="index.php?page=imovel&action=cadImovel">Novo</a>
            </tr>
        </thead>
        <tbody>
            <?php
            $imoveis = call_user_func(array('ImovelController', 'listar'));
            if (isset($imoveis) && !empty($imoveis)) {
                foreach ($imoveis as $imovel) {
            ?>
                    <tr>
                        <td><?php echo $imovel->getDescricao(); ?></td>
                        <td><?php echo $imovel->getTipo(); ?></td>
                        <td>
                            <a href="index.php?page=imovel&action=editar&id=<?php echo $imovel->getId(); ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="index.php?page=imovel&action=excluir&id=<?php echo $imovel->getId(); ?>" class="btn btn-primary btn-sm">Excluir</a>
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
