<?php
$servername = "45.152.44.154";
$username = "u451416913_grupo17";
$password = "Grupo17@123";
$dbname = "u451416913_grupo17";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$nomeP = $_POST['nomeP'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$categoria = $_POST['categoria'];
$quantidade = $_POST['quantidade'];
$imagem = $_FILES['imagem']['name'];
$marca = $_POST['marca'];

// Move a imagem para um diretório
$destino = "images/" . $imagem;
move_uploaded_file($_FILES['imagem']['tmp_name'], $destino);

// Insere os dados no banco
$sql = "INSERT INTO produtos (nomeP, descricao, preco, categoria, quantidade, imagem, marca) VALUES ('$nomeP', '$descricao', '$preco', '$categoria', '$quantidade', '$imagem', '$marca')";

if ($conn->query($sql) === TRUE) {
    echo "Produto adicionado com sucesso!";
} else {
    echo "Erro ao adicionar o produto: " . $conn->error;
}

$conn->close();
?>
