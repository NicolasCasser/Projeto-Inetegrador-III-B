<?php
require_once 'Pessoa.php';

class Aluno extends Pessoa {
    private $matricula;
    private $turma;

    public function __construct($nome, $cpf, $matricula, $turma) {
        parent::__construct($nome, $cpf);
        $this->matricula = $matricula;
        $this->turma = $turma;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function getTurma() {
        return $this->turma;
    }

    public function perfil() {
        return "Aluno: $this->nome - CPF: $this->cpf - Matrícula: $this->matricula - Turma: $this->turma";
    }
}