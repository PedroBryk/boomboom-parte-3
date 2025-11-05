<?php

namespace App\CQRS\Handlers;

use App\CQRS\Commands\UpdateTreinoCommand;
use App\Models\Treino;

class UpdateTreinoHandler
{
    public function handle(UpdateTreinoCommand $command)
    {
        $treino = Treino::findOrFail($command->id);

        $treino->update([
            'nome' => $command->nome ?? $treino->nome,
            'descricao' => $command->descricao ?? $treino->descricao,
        ]);

        return $treino;
    }
}
