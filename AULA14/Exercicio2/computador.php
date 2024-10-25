<?php 
    class Computador{
        private $estado;
        public function ligar() {
            $this->estado='ligado';
            $this->escreveEstado();
        }
        public function Desligar() {
            $this->estado = "Desligado";
            $this-escreveEstado();
        }
        public function getStatus() {
            return $this->estado;
        }
        private function escreveEstado(){
            echo $this->getStatus();
        }
    }