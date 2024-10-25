<?php
function getQuestions() {
    $conn = pg_connect("host=localhost port=5432 dbname=TrabSemestral user=postgres password=postgres");
    if (!$conn) {
        die("Erro ao conectar ao banco de dados.");
    }

    $result = pg_query($conn, "SELECT id, question_text FROM questions");
    if (!$result) {
        die("Erro na consulta: " . pg_last_error());
    }

    $questions = [];
    while ($row = pg_fetch_assoc($result)) {
        $questions[] = $row;
    }

    pg_close($conn); // Fecha a conexão
    return $questions;
}
?>
