<?php 
    include 'connect.php';
    $id = $_GET['id'];


    $sql = "SELECT alugados FROM livro WHERE id='$id'";
    @$sql_query = $conn->query($sql);
    @$dados = $sql_query->fetch_assoc(); 



    if($dados['alugados'] > 0){
        header('location: ../excluir/erro_delete_livro.php');
        exit;
    }
    else{
        header('location: ../excluir/con_delete_livro.php?id='.$id);
    }
?>