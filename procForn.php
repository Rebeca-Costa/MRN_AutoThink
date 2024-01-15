<?php
$fornId = isset($_GET['idForn']) ? intval($_GET['idForn']) : 0;

$servername = "45.152.44.154";
$username = "u451416913_grupo17";
$password = "Grupo17@123";
$dbname = "u451416913_grupo17";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$nome = $_POST['nomeForn'];
$cnpj = $_POST['cnpj'];
$contato = $_POST['contatoForn'];
$email = $_POST['email'];

$sql = "INSERT INTO fornecedores (nomeForn, cnpj, contatoForn, email) VALUES ('$nome', '$cnpj', '$contato', '$email')";

if ($conn->query($sql) === TRUE) {
    echo '<script>window.close(); window.opener.location.href = "forn.php";</script>';
} else {
    echo "Erro ao adicionar o fornecedor: " . $conn->error;
}

$conn->close();
?>