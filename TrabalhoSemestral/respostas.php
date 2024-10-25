<?php
session_start();

// Recupera as respostas e feedbacks armazenados
$responses = isset($_SESSION['responses']) ? $_SESSION['responses'] : [];
$feedbacks = isset($_SESSION['feedback']) ? $_SESSION['feedback'] : [];

// Limpa a sessão (opcional)
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <script>
        // Redireciona após 10 segundos
        setTimeout(function() {
            window.location.href = "index.php"; // Redireciona para a primeira pergunta
        }, 10000);
    </script>
</head>
<body>
    <h1>Resultado da Avaliação</h1>

    <ul>
        <?php foreach ($responses as $questionId => $score): ?>
            <li>Pergunta ID <?= $questionId ?>: Nota <?= $score ?></li>
            <?php if (isset($feedbacks[$questionId])): ?>
                <p><strong>Feedback:</strong> <?= htmlspecialchars($feedbacks[$questionId]) ?></p>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

    <h2>Obrigado pela sua Avaliação!</h2>
    <p>Você será redirecionado para a primeira pergunta em 10 segundos.</p>
</body>
</html>
