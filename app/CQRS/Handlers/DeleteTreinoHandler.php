<?php

namespace App\CQRS\Handlers;

use App\CQRS\Commands\DeleteTreinoCommand;
use App\Models\Treino;

class DeleteTreinoHandler
{
    public function handle(DeleteTreinoCommand $command)
    {
        $treino = Treino::findOrFail($command->id);
        $treino->delete();

        return ['message' => 'Treino deletado com sucesso'];
    }
}
