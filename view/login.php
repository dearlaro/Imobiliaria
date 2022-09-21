
<nav class="navbar navbar-expand-lg navbar-light shadow">
  <div class="container d-flex justify-content-between align-items-center">
    <a class="navbar-brand text-success logo h1 align-self-center" href="">
      Imobiliária <br>Viver Bem
    </a>
    <a class="navbar-brand text-success logo h3 align-self-center">
      Realize seu Login
    </a>
  </div>
</nav>

    <div class="container py-5">
        <div class="row py-5">
            <form class="col-md-9 m-auto" name="cadLogin" id="cadLogin" action="" method="post">
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname">Usuário</label>
                        <input type="text" class="form-control mt-1" name="login" id="login" value="" />
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail">Senha</label>
                        <input type="password" class="form-control mt-1" name="senha" id="senha" value="" />
                    </div>
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3" name="btnLogar" id="btnLogar" value="Logar">Entrar</button>
                    </div>
                </div>
            </form>
        </div>
</div>

<?php

if(isset($_POST['btnLogar'])){

    $_SESSION['logado'] = call_user_func(array('UsuarioController','logar'));
    $_SESSION['login'] = $_POST['login'];
    header('Location: index.php');
}
