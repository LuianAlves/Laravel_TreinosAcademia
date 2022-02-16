<?php

use Illuminate\Support\Facades\Route;

// Geral
use App\Http\Controllers\GeralController;
use App\Http\Controllers\IndexController;

// User
use App\Http\Controllers\User\UserController;

// Aluno
use App\Http\Controllers\Aluno\AlunoController;
use App\Http\Controllers\Aluno\AreaAlunoController;

// Professor
use App\Http\Controllers\Professor\DadosProfessorContratoController;

// Avaliação
use App\Http\Controllers\Aluno\Avaliacao\AvaliacaoFisicaController;
use App\Http\Controllers\Aluno\Avaliacao\AvaliacaoFisicaAlunosController;

// Pagamentos
use App\Http\Controllers\Aluno\Pagamentos\PagamentoController;

// Contrato
use App\Http\Controllers\Aluno\Contratos\ContratosController;
use App\Http\Controllers\Aluno\Contratos\MontarContratoController;
use App\Http\Controllers\Aluno\Contratos\DadosAlunoContratoController;
use App\Http\Controllers\Aluno\Contratos\InfoAdicionalContratoController;

// Montar Treinos
use App\Http\Controllers\Aluno\Treinos\MontarTreinoController;
use App\Http\Controllers\Aluno\Treinos\TreinoMontadoController;
use App\Http\Controllers\Aluno\Treinos\AdicionarExercicioController;

// Treinos
use App\Http\Controllers\Treinos\CategoriaTreinosController;
use App\Http\Controllers\Treinos\ExercicioTreinosController;

