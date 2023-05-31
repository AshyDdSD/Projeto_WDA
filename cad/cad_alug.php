<?php 
	include_once '../php/connect.php';
	$data_atual = date('Y-m-d', strtotime('-3 hour'));
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Cadastro de Aluguel</title>
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
				<h2>Cadastro de Aluguel</h2>
			</div>
			<a href="../site/aluguel.php"><img src="../images/delete.png"  style="width: 20px; float: right; margin-top: -50px;"></a>
			<div class="row clearfix">
				<div class="">
				
				<form action="./add/add_alug.php" method="POST" id="formulario">
					<div class="input_field">
						<label for="cliente">Cliente</label>
						<select id="nomecli" style="font-size: 12px; height: 35px; width: 100%;border-radius: 30px;padding: 8px 10px 9px 10px;border: 1px solid #ccc;transition: all 0.3s ease-in-out;" class="form-select" name="clientes" >
							<option >Cliente</option>
							<?php 
								$sql_s = "SELECT * FROM clientes";
								$result = $conn->query($sql_s);
								while($row_usuario = $result->fetch_assoc()){ ?>
							<option value="<?php echo $row_usuario['id']; ?>"><?php echo $row_usuario['nome'] ?></option>
							<?php     
								}
							?>
						</select>
						<div class="error-message" id="nomecli-error">
					</div>
					<div class="input_field">
						<label for="livro">Livro</label>
						<select id="nomeli" style="font-size: 12px; height: 35px; width: 100%;border-radius: 30px;padding: 8px 10px 9px 10px;border: 1px solid #ccc;transition: all 0.3s ease-in-out;" class="form-select" name="livro" >
							<option>Livro</option>
							<?php 
								$sql_s = "SELECT * FROM livro";
								$result = $conn->query($sql_s);
								while($row_usuario = $result->fetch_assoc()){ ?>
							<option value="<?php echo $row_usuario['id']; ?>"><?php echo $row_usuario['nome'] ?></option>
							<?php     
								}
							?>
						</select>
						<div class="error-message" id="nomeli-error"></div>
					</div>
					<div class="input_field">
						<label for="data_alu">Data de Aluguel</label>
						<input type="date" id="data" value="<?php echo $data_atual ?>" name="data_alu" style="font-size: 12px; height: 15px; width: 94%;border-radius: 30px;padding: 8px 10px 9px 10px;border: 1px solid #ccc;transition: all 0.3s ease-in-out;" disabled>
					</div>
					<div class="input_field">
						<label for="data_entreg">Data de Entrega</label>
						<input type="date" id="dataen" name="data_entreg" style="font-size: 12px; height: 15px; width: 94%;border-radius: 30px;padding: 8px 10px 9px 10px;border: 1px solid #ccc;transition: all 0.3s ease-in-out;" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+30 days')); ?>">
						<div class="error-message" id="data-error"></div>
					</div>
				</div>
				<input class="button" type="submit" value="Cadastrar"/>
				</form>
			</div>
		</div>
	</div>
	</div>
	<script>
    
    
    document.getElementById('formulario').addEventListener('submit', function(event) {
        // Remove mensagens de erro anteriores
        document.getElementById('nomecli-error').innerHTML = '';
        document.getElementById('nomeli-error').innerHTML = '';
        document.getElementById('data-error').innerHTML = '';

        // Obtém os valores dos campos de entrada
        var nomecli = document.getElementById('nomecli').value;
        var nomeli = document.getElementById('nomeli').value;
        var data = document.getElementById('dataen').value;

        // Verifica se os campos estão vazios
        if (nomecli === 'Cliente') {
            document.getElementById('nomecli-error').innerHTML = 'Por favor, insira o nome.';
            event.preventDefault(); // Impede o envio do formulário
            let el = document.getElementById('nomecli');
            el.style.borderColor = "#e74c3c";

        }
        if (nomeli === 'Livro') {
            document.getElementById('nomeli-error').innerHTML = 'Por favor, insira o nome do livro.';
            event.preventDefault(); // Impede o envio do formulário
            let el = document.getElementById('nomeli');
            el.style.borderColor = "#e74c3c";

        }
        if (data === '') {
            document.getElementById('data-error').innerHTML = 'Por favor, insira uma data.';
            event.preventDefault(); // Impede o envio do formulário
            let el = document.getElementById('dataen');
            el.style.borderColor = "#e74c3c";
        }
        
    });
</script>
</body>
</html>