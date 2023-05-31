<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['id'])){
    die("Faça login para acessar esse site. <p><a href='../index.html'>Voltar</a</p>");
}