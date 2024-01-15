<?php
session_start();

if (isset($_GET['idProd'])) {
    $produto_id = $_GET['idProd'];

     foreach ($_SESSION['carrinho'] as $indice => $produto) {
        if ($produto['idProd'] == $produto_id) {
            // Remove o produto do carrinho
            unset($_SESSION['carrinho'][$indice]);
            $_SESSION['totalProdutosCarrinho'] = count($_SESSION['carrinho']);
            break;
        }
    }

}

    header("Location: carrinho.php");

?>

