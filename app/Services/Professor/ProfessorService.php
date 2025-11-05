<?php

namespace App\Services\Professor;

use App\Models\Professor;
use App\Interfaces\ProfessorServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfessorService implements ProfessorServiceInterface
{
    protected $validator;

    public function __construct(ProfessorValidator $validator)
    {
        $this->validator = $validator;
    }

    public function create(Request $request)
    {
        $this->validator->validateCreate($request);

        return Professor::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
            'telefone' => $request->telefone,
            'data_nascimento' => $request->data_nascimento,
        ]);
    }

    public function findById(int $id)
    {
        return Professor::find($id);
    }

    public function update(Request $request, int $id)
    {
        $professor = Professor::findOrFail($id);

        $professor->update([
            'nome' => $request->nome ?? $professor->nome,
            'email' => $request->email ?? $professor->email,
            'senha' => $request->senha ? Hash::make($request->senha) : $professor->senha,
            'telefone' => $request->telefone ?? $professor->telefone,
            'data_nascimento' => $request->data_nascimento ?? $professor->data_nascimento,
        ]);

        return $professor;
    }

    public function delete(int $id)
    {
        $professor = Professor::findOrFail($id);
        $professor->delete();

        return true;
    }
}
