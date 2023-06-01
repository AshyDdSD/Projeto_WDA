<?php
require_once("../php/protecao.php");
require_once('../php/connect.php');


$sql_usu = "SELECT *, max(alugados) FROM clientes";
$busca_usu = $conn->query($sql_usu);
$aluguel_usu = $busca_usu->fetch_array();



@$cont1 = $conn->query("SELECT COUNT(id) AS prazo FROM aluguel WHERE estado = 'No Prazo'");
$row1 = $cont1->fetch_array();

@$cont2 = $conn->query("SELECT COUNT(id) AS atraso FROM aluguel WHERE estado = 'Atrasado'");
$row2 = $cont2->fetch_array();

@$soma = $conn->query("SELECT SUM(mais_alug) AS total FROM livro");
$row3 = $soma->fetch_array();

@$soma2 = $conn->query("SELECT SUM(alugados) AS ativo FROM livro");
$row4 = $soma2->fetch_array();

@$sql1 = $conn->query("SELECT * FROM devolvido WHERE id='1'");
$row5 = $sql1->fetch_array();

$sql1 = "SELECT *, max(mais_alug) FROM livro";
$busca1 = $conn->query($sql1);
$top1 = $busca1->fetch_array();

$id_top1 = $top1['id'];
$nome_top1 = $top1['nome'];
$alu_top1 = $top1['mais_alug'];

$sql2 = "SELECT *, max(mais_alug) FROM livro WHERE id !=$id_top1";
$busca2 = $conn->query($sql2);
$top2 = $busca2->fetch_array();

$id_top2 = $top2['id'];
$nome_top2 = $top2['nome'];
$alu_top2 = $top2['mais_alug'];

$sql3 = "SELECT *, max(mais_alug) FROM livro WHERE id !=$id_top1 AND id !=$id_top2 ";
$busca3 = $conn->query($sql3);
$top3 = $busca3->fetch_array();

$nome_top3 = $top3['nome'];
$alu_top3 = $top3['mais_alug'];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <title>Locadora WDA</title>
  <style>
    #graf-gran {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
    }

    .graf1,
    .graf2 {
      background: white;
      height: 350px;
      width: 600px;
      border-radius: 1.5rem;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
      margin: 10px;
    }

    .divt2 {
      float: left;
      background: white;
      margin-top: 40px;
      margin-left: 6vh;
      margin-bottom: 5vh;
      height: 240px;
      width: 200px;
      border-radius: 1.5rem;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
    }

    @media only screen and (max-width: 800px) {

      .graf1,
      .graf2 {
        height: 280px;
        width: 90%;
      }

      #trof {
        margin-top: 10%;
      }

      .divt2 {
        margin-top: 2%;
        margin-left: 40%;
      }
    }

    @media only screen and (max-width: 600px) {

      .graf1,
      .graf2 {
        width: 100%;
      }

      #trof {
        margin-top: 10%;
      }

      .divt2 {
        margin-top: 2%;
        margin-left: 25%;
      }
    }
  </style>

</head>

<body>
  <nav id="barra">
    <div class="container-fluid">
      <img src="../images/WDA-logo.png" id="logo">
      <button id="btn_mobile">Menu</button>
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
            <a class="clica" href="editora.php">Editoras</a>
          </li>
          <li class="pedaco">
            <a class="clica" href="cliente.php">Clientes</a>
          </li>
          <li class="pedaco">
            <a class="clica" aria-current="page" href="#">Início</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div id="graf-gran">
    <div class="graf1">
      <canvas style="margin-left: 3px; margin-right: 3px;margin-top: 10px;margin-bottom: 10px;"
        id="grafico-livros-alugados"></canvas>
    </div>

    <div class="graf2">
      <canvas style="margin:auto" id="grafico-alug"></canvas>
    </div>
  </div>
  <div id="graf-peq">
    <div class="divt2" id="trof">
      <img style="margin-left: 17%; margin-right: 30%;margin-top: 3%;margin-bottom: 10px;" src="../images/trophy.png"
        alt="">
      <p style="text-align: center">Livro mais alugado:</p>
      <p style="text-align: center">
        <?php echo $nome_top1 ?>
      </p>
    </div>

    <div class="divt2">
      <img style="margin-left: 17%; margin-right: 30%;margin-top: 3%;margin-bottom: 10px;" src="../images/readers.png"
        alt="">
      <p style="text-align: center">Usuário com mais aluguéis:</p>
      <p style="text-align: center">
        <?php echo $aluguel_usu['nome'] ?>
      </p>
    </div>

    <div class="divt2">
      <img style="margin-left: 17%; margin-right: 30%;margin-top: 3%;margin-bottom: 10px;" src="../images/list.png"
        alt="">
      <p style="text-align: center">Total de aluguéis: </p>
      <p style="text-align: center">
        <?php echo $row3['total']; ?>
      </p>
    </div>

    <div class="divt2">
      <img style="margin-left: 17%; margin-right: 30%;margin-top: 3%;margin-bottom: 10px;"
        src="../images/to-do-list.png" alt="">
      <p style="text-align: center">Aluguéis ativos: </p>
      <p style="text-align: center">
        <?php echo $row4['ativo']; ?>
      </p>
    </div>
    <div class="divt2">
      <img style="margin-left: 17%; margin-right: 30%;margin-top: 3%;margin-bottom: 10px;" src="../images/prazo.png"
        alt="">
      <p style="text-align: center">Devolvidos no prazo: </p>
      <p style="text-align: center">
        <?php echo $row5['dev_prazo']; ?>
      </p>
    </div>
    <div class="divt2" id="ult">
      <img style="margin-left: 17%; margin-right: 30%;margin-top: 3%;margin-bottom: 10px;" src="../images/atrasado.png"
        alt="">
      <p style="text-align: center">Devolvidos com atraso: </p>
      <p style="text-align: center">
        <?php echo $row5['dev_atraso']; ?>
      </p>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx = document.getElementById('grafico-livros-alugados');

    new Chart(ctx, {
      type: 'bar',

      data: {
        labels: ['<?php echo $nome_top2 ?>', '<?php echo $nome_top1 ?>', '<?php echo $nome_top3 ?>'],
        datasets: [{
          label: 'alugados',
          data: [<?php echo $alu_top2 ?>, <?php echo $alu_top1 ?>, <?php echo $alu_top3 ?>],
          // borderWidth: 1,
          backgroundColor: ['#4c007d'],

        }]
      },
      options: {
        plugins: {
          title: {
            display: true,
            fontSize: 30,
            text: "Livros mais alugados",
            fontStyle: "bold",
          }

        },


        scales: {
          y: {
            beginAtZero: true
          }
        }
      }

    });

  </script>

  <script>
    const ctx2 = document.getElementById('grafico-alug');

    new Chart(ctx2, {
      type: 'doughnut',
      data: {
        labels: [
          'Alugueis atrasados', 'Alugueis no prazo'
        ],
        datasets: [{
          label: 'Quantidade',
          data: [<?php echo $row2['atraso'] ?>, <?php echo $row1['prazo'] ?>],
          backgroundColor: [
            '#523961',
            '#c3bbc9'

          ],
          hoverOffset: 4
        }]
      },
      options: {
        plugins: {
          title: {
            display: true,
            fontSize: 30,
            text: "Estado dos aluguéis",
            fontStyle: "bold",
          }

        },
      }
    });

  </script>

  <script src="../js/script.js"></script>
</body>

</html>