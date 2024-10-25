<?php

require  "computador.php";

$computador = new Computador();

$computador->ligar();
$computador->desligar();
$computador->getStatus();

?>