<?php

require  "computador.php";

$computador = new Computador();

$computador->ligar();
echo $computador->status(). "\n";

$computador->desligar();
echo $computador->status(). "\n";

?>