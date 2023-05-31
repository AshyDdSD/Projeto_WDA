
<?php 
	include_once '../php/connect.php';
	
	$dataAtual = date('Y-m-d');

	$sql_status = "SELECT id, estado, data_devo FROM aluguel";
	$sql_query_stts = $conn->query($sql_status) or die("ERRO ao consultar ESTADO! " . $conn->error); 

	while($dad_status = $sql_query_stts->fetch_assoc()){

		if($dad_status['estado'] == "Atrasado" || $dad_status['estado'] == "No Prazo"){
		$prazoEntrega = $dad_status["data_devo"];
		$id_stts = $dad_status["id"];

			if ($prazoEntrega < $dataAtual) {
				$alterar_stats = $conn->query("UPDATE aluguel SET estado='Atrasado' WHERE id = '$id_stts'");
		   }
		   	else {
				$alterar_stats = $conn->query("UPDATE aluguel SET estado='No Prazo' WHERE id = '$id_stts'");
	   		}	
	   	
			}
			else{
				
			}
		

	}

	@$pesquisa = $conn->real_escape_string($_GET['busca']);
	$sql_code = "SELECT id, id_cliente, nome_cliente, nome_livro, autor, editora, data_devo, DATE_FORMAT(data_alu, '%d/%m/%Y') as data_alug, DATE_FORMAT(data_devo, '%d/%m/%Y') as data_devol, estado
		FROM aluguel 
		WHERE id LIKE '%$pesquisa%' 
        OR id_cliente LIKE '%$pesquisa%'
		OR nome_cliente LIKE '%$pesquisa%'
        OR nome_livro LIKE '%$pesquisa%'
        OR autor LIKE '%$pesquisa%'
		OR editora LIKE '%$pesquisa%'
		OR data_alu LIKE '%$pesquisa%'
		OR data_devo LIKE '%$pesquisa%'
		OR estado LIKE '%$pesquisa%'
		ORDER BY nome_cliente;";

	$sql_query = $conn->query($sql_code) or die("ERRO ao consultar! " . $conn->error); 
	
	if ($sql_query->num_rows == 0) {
		?>
	<tr>
		<td colspan="3">Nenhum resultado encontrado...</td>
	</tr>
	<?php
	} else {
						
		
		while($dados = $sql_query->fetch_assoc()) {
						
                        

					 

			?>
			<tr id="tab" style="text-align: center;">

				<td data-cell="ID"><?php echo $dados['id']; ?></td>
				<td data-cell="Nome do Cliente"><?php echo $dados['nome_cliente']; ?></td>
				<td data-cell="Livro"><?php echo $dados['nome_livro']; ?></td>
				<td data-cell="Autor"><?php echo $dados['autor']; ?></td>
				<td data-cell="Editora"><?php echo $dados['editora']; ?></td>
				<td data-cell="Data do Aluguel"><?php echo $dados['data_alug']; ?></td>
				<td data-cell="Data de Devolução"><?php echo $dados['data_devol']; ?></td>
				<?php if($dados['estado'] == "Atrasado") {?>
				<td class="table-danger" data-cell="Estado"><?php echo $dados['estado']; ?></td>
				<?php }else if($dados['estado'] == "No Prazo"){?>
				<td class="table-success" data-cell="Estado"><?php echo $dados['estado']; ?></td>
				<?php } else{?>
				<td><?php echo $dados['estado']; ?></td>
				<?php }?>

				<?php if($dados['estado'] == "Atrasado" || $dados['estado'] == "No Prazo"){?>
				<td><a href='../excluir/con_delete_alug.php?id=<?php echo $dados['id']; ?>' class='btn btn-success'>Baixa</a></td>
				<?php }else { ?>
					<td><a href='#?id=<?php echo $dados['id']; ?>' class='btn btn-danger'>Apagar</a></td>
					<?php } ?>
			</tr>

			<?php
		}
	}
?>
<html>
	<link rel="stylesheet" href="../site/style.css">
</html>