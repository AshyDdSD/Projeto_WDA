<?php
include('connect.php');

if(isset($_POST['email_log']) || isset($_POST['senha_log'])) {

    if(strlen($_POST['email_log']) == 0) {
        echo "Digite seu e-mail";
    } else if(strlen($_POST['senha_log']) == 0) {
        echo "Digite sua senha";
    } else {

        $email = $conn->real_escape_string($_POST['email_log']);
        $senha = $conn->real_escape_string($_POST['senha_log']);

        $sql_code = "SELECT * FROM users WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: ../site/index.php");
        }else{
            echo "<script>alert('Erro de login, tente novamente.');javascript:window.location='../inicio/login.php';</script>";
        }

    }

}