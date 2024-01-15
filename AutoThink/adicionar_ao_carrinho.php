<?php
session_start();

        if (isset($_POST['idProd'])) {
            $productId = $_POST['idProd'];
            
            $host = "45.152.44.154";
            $usuario = "u451416913_grupo17";
            $senha = "Grupo17@123";
            $banco = "u451416913_grupo17";

            $conn = new mysqli($host, $usuario, $senha, $banco);

            if ($conn->connect_error) {
                die("Erro na conexão com o banco de dados: " . $conn->connect_error);
            }

            $productId = $conn->real_escape_string($productId);
            $sql = "SELECT * FROM produtos WHERE idProd = '$productId'";
            $resultado = $conn->query($sql);

            if ($resultado->num_rows > 0) {
                $produto = $resultado->fetch_assoc();
                
                if (isset($_POST['addToCart'])) {
                // Adiciona o produto no carrinho "addToCart"
                if (!isset($_SESSION['carrinho'])) {
                    $_SESSION['carrinho'] = array();
                }
                $_SESSION['carrinho'][$productId] = $produto;
                $_SESSION['totalProdutosCarrinho'] = count($_SESSION['carrinho']);
                    header("Location: index.php");
                } elseif (isset($_POST['buy'])) {
                // Adiciona o produto no carrinho "comprar"
                if (!isset($_SESSION['carrinho'])) {
                    $_SESSION['carrinho'] = array();
                }
                $_SESSION['carrinho'][$productId] = $produto;
                $_SESSION['totalProdutosCarrinho'] = count($_SESSION['carrinho']);
                    header("Location: carrinho.php");
                }
                } else {
                    echo "Produto não encontrado.";
                }

            $conn->close();
        }
?>
