<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Carrinho</title>
    <link rel="icon" href="images/AT.png">

    <style>

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: row;
    min-height: 100vh;
}
.carrinho-container {
    background-color: #183257;
    color: white;
    padding: 20px;
    width: 40%;
    float: left;
    flex-grow: 1;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
}
.carrinho-header {
    text-align: center;
    margin-bottom: 20px;
}
.carrinho-linha {
    background-color: white;
    height: 2px;
    width: 470px;
    margin: 0 auto;
}
.produtos-carrinho {
    margin-top: 20px;
    flex-grow: 1;
}
.produto {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
}
.produto-nome {
    flex: 1;
}
.carrinho-footer {
    text-align: center;
    margin-top: 20px;
    clear: both;
}
.botao-continuar-comprando {
    background-color: #f39c12;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
}
.card-body{
    font-size: 20px;
}
.btn-remover{
    background-color: #e74c3c;
    color: white;
    padding: 5px 10px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
}
.carrinho-fechar-pedido {
    color: #183257;
    padding: 20px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}
.carrinho-linha2 {
    background-color: #183257;
    width: 800px;
    height: 3px;
    margin-top: 20px;
    margin-bottom: 20px;
}
.carrinho-detalhes {
    background-color: rgba(24, 50, 87, 0.1);
    width: 530px;
    height: 560px;
    display: flex;
    flex-direction: column;
    padding: 20px;
    box-sizing: border-box;
    border-radius: 25px;
    margin-left: 160px;
}
.carrinho-subtotal {
    color: #183257;
    font-weight: bold;
    font-size: 18px;
    margin-bottom: 20px;
}
.carrinho-total {
    color: #183257;
    font-weight: bold;
    font-size: 18px;
    margin-top: 20px;
    margin-bottom: 20px;
    width: 500px;
    border-top: 2px solid #3C3535;
    padding-top: 10px;
}
.carrinho-pagamento,
.carrinho-qr-code,
.carrinho-cpf-cnpj {
    display: flex;
    justify-content: space-between;
    color: #183257;
    font-size: 16px;
    margin-top: 20px;
    width: 500px;
}
.carrinho-linha-horizontal {
    background-color: #3C3535;
    width: 500px;
    height: 2px;
    margin-top: 10px;
    margin-bottom: 10px;
}
.carrinho-trocar {
    display: flex;
    justify-content: space-between;
    color: #183257;
    font-size: 16px;
    margin-top: 20px;
    width: 500px;
}
.carrinho-finalizar {
    width: 200px;
    height: 50px;
    background-color: #183257;
    color: white;
    font-weight: bold;
    font-size: 25px;
    line-height: 35px;
    margin-top: auto;
    cursor: pointer;
    border-radius: 15px;
    margin-left: 140px;
}
.fechar-pedido-container {
    width: 60%; 
    float: right;
}

