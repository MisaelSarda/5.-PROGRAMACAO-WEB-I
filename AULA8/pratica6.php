
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