<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Pagamentos\Pagamento;
use App\Models\Aluno;
use App\Models\Avaliacao\AnamneseAvaliacaoFisica;
use App\Models\TreinoAluno\AdicionarExercicio;
use App\Models\TreinoAluno\MontarTreino;

use Carbon\Carbon;

class IndexController extends Controller
{
    public function index(Request $request) {
        $mes = date('m');
        
        // Lado Esquerdo Dashboard
        $caixa = Pagamento::where('mes_pagamento_geral', $mes)->where('status', 1)->sum('valor_pagamento_geral'); 
        $caixa_mes = round($caixa, 2);
        
        $caixa_pendente = Pagamento::where('status', 0)->sum('valor_pagamento_geral'); 
        $caixa_pendente_mes = round($caixa_pendente, 2);

        $alunos_novos = Aluno::where('mes_cadastro', $mes)->count();

        $avaliacoes = AnamneseAvaliacaoFisica::where('data_mes_ava', $mes)->count('codigo_avaliacao');
        
        $pagamentos_pendentes = Pagamento::where('status', 0)->orderBy('data_pagamento_geral', 'ASC')->limit(4)->get();

        // Lado Direito Dashboard        
        $alunos = Aluno::orderBy('created_at', 'DESC')->limit(4)->get();
        $treinos = MontarTreino::orderBy('created_at', 'DESC')->limit(4)->get();
        $ava_recent = AnamneseAvaliacaoFisica::orderBy('created_at', 'DESC')->limit(4)->get();
        
        return view('app.index', compact('pagamentos_pendentes', 'caixa_mes', 'caixa_pendente_mes', 'alunos_novos', 'avaliacoes', 'alunos', 'treinos', 'ava_recent'));
    }
}
