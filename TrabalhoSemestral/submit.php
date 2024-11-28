<?php 
session_start();

function conectadb() {
    $dbconn = pg_connect("host=localhost port=5432 dbname=TrabSemestral user=postgres password=postgres");
    if (!$dbconn) {
        die("Erro ao conectar ao banco de dados.");
    }
    return $dbconn;
}
function inserirAvaliacaoCompleta($sector_id, $device_id, $responses, $feedbacks, $date) {
    $conn = conectadb();

    // Prepara o SQL para inserir notas e feedbacks das perguntas
    $query = "INSERT INTO avaliacoes (
                  setor_id, dispositivo_id, 
                  resposta1_nota, resposta1_feedback, 
                  resposta2_nota, resposta2_feedback, 
                  resposta3_nota, resposta3_feedback, 
                  data_resposta
              ) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9)";

    // Certifique-se de alinhar os índices de $responses e $feedbacks
    $params = [
        $sector_id,
        $device_id,
        $responses[0] ?? null, $feedbacks[0] ?? null,
        $responses[1] ?? null, $feedbacks[1] ?? null,
        $responses[2] ?? null, $feedbacks[2] ?? null,
        $date
    ];

    // Execute a query
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

    // Converte as respostas da sessão em um array
    $responses = array_values($_SESSION['responses']);

    // Coleta feedbacks (se existirem)
    $feedbacks = isset($_SESSION['feedbacks']) ? array_values($_SESSION['feedbacks']) : ['', '', ''];

    // Chama a função de inserção
    inserirAvaliacaoCompleta($sector_id, $device_id, $responses, $feedbacks, $date);

    // Finaliza a sessão e exibe mensagem
    session_destroy();

    echo '<div style="text-align: center; margin-top: 50px;">';
    echo "<h1>“O Hospital Regional Alto Vale (HRAV) agradece sua resposta e
ela é muito importante para nós, pois nos ajuda a melhorar continuamente nossos serviços.”</h1>";
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