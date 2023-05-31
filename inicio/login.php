<?php require_once ("../php/connect.php");?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<style>
		.error-message {
			color: red;
			font-size: 14px;
			margin-top: 5px;
		}
	</style>
	<title>Locadora Log In</title>
</head>

<body>
	<div id="container" class="container">
		<!-- formulário -->
		<div class="row">
			<div class="col align-items-center flex-col sign-up">
			</div>
			<!-- login -->
			<div class="col align-items-center flex-col sign-in">
				<div class="form-wrapper align-items-center">
					<form action="../php/login.php" method="POST" id="form">
						<div class="form sign-in">
							<div class="input-group">
            					<label for="username" class="label">Email</label>
								<input type="text" placeholder="Email" name="email_log" id="username">
            					<div class="error-message" id="username-error"></div>
							</div>
							<div class="input-group">
            					<label for="password" class="label">Senha</label>
								<input type="password" placeholder="Senha" name="senha_log" id="password">
            					<div class="error-message" id="password-error"></div>
							</div>
							<button name="entrar">Entrar</button>
						</div>
					</form>
				</div>
				<div class="form-wrapper">

				</div>
			</div>
			<!-- fim login -->
		</div>
		<!-- fim formulário -->
		<!-- conteúdo -->
		<div class="row content-row">
			<!-- conteúdo login -->
			<div class="col align-items-center flex-col">
				<div class="text sign-in">
					<h2>Bem-vindo usuário!</h2>
				</div>
				<div class="img sign-in" id="entrar">
					<img src="../images/sign-in.png"/>
				</div>
			</div>
			<!-- fim conteúdo login -->
		</div>
		<!-- fim conteúdo -->
	</div>
	<script src="../js/content.js"></script>
	<script>
		document.getElementById('form').addEventListener('submit', function(event) {
			document.getElementById('username-error').innerHTML = '';
			document.getElementById('password-error').innerHTML = '';

			var username = document.getElementById('username').value;
			var password = document.getElementById('password').value;

			if (username === '') {
				document.getElementById('username-error').innerHTML = 'Insira um email válido!';
				let el = document.getElementById('username');
            	el.style.borderColor = "#e74c3c";
				event.preventDefault(); 
			}

			if (password === '') {
				document.getElementById('password-error').innerHTML = 'Insira uma senha válida!';
				let el = document.getElementById('password');
            	el.style.borderColor = "#e74c3c";
				event.preventDefault(); 
			}
		});
	</script>
</body>

</html>