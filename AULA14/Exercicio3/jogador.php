<?php 
    class Jogador {
        private $nome;
        private $posicao;
        private $dataNascimento;
        public function setNome($nome) {
            $this->nome = $nome;
        }
        public function setPosicao($posicao) {
            $this->posicao = $posicao;
        }
        public function setDataNascimento($data) {
            $this->dataNascimento = $data;
        }
    }
?>