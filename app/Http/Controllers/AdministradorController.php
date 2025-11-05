<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AdministradorController extends Controller
{
    public function index()

    {
        // 1. Definição das regras de validação
        $regras = [
            'nome' => 'required|string|min:3|max:100',
            'senha' => 'required|string|min:8.100',
            'email' => 'required|string|max:50',
        ];

         // 2. Mensagens de erro customizadas (opcional, mas recomendado para UX)
        $mensagens = [
            'nome.required' => 'O nome é obrigatório.',
            'nome.min' => 'O nome deve ter pelo menos :min caracteres.',
            'nome.max' => 'O nome não pode exceder :max caracteres.',
            'senha.required' => 'A senha é obrigatória.',
            'senha.min' => 'A senha deve ser no mínimo :min.',
            'email.required' => 'A quantidade em estoque é obrigatória.',

        ];

        $request->validate($regras, $mensagens);

        $alunos = Aluno::all();

        return view('administrador.index', compact('alunos'));
    }
}
