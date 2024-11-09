<?php include_once __DIR__.'/../../config/define.php' ?>
<?php include '../layout/private.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Funcionário Logado</title>
  <script src="../js/datetime.js"></script>
  <script src="../js/cpf.js" defer></script>
  <script src="../js/phone.js" defer></script>
  <?php include '../layout/head.php' ?>
</head>
<body>
  <?php include '../../controller/editaFuncionarioLogado.php'?>
  <?php include '../../controller/exibeCargo.php'?>
  <?php include '../../controller/exibeDepartamento.php'?>
  <header>
    <?php include '../layout/navbar.php' ?>
  </header>
  <main class="m-4 d-flex flex-column">
    <form action="" method="post" class="mb-3" style="width: 400px;" enctype="multipart/form-data">
      <h3 class="fw-normal">Funcionario</h3>
      <?php if (isset($value)) {?>
        <fieldset class="mb-2">
          <label for="nome" class="form-label">Nome Funcionario</label>
          <input id="nome" name="nome" type="text" class="form-control" maxlength="40" value="<?= $value[0]['nome']?>" required>
        </fieldset>
        <fieldset class="mb-2">
          <label for="cpf" class="form-label">CPF</label>
          <input id="cpf" name="cpf" type="text" class="form-control" maxlength="14" value="<?=$value[0]['cpf']?>" required readonly>
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
        <label for="image_url" class="form-label">Imagem do funcionario</label>
        <input type="file" id="image_url" name="image_url" class="form-control" placeholder="Inserir uma nova imagem">
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
        <label for="nome" class="form-label">Data e hora da alteração</label>
        <input type="datetime-local" id="datetime" name="datetime" class="form-control" readonly>
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
    <?php if (isset($result) && $result) { ?>
      <section class="position-relative" style="width: 400px;">
        <div class="alert alert-success alert-dismissible fade show position-absolute w-100" role="alert">
          <span>Editado com sucesso!</span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </section>
    <?php } else if (isset($result) && !$result) { ?>
      <section class="position-relative" style="width: 400px;">
        <div class="alert alert-danger alert-dismissible fade show position-absolute w-100" role="alert">
          <span>Erro ao editar!</span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </section>
    <?php } ?>
  </main>
  <?php include '../layout/footer.php' ?>
</body>
</html>