<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    // Proteção CSRF
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        sendJsonResponse(['error' => 'Token CSRF inválido.']);
        exit();
    }

    $username = $_POST['username'];
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $confirmEmail = filter_var($_POST['confirm_email'], FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Verificar se os campos de senha e email coincidem
    if ($email !== $confirmEmail) {
        sendJsonResponse(['error' => 'Os endereços de e-mail inseridos não coincidem.']);
        exit();
    }

    if ($password !== $confirmPassword) {
        sendJsonResponse(['error' => 'As senhas inseridas não coincidem.']);
        exit();
    }

    // Consultar se o usuário já existe
    $stmt = $pdo->prepare('SELECT * FROM users WHERE LOWER(username) = LOWER(?) LIMIT 1');
    $stmt->execute([$username]);
    $existingUser = $stmt->fetch();

    if ($existingUser) {
        sendJsonResponse(['error' => 'Este nome de usuário já está em uso. Escolha outro.']);
        exit();
    }

    // Consultar se o email já está cadastrado
    $stmt = $pdo->prepare('SELECT * FROM users WHERE LOWER(email) = LOWER(?) LIMIT 1');
    $stmt->execute([$email]);
    $existingEmail = $stmt->fetch();

    if ($existingEmail) {
        sendJsonResponse(['error' => 'Este e-mail já está cadastrado. Escolha outro.']);
        exit();
    }

    // Cadastrar o novo usuário
    $hashedPassword = hashPassword($password);
    $stmt = $pdo->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?, 0)');
    $stmt->execute([$username, $email, $hashedPassword]);

    // Enviar e-mail de confirmação
$to = $email;
$subject = 'Confirme seu e-mail';
$message = 'Obrigado por se cadastrar! Clique no link a seguir para confirmar seu e-mail: http://seusite.com/confirmacao_email.php?email=' . urlencode($email);
$headers = 'From: seuemail@seusite.com' . "\r\n" .
    'Reply-To: seuemail@seusite.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

    sendJsonResponse(['success' => true, 'message' => 'Usuário registrado com sucesso.']);
} else {
    // Redirecionar para a página de login ou outra página informativa
    header('Location: index.php');
}
?>
