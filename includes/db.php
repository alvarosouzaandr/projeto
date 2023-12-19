<?php
// Configurações do banco de dados
$host = 'localhost';
$dbname = 'test';
$username = 'root';
$password = '';

// Conectar ao banco de dados usando PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Configurar o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Em caso de falha na conexão, exibir uma mensagem de erro
    exit('Erro de conexão com o banco de dados: ' . $e->getMessage());
}
?>
