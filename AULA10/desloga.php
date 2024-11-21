<?php
session_start();
session_destroy(); // Encerra a sessão

echo "<p>Sessão encerrada com sucesso!</p>";
echo '<a href="aula10.exercicio1.php">Voltar ao login</a>';
?>