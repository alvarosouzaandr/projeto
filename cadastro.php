<?php
session_start();
require_once 'includes/functions.php';

// Verificar se o usuário já está logado
if (isUserLoggedIn()) {
    header('Location: consulta-cnpj.php');
    exit();
}

// Código de processamento do formulário de cadastro
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    // Verificar e processar os dados do formulário
    // ...

    // Redirecionar para a página de consulta após o cadastro bem-sucedido
    header('Location: consulta-cnpj.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Página de Login</title>
    <style>
        #formulario {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }
        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>
<div class="jumbotron text-cente">
    <h1 style="text-align: center;"><strong>Cadastrar-se</strong> </h1>
</div>    
<br>
<!--Fomulário de cadastro-->
<div id="formulario" class="container-fluid">
    
    
    <div class="login-container">
        <h2>Login</h2>
        <form action="processa_login.php" method="post">
            <label for="username">Nome de Usuário:</label>
            <input type="text" id="username" name="username" required>
    
            <label for="Email">Email</label>
            <input type="email" id="email" name="email" required autocomplete="email">
    
            <label for="Comfir_email">Confirmar Email</label>
            <input type="email" id="confirm_email" name="confirm_email" required autocomplete="email">
    
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password"  minlength="8" maxlength="20" required>
    
            <label for="confirm_password">Confimar Senha:</label>
            <input type="password" id="confirm_password" name="confirm_password"  minlength="8" maxlength="20" required>
    
            
            <button type="submit">Registrar</button>
        </form>
    <br>
    <p>Fazer login <a href="index.php">aqui</a>.</p>
    </div>
</div>
<br><br>
</body>
</html>
