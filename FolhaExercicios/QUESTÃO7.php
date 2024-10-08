<?php
function calcularValorTotalParcelas($valor_parcela, $num_parcelas) {
    return $valor_parcela * $num_parcelas;
}

function calcularJuros($valor_total_parcelas, $valor_avista) {
    return $valor_total_parcelas - $valor_avista;
}

$valor_avista = 22500.00;
$valor_parcela = 489.65;
$num_parcelas = 60;

$valor_total_parcelas = calcularValorTotalParcelas($valor_parcela, $num_parcelas);
$juros_pagos = calcularJuros($valor_total_parcelas, $valor_avista);

echo "<h1>Cálculo dos Juros Pagos por Mariazinha</h1>";
echo "<p>O valor à vista do carro é <strong>R$ " . number_format($valor_avista, 2, ',', '.') . "</strong>.</p>";
echo "<p>O valor total das parcelas é <strong>R$ " . number_format($valor_total_parcelas, 2, ',', '.') . "</strong>.</p>";
echo "<p>Os juros pagos por Mariazinha serão no total de <strong>R$ " . number_format($juros_pagos, 2, ',', '.') ."</strong>". ". Em relação ao preço a vista do carro." ."</p>";
?>
