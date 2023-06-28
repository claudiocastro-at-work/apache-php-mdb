<?php

# Inclui o arquivo autoload.php necessário para carregar automaticamente as classes do projeto
// require __DIR__ . "../../vendor/autoload.php";

## [TESTES]

phpinfo();

# CONEXÃO AO BANCO DE DADOS

# Endereço do servidor do banco de dados
$servername = "db"; // Utiliza o nome de serviço "db" como hostname para fazer referência ao /
// container do banco de dados no Docker Compose.
# Nome de usuário do banco de dados
$username = "root";
# Senha do banco de dados
$password = "root";
# Nome do banco de dados
$dbname = "myserver";

// try {
//     # Cria uma nova conexão PDO
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

//     # Define o modo de erro para exceção
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "<p>Conexão bem-sucedida!</p><h1>Olá Mundo!</h1>";
// } catch (PDOException $e) {
//     echo "Falha na conexão: " . $e->getMessage();
// }

# CONSULTA AO BANCO DE DADOS

// try {
//     # Consulta SQL
//     $sql = "SELECT * FROM users";

//     # Executa a consulta e obtém os resultados
//     $stmt = $conn->query($sql);
//     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//     # Imprime os resultados
//     foreach ($results as $row) {
//         echo "ID: " . $row['id'] . ", Nome: " . $row['name'] . ", Email: " . $row['email'] . "<br>";
//     }
// } catch (PDOException $e) {
//     echo "Falha na conexão: " . $e->getMessage();
// }

# TESTAR 'ESTRUTURA' XDEBUG NO NAVEGADOR

// $name = ["name" => "John"];
// var_dump($name);
