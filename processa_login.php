<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'includes/db.php';
require_once 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    // Proteção CSRF
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        sendJsonResponse(['error' => 'Erro de validação CSRF.']);
        exit();
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consultar o usuário no banco de dados
    $stmt = $pdo->prepare('SELECT * FROM users WHERE LOWER(username) = LOWER(?) LIMIT 1');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Verificar se o usuário existe e a senha está correta
    if ($user && password_verify($password, $user['password'])) {
        // Iniciar a sessão e redirecionar para a página de consulta
        $_SESSION['username'] = $username;

        // Debug: Exibir o valor de $_SESSION['username']
    echo 'Username na sessão: ' . $_SESSION['username']; // Ou use var_dump($_SESSION['username']); para informações detalhadas

        sendJsonResponse(['success' => true, 'redirect' => 'consulta_cnpj.php']);
    } else {
        sendJsonResponse(['error' => 'Credenciais inválidas.']);
    }
} else {
    // Redirecionar para a página de login se houver tentativa de acesso direto
    header('Location: index.php');
    exit();
}
?>

