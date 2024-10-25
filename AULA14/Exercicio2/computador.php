<?php 
    class Computador{
        private $estado;
        public function Ligar() {
            $this->estado='ligado';
            $this->escreveEstado();
        }
        public function Desligar() {
            $this->estado = "Desligado";
            $this-escreveEstado();
        }
        public function getstatus() {
            return $this->estado;
        }
        private function escreveEstado(){
            echo $this->getStatus();
        }
    }
    ?>