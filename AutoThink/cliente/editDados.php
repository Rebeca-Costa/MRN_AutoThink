<?php
session_start();
if (!isset($_SESSION['id'])) {
    // Redireciona para a página de login se o usuário não estiver autenticado.
    header("Location: ../login.php");
    exit();
}

$servername = "45.152.44.154";
$username = "u451416913_grupo17";
$password = "Grupo17@123";
$dbname = "u451416913_grupo17";

$conn = new mysqli($servername, $username, $password, $dbname);

$usuario = $_SESSION['usuario'];

//$sql = "SELECT usuario, email, celular FROM cadastro WHERE id = 3"; //arrumar
$sql = "SELECT id, usuario, email, celular FROM cadastro c WHERE c.usuario LIKE '%$usuario%'";

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$resultado = $conn->query($sql);



if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $id = $row['id'];
        $nome = $row['usuario'];
        //$cidade = $row['cidade'];
        $celular = $row['celular'];
        $email = $row['email'];
    }
} else {
    echo '<tr>Nenhum usuário encontrado.</tr>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novoNome = $_POST["usuario"];
    $novoEmail = $_POST["email"];
    $novoCelular = $_POST["celular"];

    $sqlUpdate = "UPDATE cadastro c SET usuario='$novoNome',email='$novoEmail',  celular='$novoCelular' WHERE c.id = $id";
    $stmtUpdate = $conn->prepare($sqlUpdate);

    if ($stmtUpdate->execute()) {
        echo '<script>window.close(); window.opener.location.href = "cliente.php";</script>';
    } else {
        echo "Erro ao atualizar os dados: " . $stmtUpdate->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Editar Meus Dados</title>
</head>

<body>
    <h2>Editar Meus Dados</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' ?>" method="POST">
        <label for="usuario">Nome:</label>
        <input type="text" name="usuario" value="<?php echo $nome; ?>"><br><br>

        <label for="email">E-mail:</label>
        <input type="text" name="email" value="<?php echo $email; ?>"><br><br>

        <label for="celular">Celular:</label>
        <input type="text" name="celular" value="<?php echo $celular; ?>"><br><br>

        <input  type="submit" class="updt" value="Salvar Alterações">
    </form>
</body>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        background-color: #E4E9F7;
        padding: 0px 14px 10px 14px;
    }

    h2 {
        margin-bottom: 10px;
    }

    label {
        font-weight: 600;
        display: block;
        margin-bottom: 4px;
    }

    input {
        width: 100%;
        border: 2px solid #d5dae2;
        padding: 10px;
        border-radius: 10px;
        font-size: 13px;
        background: #fff;
        height: 40px;
    }

    .updt {
        font-weight: 650;
        cursor: pointer;
        background: #183257;
        color: #fff;
        font-size: 15px;
        line-height: 10px
    }
</style>

</html>