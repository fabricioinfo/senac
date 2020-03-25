<!DOCTYPE html>
<html>
<head>
	<title>Login Jovem Aprendiz Ponto</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="css/modelo.css">
	<link href="css/all.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/8dc76d55da.js" crossorigin="anonymous"></script>
	<script
  src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  <script src="js/bootstrap.js" ></script>
  <script type="text/javascript" src="js/login.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4 col-xl-4 offset-lg-4 offset-xl-4 col-md-8 offset-md-2">
				<form id="meu_login" class="box" autocomplete="off">
					<img src="img/logo.png" height="60px">
					<h3>LOGIN INSTRUTORES</h3>
					<input autocomplete="off" type="text" name="user" class="field-no-complete" placeholder="Nome de Usuário">
					<input autocomplete="off" type="password" class="field-no-complete" name="pass" placeholder="Senha">
					<button class="btn-senac" type="submit">Fazer Login</button>
				</form>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-4 col-xl-4 offset-lg-4 offset-xl-4 col-md-8 offset-md-2">
				<?php
					include 'include/loadingSpinner.php';
				?>
			</div>
		</div>
	</div>
</body>
</html>