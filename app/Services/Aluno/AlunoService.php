<?php

namespace App\Services\Aluno;

use App\Interfaces\AlunoStrategyInterface;
use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoService
{
    private AlunoStrategyInterface $strategy;

    public function __construct(AlunoStrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function criarAluno(Request $request): Aluno
    {
        $aluno = new Aluno([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => bcrypt($request->senha),
            'telefone' => $request->telefone,
            'data_nascimento' => $request->data_nascimento,
        ]);

        $aluno = $this->strategy->configurarAluno($aluno);
        $aluno->save();

        return $aluno;
    }
}
