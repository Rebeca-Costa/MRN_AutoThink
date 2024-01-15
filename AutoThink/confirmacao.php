<!DOCTYPE html>
<html>
<head>
    <title>Pedido Finalizado</title>
    <link rel="icon" href="images/AT.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
    body{
    background-color: #183257;
    position: relative; 
    z-index: 0; 
    font-family: Arial, sans-serif;
    }
    .container {
    width: 650px;
    height: 450px;
    background-color: white;
    margin-left: auto;
    margin-right: auto;
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    margin-top: 180px;
    border-radius: 25px;
    z-index: 0;
    }
    .circle {
    width: 170px;
    height: 170px;
    background-color: #6BEB4B;
    border-radius: 50%;
    position: absolute;
    top: -85px;
    left: 50%; 
    transform: translateX(-50%); 
    z-index: 1;
    }
    .confirm {
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    margin: 0;
    padding: 0;
    color: #ffffff;
    }
    .tittle{
    margin-top: 70px;
    font-size: 50px;
    text-align: center;
    }
    .thanks{
    font-size: 25px;
    text-align: center;
    }
    .button {
    margin-top: 20px;
    text-align: center;
    width: 250px;
    height: 60px;
    background-color: #6BEB4B;
    padding: 5px 10px;
    border-radius: 5px;
    font-weight: bold;
    font-size: 20px;
    }
</style>

</head>
<body>
    
    <div class="circle">
            <p class="confirm"><i class="fa-solid fa-check fa-5x"></i></p>
    </div>
    <div class="container">
        <p class="tittle">Sucesso!</p>
        <p class="thanks">Sua compra foi efetuada com sucesso!</br>Obrigada pela confiança</p>
        <div class="button">
            <a href="dashboard.php" style="text-decoration: none; color: white; line-height: 60px;">Voltar para Dashboard</a>
        </div>
    </div>
    
    <script src="https://kit.fontawesome.com/9781bdb3cd.js" crossorigin="anonymous"></script>
</body>
</html>
