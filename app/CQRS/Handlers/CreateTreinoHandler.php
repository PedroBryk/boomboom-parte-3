<?php

namespace App\CQRS\Handlers;

use App\CQRS\Commands\CreateTreinoCommand;
use App\Models\Treino;

class CreateTreinoHandler
{
    public function handle(CreateTreinoCommand $command)
    {
        return Treino::create([
            'nome' => $command->nome,
            'descricao' => $command->descricao,
            'aluno_id' => $command->aluno_id,
            'professor_id' => $command->professor_id
        ]);
    }
}
