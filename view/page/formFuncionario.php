<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Funcionário</title>
  <?php include '../layout/head.php' ?>
  <?php include '../layout/privateAdmin.php' ?>
  <script src="../js/datetime.js" defer></script>
  <script src="../js/cpf.js" defer></script>
  <script src="../js/phone.js" defer></script>
</head>
<body>
	<?php include '../../controller/recebeFuncionario.php' ?>
	<?php include '../../controller/exibeDepartamento.php' ?>
	<?php include '../../controller/exibeCargo.php' ?>
	<header>
		<?php include '../layout/navbar.php' ?>
	</header>
	<main class="m-4 d-flex flex-column">
		<form action="" method="post" class="mb-3" style="width: 400px;" enctype="multipart/form-data">
			<h3 class="fw-normal">Funcionario</h3>
			<fieldset>
				<div class="mb-2">
					<label for="nome" class="form-label">Nome</label>
					<input 
						type="text" 
						id="nome" 
						name="nome" 
						class="form-control" 
						maxlength="40" 
						placeholder="Nome" 
						required
					/>
				</div>
				<div class="mb-2">
					<label for="cpf" class="form-label">CPF</label>
					<input 
						type="text" 
						id="cpf" 
						name="cpf" 
						class="form-control" 
						maxlength="14" 
						placeholder="CPF" 
						required 
					/>
				</div>
				<div class="mb-2">
					<label for="telefone" class="form-label">Telefone</label>
					<input 
						type="tel" 
						id="telefone" 
						name="telefone" 
						class="form-control" 
						maxlength="15" 
						placeholder="Telefone"
					/>
				</div>
				<div class="mb-2">
					<label for="endereco" class="form-label">Endereço</label>
					<input 
						type="text" 
						id="endereco" 
						name="endereco" 
						class="form-control" 
						maxlength="70" 
						placeholder="Endereço" 
						required
					/>
				</div>
				<div class="mb-2">
					<label for="image_url" class="form-label">Imagem do funcionario</label>
					<input 
						type="file" 
						id="image_url" 
						name="image_url" 
						class="form-control" 
						placeholder="Imagem do funcionário"
					/>
				</div>
				<div class="mb-2">
					<label for="codDepartamento" class="form-label">Departamento</label>
					<select 
						name="codDepartamento" 
						class="form-select" 
						required
					>
					<?php foreach ($resultDepartamento as $values) { ?>
						<option value="<?= $values['codDepartamento'] ?>"><?= $values['nomeDepartamento'] ?></option>
					<?php } ?>
					</select>
				</div>
				<div class="mb-3">
					<label for="codCargo" class="form-label">Cargo</label>
					<select 
						name="codCargo" 
						class="form-select" 
						required
					>
					<?php foreach ($resultCargo as $values) { ?>
						<option value="<?= $values['codCargo'] ?>"><?= $values['nomeCargo'] ?></option>
					<?php } ?>
					</select>
				</div>
				<hr>
				<div class="mb-2">
					<label for="email">Email</label>
	                <input 
                        type="email" 
                        name="email" 
                        class="form-control" 
                        aria-describedby="emailHelp" 
                        placeholder="example@email.com"
                    />
				</div>
				<div class="mb-2">
                    <label for="password" class="form-label">Digite sua senha:</label>
                    <input 
                        type="password"
                        name="password" 
                        class="form-control" 
                        placeholder="*****"
                    />
                </div>
				<div class="mb-2">
					<label for="datetime">Horário de criação</label>
					<input 
						type="datetime-local" 
						id="datetime" 
						name="datetime" 
						class="form-control" 
						readonly 
					/>
				</div>
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
		<?php } else if (isset($result) && !$result) { ?>
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