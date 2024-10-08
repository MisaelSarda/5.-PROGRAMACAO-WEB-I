<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feira de Joãozinho</title>
</head>
<body>

    <h1>Cálculo de Despesas do Joãozinho</h1>

    <form action="" method="POST">
        <?php
        $itens = ['Maca', 'Melancia', 'Laranja', 'Repolho', 'Cenoura', 'Batatinha'];
        foreach ($itens as $item) {
            echo "<label>Preço do $item (kg):</label>
                  <input type='number' step='0.01' name='preco_$item' required>
                  <label>Quantidade de $item (kg):</label>
                  <input type='number' step='0.01' name='quant_$item' required><br><br>";
        }
        ?>
        <input type="submit" value="Calcular Despesas">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dinheiroDisponivel = 50.00;
        $totalCompra = 0;

        foreach ($itens as $item) {
            $preco = $_POST["preco_$item"];
            $quantidade = $_POST["quant_$item"];
            $totalCompra += $preco * $quantidade;
        }

        echo "<h2>O valor total da compra foi R$ " . number_format($totalCompra, 2, ',', '.') . "</h2>";

        if ($totalCompra > $dinheiroDisponivel) {
            echo "<h3 style='color: red;'>Faltou R$ " . number_format($totalCompra - $dinheiroDisponivel, 2, ',', '.') . " para Joãozinho pagar a compra.</h3>";
        } elseif ($totalCompra < $dinheiroDisponivel) {
            echo "<h3 style='color: blue;'>Joãozinho ainda pode gastar R$ " . number_format($dinheiroDisponivel - $totalCompra, 2, ',', '.') . ".</h3>";
        } else {
            echo "<h3 style='color: green;'>O saldo de compra disponível para Joãozinho foi esgotado.</h3>";
        }
    }
    ?>

</body>
</html>
