<?php

namespace App\Services\Aluno;

use App\Interfaces\AlunoStrategyInterface;
use App\Models\Aluno;

class AlunoVipStrategy implements AlunoStrategyInterface
{
    public function configurarAluno(Aluno $aluno): Aluno
    {
        $aluno->tipo_cliente = 'vip';
        $aluno->saudacao_vip = "Bem-vindo(a), {$aluno->nome}! Você é um aluno VIP 🎉";
        return $aluno;
    }
}
