<?php
session_start();

// Verifica se o admin está autenticado
if (!isset($_SESSION['admin'])) {
    header('Location: login.php'); // Redireciona para o login caso não esteja autenticado
    exit;
}

// Conectar ao banco de dados PostgreSQL
$host = 'localhost';
$db = 'TrabSemestral';
$user = 'postgres';
$password = 'postgres';
$dsn = "pgsql:host=$host;dbname=$db";
try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}

// Adicionar nova pergunta
if (isset($_POST['nova_pergunta'])) {
    $novaPergunta = trim($_POST['nova_pergunta']);
    if (!empty($novaPergunta)) {
        try {
            // Inserir pergunta na tabela `questions`
            $stmt = $pdo->prepare("INSERT INTO questions (question) VALUES (?) RETURNING id");
            $stmt->execute([$novaPergunta]);
            $novaPerguntaId = $stmt->fetchColumn();

            // Criar colunas de nota e feedback na tabela `avaliacoes`
            $colNota = "resposta{$novaPerguntaId}_nota";
            $colFeedback = "resposta{$novaPerguntaId}_feedback";
            $pdo->exec("ALTER TABLE avaliacoes ADD COLUMN $colNota INTEGER");
            $pdo->exec("ALTER TABLE avaliacoes ADD COLUMN $colFeedback TEXT");

            echo "Pergunta adicionada com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao adicionar pergunta: " . $e->getMessage();
        }
    } else {
        echo "A pergunta não pode ser vazia.";
    }
}

// Excluir pergunta
if (isset($_POST['excluir_pergunta'])) {
    $idExcluir = (int)$_POST['id_pergunta'];
    try {
        // Remover colunas relacionadas na tabela `avaliacoes`
        $pdo->exec("ALTER TABLE avaliacoes DROP COLUMN IF EXISTS resposta{$idExcluir}_nota");
        $pdo->exec("ALTER TABLE avaliacoes DROP COLUMN IF EXISTS resposta{$idExcluir}_feedback");

        // Remover pergunta da tabela `questions`
        $stmt = $pdo->prepare("DELETE FROM questions WHERE id = ?");
        $stmt->execute([$idExcluir]);

        echo "Pergunta excluída com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao excluir pergunta: " . $e->getMessage();
    }
}

// Listar perguntas
$perguntas = $pdo->query("SELECT id, id FROM questions ORDER BY id")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Administração</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['admin']); ?>!</h1>
    <h2>Gerenciamento de Perguntas</h2>

    <!-- Formulário para adicionar nova pergunta -->
    <form method="POST">
        <label for="nova_pergunta">Nova Pergunta:</label>
        <input type="text" name="nova_pergunta" id="nova_pergunta" required>
        <button type="submit">Adicionar</button>
    </form>

    <!-- Listagem de perguntas -->
    <h3>Perguntas Cadastradas:</h3>
    <ul>
        <?php foreach ($perguntas as $pergunta): ?>
            <li>
                <?php echo htmlspecialchars($pergunta['id']); ?>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id_pergunta" value="<?php echo $pergunta['id']; ?>">
                    <button type="submit" name="excluir_pergunta">Excluir</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
