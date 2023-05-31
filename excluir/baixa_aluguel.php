<?php

include '../php/connect.php';
$data_hj = date('d/m/Y', strtotime('-3 hour'));
$id_alug = $_GET['id'];

$sql_query = $conn->query("SELECT estado, id_livro, id_cliente FROM aluguel WHERE id='$id_alug'");
$dados = $sql_query->fetch_assoc();
$id_livro= $dados['id_livro'];
$id_cliente = $dados['id_cliente'];
$status = $dados['estado'];

$sql2= $conn->query("UPDATE livro SET qtd = qtd + 1, alugados = alugados - 1 WHERE id = $id_livro");
$sql3= $conn->query("UPDATE clientes SET alugados = alugados - 1 WHERE id = $id_cliente");

if ($status == "No Prazo"){
    $sql_up = $conn->query("UPDATE aluguel SET estado='$data_hj(no prazo)' WHERE id='$id_alug'");
}
else{
    $sql_up = $conn->query("UPDATE aluguel SET estado='$data_hj(atrasado)' WHERE id='$id_alug'");
}


$sql= $conn->query("UPDATE devolvido SET dev_prazo = dev_prazo + 1 WHERE id = '1'");

echo "<script>alert('Baixa feita com SUCESSO!!');javascript:window.location='../site/aluguel.php';</script>"

?>