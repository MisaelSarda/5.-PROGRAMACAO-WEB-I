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

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $questionId = $_POST['question_id'];
    $score = $_POST['score'];

    // Armazena a resposta na sessão
    $_SESSION['responses'][$questionId] = $score;

    // Debug: Exibir respostas armazenadas
    echo "<pre>";
    echo "Respostas armazenadas na sessão:\n";
    print_r($_SESSION['responses']);
    echo "</pre>";

    // Avança para a próxima pergunta ou finaliza a avaliação
    if ($currentIndex + 1 < $totalQuestions) {
        $_SESSION['current_index']++;
        header("Location: index.php"); // Redireciona para a próxima pergunta
        exit;
    } else {
        header("Location: submit.php"); // Envia para o processamento final
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
    <h1>Avaliação de Satisfação</h1>
    <h1>Pergunta <?= $currentIndex + 1 ?> de <?= $totalQuestions ?></h1>

    <form method="POST" action="">
        <input type="hidden" name="question_id" value="<?= $currentQuestion['id'] ?>">

        <div class="question-block"><strong>
            <label><?= htmlspecialchars($currentQuestion['question_text']) ?></label>
            <div class="scale">
                <?php for ($i = 0; $i <= 10; $i++): ?>
                    <label class="scale-label">
                        <input type="radio" name="score" value="<?= $i ?>" required>
                        <span><?= $i ?></span>
                </strong>
                    </label>
                <?php endfor; ?>
            </div><br>
                    <label for="feedback"> <strong>Feedback Adicional (Opcional):</strong></label><br>
                    <textarea id="feedback" name="feedback" rows="4" cols="50"></textarea>
        </div>

        <button type="submit">
            <?= ($currentIndex + 1 === $totalQuestions) ? 'Enviar Avaliação' : 'Próxima Pergunta' ?>
        </button>
    </form>
</body>
</html>
