
<?php 


	include_once '../php/connect.php';

	@$pesquisa = $conn->real_escape_string($_GET['busca']);
	$sql_code = "SELECT * 
		FROM livro 
		WHERE id LIKE '%$pesquisa%' 
		OR nome LIKE '%$pesquisa%'
		OR autor LIKE '%$pesquisa%'
		OR editora LIKE '%$pesquisa%'
		OR data_lanca LIKE '%$pesquisa%'
		OR qtd LIKE '%$pesquisa%'
		OR alugados LIKE '%$pesquisa%'
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
				<td data-cell="Autor"><?php echo $dados['autor']; ?></td>
				<td data-cell="Editora"><?php echo $dados['editora']; ?></td>
				<td data-cell="Data de Lançamento"><?php echo $dados['data_lanca']; ?></td>
				<td data-cell="Quantidade em Estoque"><?php echo $dados['qtd']; ?></td>
				<td data-cell="Alugados"><?php echo $dados['alugados']; ?></td>
				<td><a href='../editar/ed_livro.php?id=<?php echo $dados['id']; ?>' class='btn btn-warning'>Editar</a></td>
				<td><a href='../php/teste_livro.php?id=<?php echo $dados['id'];?>' class='btn btn-danger'>Excluir</a></td>
			</tr>
			<?php
		}
	}
?>
<html>
	<link rel="stylesheet" href="../site/style.css">
</html>