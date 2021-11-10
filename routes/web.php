<?php

use Illuminate\Support\Facades\Route;

// Geral
use App\Http\Controllers\GeralController;

// User
use App\Http\Controllers\User\UserController;

// Aluno
use App\Http\Controllers\Aluno\AlunoController;
use App\Http\Controllers\Aluno\MontarTreinoController;
use App\Http\Controllers\Aluno\MontarExerciciosController;

// Treinos
use App\Http\Controllers\Treinos\TreinoController;
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

    // Montar Treinos
    Route::prefix('treino')->group(function() {
        Route::get('montados/{aluno_id}', [TreinoController::class, 'index'])->name('treino.index');
        Route::get('create/{id}', [TreinoController::class, 'create'])->name('treino.create');
        Route::get('show/{codigo_treino}', [TreinoController::class, 'show'])->name('treino.show');
        Route::get('modificar/{codigo_id}', [TreinoController::class, 'modificar'])->name('treino.modificar');
        
        Route::prefix('store')->group(function() {
            Route::post('{aluno_id}', [TreinoController::class, 'store'])->name('treino.store');
            Route::post('informacao/{codigo}', [TreinoController::class, 'storeInfo'])->name('treino.info.store');
            Route::post('exercicio/a/{codigo}', [TreinoController::class, 'storeExercicioA'])->name('treino_a.exercicio.store');
            Route::post('exercicio/b/{codigo}', [TreinoController::class, 'storeExercicioB'])->name('treino_b.exercicio.store');
            Route::post('exercicio/c/{codigo}', [TreinoController::class, 'storeExercicioC'])->name('treino_c.exercicio.store');
            Route::post('exercicio/d/{codigo}', [TreinoController::class, 'storeExercicioD'])->name('treino_d.exercicio.store');
        });
    });
    


    

// ---------- Área Administrativa ---------- //
    // Configurar Treinos
    Route::prefix('treinos')->group(function () {
        Route::resource('categoria', CategoriaTreinosController::class)->except('create', 'show');
        Route::resource('exercicio', ExercicioTreinosController::class)->except('create', 'show');
    });
});
