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
//                          VERIFICAÇÃO DE ACESSO
//========================================================================\\

// Chaves de acesso permitidas (simulando um banco de dados de chaves)
//$allowedKeys = [
//    'apikey' => 'user1',
//    'apikey' => 'user2'
//];

// Função para verificar a chave de acesso
//function verifyApiKey($apiKey) {
//    global $allowedKeys;
//    return isset($allowedKeys[$apiKey]);
//}

// Verificar se a chave de acesso foi fornecida
//if (!isset($_GET['apiKey'])) {
//    http_response_code(401); // Chave de acesso não fornecida
//    echo json_encode(['error' => 'Chave de acesso não fornecida']);
//    exit();
//}

// Verificar se a chave de acesso é válida
//$apiKey = $_GET['apiKey'];
//if (!verifyApiKey($apiKey)) {
//    http_response_code(401); // Chave de acesso inválida
//    echo json_encode(['error' => 'Chave de acesso inválida']);
//    exit();
//}
//========================================================================\\
//                     FINAL DA VERIFICAÇÃO DE ACESSO
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