<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Cadastro de Clientes</title>
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
				<h2>Cadastro de Clientes</h2>
			</div>
			<a href="../site/cliente.php"><img src="../images/delete.png"  style="width: 20px; float: right; margin-top: -50px;"></a>
			<div class="row clearfix">
				<div class="">
				<!--  -->
				<form action="./add/add_cli.php" method="POST" id="formulario-vermelho">
					
					<div class="input_field">
						<label for="nome">Nome</label>
						<input type="text" name="nome" id="nome" placeholder="Nome" />
						<div class="error-message" id="nome-error"></div>
					</div>
					<div class="input_field">
						<label for="email">Email</label>
						<input type="email" name="email" id="email" placeholder="Email"  />
						<div class="error-message" id="email-error"></div>

					</div>
					<div class="input_field">
						<label for="celular">Celular</label>
						<input type="text" id="celular" name="celular" placeholder="Celular" maxlength="15" OnKeyPress="cel('(##) #####-####',this)"  />
						<div class="error-message" id="celular-error"></div>
					</div>
					<div class="input_field">
						<label for="endereco">Endereço</label>
						<input type="text" name="endereco" id="endereco" placeholder="Endereço" />
						<div class="error-message" id="endereco-error"></div>
					</div>
					<div class="input_field">
						<label for="cpf">CPF</label>
						<input type="text" id="cpf" name="cpf" placeholder="CPF" oninput="mascara(this)" />
					</div>
				</div>
				
				<input class="button" type="submit" value="Cadastrar"/>
				</form>
			</div>
		</div>
	</div>
	</div>
	<script>
		
		
			document.getElementById('formulario-vermelho').addEventListener('submit', function(event) {
			// Remove mensagens de erro anteriores
			document.getElementById('nome-error').innerHTML = '';
			document.getElementById('email-error').innerHTML = '';
			document.getElementById('celular-error').innerHTML = '';
			document.getElementById('endereco-error').innerHTML = '';
	
	
			// Obtém os valores dos campos de entrada
			var nome = document.getElementById('nome').value;
			var email = document.getElementById('email').value;
			var cel = document.getElementById('celular').value;
			var ende = document.getElementById('endereco').value;
		   
	
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
				let el = document.getElementById('celular');
				el.style.borderColor = "#e74c3c";
			}
			if (ende === '') {
				document.getElementById('endereco-error').innerHTML = 'Por favor, insira um endereço.';
				event.preventDefault(); // Impede o envio do formulário
				let el = document.getElementById('endereco');
				el.style.borderColor = "#e74c3c";
			}
			
		});
	</script>
	
	
	<script>  
	
		function cel(mascara, documento) {
		  let i = documento.value.length;
		  let saida = '#';
		  let texto = mascara.substring(i);
		  while (texto.substring(0, 1) != saida && texto.length ) {
			documento.value += texto.substring(0, 1);
			i++;
			texto = mascara.substring(i);
		  }
		}
	
		function mascara(i){
   
		var v = i.value;
		
		if(isNaN(v[v.length-1])){ 
			i.value = v.substring(0, v.length-1);
			return;
		}
		
		i.setAttribute("maxlength", "14");
		if (v.length == 3 || v.length == 7) i.value += ".";
		if (v.length == 11) i.value += "-";

		}
	  </script>
</body>
</html>