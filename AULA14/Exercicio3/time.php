<?php 
    class Time {
        private $nome;
        private $anoFundacao;
        private $jogadores;
        public function __construct() {
            $this->jogadores = Array();
        }
        public function getNome() {
            return $this->nome;
        }
        public function setNome($nome) {
            $this->nome = $nome;
        }
        public function setAnoFundacao($ano) {
            $this->anoFundacao = $ano;
        }
        public function addJogador($jogador) {
            array_push($this->jogadores, $jogador);
        }
        public function getJogadores() {
            return $this->jogadores;
        }
    }
?>