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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $query = "INSERT INTO usuarios (nome, email) VALUES (?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $nome, $email);
    $stmt->execute();
    
    echo "Registro inserido com sucesso!";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulário</title>
</head>
<body>
    <a href="/list.php">Todos os usuários</a> <br>
    <form method="post" action="">
        Nome: <input type="text" name="nome" required><br>
        E-mail: <input type="email" name="email" required><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>