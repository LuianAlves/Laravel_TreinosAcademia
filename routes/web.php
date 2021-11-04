<?php

// Backend
use App\Http\Controllers\User\UserController;

// Backend
use App\Http\Controllers\Backend\AlunoController;
use App\Http\Controllers\Backend\GeralController;

// Backend/Treinos
use App\Http\Controllers\Backend\Treinos\CategoriaTreinosController;
use App\Http\Controllers\Backend\Treinos\ExercicioTreinosController;


use Illuminate\Support\Facades\Route;

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
    Route::resource('alunos', AlunoController::class);



// ---------- Área Administrativa ---------- //
Route::prefix('treinos')->group(function() {
    Route::resource('categoria', CategoriaTreinosController::class)->except('create', 'show');
    Route::resource('exercicio', ExercicioTreinosController::class);
});
