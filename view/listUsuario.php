
<div class="container">

<a class="navbar-brand text-success logo h1 ">
      Usuários
    </a>
<table class="table table-bordered table-striped" style="top:40px;">
        <thead>
            <tr>
                <th>Login</th>
                <th>Permissão</th>
                <th><a href="index.php?page=usuario">Novo</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            //importa o UsuarioController.php
            require_once 'controller/UsuarioController.php';
            //Chama uma função PHP que permite informar a classe e o Método que será acionado
            $usuarios = call_user_func(array('UsuarioController','listar'));
            //Verifica se houve algum retorno
            if (isset($usuarios) && !empty($usuarios)) {
                foreach ($usuarios as $usuario) {
                    ?>
                    <tr>
                        <!-- Como o retorno é um objeto, devemos chamar os get para mostrar o resultado -->
                        <td><?php echo $usuario->getLogin(); ?></td>
                        <td><?php echo $usuario->getPermissao();?></td>
                        <td>
                            <a href="index.php?action=editar&id=<?php echo $usuario->getId();?>&page=usuario" class="btn btn-outline-success">Editar</a>
                            <a href="index.php?action=excluir&id=<?php echo $usuario->getId();?>&page=usuario" class="btn btn-outline-danger">Excluir</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="3">Nenhum registro encontrado</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>


