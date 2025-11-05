<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CQRS\Commands\CreateTreinoCommand;
use App\CQRS\Commands\UpdateTreinoCommand;
use App\CQRS\Commands\DeleteTreinoCommand;
use App\CQRS\Queries\GetAllTreinosQuery;
use App\CQRS\Queries\GetTreinoByIdQuery;
use App\CQRS\Handlers\CreateTreinoHandler;
use App\CQRS\Handlers\UpdateTreinoHandler;
use App\CQRS\Handlers\DeleteTreinoHandler;
use App\CQRS\Handlers\GetAllTreinosHandler;
use App\CQRS\Handlers\GetTreinoByIdHandler;

class TreinoController extends Controller
{
    public function index()
    {
        $query = new GetAllTreinosQuery();
        $handler = new GetAllTreinosHandler();

        return response()->json($handler->handle($query));
    }

    public function show($id)
    {
        $query = new GetTreinoByIdQuery($id);
        $handler = new GetTreinoByIdHandler();

        return response()->json($handler->handle($query));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'descricao' => 'required|string|max:500',
            'aluno_id' => 'required|integer|exists:aluno,id',
            'professor_id' => 'required|integer|exists:professor,id',
        ]);

        $command = new CreateTreinoCommand(
            $request->nome,
            $request->descricao,
            $request->aluno_id,
            $request->professor_id
        );

        $handler = new CreateTreinoHandler();
        $treino = $handler->handle($command);

        return response()->json($treino, 201);
    }

    public function update(Request $request, $id)
    {
        $command = new UpdateTreinoCommand(
            $id,
            $request->nome,
            $request->descricao
        );

        $handler = new UpdateTreinoHandler();
        $treino = $handler->handle($command);

        return response()->json($treino, 200);
    }

    public function destroy($id)
    {
        $command = new DeleteTreinoCommand($id);
        $handler = new DeleteTreinoHandler();

        return response()->json($handler->handle($command), 200);
    }
}
