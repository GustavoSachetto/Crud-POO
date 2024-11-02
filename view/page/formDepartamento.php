<?php include_once __DIR__.'/../../config/define.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Departamento</title>
  <?php include '../layout/head.php' ?>
  <?php include '../layout/privateAdmin.php' ?>
  <script src="../js/datetime.js"></script>
</head>
<body>
  <?php include '../../controller/recebeDepartamento.php'?>
  <header>
    <?php include '../layout/navbar.php' ?>
  </header>
  <main class="m-4 d-flex flex-column">
    <form action="" method="post" class="mb-3" style="width: 400px;">
      <h3 class="fw-normal">Departamento</h3>
      <fieldset class="mb-3">
        <label for="nome" class="form-label">Nome departamento</label>
        <input type="text" id="nome" name="nome" class="form-control" maxlength="45" placeholder="Departamento" required>
      </fieldset>
      <fieldset class="mb-2">
        <label for="datetime">Horário de criação</label>
        <input type="datetime-local" id="datetime" name="datetime" class="form-control" readonly>
      </fieldset>
      <button type="submit" class="btn btn-success w-100">Cadastrar</button>
    </form>
    <?php if (isset($result) && $result) { ?>
      <section class="position-relative" style="width: 400px;">
        <div class="alert alert-success alert-dismissible fade show position-absolute w-100" role="alert">
          <span>Cadastrado com sucesso!</span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </section>
    <?php }  else if (isset($result) && !$result) { ?> 
      <section class="position-relative" style="width: 400px;">
        <div class="alert alert-danger alert-dismissible fade show position-absolute w-100" role="alert">
          <span>Erro ao cadastrar!</span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </section>
    <?php } ?>
  </main>
  <?php include '../layout/footer.php' ?>
</body>
</html>