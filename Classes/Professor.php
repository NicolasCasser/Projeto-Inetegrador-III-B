<?php
require_once 'Pessoa.php';

class Professor extends Pessoa {
    private $disciplina;

    public function __construct($nome, $cpf, $disciplina) {
        parent::__construct($nome, $cpf);
        $this->disciplina = $disciplina;
    }

    public function getDisciplina() {
        return $this->disciplina;
    }

    public function perfil() {
        return "Professor: $this->nome - CPF: $this->cpf - Disciplina: $this->disciplina";
    }
}