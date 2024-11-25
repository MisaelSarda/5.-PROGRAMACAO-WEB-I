<?php
session_start();

// Defina as credenciais de admin fixas
$admin_username = 'admin';
$admin_password = '1234';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os valores de username e password do formulário
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica se o username e senha coincidem com o admin
    if ($username === $admin_username && $password === $admin_password) {
        // Credenciais corretas, inicia a sessão de administrador
        $_SESSION['admin'] = $username;
        header('Location: dashboard.php'); // Redireciona para a página de administração
        exit;
    } else {
        // Credenciais incorretas
        $error_message = "Usuário ou senha inválidos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Administrador</title>
</head>
<body>

<h2>LOGIN</h2>

<?php if (isset($error_message)) { echo "<p style='color: red;'>$error_message</p>"; } ?>

<form method="POST" action="">
    <label for="username">Usuário:</label><br>
    <input type="text" name="username" id="username" required><br><br>
    
    <label for="password">Senha:</label><br>
    <input type="password" name="password" id="password" required><br><br>
    
    <button type="submit">Entrar</button>
</form>

</body>
</html>
