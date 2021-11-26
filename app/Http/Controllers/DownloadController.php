<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Treinos
use App\Models\TreinoAluno\MontarTreino;
use App\Models\TreinoAluno\AdicionarExercicio;

// Avaliação Física
use App\Models\Avaliacao\DadosAvaliacaoFisica;
use App\Models\Avaliacao\AnamneseAvaliacaoFisica;
use App\Models\Avaliacao\PerimetrosAvaliacaoFisica;
use App\Models\Avaliacao\DobrasCutaneasAvaliacaoFisica;
use App\Models\Avaliacao\NeuromotoresAvaliacaoFisica;

// Contratos
use App\Models\Contratos\Contratos;
use App\Models\Contratos\DadosProfessorContrato;
use App\Models\Contratos\DadosAlunoContrato;
use App\Models\Contratos\InfoAdicionalContrato;


use PDF;
use Carbon\Carbon;

class DownloadController extends Controller
{
    public function DownloadPersonal($divisao, $treino_id) {

        $treino = MontarTreino::with('aluno')->where('id', $treino_id)->first();
        $download_treino = AdicionarExercicio::with('exercicio')->where('treino_id', $treino_id)->where('divisao_treino', $divisao)->get();

        $data_treino = Carbon::parse($treino->created_at)->format('d M Y, H:m:s');
        $data_download = Carbon::now()->format('d M Y, H:m:s');

        $pdf = PDF::loadView('app.treinos.aluno.personal.download_treinos.down_treino', compact('download_treino', 'divisao', 'treino', 'data_treino', 'data_download'));

        return $pdf->download($treino->aluno->nome.'_'.$divisao.'.pdf');
    }

    public function DownloadAvaliacaoFisica($codigo_ava) {

        $dados = DadosAvaliacaoFisica::where('codigo_avaliacao', $codigo_ava)->first();
        $perimetros = PerimetrosAvaliacaoFisica::where('codigo_avaliacao', $codigo_ava)->first();
        $dobras = DobrasCutaneasAvaliacaoFisica::where('codigo_avaliacao', $codigo_ava)->first();
        $neuro = NeuromotoresAvaliacaoFisica::where('codigo_avaliacao', $codigo_ava)->first();
        $anamnese = AnamneseAvaliacaoFisica::where('codigo_avaliacao', $codigo_ava)->first();

        $data_down = Carbon::now()->format('d_m_Y');

        // return view('app.avaliacao_fisica.realizadas.down_avaliacao', compact('dados', 'perimetros', 'dobras', 'neuro', 'anamnese'));
        $pdf = PDF::loadView('app.avaliacao_fisica.realizadas.down_avaliacao', compact('dados', 'perimetros', 'dobras', 'neuro', 'anamnese'));

        return $pdf->download('cod_'.$codigo_ava.'_data_'.$data_down.'.pdf');    
    }

    public function DownloadContrato($codigo_contrato, $aluno_id, $professor_id) {

        $aluno = DadosAlunoContrato::where('aluno_id', $aluno_id)->first();
        $professor = DadosProfessorContrato::where('id', $professor_id)->first();

        $contrato = Contratos::where('codigo_contrato', $codigo_contrato)->first();
        $info_adicional = InfoAdicionalContrato::where('codigo_contrato', $codigo_contrato)->first();

        $data_down = Carbon::now()->format('d_m_Y');

        // View
        // return view('app.alunos.contratos.montados.download.down_contrato', compact('contrato', 'aluno', 'professor', 'info_adicional'));


        // Download
        $pdf = PDF::loadView('app.alunos.contratos.montados.download.down_contrato', compact('contrato', 'aluno', 'professor', 'info_adicional'));

        return $pdf->download('Contrato Personal_' . $contrato->codigo_contrato . '_' . $data_down.'.pdf');    
    }
}

