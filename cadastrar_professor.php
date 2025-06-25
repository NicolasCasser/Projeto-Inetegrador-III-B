<?php
require_once 'classes/Pessoa.php';
require_once 'classes/Professor.php';
session_start();

if (!isset($_SESSION['professores'])) {
    $_SESSION['professores'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cpf = $_POST['cpf'];
    $jaExiste = false;

    foreach ($_SESSION['professores'] as $p) {
        if ($p->getCpf() === $cpf) {
            $mensagem = "Erro: Já existe um professor com este CPF.";
            $jaExiste = true;
            break;
        }
    }

    if (!$jaExiste) {
        $professor = new Professor(
            $_POST['nome'],
            $cpf,
            $_POST['disciplina']
        );
        $_SESSION['professores'][] = $professor;
        $mensagem = "Professor cadastrado com sucesso!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/cadastro.css">
    <title>Cadastrar Professor</title>
</head>
<body>
    <div class="form-container">
        <h1>Cadastrar Professor</h1>
        <?php if (isset($mensagem)): ?>
            <p style="text-align: center; color: <?= str_contains($mensagem, 'Erro') ? 'red' : 'lightgreen' ?>;">
                <?= $mensagem ?>
            </p>
        <?php endif; ?>
        <form method="POST">
            <label>Nome:</label>
            <input type="text" name="nome" required>
            <label>CPF:</label>
            <input type="text" name="cpf" required>
            <label>Disciplina:</label>
            <input type="text" name="disciplina" required>
            <button type="submit">Cadastrar</button>
        </form>
        <a href="index.php" class="voltar">← Voltar ao início</a>
    </div>
</body>
</html>