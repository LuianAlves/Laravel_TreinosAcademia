<?php

use Illuminate\Support\Facades\Route;

// Geral
use App\Http\Controllers\GeralController;

// User
use App\Http\Controllers\User\UserController;

// Aluno
use App\Http\Controllers\Aluno\AlunoController;

// Avaliação
use App\Http\Controllers\Aluno\Avaliacao\AvaliacaoFisicaController;
use App\Http\Controllers\Aluno\Avaliacao\AvaliacaoFisicaAlunosController;

// Pagamentos
use App\Http\Controllers\Aluno\Pagamentos\PagamentoController;

// Montar Treinos
use App\Http\Controllers\Aluno\Treinos\MontarTreinoController;
use App\Http\Controllers\Aluno\Treinos\TreinoMontadoController;
use App\Http\Controllers\Aluno\Treinos\AdicionarExercicioController;

// Treinos
use App\Http\Controllers\Treinos\CategoriaTreinosController;
use App\Http\Controllers\Treinos\ExercicioTreinosController;

// Downloads
use App\Http\Controllers\DownloadController;

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

    // Pesquisar Alunos com JQuery
    Route::post('pesquisar/alunos', [GeralController::class, 'pesquisarAlunos'])->name('pesquisar-alunos');

// ---------- Área do Aluno ---------- //
    // Alunos
    Route::resource('alunos', AlunoController::class)->except('create');

    // Montar Treino
    Route::prefix('assessoria/treino')->group(function () {
        
        // Montar
        Route::get('montar/create/{aluno_id}', [MontarTreinoController::class, 'create'])->name('montar.create');
        Route::resource('montar', MontarTreinoController::class)->except('create');
        
        // Treinos Montados
        Route::get('montado/{aluno_id}', [TreinoMontadoController::class, 'index'])->name('montado.index');

        // Adicionar Exercicios
        Route::get('adicionar/{treino_id}', [AdicionarExercicioController::class, 'index'])->name('adicionar.index');
        Route::get('adicionar/create/{divisao}/{treino_id}', [AdicionarExercicioController::class, 'create'])->name('adicionar.create');
        Route::post('adicionar/store/{divisao}/{treino_id}', [AdicionarExercicioController::class, 'store'])->name('adicionar.store');
        Route::get('adicionar/edit/{id}/{exercicio_id}', [AdicionarExercicioController::class, 'edit'])->name('adicionar.edit');
        Route::post('adicionar/update/{id}/{exercicio_id}', [AdicionarExercicioController::class, 'update'])->name('adicionar.update');
        Route::get('adicionar/destroy/{id}/{exercicio_id}', [AdicionarExercicioController::class, 'destroy'])->name('adicionar.destroy');
    });

    // Avaliação Física
    Route::prefix('avaliacao')->group(function() {
        // Lista de Alunos
        Route::get('avaliacoes/create/{aluno_id}', [AvaliacaoFisicaAlunosController::class, 'create'])->name('avaliacoes.create');
        Route::get('avaliacoes/destroy/{aluno_id}/{codigo}', [AvaliacaoFisicaAlunosController::class, 'destroy'])->name('avaliacoes.destroy');
        Route::resource('avaliacoes', AvaliacaoFisicaAlunosController::class)->except('create', 'edit', 'update', 'destroy');

        // Realizar Avaliação
        Route::get('realizar/{aluno_id}', [AvaliacaoFisicaController::class, 'index'])->name('realizar.index');
        Route::get('realizar/anamnese/{aluno_id}/{codigo}', [AvaliacaoFisicaController::class, 'indexAnamnese'])->name('realizar.index.anamnese');
        Route::post('realizar/store_anamnese/{aluno_id}', [AvaliacaoFisicaController::class, 'storeAnamnese'])->name('realizar.store.anamnese');
        Route::resource('realizar', AvaliacaoFisicaController::class)->except('index', 'create');
    });

    // Pagamentos
    Route::prefix('pagamentos')->group(function() {
        // Geral
        Route::get('geral/{aluno_id}', [PagamentoController::class, 'index'])->name('pagamentos.geral.index');
        Route::post('geral/store', [PagamentoController::class, 'store'])->name('pagamentos.geral.store');
        Route::get('geral/edit/{id}', [PagamentoController::class, 'edit'])->name('pagamentos.geral.edit');
        Route::post('geral/update/{id}', [PagamentoController::class, 'update'])->name('pagamentos.geral.update');


        // Personal


        Route::get('geral/pagou/{pgt_id}', [GeralController::class, 'pagou'])->name('pagamentos.pagou');
        Route::get('geral/naopagou/{pgt_id}', [GeralController::class, 'naoPagou'])->name('pagamentos.naopagou');
    });

    // Downloads
    Route::prefix('download')->group(function() {
        Route::get('/personal/treinos/{divisao}/{treino_id}', [DownloadController::class, 'DownloadPersonal'])->name('download.personal');
        Route::get('/avaliacao/{codigo_ava}', [DownloadController::class, 'DownloadAvaliacaoFisica'])->name('download.avaliacao.fisica');
    });

// ---------- Área Administrativa ---------- //
    // Configurar Treinos
    Route::prefix('configurar/treinos')->group(function () {
        Route::resource('categoria', CategoriaTreinosController::class)->except('create', 'show');
        Route::resource('exercicio', ExercicioTreinosController::class)->except('create', 'show');
    });
});
