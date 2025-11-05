<?php

namespace App\CQRS\Handlers;

use App\CQRS\Queries\GetAllTreinosQuery;
use App\Models\Treino;

class GetAllTreinosHandler
{
    public function handle(GetAllTreinosQuery $query)
    {
        return Treino::with(['aluno', 'professor'])->get();
    }
}
