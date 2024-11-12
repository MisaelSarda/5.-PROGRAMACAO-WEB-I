
<?php
define('Nome', 'Misael Pablo ');
define('Sobrenome', 'Sardá');
$nomecompleto = Nome . ' ' . Sobrenome;

 Echo "<br> Olá Meu Nome é : $nomecompleto <p>" ;  



$SALARIO1 = 1000;
$SALARIO2 = 2000;


$SALARIO2 = $SALARIO1;


$SALARIO2++;


$SALARIO1 *= 1.10;



echo "Valor Salário 1: $$SALARIO1 <br> Valor Salário 2: $$SALARIO2";



$SALARIO1 = 1000;
$SALARIO2 = 0;

for ($i = 0; $i < 100; $i++) {
    $SALARIO1++;

    if ($i == 49) { 
        break;
    }
}

echo "<p>O valor de SALARIO1 é: $SALARIO1</p>";

if ($SALARIO1 > $SALARIO2) {
    echo "<p>Salário 1 é maior";
} else if ($SALARIO2 > $SALARIO1) {
    echo "<p>Salário 2 é maior";
} else {
    echo "<p>Os salários são iguais";


    
}

Echo "<br>";

$idade = array("joão"=>"35", "Maria"=>"37", "José"=>"43");
foreach($idade as $chave => $valor){
echo "Chave=" . $chave . ", Valor=" . $valor;
echo "<br>";
}

Echo "<br>";

