<?php

namespace App\Services\Aluno;

use App\Interfaces\AlunoStrategyInterface;
use App\Models\Aluno;

class AlunoNormalStrategy implements AlunoStrategyInterface
{
    public function configurarAluno(Aluno $aluno): Aluno
    {
        $aluno->tipo_cliente = 'normal';
        $aluno->saudacao_vip = null;
        return $aluno;
    }
}
