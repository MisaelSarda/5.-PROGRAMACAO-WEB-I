<?php

require_once  "computador.php";

$computador = new Computador();
$computador->ligar();
echo $computador->status(). "\n";

$computador->Desligar();
echo $computador->status(). "\n";

?>