<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Funcionário</title>

  <!-- Google fonts (Fira Sans) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wdth,wght@0,75..100,300..800;1,75..100,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- Link Css -->
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <?php include '../../controller/editaFuncionario.php'?>
  <?php include '../../controller/exibeCargo.php'?>
  <?php include '../../controller/exibeDepartamento.php'?>
  <header>
    <nav class="navbar navbar-expand-lg bg-dark-subtle shadow-sm">
      <div class="container-fluid">
        <a class="navbar-brand" href="../../index.html">Atividade POO</a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Cargo</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="cargo.php">Buscar</a></li>
                <li><a class="dropdown-item" href="formCargo.php">Cadastrar</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Departamento</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="departamento.php">Buscar</a></li>
                <li><a class="dropdown-item" href="formDepartamento.php">Cadastrar</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Funcionario</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="funcionario.php">Buscar</a></li>
                <li><a class="dropdown-item" href="formFuncionario.php">Cadastrar</a></li>
              </ul>
            </li>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <main class="m-4 d-flex flex-column">
    <form action="" method="post" class="mb-3" style="width: 400px;">
      <h3 class="fw-normal">Funcionario</h3>
      <?php if (isset($value)) {?>
        <fieldset class="mb-2">
          <label for="nome" class="form-label">Nome Funcionario</label>
          <input id="nome" name="nome" type="text" class="form-control" maxlength="40" value="<?= $value[0]['nome']?>" required>
        </fieldset>
        <fieldset class="mb-2">
          <label for="cpf" class="form-label">CPF</label>
          <input id="cpf" name="cpf" type="text" class="form-control" maxlength="11" value="<?= $value[0]['cpf']?>" required>
        </fieldset>
        <fieldset class="mb-2">
          <label for="telefone" class="form-label">Telefone</label>
          <input id="telefone" name="telefone" type="text" class="form-control" maxlength="15" value="<?= $value[0]['telefone']?>" required>
        </fieldset>
        <fieldset class="mb-2">
          <label for="endereco" class="form-label">Endereço</label>
          <input id="endereco" name="endereco" type="text" class="form-control" maxlength="70" value="<?= $value[0]['endereco']?>" required>
        </fieldset>
        <fieldset class="mb-2">
          <label for="codDepartamento" class="form-label">Departamento (Atual: <?= $value[0]['nomeDepartamento'] ?>)</label>
          <select name="codDepartamento" class="form-select" required>
            <?php foreach ($resultDepartamento as $values) {?>
                <option value="<?= $values['codDepartamento']?>"><?= $values['nomeDepartamento']?> </option>
            <?php } ?>
          </select>
        </fieldset>
        <fieldset class="mb-3">
          <label for="codCargo" class="form-label">Cargo (Atual: <?= $value[0]['nomeCargo'] ?>)</label>
          <select name="codCargo" class="form-select" required>
            <?php foreach ($resultCargo as $values) {?>
                <option value="<?= $values['codCargo']?>"><?= $values['nomeCargo']?> </option>
            <?php } ?>
          </select>
        </fieldset>
      <?php } ?>
      <button type="submit" class="btn btn-warning w-100">Editar</button>
    </form>
    <?php if (isset($result) && $result) { echo '
      <section class="position-relative" style="width: 400px;">
        <div class="alert alert-success alert-dismissible fade show position-absolute w-100" role="alert">
          <span>Editado com sucesso!</span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </section>
    '; } else if (isset($result) && !$result) { echo '
      <section class="position-relative" style="width: 400px;">
        <div class="alert alert-danger alert-dismissible fade show position-absolute w-100" role="alert">
          <span>Erro ao editar!</span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </section>
    '; } ?>
  </main>
  <footer class="navbar navbar-expand-lg bg-dark-subtle fixed-bottom shadow-sm">
    <nav class="d-flex justify-content-center container-fluid">
      <span class="nav-link">
        Criado por: <a href="#">Gustavo Sachetto</a> e <a href="#">Gustavo Gualda</a>
      </span>
    </nav>
  </footer>
</body>
</html>