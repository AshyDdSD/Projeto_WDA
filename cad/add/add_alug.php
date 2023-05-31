<?php
 include '../../php/connect.php';

    $prazo_max = date('Y-m-d', strtotime('+30 days, -3 hour')); 

    @$data = $_POST['data_entreg'];
    if($data>$prazo_max){
       echo "<script>alert('só pode até 30 dias');
       javascript:window.location='../../cad/cad_alug.php';</script>";

    }
    else{
        @$id_livro = $_POST['livro'];

        @$livro_pesquisa = "SELECT * FROM livro WHERE id = '$id_livro'";
        @$sql_query = $conn->query($livro_pesquisa);
        @$dados_livro = $sql_query->fetch_assoc();
        $livro_qtd = $dados_livro['qtd'];

        if( @$livro_qtd > 0 ){

            $id_usu = $_POST['clientes'];
            $usuario_sql = "SELECT nome FROM clientes WHERE id = '$id_usu'";
            $usuario_query = $conn->query($usuario_sql);
            $usu = $usuario_query->fetch_assoc();
            $nome_usu = $usu['nome'];

            $nome_li = $dados_livro['nome'];
            $autor_li = $dados_livro['autor'];
            $editora_li = $dados_livro['editora'];
            $data_alug = date('Y-m-d', strtotime('-3 hour'));

            $sql = "INSERT INTO aluguel (id_cliente, nome_cliente, id_livro, nome_livro, autor, editora, data_alu, data_devo, estado) VALUES ('$id_usu','$nome_usu','$id_livro','$nome_li','$autor_li','$editora_li','$data_alug','$data','Atrasado')";
            
            $update_query = "UPDATE livro SET qtd = qtd - 1, alugados = alugados + 1 WHERE id = $id_livro";
            mysqli_query($conn, $update_query);
            $update_alugados = "UPDATE clientes SET alugados = alugados + 1 WHERE id = $id_usu";
            mysqli_query($conn, $update_alugados);
            $up_livro_mais_query = "UPDATE livro SET mais_alug = mais_alug + 1 WHERE id = $id_livro";
            mysqli_query($conn, $up_livro_mais_query);
            
            if ($conn->query($sql) == TRUE) {

                header('Location: ../../site/aluguel.php');
    
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
    
        }
        else{
            echo "<script>alert('Esse livro não está disponível em nosso estoque');
            javascript:window.location='../../site/aluguel.php';</script>";
            exit;
        }
        
    }

?>
