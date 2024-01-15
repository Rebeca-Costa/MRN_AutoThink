<?php
include 'conexao.php';
if(isset($_POST['Sub'])){ 
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $cidade = $_POST['cidade'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];


    $select = "SELECT * FROM cadastro WHERE usuario='$usuario'"; //verifica se a info do usuario está correta
    $q = mysqli_query($con, $select); 

    if(mysqli_num_rows($q)>0){ //se a busca que eu fizer, for maior que 0, ele vai verificar se existe pelo menos uma linha que contém um usuario e uma senha, ele salva a info na $f
        $displayModal = true;
        echo "Usuário já existe";
    }else{
        $i = "INSERT INTO cadastro(usuario, senha, cidade, celular, email)VALUES('$usuario','$senha','$cidade','$celular','$email')";
        mysqli_query($con, $i);  
        $displayModal = true;
        echo "Usuário inserido com sucesso!";
    }
}
?>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <link rel="icon" href="images/AT.png">
  <link href="style.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <script src="https://apis.google.com/js/platform.js" async defer></script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
        var myModal = new bootstrap.Modal(document.getElementById("errorModal"));
        <?php if ($displayModal) { ?>
            myModal.show();
        <?php } ?>
    });
</script>

  <style>
        .button-container {
            background: linear-gradient(to bottom, #183257, #ffffff); 
            width: 35%;
            height: 100vh;
            float: left; 
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .div2 {
            width: 65%; 
            height: 87%;
            float: left;
            display: flex;
            flex-direction: column;
            position: relative; 
            min-height: 65vh; 
            justify-content: center;
           
        }
        .socialmedia-container{
            background: linear-gradient(to bottom, #747474, #ffffff); 
            width: 65%; 
            height: 13%; 
            float: right;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            bottom: 0;
            font-size: 25px;
            color: #6A6767;        
        }
        .button {
        display: block;
        width: 230px;
        height: 70px; 
        text-align: center;
        line-height: 65px;
        margin: 10px ; 
        font-weight: bold;
        font-size: 35px;
        text-decoration: none;  
        border-radius: 25px;
        background-color: transparent;
        color: #ffffff;
        border: none; 
        }
        .button.button-secondary {
            background-color: #ffffff;
            color: #1050AB; 
        }
        /*Formulario*/
        .formulario{
            padding: 25%;
        }
        .flogo{
            text-align: center;
            align-items: center;
        }
        .btn{
            background-color: #183257;
            font-weight: bold;
            font-size: 25px;
            color: #fff;
            float: right;
            border-radius: 35px;
            border: 1px solid #183257 !important;
        }
    </style>
</head>
<body>

    <div class="button-container">
        <a href="login.php" class="button">Login</a>
        <a href="cadastro.php" class="button button-secondary">Cadastro</a>
    </div>
    <div class="div2">
        <div class="formulario">
            <div class="flogo">
                <img src="images/AT.png" alt="logo">
            </div>
            <form method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-4">
                    <label class="sr-only">Usuário</label>
                    <input type="text" name="usuario" class="form-control" placeholder="Usuário">
                  </div>
                  <div class="form-group mb-4">
                    <label class="sr-only">Senha</label>
                    <input type="password" name="senha" class="form-control" placeholder="Senha">
                  </div> 
                  <div class="form-group mb-4">
                    <select name="cidade">
                            <option value="">Cidade</option>
                            <option value="Hortolândia">Hortolândia</option>
                            <option value="Campinas">Campinas</option>
                            <option value="Limeira">Limeira</option>
                    </select>
                  </div>   
                  <div class="form-group mb-4">
                    <label class="sr-only">Celular</label>
                    <input type="tel" name="celular" class="form-control" placeholder="Celular">
                  </div>
                  <div class="form-group mb-4">
                    <label class="sr-only">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                  </div>

                  <input type="submit" name="Sub" id="login" class="btn btn-block login-btn mb-4" style="float: right; width: 170px;" value="Cadastrar">
                </form>
                <a href="#!" class="forgot-password-link"></a>
                <p class="login-card-footer-text"><a href="#!" class="text-reset"></a></p>            
            </div>
    </div>

    <div class="socialmedia-container">
    <p>Ou login com <a href="#" style="text-decoration: none; color: #6A6767; margin-left: 100px;"><i class="fa-brands fa-google" style="color: #1977f3;"></i> Google</a>
    <a href="#" style="text-decoration: none; color: #6A6767;"><i class="fa-brands fa-facebook" style="color: #1977f3;"></i> Facebook</a></p>
    </div>

    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Usuário Cadastrado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                Usuário inserido com sucesso!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

    <script src="https://kit.fontawesome.com/9781bdb3cd.js" crossorigin="anonymous"></script>
</body>
</html>