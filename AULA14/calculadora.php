<?php

    class Calculadora {
        private $operador1;
        private $operador2;
        public function setOperador1($operador){
                $this->operador1 = $operador;
        }
        public function setOperador2($operador){
            $this->Operador2 = $operador;
        }
        public function somar(){
            return $this->operador1 + $this->operador2;
        }
       
    }

