<nav class="navbar navbar-expand-lg navbar-light shadow">
  <div class="container d-flex justify-content-between align-items-center">
    <a class="navbar-brand text-success logo h1 align-self-center" href="">
      Imobiliária <br>Viver Bem
    </a>
    <a>Olá: <?php echo $_SESSION['login']; ?></a>
    <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
      <div class="flex-fill">
        <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Cadastrar
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="index.php?page=usuario">Usuário</a></li>
              <li><a class="dropdown-item" href="?page=imovel">Imóvel</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Listar
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="index.php?page=usuario&action=listar">Usuário</a></li>
              <li><a class="dropdown-item" href="index.php?page=imovel&action=listar">Imóvel</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sair.php">Sair</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>