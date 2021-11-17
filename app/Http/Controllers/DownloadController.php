<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Treinos
use App\Models\TreinoAluno\AdicionarExercicio;

// Avaliação Física
use App\Models\Avaliacao\DadosAvaliacaoFisica;
use App\Models\Avaliacao\AnamneseAvaliacaoFisica;
use App\Models\Avaliacao\PerimetrosAvaliacaoFisica;
use App\Models\Avaliacao\DobrasCutaneasAvaliacaoFisica;
use App\Models\Avaliacao\NeuromotoresAvaliacaoFisica;

use PDF;

class DownloadController extends Controller
{
    public function DownloadPersonal($divisao, $treino_id) {

        $download_treino = AdicionarExercicio::where('treino_id', $treino_id)->where('divisao_treino', $divisao)->get();

        $pdf = PDF::loadView('app.treinos.aluno.personal.download_treinos.down_treino', compact('download_treino'));

        return $pdf->download($divisao.'.pdf');
    }

    public function DownloadAvaliacaoFisica($codigo_ava) {

        $dados = DadosAvaliacaoFisica::where('codigo_avaliacao', $codigo_ava)->first();
        $perimetros = PerimetrosAvaliacaoFisica::where('codigo_avaliacao', $codigo_ava)->first();
        $dobras = DobrasCutaneasAvaliacaoFisica::where('codigo_avaliacao', $codigo_ava)->first();
        $neuro = NeuromotoresAvaliacaoFisica::where('codigo_avaliacao', $codigo_ava)->first();
        $anamnese = AnamneseAvaliacaoFisica::where('codigo_avaliacao', $codigo_ava)->first();

        return view('app.avaliacao_fisica.realizadas.down_avaliacao', compact('dados', 'perimetros', 'dobras', 'neuro', 'anamnese'));
        // $pdf = PDF::loadView('app.avaliacao_fisica.realizadas.down_avaliacao', compact('dados', 'perimetros', 'dobras', 'neuro', 'anamnese'));

        // return $pdf->download($codigo_ava.'.pdf');    
    }
}

