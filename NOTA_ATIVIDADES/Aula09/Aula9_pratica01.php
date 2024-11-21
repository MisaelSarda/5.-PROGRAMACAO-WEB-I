<?php


$notas = [8, 7, 9, 6];
$faltas = [0, 1, 1, 0, 1]; 


function calcularMedia($notas) {
    $soma = array_sum($notas);
    $quantidade = count($notas);
    return $soma / $quantidade;
}

function verificarAprovacaoPorNota($media) {
    return $media >= 7 ? "Aprovado" : "Reprovado";
}

function calcularFrequencia($faltas) {
    $totalDias = count($faltas);
    $diasPresentes = $totalDias - array_sum($faltas);
    return ($diasPresentes / $totalDias) * 100;
}

function verificarAprovacaoPorFrequencia($frequencia) {
    return $frequencia > 70 ? "Aprovado" : "Reprovado";
}

// chamando funcs 
$media = calcularMedia($notas);
$statusNota = verificarAprovacaoPorNota($media);

$frequencia = calcularFrequencia($faltas);
$statusFrequencia = verificarAprovacaoPorFrequencia($frequencia);


echo "<p>Média das notas: $media</p>";
echo "<p>Status por nota: $statusNota</p>";

echo "<p>Frequência: $frequencia%</p>";
echo "<p>Status por frequência: $statusFrequencia</p>";

?>
