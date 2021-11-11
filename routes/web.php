<?php

use Illuminate\Support\Facades\Route;

// Geral
use App\Http\Controllers\GeralController;

// User
use App\Http\Controllers\User\UserController;

// Aluno
use App\Http\Controllers\Aluno\AlunoController;

// Montar Treinos
use App\Http\Controllers\Aluno\Treinos\MontarTreinoController;
use App\Http\Controllers\Aluno\Treinos\TreinoMontadoController;
use App\Http\Controllers\Aluno\Treinos\AdicionarExercicioController;

// Treinos
use App\Http\Controllers\Treinos\CategoriaTreinosController;
use App\Http\Controllers\Treinos\ExercicioTreinosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('app.index');
})->name('dashboard');


Route::middleware('auth')->group(function () {

/* ---------------------------------- Login ---------------------------------- */
    // Logout
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

/* ---------------------------------- BACKEND ---------------------------------- */

// ---------- Rota Geral ---------- //
    // Search Alunos
    Route::any('aluno/search', [GeralController::class, 'searchAluno'])->name('alunos.search');
    Route::any('aluno/search/cadastro', [GeralController::class, 'searchCadastroAluno'])->name('alunos.search.cadastro');

    // Search Categoria de Treinos
    Route::any('/treinos/categoria/search', [GeralController::class, 'searchCategoriaTreino'])->name('categoria.treinos.search');

// ---------- Área do Aluno ---------- //
    // Alunos
    Route::resource('alunos', AlunoController::class)->except('create');

    // Montar Treino
    Route::prefix('treino')->group(function () {
        // Montar
        Route::get('montar/create/{aluno_id}', [MontarTreinoController::class, 'create'])->name('montar.create');
        Route::resource('montar', MontarTreinoController::class)->except('create');
        
        // Treinos Montados
        Route::get('montado/{aluno_id}', [TreinoMontadoController::class, 'index'])->name('montado.index');

        // Adicionar Exercicios
        Route::get('adicionar/{treino_id}', [AdicionarExercicioController::class, 'index'])->name('adicionar.index');
        Route::get('adicionar/create/{divisao}/{treino_id}', [AdicionarExercicioController::class, 'create'])->name('adicionar.create');
        Route::post('adicionar/store/{divisao}/{treino_id}', [AdicionarExercicioController::class, 'store'])->name('adicionar.store');
        Route::resource('adicionar', AdicionarExercicioController::class)->except('index', 'create', 'store');
    });

// ---------- Área Administrativa ---------- //
    // Configurar Treinos
    Route::prefix('configurar/treinos')->group(function () {
        Route::resource('categoria', CategoriaTreinosController::class)->except('create', 'show');
        Route::resource('exercicio', ExercicioTreinosController::class)->except('create', 'show');
    });
});
