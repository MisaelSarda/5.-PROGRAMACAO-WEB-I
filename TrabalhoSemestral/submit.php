<?php
session_start();

function conectadb() {
    $dbconn = pg_connect("host=localhost port=5432 dbname=TrabSemestral user=postgres password=postgres");
    return $dbconn; // Retorna a conexão
}

function inserirAvaliacao($sector_id, $question_id, $device_id, $response, $date) {
    $conn = conectadb(); // Conecta ao banco

    if (!$conn) {
        die("Erro ao conectar ao banco de dados.");
    }

    $query = "INSERT INTO avaliacoes (setor_id, pergunta_id, dispositivo_id, resposta, data_hora) 
              VALUES ($1, $2, $3, $4, $5)";
    $params = [$sector_id, $question_id, $device_id, $response, $date];

    $result = pg_query_params($conn, $query, $params);

    if (!$result) {
        die("Erro ao inserir dados: " . pg_last_error($conn));
    }

    pg_close($conn); // Fecha a conexão
}

if (isset($_SESSION['responses']) && !empty($_SESSION['responses'])) {
    $device_id = 1; // Exemplo fixo de dispositivo
    $sector_id = 1; // Exemplo fixo de setor
    $date = date('Y-m-d H:i:s'); // Data atual

    foreach ($_SESSION['responses'] as $question_id => $response) {
        inserirAvaliacao($sector_id, $question_id, $device_id, $response, $date);
    }

    session_destroy();
echo '<div style="text-align: center; margin-top: 50px;">';
echo "<h1>Agradecemos sua resposta. Ela é muito importante para nós.</h1>";
echo '</div>';
} else {
    echo '<div style="text-align: center; margin-top: 50px;">';
    echo "<p>Nenhuma resposta foi encontrada ou método de requisição inválido.</p>";
    echo '</div>';
}
?>