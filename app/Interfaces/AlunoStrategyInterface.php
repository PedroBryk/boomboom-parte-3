<?php

namespace App\Interfaces;

use App\Models\Aluno;

interface AlunoStrategyInterface
{
    public function configurarAluno(Aluno $aluno): Aluno;
}
