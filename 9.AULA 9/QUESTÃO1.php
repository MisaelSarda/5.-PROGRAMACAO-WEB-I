<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soma de Três Valores</title>
</head>
<body>

    <h1>Soma de Três Valores</h1>

    <form action="" method="POST">
        <label for="value1">Valor 1:</label>
        <input type="number" name="value1" id="value1" required><br><br>

        <label for="value2">Valor 2:</label>
        <input type="number" name="value2" id="value2" required><br><br>

        <label for="value3">Valor 3:</label>
        <input type="number" name="value3" id="value3" required><br><br>

        <input type="submit" value="Calcular Soma">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
        $valor1 = $_POST['value1'];
        $valor2 = $_POST['value2'];
        $valor3 = $_POST['value3'];

        $soma = $valor1 + $valor2 + $valor3;

        if ($valor1 > 10) {
            echo "<h2 style='color: blue;'> O resultado da soma é: $soma</h2>";
        } elseif ($valor2 < $valor3) {
            echo "<h2 style='color: green;'> O resultado da soma é: $soma</h2>";
        } elseif ($valor3 < $valor1 && $valor3 < $valor2) {
            echo "<h2 style='color: red;'> O resultado da soma é: $soma</h2>";
        } else {
            echo "<h2>O resultado da soma é: $soma</h2>";
        }
    }
    ?>

</body>
</html>