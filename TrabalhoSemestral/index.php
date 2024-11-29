<?php
session_start();
require_once 'questions.php'; // Inclui a função para buscar perguntas do banco

$questions = getQuestions(); // Obtém as perguntas do banco
$totalQuestions = count($questions);

// Inicializa o índice da pergunta atual se não existir
if (!isset($_SESSION['current_index'])) {
    $_SESSION['current_index'] = 0;
}

// Obtém a pergunta atual com base no índice
$currentIndex = $_SESSION['current_index'];
$currentQuestion = $questions[$currentIndex];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $questionId = $_POST['question_id'];
    $score = $_POST['score'];
    $feedback = $_POST['feedback'][$questionId] ?? ''; // Feedback associado ao ID da pergunta

    // Armazena a resposta e o feedback na sessão
    $_SESSION['responses'][$questionId] = $score;
    $_SESSION['feedbacks'][$questionId] = $feedback;

    // Debug: Exibir respostas armazenadas
    echo "<pre>";
    echo "Respostas armazenadas na sessão:\n";
    print_r($_SESSION['responses']);
    echo "Feedbacks armazenados na sessão:\n";
    print_r($_SESSION['feedbacks']);
    echo "</pre>";

    // Redirecionar
    if ($currentIndex + 1 < $totalQuestions) {
        $_SESSION['current_index']++;
        header("Location: index.php");
        exit;
    } else {
        header("Location: submit.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pergunta <?= $currentIndex + 1 ?> de <?= $totalQuestions ?></title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
        <!--Acesso Admin -->
    <a href="login.php" class="admin-icon" title="Acesso Admin">👤</a>
    <h1>Avaliação de Satisfação</h1>
    <h1>Pergunta <?= $currentIndex + 1 ?> de <?= $totalQuestions ?></h1>

    <form method="POST" action="">
    <input type="hidden" name="question_id" value="<?= $currentQuestion['id'] ?>">

    <div class="question-block">
        <label><strong><?= htmlspecialchars($currentQuestion['question_text']) ?></strong></label>
        <div class="scale">
            <?php for ($i = 0; $i <= 10; $i++): ?>
                <label class="scale-label">
                    <input type="radio" name="score" value="<?= $i ?>" required>
                    <span><?= $i ?></span>
                </label>
            <?php endfor; ?>
        </div>

        <br>
        <label for="feedback"><strong>Feedback Adicional (Opcional):</strong></label>
        <textarea id="feedback" name="feedback[<?= $currentQuestion['id'] ?>]" rows="4" cols="50"></textarea>
    </div>
    <button type="submit">
        <?= ($currentIndex + 1 === $totalQuestions) ? 'Enviar Avaliação' : 'Próxima Pergunta' ?>
    </button>
</form>

    <!-- Rodapé com a mensagem -->
    <div class="footer">
        <h3><label for="feedback"><strong>Sua avaliação espontânea é anônima, nenhuma informação pessoal é solicitada ou armazenada.</strong></label></h3>
    </div>

</body>
</html>
