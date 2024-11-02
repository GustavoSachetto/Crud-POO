<?php include_once __DIR__.'/../../config/define.php' ?>
<?php include '../layout/privateAdmin.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Departamento</title>
  <?php include '../layout/head.php' ?>
</head>
<body>
  <?php include '../../controller/deletaDepartamento.php'?>
  <header>
    <?php include '../layout/navbar.php' ?>
  </header>
  <main class="m-4 d-flex flex-column">
    <form action="" method="post" class="mb-3" style="width: 400px;">
      <h3 class="fw-normal">Departamento</h3>
      <fieldset class="mb-3">
        <label for="nome" class="form-label">Nome departamento</label>
        <?php if (isset($value)) { ?>
          <input 
            id="nome" 
            name="nome" 
            type="text" 
            class="form-control mb-2" 
            maxlength="50" 
            value="<?php echo $value[0]['nomeDepartamento'] ?>" 
            readonly
          >
          <button type="submit" class="btn btn-danger w-100">Deletar</button>
        <?php } ?>
      </fieldset>
    
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