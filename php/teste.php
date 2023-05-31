<?php 
    include 'connect.php';
    $id = $_GET['id'];


    $sql = "SELECT alugados FROM clientes WHERE id='$id'";
    @$sql_query = $conn->query($sql);
    @$dados = $sql_query->fetch_assoc(); 



    if($dados['alugados'] > 0){
        header('location: ../excluir/erro_delete_cli.php');
        exit;
    }
    else{
        header('location: ../excluir/con_delete_cli.php?id='.$id);
    }
?>