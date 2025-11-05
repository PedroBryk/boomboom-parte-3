<?php

namespace App\CQRS\Commands;

class UpdateTreinoCommand
{
    public $id;
    public $nome;
    public $descricao;

    public function __construct($id, $nome, $descricao)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
    }
}
