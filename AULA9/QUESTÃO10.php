<?php
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
function exibirPastas($array, $nivel = 0) {
    $espaco = str_repeat('- ', $nivel);
    
    foreach ($array as $chave => $valor) {
        if (is_array($valor)) {
            echo $espaco . $chave . "<br>";
            exibirPastas($valor, $nivel + 1); 
        } else {
            echo $espaco . $valor . "<br>";
        }
    }
}
echo "<h1>Estrutura de Árvore</h1>";
exibirPastas($pastas);

?>
