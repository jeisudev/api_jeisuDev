<?php
//========================================================================\\
//                          API JEISON DEV
//========================================================================\\ 

//========================================================================\\
//                          VARIAVEIS DE AMBIENTE
//========================================================================\\    

    $metodo                 = $_REQUEST['metodo'];
    $chaveRecebida          = $_REQUEST['apikey'];

//=====================================================================\\
//                      AUTENTICATION API KEY
//=====================================================================\\
    $chavesValidas = ['jeison_teste','teste_api'];
    $liberation = false;
   
    if (in_array($chaveRecebida, $chavesValidas)) {
        // echo "Acesso concedido!";
        $liberation = true;
    } else { 
        http_response_code(401);
        echo "Acesso negado. Chave de API:$chaveRecebida è inválida.";
        exit;
    }
//========================================================================\\
//                              CONEXÃO AO DB
//========================================================================\\
// Conexão com o banco de dados (exemplo usando PDO)
    if($liberation == true){
        $servername = "127.0.0.1:3306";
        $username = "u957913582_jeisondev";
        $password = "Jc7es8@dp9";
        $dbname = "u957913582_api_jeisodev";
    }

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "conectado com sucesso: ";
    } catch(PDOException $e) {
        echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    }

//========================================================================\\
//                  INICIO DE ALGUNS METODOS DA API
//========================================================================\\

// Endpoint para obter todos os usuários

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($metodo) && $metodo === 'pesquisa_users') {
        $stmt = $conn->prepare("SELECT * FROM users WHERE deletado = N");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($users);
    }

 // Endpoint para criar um novo usuário
    elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($metodo) && $metodo === 'insere_users') {
        // Lógica para criar um novo usuário
        // Exemplo: INSERT INTO users (name, email) VALUES (:name, :email)
    }

    // Outros endpoints e lógica aqui...

    // Fechar a conexão com o banco de dadoss
    $conn = null;

?>