<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo do Retângulo</title>
</head>
<body>

    <h1>Cálculo da Área do Retângulo</h1>

    <form action="" method="POST">
        <label for="side_a">Lado A do retângulo (em metros):</label>
        <input type="number" step="0.01" name="side_a" id="side_a" required><br><br>

        <label for="side_b">Lado B do retângulo (em metros):</label>
        <input type="number" step="0.01" name="side_b" id="side_b" required><br><br>

        <input type="submit" value="Calcular Área">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $side_a = $_POST['side_a'];
        $side_b = $_POST['side_b'];
        $area = $side_a * $side_b;

        if ($area > 10) {
            echo "<h1> A área do retângulo de Lado A " . number_format($side_a) . " metros e Lado B " 
                 . number_format($side_b) . " metros é <br>" 
                 . number_format($area) . " metros quadrados.</h1>";
        } else {
            echo "<h3> A área do retângulo de Lado A:" . number_format($side_a) . " metros e Lado B: " 
                 . number_format($side_b) . " metros é: <br>" 
                 . number_format($area) . " metros quadrados.</h3>";
        }
        
        }
    ?>

</body>
</html>