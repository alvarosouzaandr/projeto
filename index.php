<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <?php include 'functions.php'; ?>
    <title>Página de Login</title>
    <style>
        #formulario1 {
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
    <div class="jumbotron text-center">
        <h1 style="text-align: center;"><strong>Faça login</strong> </h1>
    </div>    
    <br>
<div id="formulario1" class="container-fluid">
    
    <div class="login-container">
        <h2>Login</h2>
        <form action="processa_login.php" method="post">
            <label for="username">Nome de Usuário:</label>
            <input type="text" id="username" name="username" required>
    
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
    
            <button type="submit">Entrar</button>
        </form>
    <br>
    <p>Caso não tenha conta se-cadastre aqui.</p>
    <a href="cadastro.php">Cadastrar</a>
    </div>
</div>

</body>
</html>
