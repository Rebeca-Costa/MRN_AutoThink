<?php
session_start();

// Verifica se o carrinho está vazio
if (empty($_SESSION['carrinho'])) {
    header("Location: carrinho.php"); // Redireciona de volta para o carrinho se estiver vazio -> Não finaliza a compra
    exit();
}

$host = "45.152.44.154";
$usuario = "u451416913_grupo17";
$senha = "Grupo17@123";
$banco = "u451416913_grupo17";

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$produtosCarrinho = $_SESSION['carrinho'];
$idCliente = $_SESSION['id']; 

// Calcula o valor total
$valorTotal = 0;
foreach ($produtosCarrinho as $produto) {
    $valorTotal += $produto['preco'];
}

$dataCompra = date("Y-m-d"); 
$sql = "INSERT INTO compra (id, data, valorTotal) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Erro na preparação da consulta: " . $conn->error);
}

$stmt->bind_param("isd", $idCliente, $dataCompra, $valorTotal);
$stmt->execute();
$idCompra = $stmt->insert_id;

    // insere os produtos da compra na tabela "compra_produtos"
    foreach ($produtosCarrinho as $produto) {
        $idProduto = $produto['idProd'];
        $sqlProdutos = "INSERT INTO compra_produtos (idCompra, idProd) VALUES (?, ?)";
        $stmtProdutos = $conn->prepare($sqlProdutos);
    
        if ($stmtProdutos === false) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    $stmtProdutos->bind_param("ii", $idCompra, $idProduto);
    $stmtProdutos->execute();
    $stmtProdutos->close();
}

    // Limpa o carrinho após a compra
    $_SESSION['carrinho'] = array();

    // Nome do cliente
    $sqlNomeCliente = "SELECT usuario FROM cadastro WHERE id = ?";
    echo $sqlNomeCliente;
    $stmtNomeCliente = $conn->prepare($sqlNomeCliente);
    $stmtNomeCliente->bind_param("i", $idCliente);
    $stmtNomeCliente->execute();
    $stmtNomeCliente->bind_result($nomeCliente);
    $stmtNomeCliente->fetch();
    $stmtNomeCliente->close();

    // Nome dos produtos
    $nomesProdutos = array();

    foreach ($produtosCarrinho as $produto) {
        $idProduto = $produto['idProduto'];
        $sqlNomeProduto = "SELECT nomeP FROM produtos WHERE idProd = ?";
        $stmtNomeProduto = $conn->prepare($sqlNomeProduto);
        $stmtNomeProduto->bind_param("i", $idProduto);
        $stmtNomeProduto->execute();
        $stmtNomeProduto->bind_result($nomeProduto);
        $stmtNomeProduto->fetch();
        $stmtNomeProduto->close();
        $nomesProdutos[] = $nomeProduto;
    }

    $conn->close();

header("Location: confirmacao.php?idCompra=$idCompra"); 
exit();
?>
