<?php 
session_start();

function conectadb() {
    $dbconn = pg_connect("host=localhost port=5432 dbname=TrabSemestral user=postgres password=postgres");
    if (!$dbconn) {
        die("Erro ao conectar ao banco de dados.");
    }
    return $dbconn; // Retorna a conexão
}

function inserirAvaliacao($sector_id, $question_id, $device_id, $response, $date) {
    $conn = conectadb(); // Conecta ao banco

    $query = "INSERT INTO avaliacoes (setor_id, pergunta_id, dispositivo_id, resposta, data_hora) 
              VALUES ($1, $2, $3, $4, $5)";
    $params = [$sector_id, $question_id, $device_id, $response, $date];

    $result = pg_query_params($conn, $query, $params);

    if (!$result) {
        die("Erro ao inserir dados: " . pg_last_error($conn));
    }

    pg_close($conn); // Fecha a conexão após cada inserção
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
    echo "<h1>AGRADECEMOS SUA RESPOSTA. ELA É MUITO IMPORTANTE PARA NÓS.</h1>";
    echo '</div>';
} else {
    echo '<div style="text-align: center; margin-top: 50px;">';
    echo "<p>Nenhuma resposta foi encontrada ou método de requisição inválido.</p>";
    echo '</div>';
}

echo "<div id='countdown-container'>
        <p> <span id='countdown' class='countdown-circle'>5</span> </p>
      </div>

    <style>
        #countdown-container {
            position: fixed;
            top: 10px; /* Ajusta a distância do topo */
            right: 20px; /* Ajusta a distância da borda direita */
        }
        
        .countdown-circle {
            display: inline-block;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #333;
            color: #fff;
            text-align: center;
            line-height: 30px; /* Centraliza o texto verticalmente */
            font-size: 16px;
            font-weight: bold;
        }
    </style>

    <script>
    let countdown = 5;
    const countdownElement = document.getElementById('countdown');
    const interval = setInterval(() => {
        countdown--;
        countdownElement.textContent = countdown;
        if (countdown <= 0) {
            clearInterval(interval);
            window.location.href = 'index.php';
        }
    }, 1000);
    </script>";
?>
