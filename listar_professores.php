<?php
require_once 'classes/Pessoa.php';
require_once 'classes/Professor.php';
session_start();

$professores = $_SESSION['professores'] ?? [];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/lista.css">
    <title>Lista de Professores</title>
</head>
<body>
    <div class="list-container">
        <h1>Lista de Professores</h1>
        <?php if (count($professores) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Disciplina</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($professores as $prof): ?>
                        <tr>
                            <td><?= $prof->getNome() ?></td>
                            <td><?= $prof->getCpf() ?></td>
                            <td><?= $prof->getDisciplina() ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="mensagem">Nenhum professor cadastrado.</p>
        <?php endif; ?>
        <a href="index.php" class="voltar">← Voltar ao início</a>
    </div>
</body>
</html>
