<?php require_once ("../php/protecao.php");?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <title>Locadora WDA</title>
</head>
<body>
    <nav id="barra">
    <div class="container-fluid">
        <img src="../images/WDA-logo.png" id="logo">
            <button id="btn_mobile" >Menu</button>
            <div id="bar">
                <ul id="barrinha">
                    <a href="../php/logout.php"><img src="../images/logout.png" id="logout"></a>
                    <li class="pedaco">
                        <a class="clica" href="aluguel.php">Aluguel</a>
                    </li>
                    <li class="pedaco">
                        <a class="clica" href="livro.php">Livros</a>
                    </li>
                    <li class="pedaco">
                        <a class="clica" aria-current="page" href="#">Editoras</a>
                    </li>
                    <li class="pedaco">
                        <a class="clica" href="cliente.php">Clientes</a>
                    </li>
                    <li class="pedaco">
                        <a class="clica" href="index.php">Início</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> 
    <div class="container-fluid" id="tabela">
        <h4 class="assunto">Editoras</h4>
        <table id="tsup">
            <tr>
                <td><a class="btn btn-primary" style="border-radius: 30px;" href="../cad/cad_editora.php" role="button">Novo +</a></td>
                <td></td>
                <td></td>
                <td>      
                    <form action="">
                        <td>
                            <input class="form-control me-2"  name="busca" placeholder="Pesquisa" type="text">
                        </td>
                        <td>
                            <button style="display: flex; background: transparent; border: none;" class="btn btn-primary"  type="submit"><img src="../images/search.png" alt="" srcset=""></button>
                        </td>
                    </form>
                </td>
            </tr>
        </table>
        <br>
        <table id="tinf" class="table table-borderless">
            <thead>
                <tr class="table-dark" id="cabecalho" style="text-align: center;">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Site</th>
                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr><?php include_once '../pesquisa/pesquisa_editora.php' ?></tr>
            </tbody>
        </table>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>