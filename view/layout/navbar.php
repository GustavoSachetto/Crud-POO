<?php include_once __DIR__.'../../../controller/removeLogin.php' ?>
<script src="<?= URL."/view/js/logout.js"?>" defer></script>

<nav class="navbar navbar-expand-lg bg-dark-subtle shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= URL ?>/">Atividade POO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="menu-icon">
        <path d="M 4 5 H 20 A 1 1 0 1 1 20 7 H 4 A 1 1 0 1 1 4 5 Z M 4 11 H 20 A 1 1 0 1 1 20 13 H 4 A 1 1 0 1 1 4 11 Z M 4 17 H 20 A 1 1 0 1 1 20 19 H 4 A 1 1 0 1 1 4 17 Z"></path>
      </svg>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item dropdown mx-2">
          <a class="nav-link dropdown-toggle" href="#" id="cargoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cargo
          </a>
          <ul class="dropdown-menu" aria-labelledby="cargoDropdown">
            <li><a class="dropdown-item" href="<?= URL ?>/view/page/cargo.php">Buscar</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>/view/page/formCargo.php">Cadastrar</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown mx-2">
          <a class="nav-link dropdown-toggle" href="#" id="departamentoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Departamento
          </a>
          <ul class="dropdown-menu" aria-labelledby="departamentoDropdown">
            <li><a class="dropdown-item" href="<?= URL ?>/view/page/departamento.php">Buscar</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>/view/page/formDepartamento.php">Cadastrar</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown mx-2">
          <a class="nav-link dropdown-toggle" href="#" id="funcionarioDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Funcionário
          </a>
          <ul class="dropdown-menu" aria-labelledby="funcionarioDropdown">
            <li><a class="dropdown-item" href="<?= URL ?>/view/page/funcionario.php">Buscar</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>/view/page/formFuncionario.php">Cadastrar</a></li>
          </ul>
        </li>
        <?php if (isset($_SESSION['usuario'])): ?>
            <button type="button" style="border: none;background: transparent;" id="logout">Sair</button>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
