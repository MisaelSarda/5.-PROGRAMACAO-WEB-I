<?php
$valor_moto = 8654.00;
function calcular_parcela($valor, $taxa_juros, $num_parcelas) {
    $montante = $valor * pow(1 + $taxa_juros, $num_parcelas); 
    return $montante / $num_parcelas; 
}
$parcelas = [
    24 => 0.02,
    36 => 0.023,
    48 => 0.026,
    60 => 0.029,
];
echo "<h1>Valor das Parcelas da Moto com Juros Compostos</h1>";
echo "<p>Valor à vista da moto: <strong> R$ " . number_format($valor_moto, 2, ',', '.') . "</strong></p>";

foreach ($parcelas as $num_parcelas => $taxa_juros) {
    $parcela = calcular_parcela($valor_moto, $taxa_juros, $num_parcelas);
    echo "<p>Para $num_parcelas vezes com juros de " . ($taxa_juros * 100) . "% ao mês: <strong> R$ " . number_format($parcela, 2, ',', '.') . "</strong> por parcela</p>";
}
?>
