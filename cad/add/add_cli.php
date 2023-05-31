<?php 
 
include '../../php/connect.php';

	$nome 	= isset($_POST['nome']) == true ?$_POST['nome']:"";
	$email  = isset($_POST['email']) == true ?$_POST['email']:"";
	$celular  = isset($_POST['celular']) == true ?$_POST['celular']:"";
	$endereco  = isset($_POST['endereco']) == true ?$_POST['endereco']:"";
	$cpf  = isset($_POST['cpf']) == true ?$_POST['cpf']:"";

	//inserir dados no banco de dados.

	$sql = "INSERT INTO clientes (nome, email, celular, endereco, cpf) VALUES ('$nome','$email','$celular','$endereco','$cpf')";

	if ($conn->query($sql) == TRUE) {

		header('Location: ../../site/cliente.php');

	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>