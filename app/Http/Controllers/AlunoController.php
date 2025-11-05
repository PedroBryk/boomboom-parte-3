<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Services\Aluno\AlunoNormalStrategy;
use App\Services\Aluno\AlunoVipStrategy;
use App\Services\Aluno\AlunoService;

class AlunoController extends Controller
{
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|string|min:3|max:100',
            'email' => 'required|string|email|max:50|unique:aluno,email',
            'senha' => 'required|string|min:8|max:100',
            'telefone' => 'required|string|min:10|max:20',
            'data_nascimento' => 'nullable|date',
            'tipo_cliente' => 'required|string|in:normal,vip'
        ];

        $mensagens = [
            'nome.required' => 'O nome é obrigatório.',
            'email.unique' => 'Este email já está cadastrado.',
            'tipo_cliente.in' => 'O tipo de cliente deve ser "normal" ou "vip".'
        ];

        $request->validate($regras, $mensagens);

        // Escolhe a estratégia conforme o tipo de cliente
        $strategy = $request->tipo_cliente === 'vip'
            ? new AlunoVipStrategy()
            : new AlunoNormalStrategy();

        $service = new AlunoService($strategy);
        $aluno = $service->criarAluno($request);

        return response()->json([
            'mensagem' => 'Aluno cadastrado com sucesso!',
            'dados' => $aluno
        ], 201);
    }

    public function show($id)
    {
        $aluno = Aluno::find($id);

        if (!$aluno) {
            return response()->json(['message' => 'Aluno não encontrado'], 404);
        }

        return response()->json($aluno, 200);
    }

    public function destroy($id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return response()->json(['message' => 'Aluno deletado com sucesso'], 200);
    }
}
