<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfessorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/alunos', [AlunoController::class, 'index']);
Route::post('/alunos', [AlunoController::class, 'store']);
Route::get('/alunos/{id}', [AlunoController::class, 'show']);
Route::put('/alunos/{id}', [AlunoController::class, 'update']);
Route::delete('/alunos/{id}', [AlunoController::class, 'destroy']);

//Rotas dos professores

Route::get('/professores', [ProfessorController::class, 'index']);
Route::post('/professores', [ProfessorController::class, 'store']);
Route::get('/professores/{id}', [ProfessorController::class, 'show']);
Route::put('/professores/{id}', [ProfessorController::class, 'update']);
Route::delete('/professores/{id}', [ProfessorController::class, 'destroy']);
