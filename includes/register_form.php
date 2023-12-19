<div class="login-container">
    <h2>Cadastrar-se</h2>
    <form action="processa_cadastro.php" method="post">
        <?php include_once 'includes/csrf_token.php'; ?>

        <label for="username">Nome de Usuário:</label>
        <input type="text" id="username" name="username" required autocomplete="username">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required autocomplete="email">

        <label for="confirm_email">Confirmar Email:</label>
        <input type="email" id="confirm_email" name="confirm_email" required autocomplete="email">

        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" minlength="8" maxlength="20" required autocomplete="new-password">

        <label for="confirm_password">Confirmar Senha:</label>
        <input type="password" id="confirm_password" name="confirm_password" minlength="8" maxlength="20" required autocomplete="new-password">

        <button type="submit">Cadastrar</button>
    </form>
    
    <br>
    
    <p>Já possui uma conta? <a href="index.php">Faça login</a>.</p>
</div>
