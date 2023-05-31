<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Editar Cliente</title>
</head>
<body>
    <?php 

    include_once '../php/connect.php';

    $id = $_GET['id'];

    $consultar = $conn->query("SELECT * FROM clientes WHERE id='$id'");

    while($dados = $consultar->fetch_assoc()){
        $nome   = $dados['nome'];
        $email	= $dados['email'];
        $celular 	= $dados['celular'];
        $endereco 	= $dados['endereco'];
        $cpf 	= $dados['cpf'];
    }
    ?>
	<div class="form_wrapper">
		<div class="form_container">
			<div class="title_container">
				<h2>Editar Cliente</h2>
			</div>
			<div class="row clearfix">
				<div class="">
				<form action="./atual/atual_cli.php?id=<?php echo $id;?>" method="POST">
					<div class="input_field">
						<label for="nome">Nome</label>
						<input type="text" name="nome" placeholder="Nome" value="<?php echo $nome;?>" required />
					</div>
					<div class="input_field">
						<label for="email">Email</label>
						<input type="email" name="email" placeholder="Email" value="<?php echo $email;?>" required />
					</div>
					<div class="input_field">
						<label for="celular">Celular</label>
						<input type="text" name="celular" placeholder="Celular" value="<?php echo $celular;?>" maxlength="15" OnKeyPress="cel('(##) #####-####',this)" required />
					</div>
					<div class="input_field">
						<label for="endereco">Endereço</label>
						<input type="text" name="endereco" placeholder="Endereço" value="<?php echo $endereco;?>" required />
					</div>
					<div class="input_field">
						<label for="cpf">CPF</label>
						<input type="text" name="cpf" placeholder="CPF" value="<?php echo $cpf;?>" oninput="mascara(this)" />
					</div>
				</div>
				<input class="button" type="submit" value="Cadastrar"/>
				</form>
			</div>
		</div>
	</div>
	</div>
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