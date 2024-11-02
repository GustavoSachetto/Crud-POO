<?php include_once __DIR__.'/../../config/define.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Funcionário</title>
    <?php include '../layout/head.php' ?>
    <?php include '../layout/privateAdmin.php' ?>
    
    <?php include '../../controller/DateFormatter.php' ?>
    <?php include '../../controller/CpfFormatter.php' ?>
    <?php include '../../controller/PhoneFormatter.php' ?>
    <link rel="stylesheet" href="../css/relatorio.css">
</head>

<body>
    <header>
        <?php include '../layout/navbar.php' ?>
    </header>
    <?php require_once '../../controller/relatorioFuncionario.php'; ?>
    <main class="container">
    <h3 class="fw-normal mt-4">Relatório</h3>
        <div class="report">
            <div class="report-details">
                <img src="<?= URL. "/" . $value[0]['image_url'] ?>" style="border-radius:7px;" alt="foto do funcionario" />
                <ul>
                    <li>
                        <span>
                            <strong class="fw-medium">Nome: </strong>
                            <?= $value[0]['nome'] ?>
                        </span>                        
                    </li>
                    <li>
                        <span>
                            <strong class="fw-medium">Cpf: </strong>
                            <?= $value[0]['cpf'] ?>
                        </span>                        
                    </li>
                    <li>
                        <span>
                            <strong class="fw-medium">Telefone: </strong>
                            <?= $value[0]['telefone'] ?>
                        </span> 
                  
                    </li>
                    <li>
                        <span>
                            <strong class="fw-medium">Endereço: </strong>
                            <?= $value[0]['endereco'] ?>
                        </span> 
                    </li>
                    <li>
                        <span>
                            <strong class="fw-medium">Cargo: </strong>
                            <?= $value[0]['nomeCargo'] ?>
                        </span> 
                    </li>
                    <li>
                        <span>
                            <strong class="fw-medium">Departamento: </strong>
                            <?= $value[0]['nomeDepartamento'] ?>
                        </span> 
                    </li>
                    <li>
                        <span>
                            <strong class="fw-medium">Salário: </strong>
                            R$ <?= number_format((float)$value[0]['salario'], 2, ',', '.') ?>
                        </span> 
                    </li>
                    <li>
                        <span>
                            <strong class="fw-medium">Data de criação: </strong>
                            <?= DateFormatter::format($value[0]['created_at']) ?>
                        </span> 
                    </li>
                    <li>
                        <span>
                            <strong class="fw-medium"> Data da ultima alteração: </strong>
                            <?= empty($value[0]['updated_at']) 
                                ? 'Nunca alterado' 
                                : DateFormatter::format($value[0]['updated_at']) ?>
                        </span> 
                    </li>
                </ul>
            </div>
        </div>
    </main>
    <?php include '../layout/footer.php' ?>
</body>

</html>