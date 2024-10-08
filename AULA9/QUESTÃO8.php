<?php
$valor_moto = 8654.00;

function calcular_parcela($valor, $juros, $parcelas) {
    return ($valor * (1 + $juros * $parcelas)) / $parcelas;
}

$opcoes_parcelas = [
    24 => 0.015,
    36 => 0.020,
    48 => 0.025,
    60 => 0.030
];

echo "<h1>Parcelas da Moto</h1>";
echo "<p>Valor à vista: R$ " . number_format($valor_moto, 2, ',', '.') . "</p>";

foreach ($opcoes_parcelas as $parcelas => $juros) {
    $valor_parcela = calcular_parcela($valor_moto, $juros, $parcelas);
    echo "<p>{$parcelas} vezes: R$ " . number_format($valor_parcela, 2, ',', '.') . " por parcela</p>";
}
?>
