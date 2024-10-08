<?php

class Arvore {
    private $dados;

    public function __construct($dados) {
        $this->dados = $dados;
    }

    public function exibir($nivel = 0) {
        $espaco = str_repeat('- ', $nivel);
        
        foreach ($this->dados as $chave => $valor) {
            if (is_array($valor)) {
                echo $espaco . $chave . "<br>";
                // Cria uma nova instância de Arvore para os subarrays
                (new Arvore($valor))->exibir($nivel + 1);
            } else {
                echo $espaco . $valor . "<br>";
            }
        }
    }
}

// Definindo o array com os elementos da árvore
$tree = [
    'bsn' => [
        '3a Fase' => [
            'desenv Web',
            'bancoDados',
            'engSoft'
        ],
        '4a Fase' => [
            'Intro Web',
            'bancoDados 2',
            'engSoft 2'
        ]
    ]
];

// Exibindo a árvore
echo "<h1>Estrutura da Árvore</h1>";
$minhaArvore = new Arvore($tree);
$minhaArvore->exibir();

?>
