<?php
session_start();

$totalProdutosCarrinho = isset($_SESSION['totalProdutosCarrinho']) ? $_SESSION['totalProdutosCarrinho'] : 0;

$host = "45.152.44.154";
$usuario = "u451416913_grupo17";
$senha = "Grupo17@123";
$banco = "u451416913_grupo17";

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Parte das Categorias
$categoria_selecionada = isset($_GET['categoria']) ? $_GET['categoria'] : "";

// Parte busca os produtos da categoria selecionada
$sql = "SELECT * FROM produtos";
if (!empty($categoria_selecionada)) {
    $sql .= " WHERE categoria = ?";
}

$stmt = $conn->prepare($sql);

if (!empty($categoria_selecionada)) {
    $stmt->bind_param("s", $categoria_selecionada);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> AutoThink - Produtos </title>
        <link rel="icon" href="images/AT.png">
        <link href="css/jquery.bxslider.min.css" rel="stylesheet">
        <link href="css/owl.carousel.min.css" rel="stylesheet">
        <link href="css/owl.theme.default.min.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/media.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

        <style>
            .dropdown-item {
                background: #183257;
                color: white;
                transition: background 0.3s, color 0.3s;
            }

            .dropdown-item:hover {
                background: white !important;
                color: #183257 !important;
            }
            .user-menu ul li {
                width: 109px;
            }
            #floating-button {
            position: fixed;
            width: 50px;
            height: 50px;
            bottom: 20px;
            right: 20px;
            background-color: #183257;
            color: white;
            border: none !important;
            border-radius: 50%;
            padding: 10px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            #floating-button:hover {
            background-color: #122040;
            }
            #tooltip {
            position: fixed;
            bottom: 25px;
            right: 80px;
            background-color: #122040;
            color: white;
            padding: 8px;
            border-radius: 4px;
            display: none;
            }
        </style>

    </head> 
    <body>
            <div class="wrapper">
            <div class="navigation-bar">
            <div class="container">

                <!-- Logo AutoThink -->
                <div class="logo">
                    <img src="images/logo-fundo.png" alt="logo">
                </div>

                <!--Caixa de Pesquisa -->
                <div class="search-area">
                <form action="index.php" method="post">
                    <input type="text" name="search_box" class="search_box" placeholder="Pesquisar Produtos">
                    <button class="search_btn btn btn-white" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                </div>

                <!-- Login/Cadastro e carrinho -->
                <div class="user-menu">
                    <ul>

        <?php
        if(isset($_SESSION['usuario'])) {
            // Usuário autenticado
            $usuario = $_SESSION['usuario'];
        ?>
            <li class="dropdown">
                <!-- Dropdown para usuário autenticado -->
                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" >
                    Olá, <?php echo $usuario; ?>
                </a>
                            <div class="dropdown-menu dropdown-menu-right" style="width: 200px; background: #183257;">
                                <a href="cliente/cliente.php"><button type="button" class="dropdown-item text-white"><i class="fa-solid fa-user"></i> Sua Conta</button></a>
                                <a href="cliente/pedidos.php"><button type="button" class="dropdown-item text-white"><i class="fa-solid fa-basket-shopping"></i> Suas Compras</button></a>
                                <a href="dashboard.php"><button type="button" class="dropdown-item text-white"><i class="fa-solid fa-table-columns"></i> Dashboard</button></a>
                                
                            <div class="divider">
                                <hr style="color: white;">
                                <a href="logout.php"><button type="button" class="dropdown-item text-center bg-warning text-white" style="background: #D4AF1B;"><i class="fa-solid fa-sign-out"></i> Sair</button></a>
                            </div>
                            </div>
                        </li>
                        <li><a href="carrinho.php"><i class="fa-solid fa-cart-shopping"></i> Carrinho (<?php echo $totalProdutosCarrinho; ?>)</a></li>
        <?php
        } else {
        // Usuário não autenticado
        ?>

            <li><a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-hoshpopup="true" aria-expanded="false"><i class="fa-solid fa-user"></i> Cadastro</a>
                <!-- Dropdown Menu -->
                <div class="dropdown-menu dropdown-menu-right" style="width: 200px; background: #183257;">
                <a href="cadastro.php"><button type="button" class="dropdown-item"><i class="fa-solid fa-user"></i> Sua Conta</button></a>
                <a href="cadastro.php"><button type="button" class="dropdown-item"><i class="fa-solid fa-basket-shopping"></i> Suas Compras</button></a>
                <a href="dashboard.php"><button type="button" class="dropdown-item"><i class="fa-solid fa-table-columns"></i> Dashboard</button></a>
                            
                    <div class="divider">
                        <hr style="color: white;">
                        <p class="text-center text-white" style="height: 10px; line-height: 20px;"><small>Não tem uma conta?</small></p>
                        <a href="cadastro.php"><button type="button" class="dropdown-item text-center text-white"><i class="fa-solid fa-user"></i> Cadastro</button></a>
                        <a href="login.php"><button type="button" class="dropdown-item text-center bg-warning text-white" style="background: #D4AF1B;"><i class="fa-solid fa-user"></i> Login</button></a>
                    </div>
                </div>
            </li>
                <li><a href="carrinho.php"><i class="fa-solid fa-cart-shopping"></i> Carrinho (<?php echo $totalProdutosCarrinho; ?>)</a></li><?php
                }?>
            </ul>
        </div>
    </div>
    </div>

            <!-- Menu de categorias -->
            <div class="wrapper">
            <div class="category-menu">
            <div class="container">
                <div class="categorie-classes">
                    <a href="?categoria=acessórios">Acessórios</a>
                    <a href="?categoria=capacetes">Capacetes</a>
                    <a href="?categoria=jaquetas">Jaquetas</a>
                    <a href="?categoria=moto%20peças">Moto Peças</a>
                    <a href="?categoria=pneus">Pneus</a>
                </div>
            </div>
        </div>

        <!-- Barra de pesquisa -->
        <?php
        if (isset($_POST['search_box'])) {
        if (isset($_POST['search_box'])) {
        $search_query = $_POST['search_box'];
        $sql = "SELECT idProd, nomeP, descricao, preco, imagem FROM produtos WHERE nomeP LIKE '%$search_query%'";
        $result = $conn->query($sql);
        echo '<div class="d-flex justify-content-center">';
        echo '<div class="row">';
        
        // Verifica se algum produto foi encontrado
        if ($result->num_rows > 0) {
            echo '<h3 style="margin-left: 100px; font-size: 35px;" width="100%">Produtos encontrados </h3><br>';
            echo '<div class="d-flex justify-content-center">';
            echo '<div class="row">';
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-4 mb-4" style="margin-top: 110px;">';
                echo '<div class="card" style="width: 18rem; text-align: center; height: 100%">';
                echo '<img src="images/products/' . $row['imagem'] . '" class="card-img-top" alt="Imagem do Produto">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['nomeP'] . '</h5>';
                echo '<p class="card-text">' . $row['descricao'] . '</p>';
                echo '<p class="card-text">R$ ' . $row['preco'] . '</p>';
                //btn Adicionar ao carrinho
                echo '<div class="btn-group" role="group">';
                echo '<form action="adicionar_ao_carrinho.php" method="post">';
                echo '<input type="hidden" name="idProd" value="' . $row['idProd'] . '">';
                echo '<button type="submit" name="addToCart" class="btn btn-warning">
                <i class="fa-solid fa-cart-shopping" style="color: #000;"></i></button>';
                echo '<button type="submit" name="buy" class="btn btn-warning" style="font-weight: bold; margin-left: 10px; border-radius: 10px;">Comprar</button>';
                echo '</form>';
                echo '</div>';
                echo '</div></div></div></br></br>';
            }
            echo '</div>'; 
            echo '</div>';
        } else {
            // Nenhum produto foi encontrado
            echo '<h3 style="margin-left: 100px; font-size: 35px;" width="100%">Nenhum produto encontrado </h3><br>';
            // Exibe outros 3 produtos existentes
            $sql = "SELECT idProd, nomeP, descricao, preco, imagem FROM produtos LIMIT 3";
            $result = $conn->query($sql);
            echo '<h3 style="margin-left: 100px; font-size: 27px;" width="100%">Outros produtos:</h3><br><br>';
            echo '<div class="d-flex justify-content-center">';
            echo '<div class="row">';
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-4 mb-4" style="margin-top: 110px;">';
                echo '<div class="card" style="width: 18rem; text-align: center; height: 100%">';
                echo '<img src="images/products/' . $row['imagem'] . '" class="card-img-top" alt="Imagem do Produto">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['nomeP'] . '</h5>';
                echo '<p class="card-text">' . $row['descricao'] . '</p>';
                echo '<p class="card-text">R$ ' . $row['preco'] . '</p>';
                //btn Adicionar ao carrinho
                echo '<div class="btn-group" role="group">';
                echo '<form action="adicionar_ao_carrinho.php" method="post">';
                echo '<input type="hidden" name="idProd" value="' . $row['idProd'] . '">';
                echo '<button type="submit" name="addToCart" class="btn btn-warning">
                <i class="fa-solid fa-cart-shopping" style="color: #000;"></i></button>';
                echo '<button type="submit" name="buy" class="btn btn-warning" style="font-weight: bold; margin-left: 10px; border-radius: 10px;">Comprar</button>';
                echo '</form>';
                echo '</div>';
                echo '</div></div></div>';
            }
            echo '</div>'; 
            echo '</div>';
        }
    }
    }?>

        <!-- Exibe os slides apenas se nenhuma categoria for selecionada e se a caixa de pesquisa não foi usada -->
        <?php if (empty($categoria_selecionada) && empty($_POST['search_box'])): ?>
            <!-- slides -->
        <div class="slider-area">
            <div class="slider">
                <div>
                    <a href="#"><img src="images/slider/pneu-slider.png"></a>
                    <div class="slider-content">
                        <a href="#" class="slider-name">KIT PAR PNEU MAGGION SPORTISSIMO</a></br>
                        <a href="#" class="slider-description">100-80-17 52S TL+140-70-17 66H TL Yamaha YS 250 Fazer ABS 2018 a 2024</a></br>
                        <a href="#" class="slider-price">R$ 572,30</a><a href="#" class="slider-description"> à vista</a>
                    </div>
                </div>
                <div>
                    <a href="#"><img src="images/slider/pastilha-slider.png"></a>
                    <div class="slider-content">
                        <a href="#" class="slider-name">KIT PASTILHA</a></br>
                        <a href="#" class="slider-description">Kit Pastilha Sapata Freio Fiat Palio Hatch 96 a 2012 Frasle</a></br>
                        <a href="#" class="slider-price">R$ 89,42</a><a href="#" class="slider-description"> à vista</a>
                    </div>
                </div>
                <div>
                    <a href="#"><img src="images/slider/amoretecedor-slider.png"></a>
                    <div class="slider-content">
                        <a href="#" class="slider-name">KIT 2 AMORTECEDOR NAKATA</a></br>
                        <a href="#" class="slider-description">2 Amortecedor Fiat Uno Mille 88 a 2013 Dianteiro Nakata</a></br>
                        <a href="#" class="slider-price">R$ 298,68</a><a href="#" class="slider-description"> à vista</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <?php endif; ?>

         <!-- Exibe os produtos se nenhuma categoria foi selecionada e se a caixa de pesquisa não foi usada-->
         <?php if (empty($categoria_selecionada) && (!isset($result) || $result->num_rows === 0)): ?>
        <h3 style="margin-left: 25px; font-size: 50px;" width="100%">Produtos</h3>
        <div class="line" style="width: 93%; border: 1px solid #6A6767; margin: 50px;"></div>

        <!-- Produtos -->
        <div class="produtos" style="align-items: center;">
        <div class="container">
        <div class="row">
            
            </div>
        </div>
    </div>
