<?php
$host = 'localhost'; // ou o IP do servidor MySQL
$dbname = 'aula_cloud_php';
$username = 'user_aula';
$password = 'password_aula';

// Conexão com o banco de dados
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$query = "SELECT nome, email FROM usuarios";
$result = $conn->query($query);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Usuários</title>
</head>
<body>
    <a href="/index.php">Inserir usuário</a> <br>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['email']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
