<?php

    class Calculadora {
        private $operador1;
        private $operador2;
        public function setOperador1($operador){
                $this->Operador1 = $operador;
        }
        public function setOperador2($operador){
            $this->Operador2 = $operador;
        }
        public function somar(){
            return $this->Operador1 + $this->Operador2;
        }
       
    }

