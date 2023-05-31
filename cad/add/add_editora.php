<?php 
 
include '../../php/connect.php';

	$nome 	= isset($_POST['nome']) == true ?$_POST['nome']:"";
	$email  = isset($_POST['email']) == true ?$_POST['email']:"";
	$telefone  = isset($_POST['telefone']) == true ?$_POST['telefone']:"";
	$site  = isset($_POST['site_edi']) == true ?$_POST['site_edi']:"";

	//inserir dados no banco de dados.

	$sql = "INSERT INTO editora (nome, email, telefone, site_edi) VALUES ('$nome','$email','$telefone','$site')";

	if ($conn->query($sql) == TRUE) {

		header('Location: ../../site/editora.php');

	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>