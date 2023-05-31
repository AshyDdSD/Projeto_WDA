
<?php 


	include_once '../php/connect.php';

	@$pesquisa = $conn->real_escape_string($_GET['busca']);
	$sql_code = "SELECT * 
		FROM editora 
		WHERE id LIKE '%$pesquisa%' 
		OR nome LIKE '%$pesquisa%'
		OR email LIKE '%$pesquisa%'
		OR telefone LIKE '%$pesquisa%'
		OR site_edi LIKE '%$pesquisa%'
		ORDER BY nome;";
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
				<td data-cell="Nome"><?php echo $dados['nome']; ?></td>
				<td data-cell="Email"><?php echo $dados['email']; ?></td>
				<td data-cell="Telefone"><?php echo $dados['telefone']; ?></td>
				<td data-cell="Site"><?php echo $dados['site_edi']; ?></td>
				<td><a href='../editar/ed_editora.php?id=<?php echo $dados['id'];?>' class='btn btn-warning'>Editar</a></td>
				<td><a href='../excluir/con_delete_editora.php?id=<?php echo $dados['id'];?>' class='btn btn-danger'>Excluir</a></td>
			</tr>
			<?php
		}
	}
?>
<html>
	<link rel="stylesheet" href="../site/style.css">
</html>