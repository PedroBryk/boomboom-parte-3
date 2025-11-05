<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\TreinoController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Login e Logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard genérico protegido
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Perfil protegido
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rotas de Aluno
Route::middleware('auth:aluno')->group(function () {
    Route::get('/aluno/home', [AlunoController::class, 'index'])->name('aluno.home');
    Route::get('/alunos', [AlunoController::class, 'index']);
    Route::post('/alunos', [AlunoController::class, 'store']);
    Route::get('/alunos/{id}', [AlunoController::class, 'show']);
    Route::put('/alunos/{id}', [AlunoController::class, 'update']);
    Route::delete('/alunos/{id}', [AlunoController::class, 'destroy']);
});

// Rotas de Professor
Route::middleware('auth:professor')->group(function () {
    Route::get('/professor/home', [ProfessorController::class, 'index'])->name('professor.home');
    Route::get('/professores', [ProfessorController::class, 'index']);
    Route::post('/professores', [ProfessorController::class, 'store']);
    Route::get('/professores/{id}', [ProfessorController::class, 'show']);
    Route::put('/professores/{id}', [ProfessorController::class, 'update']);
    Route::delete('/professores/{id}', [ProfessorController::class, 'destroy']);
});

// Rotas de Administrador
Route::middleware('auth:administrador')->group(function () {
    Route::get('/administrador/home', [AdministradorController::class, 'index'])->name('administrador.home');
});
