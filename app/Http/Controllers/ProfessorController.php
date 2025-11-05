<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ProfessorServiceInterface;
use Illuminate\Validation\ValidationException;

class ProfessorController extends Controller
{
    protected $service;

    public function __construct(ProfessorServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('professores.index');
    }

    public function store(Request $request)
    {
        try {
            $professor = $this->service->create($request);
            return response()->json($professor, 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function show($id)
    {
        $professor = $this->service->findById($id);

        if (!$professor) {
            return response()->json(['message' => 'Professor não encontrado'], 404);
        }

        return response()->json($professor, 200);
    }

    public function update(Request $request, $id)
    {
        try {
            $professor = $this->service->update($request, $id);
            return response()->json($professor, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao atualizar professor'], 400);
        }
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return response()->json(['message' => 'Professor deletado com sucesso'], 200);
    }
}
