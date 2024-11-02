<?php include_once __DIR__.'/../../config/define.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud POO | Login</title>
    <?php include '../layout/head.php' ?>
    <?php 
        include '../../controller/criaLogin.php'; 
        
        if (isset($_SESSION['usuario'])) header('Location: '.URL);
    ?>
</head>
<body>
    <header>
        <?php include '../layout/navbar.php' ?>
    </header>
    <main class="m-4 d-flex flex-column">
        <h3 class="fw-normal">Login</h3>
        <form method="post" action="" style="max-width: 400px; width:100%;" class="d-flex flex-column">
            <fieldset>
                <div class="mb-3">
                    <label for="email" class="form-label">Digite o seu email:</label>
                    <input 
                        type="email" 
                        name="email" 
                        class="form-control" 
                        aria-describedby="emailHelp" 
                        placeholder="example@email.com"
                    />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Digite sua senha:</label>
                    <input 
                        type="password"
                        name="password" 
                        class="form-control" 
                        placeholder="*****"
                    />
                </div>
            </fieldset>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </main>
    <?php include '../layout/footer.php' ?>
</body>
</html>