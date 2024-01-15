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

$usuario = $_SESSION['usuario'];

$sql = "SELECT usuario, email, celular FROM cadastro c WHERE c.usuario LIKE '%$usuario%'";

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
    <title>Minha conta</title>
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="style.css" />
<!--ADICIONADO-->
    <link href="css/jquery.bxslider.min.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
        <link href="css/owl.theme.default.min.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/media.css">    

    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
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
      <div class="titulo">Meus dados</div>
     
      <div class="line">
       <hr class="linha" noshade>
      </div>


      <div class="dados_box:focus">
        <div class="dados_area">
          <div class="dados_place">
      
      </div></div></div>

      <?php
      
      if ($resultado->num_rows > 0) {
          while ($row = $resultado->fetch_assoc()) {
              echo "<tr>";
              echo "<p class='cadastrados'><strong>Nome:</strong> " . $row["usuario"] . "</p>";
              echo "<p class='cadastrados'><strong>E-mail:</strong> " . $row["email"] . "</p>";
              echo "<p class='cadastrados'><strong>Celular:</strong> " . $row["celular"] . "</p>";
              echo "</tr>";
          }
      } else {
          echo '<tr>Nenhum usuário encontrado.</tr>';
      }
    ?>
      <div class="edit-btn">
        <button class="editar-button" id="openForm">Editar dados</button>
        <button class="edit" id="openForm"><i class="fa-regular fa-pen-to-square" style="color: #000000; font-size: 15px; font-weight: 600; "></i></button>
    </div>
          
        <script>
        var openButton = document.getElementById("openForm");

        openButton.addEventListener("click", function () {
            // URL da página do formulário
            var formPageURL = "editDados.php";

            // Dimensões da janela de pop-up
            var width = 400;
            var height = 400;

            // Calcula a posição central da janela de pop-up
            var left = (screen.width - width) / 2;
            var top = (screen.height - height) / 2;

            // Abre a janela de pop-up
            window.open(formPageURL, "Popup", "width=" + width + ",height=" + height + ",top=" + top + ",left=" + left);
        });
        </script>
    </section>
    <script src="script.js"></script>

  </body>
</html>