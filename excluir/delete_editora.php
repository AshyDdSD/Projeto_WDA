<?php 

	include_once '../php/connect.php';

	$id = $_GET['id'];

	$deletar = $conn->query("DELETE FROM editora WHERE id='$id'");

	if (mysqli_affected_rows($conn) > 0) {

		header("Location: ../site/editora.php");
	}
?>