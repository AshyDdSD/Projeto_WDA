<?php 
 
include '../../php/connect.php';
    

    $id = $_GET['id'];
	$nome 	= isset($_POST['nome']) == true ?$_POST['nome']:"";
	$autor  = isset($_POST['autor']) == true ?$_POST['autor']:"";
	$data  = isset($_POST['data_lanca']) == true ?$_POST['data_lanca']:"";
	$estoque  = isset($_POST['qtd']) == true ?$_POST['qtd']:"";
	$editora  = isset($_POST['editora']) == true ?$_POST['editora']:"";

    $sql_s = $conn->query("SELECT qtd FROM livro WHERE id='$id'");
    $result = $sql_s->fetch_assoc();

    
        $alterar = $conn->query("UPDATE livro SET nome ='$nome', autor ='$autor', editora ='$editora', data_lanca ='$data', qtd ='$estoque' WHERE id='$id'");
	
        if(mysqli_affected_rows($conn) > 0){
            header("location: ../../site/livro.php");
        }

	
?>