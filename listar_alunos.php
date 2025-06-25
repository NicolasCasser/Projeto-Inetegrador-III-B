<?php
require_once 'classes/Pessoa.php';
require_once 'classes/Aluno.php';
session_start();

$alunos = $_SESSION['alunos'] ?? [];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/lista.css">
    <title>Lista de Alunos</title>
</head>
<body>
    <div class="list-container">
        <h1>Lista de Alunos</h1>
        <?php if (count($alunos) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Matrícula</th>
                        <th>Turma</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alunos as $aluno): ?>
                        <tr>
                            <td><?= $aluno->getNome() ?></td>
                            <td><?= $aluno->getCpf() ?></td>
                            <td><?= $aluno->getMatricula() ?></td>
                            <td><?= $aluno->getTurma() ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="mensagem">Nenhum aluno cadastrado.</p>
        <?php endif; ?>
        <a href="index.php" class="voltar">← Voltar ao início</a>
    </div>
</body>
</html>
