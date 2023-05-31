<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Cadastro de Editoras</title>
	<style>
		.error-message {
			color: red;
			font-size: 14px;
			margin-top: 5px;
		}
	</style>
</head>

<body>
	<div class="form_wrapper">
		<div class="form_container">
			<div class="title_container">
				<h2>Cadastro de Editoras</h2>
			</div>
			<a href="../site/editora.php"><img src="../images/delete.png"
					style="width: 20px; float: right; margin-top: -50px;"></a>
			<div class="row clearfix">
				<div class="">

					<form action="./add/add_editora.php" method="POST" id="formulario">
						<div class="input_field">
							<label for="nome">Nome</label>
							<input type="text" name="nome" id="nome" placeholder="Nome" />
							<div class="error-message" id="nome-error"></div>
						</div>
						<div class="input_field">
							<label for="email">Email</label>
							<input type="email" name="email" id="email" placeholder="Email" />
							<div class="error-message" id="email-error"></div>
						</div>
						<div class="input_field">
							<label for="telefone">Telefone</label>
							<input type="text" name="telefone" id="cel" placeholder="Telefone" maxlength="15" autocomplete="off" onkeyup="mascara_cel()" >
							<div class="error-message" id="celular-error"></div>
						</div>
						<div class="input_field">
							<label for="site_edi">Site</label>
							<input type="text" name="site_edi" id="site" placeholder="Site" />
						</div>
				</div>
				<input class="button" type="submit" value="Cadastrar" />
				</form>
			</div>
		</div>
	</div>
	</div>
	<script>

		document.getElementById('formulario').addEventListener('submit', function (event) {
			// Remove mensagens de erro anteriores
			document.getElementById('nome-error').innerHTML = '';
			document.getElementById('email-error').innerHTML = '';
			document.getElementById('celular-error').innerHTML = '';

			// Obtém os valores dos campos de entrada
			var nome = document.getElementById('nome').value;
			var email = document.getElementById('email').value;
			var cel = document.getElementById('cel').value;

			// Verifica se os campos estão vazios
			if (nome === '') {
				document.getElementById('nome-error').innerHTML = 'Por favor, insira o nome.';
				event.preventDefault(); // Impede o envio do formulário
				let el = document.getElementById('nome');
				el.style.borderColor = "#e74c3c";

			}
			if (email === '') {
				document.getElementById('email-error').innerHTML = 'Por favor, insira o email.';
				event.preventDefault(); // Impede o envio do formulário
				let el = document.getElementById('email');
				el.style.borderColor = "#e74c3c";

			}
			if (cel === '') {
				document.getElementById('celular-error').innerHTML = 'Por favor, insira um numero de celular.';
				event.preventDefault(); // Impede o envio do formulário
				let el = document.getElementById('cel');
				el.style.borderColor = "#e74c3c";
			}

		});
		function cel() {
			var cel = document.getElementById('cel')
			if (cel.value.length == 1) {
				cel.value = "(" + cel.value
			}
			else if (cel.value.length == 3) {
				cel.value += ") "
			}
			else if (cel.value.length == 10) {
				cel.value += "-"
			}
		}
	</script>
</body>

</html>