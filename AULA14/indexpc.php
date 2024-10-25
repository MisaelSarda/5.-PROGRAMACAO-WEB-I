<?php

require_once "computador.php"

$computador = new Computador();

$computador->ligar();
$computador->desligar();
$computador->getStatus();

?>