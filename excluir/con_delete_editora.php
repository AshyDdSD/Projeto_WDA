<?php
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @media only screen and (max-width:800px) {
            .text {
                margin-top: 60%;
            }

            .bot {
                margin-left: -25%;
            }
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Confirmação</title>
</head>

<body>
    <div class="text">
        <H3 style="margin-top:18%;" class="text-center">Confirme se realmete deseja excluir essa editora</H3>
    </div>
    <br>
    <div class="bot">
        <a class="btn btn-secondary" style=" margin-left:42%;" href="../site/editora.php">Voltar</a>
        <a class="btn btn-danger" style="margin-left:4%;" href="delete_editora.php?id=<?php echo $id; ?>">Excluir</a>
    </div>
</body>

</html>