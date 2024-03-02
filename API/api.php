<?php

<?php
// Conexão com o banco de dados (exemplo usando PDO)
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}

// Endpoint para obter todos os usuários
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['endpoint']) && $_GET['endpoint'] === 'users') {
    $stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($users);
}

// Endpoint para criar um novo usuário
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['endpoint']) && $_POST['endpoint'] === 'users') {
    // Lógica para criar um novo usuário
    // Exemplo: INSERT INTO users (name, email) VALUES (:name, :email)
}

// Outros endpoints e lógica aqui...

// Fechar a conexão com o banco de dadoss
$conn = null;
s



?>