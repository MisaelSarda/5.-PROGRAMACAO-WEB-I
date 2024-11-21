

<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // pega os dados do formulário
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    
    if ($login === "Misael" && $senha === "1234") {
       
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        $_SESSION['data_hora_inicio'] = date('Y-m-d H:i:s');
        $_SESSION['ultima_requisicao'] = date('Y-m-d H:i:s');

        echo "<h1>Bem-vindo, $login!</h1>";
        echo "<p>Data/hora de início da sessão: " . $_SESSION['data_hora_inicio'] . "</p>";
        echo "<p>Data/hora da última requisição: " . $_SESSION['ultima_requisicao'] . "</p>";
        echo '<a href="aula10.exercicio1.php">Encerrar sessão</a>';
    } else {
        echo "<p>Login ou senha inválidos!</p>";
        echo '<a href="aula10.exercicio1.php">Tentar novamente</a>';
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula10</title>
</head> 
<body>
    <h1>Login</h1>
    <form action="aula10.exercicio1.php" method="post">
        <label for="login">Login</label>
        <input type="text" name="login" id="login" required><br><br>

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" required><br><br>

        <button type="submit">Logar</button>
    </form>
</body>
</html>
    
</html>