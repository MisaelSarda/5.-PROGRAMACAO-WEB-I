<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Controle de Usuário</title>
</head>
<body>

    <h1>Detalhes da Sessão</h1>
    <p><strong>Usuário:</strong> <?php echo $sessao->getUsuarioSessao()->userName; ?></p>
    <p><strong>Login:</strong> <?php echo $sessao->getUsuarioSessao()->userLogin; ?></p>
    <p><strong>Status da Sessão:</strong> <?php echo $sessao->status ? "Ativa" : "Inativa"; ?></p>
    <p><strong>Data/Hora de Início:</strong> <?php echo $sessao->dataHoraInicio->format('Y-m-d H:i:s'); ?></p>
    <p><strong>Último Acesso:</strong> <?php echo $sessao->dataHoraUltimoAcesso->format('Y-m-d H:i:s'); ?></p>

    <?php
    // Finalizar a sessão
    $sessao->finalizaSessao();
    ?>
    <p><strong>Status da Sessão após finalização:</strong> <?php echo $sessao->status ? "Ativa" : "Inativa"; ?></p>
</body>
</html>