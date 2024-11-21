<?php
session_start();

function conectadb() {
    $dbconn = pg_connect("host=localhost port=5432 dbname=TrabSemestral user=postgres password=postgres");
    if (!$dbconn) {
        die("Erro ao conectar ao banco de dados.");
    }
    return $dbconn;
}

function inserirAvaliacaoCompleta($sector_id, $device_id, $responses, $feedback, $date) {
    $conn = conectadb();

    // Monta o query para inserir todas as respostas em uma única linha
    $query = "INSERT INTO avaliacoes (setor_id, dispositivo_id, resposta1, resposta2, resposta3, feedback, data_hora) 
              VALUES ($1, $2, $3, $4, $5, $6, $7)";
    $params = [$sector_id, $device_id, $responses[0], $responses[1], $responses[2], $feedback, $date];

    $result = pg_query_params($conn, $query, $params);

    if (!$result) {
        die("Erro ao inserir dados: " . pg_last_error($conn));
    }

    pg_close($conn);
}

// Verifica se há respostas armazenadas na sessão
if (isset($_SESSION['responses']) && !empty($_SESSION['responses'])) {
    $device_id = 1; // Exemplo fixo de dispositivo
    $sector_id = 1; // Exemplo fixo de setor
    $date = date('Y-m-d H:i:s'); // Data atual
    $feedback = isset($_POST['feedback']) ? $_POST['feedback'] : ''; // Feedback opcional

    // Converte as respostas da sessão em um array para enviar ao banco
    $responses = array_values($_SESSION['responses']);

    if (count($responses) >= 3) {
        inserirAvaliacaoCompleta($sector_id, $device_id, $responses, $feedback, $date);
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
            top: 10px;
            right: 20px;
        }
        
        .countdown-circle {
            display: inline-block;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #333;
            color: #fff;
            text-align: center;
            line-height: 30px;
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