<?php endif; ?>

        <div class="product-list" style="align-items: center;">
        <div class="container">
            <div class="row">
                <?php
                // Exibe a lista de produtos quando uma categoria foi selecionada
                if (isset($result) && $result->num_rows > 0) {
                    if (!empty($categoria_selecionada)) {
                        echo "<p>Produtos da categoria: $categoria_selecionada</p>";
                    }
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-md-4 mb-4" style="margin-top: 15px;">';
                        echo '<div class="card" style="width: 18rem; text-align: center; height: 100%">';
                        echo '<img src="images/products/' . $row['imagem'] . '" class="card-img-top" alt="Imagem do Produto">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $row['nomeP'] . '</h5>';
                        echo '<p class="card-text">' . $row['descricao'] . '</p>';
                        echo '<p class="card-text">R$ ' . $row['preco'] . '</p>';
                        //btn Adicionar ao carrinho
                        echo '<div class="btn-group" role="group">';
                        echo '<form action="adicionar_ao_carrinho.php" method="post">';
                        echo '<input type="hidden" name="idProd" value="' . $row['idProd'] . '">';
                        echo '<button type="submit" name="addToCart" class="btn btn-warning">
                        <i class="fa-solid fa-cart-shopping" style="color: #000;"></i></button>';
                        echo '<button type="submit" name="buy" class="btn btn-warning" style="font-weight: bold; margin-left: 10px; border-radius: 10px;">Comprar</button>';
                        echo '</form>';
                        echo '</div>';

                        echo '</div></div></div></br></br>';
                    }
                } else {
                    echo '<h3 style="margin-left: 100px; font-size: 27px; margin-bottom: 150px; margin-top: 10px;" width="100%">Outros produtos:</h3><br><br>';
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <button id="floating-button">
              <i class="fa-solid fa-question fa-2xl" style="color: #edeff3;"></i>
          </button>

          <div id="tooltip">Relatar dúvida</div>

          <script>
              const button = document.getElementById('floating-button');
              const tooltip = document.getElementById('tooltip');

              button.addEventListener('mouseover', () => {
                  tooltip.style.display = 'block';
              });

              button.addEventListener('mouseout', () => {
                  tooltip.style.display = 'none';
              });

              button.addEventListener('click', () => {
                  window.open('https://mail.google.com/mail/?view=cm&fs=1&to=mrninfoservice@gmail.com', '_blank');
              });
          </script>

                <!-- Rodapé -->

                <footer>
                <div id="unidad-area" style="background-color: #183257; width: 100%; text-align: center; ">
                    <div class="container" >
                        <div class="row" style="padding: 50px 0 50px 0;">
                            <div class="col-md-4 unidad-box" >
                                <h2 class="main-title text-light" style="line-height: 50px;">UNIDADE</h2>
                                <a href="#unidad"><button type="button" class="dropdown-item text-white" style="font-weight: bold; font-size: 20px; line-height: 40px; text-decoration: none"><i class="fa-solid fa-shop" style="color: #fdec52;"></i> Unidades</button></a>
                                <a href="MRN/index.html"><button type="button" class="dropdown-item text-white" style="font-weight: bold; font-size: 20px; line-height: 40px; text-decoration: none"><i class="fa-solid fa-circle-info" style="color: #fdec52;"></i> Sobre a empresa</button></a>
                            </div>
                            <div class="col-md-4 unidad-box">
                                <img src="images/logo-fundo.png" alt="logo" width="200px" height="80px" style="margin-top: 25px;">
                            </div>
                            <div class="col-md-4 unidad-box">
                            <h2 class="main-title text-light" style="line-height: 50px;">ENTRE EM CONTATO</h2>
                                <a href="https://wa.me/19998607269" target="_blank"><button type="button" class="dropdown-item text-white" style="font-weight: bold; font-size: 20px; line-height: 40px; text-decoration: none"><i class="fa-brands fa-whatsapp" style="color: #fdec52;"></i> (19) 99860-7269</button></a>
                                <a href="mailto:mrninfoservice@gmail.com"><button type="button" class="dropdown-item text-white" style="font-weight: bold; font-size: 20px; line-height: 40px; text-decoration: none"><i class="fa-solid fa-envelope" style="color: #fdec52;"></i> mrninfoservice@gmail.com</button></a>
                            </div>
                        </div>
                    </div>
            <!-- Linha -->
            <p style="width: 95%; height: 1; border: 1px solid #D4AF1B; margin: auto;"></p>
                        
                <div class=" p-3 text-center" style="background-color: #183257; margin-top: 15px; color: white;">
                <p>All rights reserved™ Created by<a href="MRN/index.html" style="color: white; text-decoration: none"> MRN </a>- 2023</p>
            </div>


                </div>
            </footer>

        </div>

        </div>

        

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://kit.fontawesome.com/9781bdb3cd.js" crossorigin="anonymous"></script>

    </body>

<style>
        .bx-wrapper .bx-controls-direction a {
            position: absolute;
            top: 50%;
            margin-top: -16px;
            outline: 0;
            width: 32px;
            height: 32px;
            text-indent: -9999px;
            z-index: 1;
        }
        </style>
</html>