/* Escolha de pagamento */
.carrinho-pagamento,
.carrinho-cpf-cnpj {
    display: flex;
    justify-content: space-between;
}
.dropdown {
    position: relative;
    display: inline-block;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    min-height: 80px;
    line-height: 30px;
    text-align: center;
    border-radius: 15px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
.dropdown:hover .dropdown-content {
    display: block;
}
.opcao{
    text-decoration: none;
    color: #183257;
}

    </style>

</head>
<body>

    <div class="carrinho-container">
    <div class="carrinho-header">
        <h1>Seu Carrinho</h1>
    </div>
    <hr class="carrinho-linha">
    <div class="produtos-carrinho">

            <?php
            $subtotal = 0;

            // Verifica se o carrinho está vazio
            if (empty($_SESSION['carrinho'])) {
                echo "<p>O carrinho está vazio.</p>";
            } else {
                // Produtos no carrinho
                foreach ($_SESSION['carrinho'] as $productId => $produto) {
                    echo '<div class="card" style="width: 50%; text-align: center; margin-left: 140px;">';
                    echo '<div class="card-body" style="display: flex; justify-content: space-between;">';
                    echo '<p class="card-title" style="display: inline-block;">' . $produto['nomeP'] . '</p>';
                    echo '<p class="card-text" style="display: inline-block;">R$ ' . $produto['preco'] . '</p>';
                    echo '</div>';
                    // Botão Remover
                    echo '<a href="remover_do_carrinho.php?idProd=' . $productId . '" class="btn btn-danger btn-remover">Remover</a>';
                    echo '</div>';
                
                    // Soma o preço
                    $subtotal += $produto['preco'];
                }
            }                
            ?>

    </div>
        <div class="carrinho-footer">
            <p><a href="index.php" class="botao-continuar-comprando">Continuar Comprando</a></p>
            <img src="images/logo-fundo.png" alt="Logo" style="width: 200px; height: 71px; margin-top: 10px;align-self: center;">
        </div>
    </div>

    <div class="fechar-pedido-container">
    <div class="carrinho-fechar-pedido">
    <h1 style="text-align: center;">Fechar Pedido</h1>
    <hr class="carrinho-linha2">
    
    <div class="carrinho-detalhes">
    <div class="carrinho-subtotal">
        Subtotal: R$ <?php echo number_format($subtotal, 2, ',', '.'); ?>
    </div>

    <div class="carrinho-total">
        Total: R$ <?php echo number_format($subtotal, 2, ',', '.'); ?>
    </div>

        
        <hr class="carrinho-linha-horizontal">
        
        <div class="carrinho-pagamento">
        <span>Pagamento</span>
        <div class="dropdown" id="payment-dropdown">
            <span id="selected-payment" onclick="toggleDropdown()">Selecionar</span>
            <div class="dropdown-content">
                <a class="opcao" href="#" onclick="changePayment('Cartão de Crédito')">Cartão de Crédito</a>
                <a class="opcao" href="#" onclick="changePayment('Cartão de Débito')">Cartão de Débito</a>
                <a class="opcao" href="#" onclick="changePayment('Dinheiro')">Dinheiro</a>
            </div>
        </div>
        </div>

        <script>
        const paymentDropdown = document.getElementById('payment-dropdown');
        const cpfCnpjDropdown = document.getElementById('cpf-cnpj-dropdown');

        function togglePaymentDropdown() {
            paymentDropdown.classList.toggle('open');
        }

        function toggleCpfCnpjDropdown() {
            cpfCnpjDropdown.classList.toggle('open');
        }

        document.addEventListener('click', function (event) {
            if (!paymentDropdown.contains(event.target)) {
                paymentDropdown.classList.remove('open');
            }
            if (!cpfCnpjDropdown.contains(event.target)) {
                cpfCnpjDropdown.classList.remove('open');
            }
        });

        function changePayment(paymentMethod) {
            document.getElementById('selected-payment').textContent = paymentMethod;
            paymentDropdown.classList.remove('open');
        }

        function selectCpfCnpj(cpfCnpjOption) {
            document.getElementById('selected-cpf-cnpj').textContent = cpfCnpjOption;
            cpfCnpjDropdown.classList.remove('open');
        }
        </script>
        
        <hr class="carrinho-linha-horizontal">
        
        <div class="carrinho-cpf-cnpj">
        <span>CPF/CNPJ na nota</span>
        <div class="dropdown" id="cpf-cnpj-dropdown">
            <span id="selected-cpf-cnpj" onclick="toggleCpfCnpjDropdown()">Selecionar</span>
            <div class="dropdown-content">
                <a class="opcao" href="#" onclick="selectCpfCnpj('CPF')">CPF</a>
                <a class="opcao" href="#" onclick="selectCpfCnpj('CNPJ')">CNPJ</a>
            </div>
        </div>
        </div>

    
        
        <hr class="carrinho-linha-horizontal">

        <div class="CEP">
        <span>CEP</span>
        </div>

        <hr class="carrinho-linha-horizontal">
        
        <form action="finalizar_compra.php" method="post">
            <button type="submit" class="carrinho-finalizar">Finalizar</button>
        </form>

    </div>
</div>
</div>

</body>
</html>