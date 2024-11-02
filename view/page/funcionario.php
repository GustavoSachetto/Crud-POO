<?php include_once __DIR__.'/../../config/define.php' ?>

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
  <?php include '../../controller/exibeFuncionario.php'?> 
  <?php include_once '../../controller/DateFormatter.php' ?>
  <?php include_once '../../controller/CpfFormatter.php' ?>
  <?php include_once '../../controller/PhoneFormatter.php' ?>
  <header>
    <?php include '../layout/navbar.php' ?>
  </header>
  <main class="m-4 d-flex flex-column">
    <article>
      <h3 class="fw-normal">Funcionário</h3>
      <section class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">Foto</th>
              <th scope="col">Cpf</th>
              <th scope="col">Telefone</th>
              <th scope="col">Endereço</th>
              <th scope="col">Data de criação</th>
              <th scope="col">Data da última alteração</th>
              <th scope="col">Departamento</th>
              <th scope="col">Cargo</th>
              <th scope="col">Opções</th>
            </tr>
          </thead>
          <tbody>
          <?php if (isset($result) && count($result) > 0): ?>
            <?php foreach ($result as $value): ?>
                <tr>
                    <th scope="row"><?= $value['funcional'] ?></th>
                    <td><?= $value['nome'] ?></td> 
                    <td> <img src="<?= URL. "/" . $value['image_url']?>" style="border-radius:13px;" alt="foto do funcionario" width="100" /></td>
                    <td><?= $value['cpf'] ?></td>
                    <td><?= $value['telefone'] ?></td>
                    <td><?= $value['endereco'] ?></td>
                    <td><?= DateFormatter::format($value['created_at']) ?></td>
                    <td><?= empty($value['updated_at']) ? 'Nunca alterado' : DateFormatter::format($value['updated_at']) ?></td>
                    <td><?= $value['nomeDepartamento'] ?></td>
                    <td><?= $value['nomeCargo'] ?></td>
                    <td>
                        <form action="formEditFuncionario.php" method="get">
                            <button 
                                type="submit" 
                                name="cod"
                                class="btn btn-sm btn-warning my-2" 
                                data-bs-toggle="modal" 
                                data-bs-target="#formEdit" 
                                value="<?= $value['funcional'] ?>"
                            >
                                Editar
                            </button>
                        </form>
                        <form action="formDeleteFuncionario.php" method="get">
                            <button 
                                type="submit" 
                                name="cod"
                                class="btn btn-sm btn-danger my-2" 
                                data-bs-toggle="modal" 
                                data-bs-target="#formDelete" 
                                value="<?= $value['funcional'] ?>"
                            >
                                Deletar
                            </button>
                        </form>
                        <form action="relatorioFuncionario.php" method="get">
                            <button 
                                type="submit" 
                                name="cod"
                                class="btn btn-sm btn-primary mt-2" 
                                data-bs-toggle="modal" 
                                data-bs-target="#formDelete" 
                                value="<?= $value['funcional'] ?>"
                            >
                                Relatório
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="11">
                <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                    <span>Nenhum funcionário cadastrado!</span>
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
