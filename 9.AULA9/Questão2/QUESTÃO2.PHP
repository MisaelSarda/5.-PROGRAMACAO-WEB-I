<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testar Divisão por 2</title>
</head>
<body>

    <h1>Verificar se o número é divisível por 2</h1>

    <form action="" method="POST">
        <label for="numero">Informe um número:</label>
        <input type="number" name="numero" id="numero" required><br><br>

        <input type="submit" value="Testar">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $numero = $_POST['numero'];

        if ($numero % 2 == 0) {
            echo "<h2>Valor divisível por 2.</h2>";
        } else {
            echo "<h2>O valor não é divisível por 2.</h2>";
        }
    }
    ?>

</body>
</html>