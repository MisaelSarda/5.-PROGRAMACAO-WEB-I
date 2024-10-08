<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo da Área</title>
</head>
<body>

    <h1>Calcular a Área do Quadrado</h1>

    <form action="" method="POST">
        <label for="side">Lado do Quadrado (em metros):</label>
        <input type="number" step="0.01" name="side" id="side" required><br><br>
        <input type="submit" value="Calcular Área do Quadrado">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $side = $_POST['side'];
        $area = $side * $side;

        echo "<h2>A Área do quadrado de lado " . number_format($side) . " metros é " 
     . number_format($area) . " metros quadrados.</h2>";

    }
    ?>

</body>
</html>