<?php
$funcId = isset($_GET['idF']) ? intval($_GET['idF']) : 0;

$servername = "45.152.44.154";
$username = "u451416913_grupo17";
$password = "Grupo17@123";
$dbname = "u451416913_grupo17";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$nome = $_POST['nomeFunc'];
$cpf = $_POST['cpf'];
$contato = $_POST['contato'];
$email = $_POST['email'];
$foto = $_FILES['foto']['name'];
$curriculo = $_FILES['curriculo']['name'];

$destinoF = "func/foto/" . $foto;
move_uploaded_file($_FILES['foto']['tmp_name'], $destinoF);
$destinoC = "func/curriculo/" . $curriculo;
move_uploaded_file($_FILES['curriculo']['tmp_name'], $destinoC);

$sql = "INSERT INTO funcionarios (nomeFunc, cpf, contato, email, foto, curriculo) VALUES ('$nome', '$cpf', '$contato', '$email', '$foto', '$curriculo')";

if ($conn->query($sql) === TRUE) {
    echo '<script>window.close(); window.opener.location.href = "func.php";</script>';
} else {
    echo "Erro ao adicionar o funcionário: " . $conn->error;
}

$conn->close();
?>