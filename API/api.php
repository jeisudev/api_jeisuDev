<?php
//========================================================================\\
//                              CONEXÃO AO DB
//========================================================================\\
// Conexão com o banco de dados (exemplo usando PDO)
    $servername = "127.0.0.1:3306";
    $username = "u957913582_jeisondev";
    $password = "Jc7es8@dp9";
    $dbname = "u957913582_api_jeisodev";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "conectado com sucesso: ";
    } catch(PDOException $e) {
        echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    }

//========================================================================\\
//                             FIM CONEXÃO AO DB
//========================================================================\\
//========================================================================\\
//                          VARIAVEIS DE AMBIENTE
//========================================================================\\    

    $metodo = $_POST['metodo'];

//========================================================================\\
//                          FIM VARIAVEIS DE AMBIENTE
//========================================================================\\

//========================================================================\\
//                  INICIO DE ALGUNS METODOS DA API
//========================================================================\\

// Endpoint para obter todos os usuários
print_r($metodo);
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($metodo) && $metodo == 'pesquisa_users') {
        print_r('users');
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

?>