<?php 
session_start();

$totalProdutosCarrinho = isset($_SESSION['totalProdutosCarrinho']) ? $_SESSION['totalProdutosCarrinho'] : 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
  <title> Dashboard </title>
        <link rel="icon" href="images/AT.png">
        <link href="css/jquery.bxslider.min.css" rel="stylesheet">
        <link href="css/owl.carousel.min.css" rel="stylesheet">
        <link href="css/owl.theme.default.min.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/media.css">
        <link defer href="style.css" rel="stylesheet" type="text/css">
       
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
                                <a href="index.php"><button type="button" class="dropdown-item text-white"><i class="fa-solid fa-table-columns"></i> AutoThink</button></a>
                                
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
                <a href="index.php"><button type="button" class="dropdown-item"><i class="fa-solid fa-table-columns"></i> AutoThink</button></a>
                            
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


            </nav>
            </div>           
        </div>  <!-- Fim do Menu -->
    </div>
    <!--Carrossel de imagens -->
        <!-- slides -->
        <div class="slider-area" style="margin-top: 90px;">
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
        <!-- Fim do carrossel -->

          <!-- Texto rodutos mais Vendidos -->
          <div class="container-fluid">
            <section class="product-section" style="width: 100%; padding: 50px 55px; margin: 15px 0;">
                <div class="section-heading" style="width: 100%; height: 40px; margin-bottom: 50px;">
                    <h3 class="heading" style="color: #183257; font-size: 40px;"><strong>Mais Vendidos</strong></h3>
                </div><!-- Fim de texto produtos mais vendidos -->

                <!-- imagens e info dos produtos mais vendidos -->
                <div class="section-product-cards" style="width:100%; margin-top: 30px; text-align: center;">
                    <div class="product-card" style="width: 360px; height: 470px; box-shadow: 0px 2px 10px rgba(0,0,0,0.3); position: relative; overflow: Hidden; margin: 10px 20px; border-radius: 15px; display: inline-block;">
                        <!-- Imagem do produto -->
                        <div class="product-image" style="text-align: center; margin: 25px">
                            <img src="images/products/protetor.png" alt="" width="200px" height="200px">
                        </div>
                        <!-- Descrição do produto -->
                        <div class="product-details" style="padding: 0 20px 0 20px; text-align: center;">
                            <h5 class="product-name">Protetor de Motor YBR Factor Frances - Pro Tork</h5>
                            <p class="product-price text-danger" style="font-size: 40px;"><strong>R$ 44,00 </strong></p>
                        </div>
                        <!-- botão "comprar" -->
                        <div class="card-contents" style="">
                            <button type="button" class="btn" style="background-color: #FDEC52; text-align: center; width: 100%">
                                <p style="font-size: 40px; color: #183257; "><strong>Comprar</strong></p>
                            </button>
                        </div>
                    </div>

                    <div class="product-card" style="width: 360px; height: 470px; box-shadow: 0px 2px 10px rgba(0,0,0,0.3); position: relative; overflow: Hidden; margin: 10px 20px; border-radius: 15px; display: inline-block;">
                        <!-- Imagem do produto -->
                        <div class="product-image" style="text-align: center; margin: 25px">
                            <img src="images/products/capacete1.png" alt="" width="200px" height="200px">
                        </div>
                        <!-- Descrição do produto -->
                        <div class="product-details" style="padding: 0 20px 0 20px; text-align: center;">
                            <h5 class="product-name">Capacete Norisk Darth Monocolor Preto Fosco</h5>
                            <p class="product-price text-danger" style="font-size: 40px;"><strong>R$ 649,90 </strong></p>
                        </div>
                        <!-- botão "comprar" -->
                        <div class="card-contents" style="">
                            <button type="button" class="btn" style="background-color: #FDEC52; text-align: center; width: 100%">
                                <p style="font-size: 40px; color: #183257; "><strong>Comprar</strong></p>
                            </button>
                        </div>
                    </div>

                    <div class="product-card" style="width: 360px; height: 470px; box-shadow: 0px 2px 10px rgba(0,0,0,0.3); position: relative; overflow: Hidden; margin: 10px 20px; border-radius: 15px; display: inline-block;">
                        <!-- Imagem do produto -->
                        <div class="product-image" style="text-align: center; margin: 25px">
                            <img src="images/products/jaqueta1.png" alt="" width="200px" height="200px">
                        </div>
                        <!-- Descrição do produto -->
                        <div class="product-details" style="padding: 0 20px 0 20px; text-align: center;">
                            <h5 class="product-name">Jaqueta Arizona Masculina Prime Preta</h5>
                            <p class="product-price text-danger" style="font-size: 40px;"><strong>R$ 199,90 </strong></p>
                        </div>
                        <!-- botão "comprar" -->
                        <div class="card-contents" style="">
                            <button type="button" class="btn" style="background-color: #FDEC52; text-align: center; width: 100%">
                                <p style="font-size: 40px; color: #183257; "><strong>Comprar</strong></p>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Linha -->
            <p style="width: 95%; height: 1; border: 1px solid #6A6767; margin: auto;"></p>

            <!-- Nossas Unidades "texto"-->
            <div class="container-fluid" id="unidad" style="scroll-margin-top: 5.5em;">
            <section style="width: 100%; padding: 50px 55px; margin: 15px 0;">
                <div class="section-heading"  style="width: 100%; height: 40px; margin-bottom: 100px; text-align: center;">
                    <h3 class="heading"  style="color: #183257; font-size: 70px; "><strong>Nossas Unidades</strong></h3>
                </div>
                <!-- Fim de nossas unidades "texto"-->

                <!-- Nossas Unidades "endereço" -->
                <div class="section-location-cards" style="width:100%; margin-top: 30px; margin-left: 10px;">

                <div class="location-card" style="width: 400px; height: 470px; box-shadow: 0px 2px 10px rgba(0,0,0,0.3); position: relative; overflow: Hidden; margin: 10px 20px; border-radius: 15px; display: inline-block;">
                        <!-- Endereço -->
                        <div class="location-details" style="padding: 20px; ">
                            <h2 class="location-name"  style="color: #183257; margin-bottom: 30px; margin-top: 30px;text-align: center;"><strong>Loja Campinas Centro</strong></h2>
                            <p style="font-size: 25px;">Rua xxxxxxxx - xxx </br>Telefone: 5110-6110, digite 21</p>
                            <p style="font-size: 25px;">De Segunda a Sexta das 8h às 20h </br>Domingo das 7h às 14h</p>
                        </div>
                        <!-- botão "Ver no mapa" -->
                        <div class="card-contents" style=" text-align: center; ">
                            <button type="button" class="btn" style="background-color: #D9D9D9; height: 60px; width: 150px; border-radius: 20px;">
                            <a href="https://goo.gl/maps/ugbBbirFHBYGPBy59" target="_blank" 
                                style="font-size: 20px; color: black; text-decoration:none;"><strong>Ver no mapa</strong></a>
                            </button>
                        <!-- botão "Traçar rota" -->
                            <button type="button" class="btn" style="background-color: #D9D9D9; height: 60px; width: 150px; border-radius: 20px;">
                                <a href="http://maps.google.com/?saddr=Current%20Location&daddr=Av.Santana,1995-Parque Ortolândia,Hortolândia-SP,13184-210" target="_blank" 
                                style="font-size: 20px; color: black; text-decoration:none;"><strong>Traçar rota</strong></a>
                            </button>
                        </div>
                    </div>
                    <div class="location-card" style="width: 400px; height: 470px; box-shadow: 0px 2px 10px rgba(0,0,0,0.3); position: relative; overflow: Hidden; margin: 10px 20px; border-radius: 15px; display: inline-block;">
                        <!-- Endereço -->
                        <div class="location-details" style="padding: 20px; ">
                            <h2 class="location-name"  style="color: #183257; margin-bottom: 30px; margin-top: 30px;text-align: center;"><strong>Loja Hortolândia</strong></h2>
                            <p style="font-size: 25px;">Rua xxxxxxxx - xxx </br>Telefone: 5110-6110, digite 21</p>
                            <p style="font-size: 25px;">De Segunda a Sexta das 8h às 20h </br>Domingo das 7h às 14h</p>
                        </div>
                        <!-- botão "Ver no mapa" -->
                        <div class="card-contents" style=" text-align: center; ">
                            <button type="button" class="btn" style="background-color: #D9D9D9; height: 60px; width: 150px; border-radius: 20px;">
                            <a href="https://goo.gl/maps/ugbBbirFHBYGPBy59" target="_blank" 
                                style="font-size: 20px; color: black; text-decoration:none;"><strong>Ver no mapa</strong></a>
                            </button>
                        <!-- botão "Traçar rota" -->
                            <button type="button" class="btn" style="background-color: #D9D9D9; height: 60px; width: 150px; border-radius: 20px;">
                                <a href="http://maps.google.com/?saddr=Current%20Location&daddr=Av.Santana,1995-Parque Ortolândia,Hortolândia-SP,13184-210" target="_blank" 
                                style="font-size: 20px; color: black; text-decoration:none;"><strong>Traçar rota</strong></a>
                            </button>
                        </div>
                    </div>
                    <div class="location-card" style="width: 400px; height: 470px; box-shadow: 0px 2px 10px rgba(0,0,0,0.3); position: relative; overflow: Hidden; margin: 10px 20px; border-radius: 15px; display: inline-block;">
                        <!-- Endereço -->
                        <div class="location-details" style="padding: 20px; ">
                            <h2 class="location-name"  style="color: #183257; margin-bottom: 30px; margin-top: 30px;text-align: center;"><strong>Loja Limeira Centro</strong></h2>
                            <p style="font-size: 25px;">Rua xxxxxxxx - xxx </br>Telefone: 5110-6110, digite 21</p>
                            <p style="font-size: 25px;">De Segunda a Sexta das 8h às 20h </br>Domingo das 7h às 14h</p>
                        </div>
                        <!-- botão "Ver no mapa" -->
                        <div class="card-contents" style=" text-align: center; ">
                            <button type="button" class="btn" style="background-color: #D9D9D9; height: 60px; width: 150px; border-radius: 20px;">
                            <a href="https://goo.gl/maps/ugbBbirFHBYGPBy59" target="_blank" 
                                style="font-size: 20px; color: black; text-decoration:none;"><strong>Ver no mapa</strong></a>
                            </button>
                        <!-- botão "Traçar rota" -->
                            <button type="button" class="btn" style="background-color: #D9D9D9; height: 60px; width: 150px; border-radius: 20px;">
                                <a href="http://maps.google.com/?saddr=Current%20Location&daddr=Av.Santana,1995-Parque Ortolândia,Hortolândia-SP,13184-210" target="_blank" 
                                style="font-size: 20px; color: black; text-decoration:none;"><strong>Traçar rota</strong></a>
                            </button>
                        </div>
                    </div>

            </section>
            </div>
             <!-- Linha -->
             <p style="width: 95%; height: 1; border: 1px solid #6A6767; margin: auto;"></p>

             <!-- Sobre nós "texto"-->
            <div class="container-fluid" id="sobre" style="scroll-margin-top: 5.5em;">
            <section style="width: 100%; padding: 50px 55px; margin: 15px 0;">
                <div class="section-heading" style="width: 100%; height: 40px; margin-bottom: 100px; text-align: center;">
                    <h3 class="heading" style="color: #183257; font-size: 70px; "><strong>Sobre Nós</strong></h3>
                </div>
                <!-- Fim de sobre nós "texto"-->

                <!--Missão -->   
            <div class="mission-card" style="width: 95%; height: 170px; box-shadow: 0px 2px 10px rgba(0,0,0,0.3); position: relative; overflow: hidden; margin: 10px 20px; border-radius: 15px; display: inline-block; background-color: #526B8E; text-align: right;">
                <div style="align-items: center; background-color: #20406D; display: inline-block; width: 350px; height: 170px; border-radius: 15px;  margin-right: 15px;">
                    <p style="font-size: 45px; color: #FED017; text-align: center; line-height: 170px; margin: 0;"><strong>Missão</strong></p>                       
                </div> 
                <div style="display: inline-block; width: calc(100% - 370px); height: 170px; overflow: auto; text-align: justify; vertical-align: middle;">
                    <p style="font-size: 25px; color: white; padding: 15px; margin-right: 15px;"><strong>
                        Fornecer aos nossos clientes as melhores soluções em autopeças e serviços automotivos, com qualidade, eficiência e atendimento excepcional, garantindo a satisfação e fidelidade dos mesmos.
                    </srong></p>
                </div>
            </div>

                <!--Visão -->
            <div class="mission-card" style="width: 95%; height: 170px; box-shadow: 0px 2px 10px rgba(0,0,0,0.3); position: relative; overflow: hidden; margin: 10px 20px; border-radius: 15px; display: inline-block; background-color: #D4AF1B; text-align: right;">
                <div style="align-items: center; background-color: #FED017; display: inline-block; width: 350px; height: 170px; border-radius: 15px;  margin-right: 15px;">
                    <p style="font-size: 45px; color: #183257; text-align: center; line-height: 170px; margin: 0;"><strong>Visão</strong></p>                       
                </div> 
                <div style="display: inline-block; width: calc(100% - 370px); height: 170px; overflow: auto; text-align: justify; vertical-align: middle;">
                    <p style="font-size: 25px; color: white; padding: 15px; margin-right: 15px;"><strong>
                    Ser reconhecida como líder no mercado de autopeças, pela qualidade de nossos produtos e serviços, inovação, eficiência operacional e excelência no atendimento ao cliente.
                    </srong></p>
                </div>
            </div>

            <!-- Valores -->   
            <div class="mission-card" style="width: 95%; height: 170px; box-shadow: 0px 2px 10px rgba(0,0,0,0.3); position: relative; overflow: hidden; margin: 10px 20px; border-radius: 15px; display: inline-block; background-color: #526B8E; text-align: right;">
                <div style="align-items: center; background-color: #20406D; display: inline-block; width: 350px; height: 170px; border-radius: 15px;  margin-right: 15px;">
                    <p style="font-size: 45px; color: #FED017; text-align: center; line-height: 170px; margin: 0;"><strong>Valores</strong></p>                       
                </div> 
                <div style="display: inline-block; width: calc(100% - 370px); height: 170px; overflow: auto; text-align: justify; vertical-align: middle;">
                    <p style="font-size: 25px; color: white; padding: 15px; margin-right: 15px; margin-top: 35px;"><strong>
                    Comprometimento. Respeito. Inovação. Excelência operacional. Responsabilidade.
                    </srong></p>
                </div>
            </div>
            </section>
            </div> 

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
        

    <script src="js/jquery.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>
    <script src="css\jquery.bxslider.min.css"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://kit.fontawesome.com/9781bdb3cd.js" crossorigin="anonymous"></script>

  </body>
</html>