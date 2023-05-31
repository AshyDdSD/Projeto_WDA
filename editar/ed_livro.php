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
    <?php 

    include_once '../php/connect.php';

    $id = $_GET['id'];

    $consultar = $conn->query("SELECT * FROM livro WHERE id='$id'");

    while($dados = $consultar->fetch_assoc()){
        $nome   = $dados['nome'];
        $autor	= $dados['autor'];
        $data_lanca 	= $dados['data_lanca'];
        $qtd 	= $dados['qtd'];
        $editora 	= $dados['editora'];
		
    }
    ?>
	<div class="form_wrapper">
		<div class="form_container">
			<div class="title_container">
				<h2>Cadastro de Livros</h2>
			</div>
			<div class="row clearfix">
				<div class="">
				
				<form action="./atual/atual_livro.php?id=<?php echo $id;?>" method="POST" id="formulario">
					<div class="input_field">
						<label for="nome">Nome</label>
						<input type="text" name="nome" placeholder="Nome" value="<?php echo $nome;?>" required />
					</div>
					<div class="input_field">
						<label for="autor">Autor</label>
						<input type="text" name="autor" placeholder="Autor" value="<?php echo $autor;?>" required />
					</div>
					<div class="input_field">
						<label for="editora">Editora</label>
						<select name="editora" style="font-size: 12px; height: 35px; width: 100%;border-radius: 30px;padding: 8px 10px 9px 10px;border: 1px solid #ccc;transition: all 0.3s ease-in-out;" id="editora" >
							<option value="<?php echo $editora;?>"><?php echo $editora;?></option>
							<?php
								include('../php/connect.php');
								$query = "SELECT * FROM editora";
								$resultado = mysqli_query($conn, $query);
								while ($editora = mysqli_fetch_assoc($resultado)) {
									echo '<option value="' . $editora['nome'] . '">' . $editora['nome'] . '</option>';
								}
							?>
						</select>
					</div>
					<div class="input_field">
						<label for="data_lanca">Data de Lançamento</label>
						<input type="text" name="data_lanca" placeholder="Data de Lançamento" value="<?php echo $data_lanca;?>" maxlength="10" OnKeyPress="data('##/##/####',this)" required />
					</div>
					<div class="input_field">
						<label for="qtd">Quantidade em Estoque</label>
						<input type="text" id="estoque" name="qtd" placeholder="Quantidade em Estoque" value="<?php echo $qtd;?>" />
						<div class="error-message" id="estoque-error"></div>
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
    
    document.getElementById('formulario').addEventListener('submit', function(event) {
        // Remove mensagens de erro anteriores
        document.getElementById('estoque-error').innerHTML = '';
       

        // Obtém os valores dos campos de entrada
        var estoque = document.getElementById('estoque').value;


        // Verifica se os campos estão vazios
        if (estoque < <?php echo $qtd ?>) {
            document.getElementById('estoque-error').innerHTML = 'O estoque não pode ser menor que o inicial';
            event.preventDefault(); // Impede o envio do formulário
            let el = document.getElementById('estoque');
            el.style.borderColor = "#e74c3c";

        }
	});
</script>
<script>  
	function data(mascara, documento) {
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