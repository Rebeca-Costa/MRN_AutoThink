<?php

session_start();
if (!isset($_SESSION['id'])) {
    // Redireciona para a página de login se o usuário não estiver autenticado.
    header("Location: ../login.php");
    exit();
}

$servername = "45.152.44.154";
$username = "u451416913_grupo17";
$password = "Grupo17@123";
$dbname = "u451416913_grupo17";

$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_SESSION['id'];

$sql = "SELECT
/*compra.idCompra,
cadastro.usuario AS nomeCliente,*/
compra.data,
compra.valorTotal,
GROUP_CONCAT(produtos.nomeP SEPARATOR ', ') AS produtosComprados
FROM compra
LEFT JOIN cadastro ON compra.id = cadastro.id
LEFT JOIN compra_produtos ON compra.idCompra = compra_produtos.idCompra
LEFT JOIN produtos ON compra_produtos.idProd = produtos.idProd
WHERE cadastro.id = $id
GROUP BY compra.idCompra";

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$resultado = $conn->query($sql);

if (!$resultado) {
  die("Erro na consulta SQL: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Pedidos</title>
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="style.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <img class="img-logo" src="AutoThink.png" alt="logo-btn" id="btn">
      </div>
      <ul class="nav-list">
        <li>
          <a href="cliente.php">
            <i class="bx bxs-user"></i>
            <span class="links_name">Minha Conta</span>
          </a>
          <span class="tooltip">Minha Conta</span>
        </li>
        <li>
          <a href="pedidos.php">
            <i class='bx bxs-shopping-bag'></i>
            <span class="links_name">Pedidos</span>
          </a>
          <span class="tooltip">Pedidos</span>
        </li>


        <div class="logout-button">
          <a href="../login.php">
          <button class="btnout" id="btn2">Log Out</button>
          </a>
        </div>
      </ul>


    </div>
    <section class="home-section">
      <div class="sub">
      <div class="titulo">Pedidos</div>
      
    
      <div class="line">
       <hr class="linha" noshade>
      </div> 

      <div style="display: flex; flex-direction: row; justify-content: center; align-items: center; text-align: center; margin: 20px 0 20px 0;">
    <!-- Exibição dos produtos-->
    <table class="table">
        <tr>
            <th style="border-radius: 15px 0px 0px 0px;">Valor</th>
            <th>Data</th>
            <th colspan="2" style="border-radius: 0px 15px 0px 0px; border-right: none;">Itens</th>
        </tr>
        <?php
if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['valorTotal'] . "</td>";
        echo "<td>" . $row['data'] . "</td>";
        echo '<td style="border-right: none;">' . $row['produtosComprados'] . '</td>'; // Adiciona a coluna de produtos comprados
       echo "</tr>";
    }
} else {
    echo '<tr><td colspan="7" class="nenhump">Nenhum produto encontrado.</td></tr>';
}
?>

    </table>
    </div>
    </section>
    <script src="script.js"></script>

<style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        *{
            box-sizing: border-box;
            font-family: "Poppins" , sans-serif;
        }
        .nenhump {
          border: none;
          border-radius: 0px 0px 15px 15px !important; 
        }
        .table{
            width: 85%;
            border-collapse: collapse;
        }
        td, th {
            padding: 10px;
            border-right: 1px solid #ccc; 
            border-color: #183257;
        }
        th {
            background: #183257;
            color: #fff;
        }
        /* Estilo para as linhas pares */
        tr:nth-child(even) {
        background-color: white;
        }

        /* Estilo para as linhas ímpares */
        tr:nth-child(odd) {
        background-color: #18325729; 
        }
        table tr:last-child {
        border-bottom: none; 
        border-radius: 0px 0px 10px 10px; 
        }
        table tr:last-child td:first-child {
        border-radius: 0 0 0 10px; 
        }
        table tr:last-child td:last-child {
        border-radius: 0 0 10px 0; 
        }
    </style>

    <?php
    $conn->close();
    ?>
  </body>
</html>