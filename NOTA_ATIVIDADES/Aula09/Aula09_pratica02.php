<?php

// Array 
$pastas = array(
    "bsn" => array(
        "3a Fase" => array(
            "desenvWeb",
            "bancoDados 1",
            "engSoft 1"
        ),
        "4a Fase" => array(
            "Intro Web",
            "bancoDados 2",
            "engSoft 2"
        )
    )
);

//  imprimir a árvore
function imprimirArvore($array, $nivel = 0) {
    foreach ($array as $chave => $valor) {
        
        echo str_repeat("-", $nivel) . " " . (is_array($valor) ? $chave : $valor) . "<br>";
        
        // quando for  array, pega função recursivamente
        if (is_array($valor)) {
            imprimirArvore($valor, $nivel + 1);
        }
    }
}

imprimirArvore($pastas);

?>
