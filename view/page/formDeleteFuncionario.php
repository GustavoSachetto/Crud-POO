<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Funcionário</title>
  <?php include '../layout/head.php' ?>
  <?php include '../layout/privateAdmin.php' ?>
</head>
<body>
  <?php include '../../controller/deletaFuncionario.php'?>
  <header>
    <?php include '../layout/navbar.php' ?>
  </header>
  <main class="m-4 d-flex flex-column">
    <form action="" method="post" class="mb-3" style="width: 400px;">
      <h3 class="fw-normal">Funcionário</h3>
        <?php if (isset($value)) {?>
          <fieldset class="mb-2">
            <label for="nome" class="form-label">Nome Funcionario</label>
            <input id="nome" name="nome" type="text" class="form-control" maxlength="40" value="<?= $value[0]['nome']?>" readonly>
          </fieldset>
          <fieldset class="mb-2">
            <label for="cpf" class="form-label">CPF</label>
            <input id="cpf" name="cpf" type="text" class="form-control" maxlength="11" value="<?= $value[0]['cpf']?>" readonly>
          </fieldset>
          <fieldset class="mb-2">
            <label for="telefone" class="form-label">Telefone</label>
            <input id="telefone" name="telefone" type="text" class="form-control" maxlength="15" value="<?= $value[0]['telefone']?>" readonly>
          </fieldset>
          <fieldset class="mb-2">
            <label for="endereco" class="form-label">Endereço</label>
            <input id="endereco" name="endereco" type="text" class="form-control" maxlength="70" value="<?= $value[0]['endereco']?>" readonly>
          </fieldset>
          <fieldset class="mb-2">
            <label for="nomeDepartamento" class="form-label">Departamento</label>
            <input id="nomeDepartamento" name="nomeDepartamento" type="text" class="form-control" maxlength="50" value="<?= $value[0]['nomeDepartamento']?>" readonly>
          </fieldset>
          <fieldset class="mb-3">
            <label for="nomeCargo" class="form-label">Cargo</label>
            <input id="nomeCargo" name="nomeCargo" type="text" class="form-control" maxlength="50" value="<?= $value[0]['nomeCargo']?>"  readonly>
          </fieldset>
          <button type="submit" class="btn btn-danger w-100">Deletar</button>
        <?php } ?>
      
    </form>
    <?php if (isset($result) && $result) { ?>
      <section class="position-relative" style="width: 400px;">
        <div class="alert alert-success alert-dismissible fade show position-absolute w-100" role="alert">
          <span>Deletado com sucesso!</span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </section>
    <?php } else if (isset($result) && !$result) { ?>
      <section class="position-relative" style="width: 400px;">
        <div class="alert alert-danger alert-dismissible fade show position-absolute w-100" role="alert">
          <span>Erro ao deletar!</span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </section>
    <?php } ?>
  </main>
  <?php include '../layout/footer.php' ?>
</body>
</html>