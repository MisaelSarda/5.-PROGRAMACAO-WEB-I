<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do Triângulo Retângulo</title>
</head>
<body>

    <h1>Calcular a Área do Triângulo Retângulo</h1>

    <form method="POST">
        <label>Base (m):</label>
        <input type="number" step="0.01" name="base" required><br><br>

        <label>Altura (m):</label>
        <input type="number" step="0.01" name="height" required><br><br>

        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $base = $_POST['base'];
        $height = $_POST['height'];
        $area = ($base * $height) / 2;
        echo "<h2>Área: " . $area . " m²</h2>";
        echo "<p>O triângulo com Base de: $base metros e Altura de: $height metros, <p> possui uma área de $area metros quadrados.</p>";
    }
    ?>

</body>
</html>
