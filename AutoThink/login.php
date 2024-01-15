<?php
include 'conexao.php';

if(isset($_POST['sub'])) {
    $usuario = $_POST['fusuario'];
    $senha = $_POST['fsenha'];

    // Verifica se é o login do administrador
    if ($usuario === "admin" && $senha === "admin123") {
        header('location: ../index.php');
        exit;
    }
    
    $select = "SELECT * FROM cadastro WHERE usuario='$usuario' AND senha='$senha'";
    $q = mysqli_query($con, $select);
    
    if(mysqli_num_rows($q) > 0) {
        $f = mysqli_fetch_assoc($q);
        $_SESSION['id'] = $f['id'];
        $_SESSION['usuario'] = $f['usuario']; 
        header('location:index.php');
    } else {
        $displayModal = true;
        echo "Usuário ou Senha não existe";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="icon" href="images/AT.png">
  <link href="style.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

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
            height: 100vh; 
            float: left; 
            display: flex;
            flex-direction: column;
            position: relative; 
            min-height: 100vh; 
            justify-content: center;
            align-items: flex-end;
        }
        .socialmedia-container{
            background: linear-gradient(to bottom, #747474, #ffffff);
            width: 100%; 
            height: 13%; 
            float: left; 
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: absolute;
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
            margin: 10px auto; 
            font-weight: bold;
            font-size: 35px;
            text-decoration: none;  
            border-radius: 25px;
            background-color: #ffffff;
            color: #1050AB; 
            border: none; 
        }

        /* Estilo do segundo botão */
        .button.button-secondary {          
            color: #ffffff; 
            background-color: transparent;
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
    <div class="div2" >
    
    <div class="container" >
      <div class="login" >
        <div class="formlogin" style="text-align: center; align-items: center; padding-left: 250px; padding-right: 250px;">
          <div class="imag">
          <img src="images/AT.png" alt="logo">
          </div>
          <div class="oform">
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="user" class="sr-only">Usuário</label>
                    <input type="text" name="fusuario" id="email" class="form-control" placeholder="User">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Senha</label>
                    <input type="password" name="fsenha" id="password" class="form-control" placeholder="***********">
                  </div>
                  <a href="#"  class="login-card-description" style="float: right; text-decoration: none; color: #6A6767;">Esqueceu a senha?</a></br>
                  <div class="entrar-btn">
                    <input type="submit" name="sub" id="login" class="btn btn-block login-btn mb-4" style="float: right; width: 170px; margin-top: 25px;" value="Entrar"></br>    
                  </div>
                </form>

                <a href="#!" class="forgot-password-link"></a>
                <p class="login-card-footer-text"><a href="#!" class="text-reset"></a></p>
               
                
            </div>
          </div>
        </div>
      </div>
    </div>


        <div class="socialmedia-container">
            <p>Ou login com <a href="#" style="text-decoration: none; color: #6A6767; margin-left: 100px;"><i class="fa-brands fa-google" style="color: #1977f3;"></i> Google</a>
            <a href="#" style="text-decoration: none; color: #6A6767;"><i class="fa-brands fa-facebook" style="color: #1977f3;"></i> Facebook</a></p>
        </div>
    </div>

    <!-- Usuario ou senha errada -->

    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Erro de Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                Usuário ou Senha não existe. Por favor, verifique suas credenciais e tente novamente.
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