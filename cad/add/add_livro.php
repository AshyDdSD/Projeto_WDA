<?php 
 
include '../../php/connect.php';

	$nome 	= isset($_POST['nome']) == true ?$_POST['nome']:"";
	$autor  = isset($_POST['autor']) == true ?$_POST['autor']:"";
	$editora  = isset($_POST['editora']) == true ?$_POST['editora']:"";
	$data_lanca  = isset($_POST['data_lanca']) == true ?$_POST['data_lanca']:"";
	$qtd  = isset($_POST['qtd']) == true ?$_POST['qtd']:"";

	//inserir dados no banco de dados.

	$sql = "INSERT INTO livro (nome, autor, editora, data_lanca, qtd) VALUES ('$nome','$autor','$editora','$data_lanca','$qtd')";

	if ($conn->query($sql) == TRUE) {

		header('Location: ../../site/livro.php');

	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>