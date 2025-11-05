<?php

namespace App\Services\Professor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProfessorValidator
{
    public function validateCreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|min:3|max:100',
            'email' => 'required|string|email|max:50|unique:professor,email',
            'senha' => 'required|string|min:8|max:100',
            'telefone' => 'nullable|string|max:20',
            'data_nascimento' => 'nullable|date',
        ], [
            'nome.required' => 'O nome é obrigatório.',
            'nome.min' => 'O nome deve ter pelo menos :min caracteres.',
            'nome.max' => 'O nome não pode exceder :max caracteres.',
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'Digite um email válido.',
            'email.unique' => 'Este email já está cadastrado.',
            'senha.required' => 'A senha é obrigatória.',
            'senha.min' => 'A senha deve ter no mínimo :min caracteres.',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
