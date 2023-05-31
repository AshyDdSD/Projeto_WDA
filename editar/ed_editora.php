<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Editar Editora</title>
</head>
<body>
    <?php 

    include_once '../php/connect.php';

    $id = $_GET['id'];

    $consultar = $conn->query("SELECT * FROM editora WHERE id='$id'");

    while($dados = $consultar->fetch_assoc()){
            $nome   = $dados['nome'];
            $email	= $dados['email'];
            $telefone 	= $dados['telefone'];
            $site 	= $dados['site_edi'];
    }
    ?>
	<div class="form_wrapper">
		<div class="form_container">
			<div class="title_container">
				<h2>Editar Editora</h2>
			</div>
			<div class="row clearfix">
				<div class="">
				<form action="./atual/atual_editora.php?id=<?php echo $id;?>" method="POST">
					<div class="input_field">
						<label for="nome">Nome</label>
						<input type="text" name="nome" placeholder="Nome" value="<?php echo $nome;?>" required />
					</div>
					<div class="input_field">
						<label for="email">Email</label>
						<input type="email" name="email" placeholder="Email" value="<?php echo $email;?>" required />
					</div>
					<div class="input_field">
						<label for="telefone">Telefone</label>
						<input type="text" name="telefone" placeholder="Telefone" value="<?php echo $telefone;?>" maxlength="15" OnKeyPress="cel('(##) #####-####',this)" required />
					</div>
					<div class="input_field">
						<label for="site">Site</label>
						<input type="text" name="site_edi" placeholder="Site" value="<?php echo $site;?>" />
					</div>
				</div>
				<input class="button" type="submit" value="Cadastrar"/>
				</form>
			</div>
		</div>
	</div>
	</div>
</body>
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
  </script>
</html>