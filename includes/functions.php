<?php

session_start();

// Proteção CSRF
if (!isset($_SESSION['csrf_token'])) {
    generateCSRFToken();
}

function generateCSRFToken() {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

function getCSRFToken() {
    return $_SESSION['csrf_token'];
}

function isUserLoggedIn() {
    return isset($_SESSION['username']);
}

function hashPassword($password) {
    $options = [
        'cost' => 12,
    ];
    return password_hash($password, PASSWORD_BCRYPT, $options);
}

function sendJsonResponse($data) {
    header('Content-Type: application/json');
    echo json_encode($data);
    exit();
}

?>