// Emails
use App\Http\Controllers\User\EmailController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [IndexController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {

/* ---------------------------------- Login ---------------------------------- */
    // Profile
    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/user/profile/update/{user_id}', [UserController::class, 'profileUpdate'])->name('user.profile.update');
    Route::post('/user/password/update/{user_id}', [UserController::class, 'passwordUpdate'])->name('user.profile.update_password');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

/* ---------------------------------- BACKEND ---------------------------------- */

// ---------- Rota Geral ---------- //
    // Search Alunos
    Route::any('aluno/search', [GeralController::class, 'searchAluno'])->name('alunos.search');
    Route::any('aluno/search/cadastro', [GeralController::class, 'searchCadastroAluno'])->name('alunos.search.cadastro');

    // Pesquisar Alunos com JQuery
    Route::post('pesquisar/alunos', [GeralController::class, 'pesquisarAlunos'])->name('pesquisar-alunos');

// ---------- Área do Aluno ---------- //
    // Alunos
    Route::resource('alunos', AlunoController::class)->except('create');
    
    // Area do Aluno
    Route::get('area_aluno/{aluno_id}', [AreaAlunoController::class, 'index'])->name('area-aluno.index');
    Route::get('area_aluno/delete/{aluno_id}', [AreaAlunoController::class, 'destroy'])->name('area-aluno.destroy');

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
        
        // Dragg List - Alterar ordem dos itens
        Route::post('adicionar/update/dragg', [AdicionarExercicioController::class, 'updateItems'])->name('update.items');
        
    });

    // Avaliação Física
    Route::prefix('avaliacao')->group(function() {
        // Lista de Alunos
        Route::get('avaliacoes/create/{aluno_id}', [AvaliacaoFisicaAlunosController::class, 'create'])->name('avaliacoes.create');
        Route::get('avaliacoes/edit/{aluno_id}/{codigo}', [AvaliacaoFisicaAlunosController::class, 'edit'])->name('avaliacoes.edit');
        Route::post('avaliacoes/update/{aluno_id}', [AvaliacaoFisicaAlunosController::class, 'update'])->name('avaliacoes.update');
        Route::get('avaliacoes/destroy/{aluno_id}/{codigo}', [AvaliacaoFisicaAlunosController::class, 'destroy'])->name('avaliacoes.destroy');
        Route::resource('avaliacoes', AvaliacaoFisicaAlunosController::class)->except('create', 'edit', 'update', 'destroy');

        // Realizar Avaliação
        Route::get('realizar/{aluno_id}', [AvaliacaoFisicaController::class, 'index'])->name('realizar.index');
        Route::get('realizar/anamnese/{aluno_id}/{codigo}', [AvaliacaoFisicaController::class, 'indexAnamnese'])->name('realizar.index.anamnese');
        Route::post('realizar/store_anamnese/{aluno_id}', [AvaliacaoFisicaController::class, 'storeAnamnese'])->name('realizar.store.anamnese');
        Route::resource('realizar', AvaliacaoFisicaController::class)->except('index', 'create');
    });

    // Contratos
    Route::prefix('contratos')->group(function() {

        // Professores
        Route::resource('dados-professores', DadosProfessorContratoController::class)->except('create', 'show');

        // Montar 
        Route::post('montar-contrato/dados-professor/store', [DadosProfessorContratoController::class, 'store'])->name('montar-contrato.etapa-professor.store');
        
        Route::get('montar-contrato/create/{aluno_id}', [MontarContratoController::class, 'create'])->name('montar-contrato.create');
        Route::get('montar-contrato/dados-professor/create/{aluno_id}/{professor_id}/{codigo_contrato}', [MontarContratoController::class, 'etapaProfessor'])->name('montar-contrato.etapa-professor.create');
        Route::resource('montar-contrato', MontarContratoController::class)->except('create');
        
        // Alunos
        Route::get('dados-aluno/create/{aluno_id}/{professor_id}/{codigo_contrato}', [DadosAlunoContratoController::class, 'create'])->name('contratos.dados-aluno.create');
        Route::resource('dados-alunos', DadosAlunoContratoController::class)->except('create');
        
        // Informações Adicionais
        Route::get('info-adicional/create/{aluno_id}/{professor_id}/{codigo_contrato}', [InfoAdicionalContratoController::class, 'create'])->name('contratos.info-adicionais.create');
        Route::resource('info-adicional', InfoAdicionalContratoController::class)->except('create');
        
        // Montados
        Route::get('contratos-montados/index/{aluno_id}', [ContratosController::class, 'index'])->name('contratos-montados.index');
        Route::get('contratos-montados/todos', [ContratosController::class, 'indexTodos'])->name('contratos-montados.index.todos');
        Route::get('contratos-montados/edit/{codigo_contrato}/{aluno_id}/{professor_id}', [ContratosController::class, 'edit'])->name('contratos-montados.edit');
        Route::post('contratos-montados/update/{codigo_contrato}/{aluno_id}', [ContratosController::class, 'update'])->name('contratos-montados.update');
        Route::get('contratos-montados/destroy/{contrato_id}/{codigo_contrato}', [ContratosController::class, 'destroy'])->name('montar-contrato.destroy');
        
    });

    // Pagamentos
    Route::prefix('pagamentos')->group(function() {
        Route::get('geral/{aluno_id}', [PagamentoController::class, 'index'])->name('pagamentos.geral.index');
        Route::post('geral/store', [PagamentoController::class, 'store'])->name('pagamentos.geral.store');
        Route::get('geral/edit/{id}', [PagamentoController::class, 'edit'])->name('pagamentos.geral.edit');
        Route::post('geral/update/{id}', [PagamentoController::class, 'update'])->name('pagamentos.geral.update');
        
        Route::get('geral/todos/lista', [PagamentoController::class, 'Pagamentos'])->name('pagamentos.geral.todos');
        Route::get('geral/todos/pendentes', [PagamentoController::class, 'PagamentosPendentes'])->name('pagamentos.todos.pendentes');

        Route::get('geral/pagou/{pgt_id}', [GeralController::class, 'pagou'])->name('pagamentos.pagou');
        Route::get('geral/naopagou/{pgt_id}', [GeralController::class, 'naoPagou'])->name('pagamentos.naopagou');
        Route::post('geral/notificacoes/{pgt_id}', [GeralController::class, 'validarNotificacoes'])->name('pagamentos.validar.notificacoes');
    });

    // Emails
    Route::prefix('email')->group(function() {
        Route::get('/enviar', [EmailController::class, 'index'])->name('email.index');   
    });

    // Downloads
    Route::prefix('download')->group(function() {
        Route::get('/treinos/{treino_id}', [DownloadController::class, 'DownloadTreino'])->name('download.treino');
        Route::get('/avaliacao/{codigo_ava}', [DownloadController::class, 'DownloadAvaliacaoFisica'])->name('download.avaliacao.fisica');
        Route::get('contratos/download/{codigo_contrato}/{aluno_id}/{professor_id}', [DownloadController::class, 'DownloadContrato'])->name('contratos.download');
    });

// ---------- Área Administrativa ---------- //
    // Configurar Treinos
    Route::prefix('configurar/treinos')->group(function () {
        Route::resource('categoria', CategoriaTreinosController::class)->except('create', 'show');
        Route::resource('exercicio', ExercicioTreinosController::class)->except('create', 'show');
    });
});
