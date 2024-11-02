<?php include_once __DIR__.'/../../config/define.php' ?>
<?php include '../layout/privateAdmin.php'; var_dump($_SESSION); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cargo</title>
  <?php include '../layout/head.php' ?>
</head>
<body>
  <?php include '../../controller/exibeCargo.php'?>
  <?php include_once '../../controller/DateFormatter.php' ?>
  <header>
    <?php include '../layout/navbar.php' ?>
  </header>
  <main class="m-4 d-flex flex-column ">
    <article>
      <h3 class="fw-normal">Cargo</h3>

      <section class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Salário</th>
                <th scope="col">Data e Hora de criação</th>
                <th scope="col">Data e Hora da última atualização</th>
                <th scope="col">Opções</th>
              </tr>
            </thead>
            <tbody>
            <?php if (isset($resultCargo) && count($resultCargo) > 0): ?>
              <?php foreach ($resultCargo as $value): ?>
                  <tr>
                      <th scope="row"><?= $value['codCargo'] ?></th>
                      <td><?= $value['nomeCargo'] ?></td>
                      <td>R$ <?= number_format((float)$value['salario'], 2, ',', '.') ?></td>
                      <td><?= DateFormatter::format($value['created_at']) ?></td>
                      <td><?= empty($value['updated_at']) ? 'Nunca alterado' : DateFormatter::format($value['updated_at']) ?></td>
                      <td class="d-flex">
                          <form action="formEditCargo.php" method="get">
                              <button 
                                  type="submit" 
                                  name="cod"
                                  class="btn btn-sm btn-warning me-2" 
                                  data-bs-toggle="modal" 
                                  data-bs-target="#formEdit" 
                                  value="<?= $value['codCargo'] ?>"
                              >
                                  Editar
                              </button>
                          </form>
                          <form action="formDeleteCargo.php" method="get">
                              <button 
                                  type="submit" 
                                  name="cod"
                                  class="btn btn-sm btn-danger" 
                                  data-bs-toggle="modal" 
                                  data-bs-target="#formDelete" 
                                  value="<?= $value['codCargo'] ?>"
                              >
                                  Deletar
                              </button>
                          </form>
                      </td>
                  </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="6">
                  <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                      <span>Nenhum cargo encontrado!</span>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                </td>
              </tr>
            <?php endif; ?>
            </tbody>
          </table>
      </section>
    </article>
  </main>
  <?php include '../layout/footer.php' ?>
</body>
</html>
