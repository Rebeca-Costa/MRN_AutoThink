<?php
$servername = "45.152.44.154";
$username = "u451416913_grupo17";
$password = "Grupo17@123";
$dbname = "u451416913_grupo17";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$sql = "SELECT * FROM produtos";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Produtos</title>
</head>
<body>
    
    <!-- Exibição dos produtos-->
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Categoria</th>
            <th>Quantidade</th>
            <th>Imagem</th>
            <th>Marca</th>
        </tr>
        <?php
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['nomeP'] . "</td>";
                echo "<td>" . $row['descricao'] . "</td>";
                echo "<td>" . $row['preco'] . "</td>";
                echo "<td>" . $row['categoria'] . "</td>";
                echo "<td>" . $row['quantidade'] . "</td>";
                echo "<td><img src='images/" . $row['imagem'] . "' alt='Imagem do Produto' width='100'></td>";
                echo "<td>" . $row['marca'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Nenhum produto encontrado.</td></tr>";
        }
        ?>
    </table>
    
    <?php
    $conn->close();
    ?>
</body>
</html>
