<?php

namespace App\CQRS\Handlers;

use App\CQRS\Queries\GetTreinoByIdQuery;
use App\Models\Treino;

class GetTreinoByIdHandler
{
    public function handle(GetTreinoByIdQuery $query)
    {
        return Treino::with(['aluno', 'professor'])->findOrFail($query->id);
    }
}
