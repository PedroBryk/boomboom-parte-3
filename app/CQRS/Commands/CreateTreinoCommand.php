<?php

namespace App\CQRS\Commands;

class CreateTreinoCommand
{
    public $nome;
    public $descricao;
    public $aluno_id;
    public $professor_id;

    public function __construct($nome, $descricao, $aluno_id, $professor_id)
    {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->aluno_id = $aluno_id;
        $this->professor_id = $professor_id;
    }
}
