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
  <?php include '../../controller/exibeDepartamento.php'?>
  <?php include_once '../../controller/DateFormatter.php' ?>
  <header>
    <?php include '../layout/navbar.php' ?>
  </header>
  <main class="m-4 d-flex flex-column">
    <article>
      <h3 class="fw-normal">Departamento</h3>

      <section class="table-responsive">
        <table class="table table-striped table-responsive">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">Data e Hora de criação</th>
              <th scope="col">Data e Hora da última atualização</th>
              <th scope="col">Opções</th>
            </tr>
          </thead>
          <tbody>
          <?php if (isset($resultDepartamento) && count($resultDepartamento) > 0): ?>
            <?php foreach ($resultDepartamento as $value): ?>
                <tr>
                    <th scope="row"><?= $value['codDepartamento'] ?></th>
                    <td><?= $value['nomeDepartamento'] ?></td>
                    <td><?= DateFormatter::format($value['created_at']) ?></td>
                    <td><?= empty($value['updated_at']) ? 'Nunca alterado' : DateFormatter::format($value['updated_at']) ?></td>
                    <td class="d-flex">
                        <form action="formEditDepartamento.php" method="get">
                            <button 
                                type="submit" 
                                name="cod"
                                class="btn btn-sm btn-warning me-2" 
                                data-bs-toggle="modal" 
                                data-bs-target="#formEdit" 
                                value="<?= $value['codDepartamento'] ?>"
                            >
                                Editar
                            </button>
                        </form>
                        <form action="formDeleteDepartamento.php" method="get">
                            <button 
                                type="submit" 
                                name="cod"
                                class="btn btn-sm btn-danger" 
                                data-bs-toggle="modal" 
                                data-bs-target="#formDelete" 
                                value="<?= $value['codDepartamento'] ?>"
                            >
                                Deletar
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5">
                <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                    <span>Nenhum departamento encontrado!</span>
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
