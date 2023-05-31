<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .text {
            margin-top: 15%;
        }

        .bot {
            margin-left: 4%;
        }
        @media only screen and (max-width:800px) {
            .text {
                margin-top: 60%;
            }

            .bot {
                margin-left: -10%;
            }
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Erro</title>
</head>

<body>
    <div class="text">
        <H3 class="text-center">Erro ao excluir livro</H3>
        <p class="text-center">O livro ainda possui aluguéis ativos!</p>
    </div>
    <br>
    <div class="bot">
        <a class="btn btn-secondary" style="margin-left:45%;" href="../site/livro.php">Voltar</a>
    </div>
</body>

</html>