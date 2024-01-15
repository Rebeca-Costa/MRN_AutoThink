<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>AutoThink Home</title>
    <link rel="icon" href="AT.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--link css bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
    crossorigin="anonymous">
    <!--Font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />

    <!-- Link CSS -->
    <link rel="stylesheet" href="style.css">

  </head>
  <body>
    <!-- navbar -->
    <div class="container-fluid p-0">
    <!--Menu-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="container-fluid">
    <img src="logo-fundo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="menu">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active " href="#">Nossas Unidades</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Sobre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Produtos</a>
        </li>
      <form class="d-flex">
        <button class="btn btn-outline-light" type="button">Cadastrar-se</button>
      </form>
    </div>
    </div>
  </div>
</nav>


<!-- Carrosel -->
<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="4000">
    <div class="produto">
        <div class="descricao">
      <p class="nomePromo">KIT PAR PNEU MAGGION SPORTISSIMO</p></br>
      <p class="descPromo">100-80-17 52S TL+140-70-17 66H TL Yamaha YS 250 Fazer ABS 2018 a 2024</p>
      <p class="precoPromo">R$ 572,30 à vista</p>
    </div>
      <div class="imgProd">
      <img src="pneu.png" class="d-block" width="400px" height="400px" alt="...">
    </div>
    </div>
    <div class="carousel-item" data-bs-interval="4000">
    <div class="produto">
        <div class="descricao">
      <p class="nomePromo">Bagageiro CHAPAM</p></br>
      <p class="descPromo">Bagageiro Biz 125 / Biz 100 2014 em diante</p>
      <p class="precoPromo">R$ 137,30 à vista</p>
    </div>
      <img src="bagageiro.png" class="d-block" width="400px" height="400px" alt="...">
    </div>
    </div>
    <div class="carousel-item">
    <div class="produto">
    <div class="descricao">
      <p class="nomePromo">Capacete CARRERA</p></br>
      <p class="descPromo">CAPACETE LS2 FF353 RAPID CARRERA</p>
      <p class="precoPromo">R$ 699,99 à vista</p>
    </div>
      <img src="capacete.png" class="d-block" width="400px" height="400px" alt="...">
    </div>
  </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
</button>
</div>

<!-- itens -->
<div class="row">
  <div class="col-md-10">
    <!--produtos-->
    <div class="row">
    <div class="col-md-3 mb-2">
      <div class="card">
      <img src="kit-relacao.png" class="card-img-top" alt="...">
      <div class="card-body">
      <h5 class="card-title text-center">Kit Relação Falcon - Scud</h5>
      <p class="card-text text-center">R$ 492,44 à vista</p>
      <div class="d-grid gap-2 col-6 mx-auto">
      <a href="#" class="btn btn-warning text-light">Comprar</a>
      </div>
      </div>
    </div>
      </div>
      <div class="col-md-3 mb-2">
      <div class="card">
      <img src="amortecedor-nakata.png" class="card-img-top" alt="...">
      <div class="card-body">
      <h5 class="card-title text-center">2 Amortecedor Fiat Uno Mille 88 a 2013 Dianteiro Nakata</h5>
      <p class="card-text text-center">R$ 298,68 à vista</p>
      <div class="d-grid gap-2 col-6 mx-auto">
      <a href="#" class="btn btn-warning text-light">Comprar</a>
      </div>
      </div>
    </div>
      </div>
      <div class="col-md-3 mb-2">
      <div class="card">
      <img src="pastilha-frasle.png" class="card-img-top" alt="...">
      <div class="card-body">
      <h5 class="card-title text-center">Kit Pastilha Sapata Freio Fiat Palio Hatch 96 a 2012 Frasle</h5>
      <p class="card-text text-center">R$ 89,42 à vista</p>
      <div class="d-grid gap-2 col-6 mx-auto">
      <a href="#" class="btn btn-warning text-light">Comprar</a>
      </div>
      </div>
    </div>
      </div>
    </div>
  </div>
</div>

<!-- Rodapé -->
<div class="bg-info p-3 text-center text-light">
  <p>All rights reserved™ Created by MRN - 2023</p>
</div>



    <!--link js bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"></script>

  </body>
</html>