<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Cadastro de Livros</title>
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
				<h2>Cadastro de Livros</h2>
			</div>
			<a href="../site/livro.php"><img src="../images/delete.png"
					style="width: 20px; float: right; margin-top: -50px;"></a>
			<div class="row clearfix">
				<div class="">

					<form action="./add/add_livro.php" method="POST" id="formulario">
						<div class="input_field">
							<label for="nome">Nome</label>
							<input type="text" name="nome" id="nome" placeholder="Nome" />
							<div class="error-message" id="nome-error"></div>
						</div>
						<div class="input_field">
							<label for="autor">Autor</label>
							<input type="text" name="autor" id="autor" placeholder="Autor" />
							<div class="error-message" id="autor-error"></div>
						</div>
						<div class="input_field">
							<label for="editora">Editora</label>
							<select id="editora"
								style="font-size: 12px; height: 35px; width: 100%;border-radius: 30px;padding: 8px 10px 9px 10px;border: 1px solid #ccc;transition: all 0.3s ease-in-out;"
								name="editora" id="editora">
								<option>Editora</option>
								<?php
								include('../php/connect.php');
								$query = "SELECT * FROM editora";
								$resultado = mysqli_query($conn, $query);
								while ($editora = mysqli_fetch_assoc($resultado)) {
									echo '<option value="' . $editora['nome'] . '">' . $editora['nome'] . '</option>';
								}
								?>
							</select>
							<div class="error-message" id="editora-error"></div>
						</div>
						<div class="input_field">
							<label for="data_lanca">Data de Lançamento</label>
							<input type="text" name="data_lanca" id="data" placeholder="Data de Lançamento"
								maxlength="10" oninput="mascara(this)" />
							<div class="error-message" id="data-error"></div>
						</div>
						<div class="input_field">
							<label for="qtd">Quantidade em Estoque</label>
							<input type="text" name="qtd" id="estoque" placeholder="Quantidade em Estoque" />
							<div class="error-message" id="estoque-error"></div>
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
			document.getElementById('autor-error').innerHTML = '';
			document.getElementById('data-error').innerHTML = '';
			document.getElementById('estoque-error').innerHTML = '';
			document.getElementById('editora-error').innerHTML = '';

			// Obtém os valores dos campos de entrada
			var nome = document.getElementById('nome').value;
			var autor = document.getElementById('autor').value;
			var data = document.getElementById('data').value;
			var estoque = document.getElementById('estoque').value;
			var editora = document.getElementById('editora').value;

			// Verifica se os campos estão vazios
			if (nome === '') {
				document.getElementById('nome-error').innerHTML = 'Por favor, insira o nome.';
				event.preventDefault(); // Impede o envio do formulário
				let el = document.getElementById('nome');
				el.style.borderColor = "#e74c3c";

			}
			if (autor === '') {
				document.getElementById('autor-error').innerHTML = 'Por favor, insira o autor.';
				event.preventDefault(); // Impede o envio do formulário
				let el = document.getElementById('autor');
				el.style.borderColor = "#e74c3c";

			}
			if (data === '') {
				document.getElementById('data-error').innerHTML = 'Por favor, insira uma data.';
				event.preventDefault(); // Impede o envio do formulário
				let el = document.getElementById('data');
				el.style.borderColor = "#e74c3c";
			}
			if (estoque === '') {
				document.getElementById('estoque-error').innerHTML = 'Por favor, insira a quantidade.';
				event.preventDefault(); // Impede o envio do formulário
				let el = document.getElementById('estoque');
				el.style.borderColor = "#e74c3c";
			}
			if (editora === 'Editora') {
				document.getElementById('editora-error').innerHTML = 'Por favor, insira uma editora.';
				event.preventDefault(); // Impede o envio do formulário
				let el = document.getElementById('editora');
				el.style.borderColor = "#e74c3c";
			}
		});
	</script>
</body>
<script>
	function mascara(i) {

		var v = i.value;

		if (isNaN(v[v.length - 1])) {
			i.value = v.substring(0, v.length - 1);
			return;
		}

		i.setAttribute("maxlength", "10");
		if (v.length == 2 || v.length == 5) i.value += "/";

	}
</script>

</html>