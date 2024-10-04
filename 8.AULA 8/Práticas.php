
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

$disciplines = array(
    "programação web =>",
    "adm de sistema =>",
    "eng software II =>",
    "estrutura II =>",
    "banco II = >"
  );
  
  $professors = array(
    "cleber",
    "sandro",
    "julia",
    "bastos",
    "marco"
  );
  
  for ($i = 0; $i < 5; $i++) {
    echo "Disciplina $disciplines[$i], professor $professors[$i].<br>";
  }

  Echo "<P>"
  ?>

<!DOCTYPE html>
<html>
<head>
    <title>tabela aula 08</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #ADD8E6;
            color: white;
        }
    </style>
</head>
<body>

<?php

$disciplinas = [
    ['Disciplina' => 'Matemática', 'Faltas' => 5, 'Média' => 8.5],
    ['Disciplina' => 'Português', 'Faltas' => 2, 'Média' => 9],
    ['Disciplina' => 'Geografia', 'Faltas' => 10, 'Média' => 6],
    ['Disciplina' => 'Educação Física', 'Faltas' => 2, 'Média' => 8],
];


echo "<table>";
echo "<tr><th>Disciplina</th><th>Faltas</th><th>Média</th></tr>";


foreach ($disciplinas as $disciplina) {
    echo "<tr>";
    echo "<td>" . $disciplina['Disciplina'] . "</td>";
    echo "<td>" . $disciplina['Faltas'] . "</td>";
    echo "<td>" . $disciplina['Média'] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>

</body>
</html>