<?php
$marcaId = isset($_GET['idMarca']) ? intval($_GET['idMarca']) : 0;

$servername = "45.152.44.154";
$username = "u451416913_grupo17";
$password = "Grupo17@123";
$dbname = "u451416913_grupo17";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$nome = $_POST['nomeMarca'];
$contato = $_POST['contatoMarca'];
$fornecedor = $_POST['fornecedor'];

$sql = "INSERT INTO marcas (nomeMarca, contatoMarca, fornecedor) VALUES ('$nome', '$contato', '$fornecedor')";

if ($conn->query($sql) === TRUE) {
    echo '<script>window.close(); window.opener.location.href = "marcas.php";</script>';
} else {
    echo "Erro ao adicionar a marca: " . $conn->error;
}

$conn->close();
?>