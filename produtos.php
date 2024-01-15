<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Produtos</title>
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="Pstyle.css" />
    <!-- Boxicons CDN Link -->
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
          <a href="index.php">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
          <span class="tooltip">Dashboard</span>
        </li>
        <li>
          <a href="produtos.php">
            <i class='bx bxs-shopping-bag'></i>
            <span class="links_name">Produtos</span>
          </a>
          <span class="tooltip">Produtos</span>
        </li>
        <li>
          <a href="unidades.html">
            <i class='bx bxs-building'></i>
            <span class="links_name">Unidades</span>
          </a>
          <span class="tooltip">Unidades</span>
        </li>
        <li>
          <a href="pedidos.php">
            <i class="fa-solid fa-clipboard-check"></i>
            <span class="links_name">Pedidos</span>
          </a>
          <span class="tooltip">Pedidos</span>
        </li>
        <li>
          <a href="clientes.php">
            <i class="bx bxs-user"></i>
            <span class="links_name">Clientes</span>
          </a>
          <span class="tooltip">Clientes</span>
        </li>

        <div class="logout-button">
          <a href="AutoThink/login.php">
          <button class="btnout" id="btn2">Log Out</button>
          </a>
        </div>
      </ul>
    </div>

    <section class="home-section">
      <div class="sub">
      <div class="titulo">Produtos</div>
      
      <div class="line">
      <!--noshade » elimina a sombra da linha, dando um efeito tridimensional.-->
       <hr class="linha" noshade>
      </div> 

        <div class="adcp">
        <button class="apB" id="openForm">Adicionar Produto</button>
        </div>
          
        <script>
        var openButton = document.getElementById("openForm");

        openButton.addEventListener("click", function () {
            // URL da página do formulário
            var formPageURL = "form.php";

            // Tamanho da janela
            var width = 500;
            var height = 500;
            var left = (screen.width - width) / 2;
            var top = (screen.height - height) / 2;

            // Abre a janela
            window.open(formPageURL, "Popup", "width=" + width + ",height=" + height + ",top=" + top + ",left=" + left);
            console.log("JavaScript funcionando");
        });
    </script>

    <!-- Exibe a lista de produtos -->
    <?php include("exibir_produtos.php"); ?>
      
    </section>

    <script src="script.js"></script>
  </body>
</html>