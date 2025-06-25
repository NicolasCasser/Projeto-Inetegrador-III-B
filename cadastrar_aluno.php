<?php
require_once 'classes/Pessoa.php';
require_once 'classes/Aluno.php';
session_start();

if (!isset($_SESSION['alunos'])) {
    $_SESSION['alunos'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cpf = $_POST['cpf'];
    $matricula = $_POST['matricula'];
    $jaExiste = false;

    foreach ($_SESSION['alunos'] as $a) {
        if ($a->getCpf() === $cpf) {
            $mensagem = "Erro: Já existe um aluno com este CPF.";
            $jaExiste = true;
            break;
        }
        if ($a->getMatricula() === $matricula) {
            $mensagem = "Erro: Já existe um aluno com esta matrícula.";
            $jaExiste = true;
            break;
        }
    }

    if (!$jaExiste) {
        $aluno = new Aluno(
            $_POST['nome'],
            $cpf,
            $matricula,
            $_POST['turma']
        );
        $_SESSION['alunos'][] = $aluno;
        $mensagem = "Aluno cadastrado com sucesso!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/cadastro.css">
    <title>Cadastrar Aluno</title>
</head>
<body>
    <div class="form-container">
        <h1>Cadastrar Aluno</h1>
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
            <label>Matrícula:</label>
            <input type="text" name="matricula" required>
            <label>Turma:</label>
            <input type="text" name="turma" required>
            <button type="submit">Cadastrar</button>
        </form>
        <a href="index.php" class="voltar">← Voltar ao início</a>
    </div>
</body>
</html>