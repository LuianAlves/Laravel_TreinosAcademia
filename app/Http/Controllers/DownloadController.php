<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TreinoAluno\AdicionarExercicio;

use PDF;

class DownloadController extends Controller
{
    public function DownloadPersonal($divisao, $treino_id) {

        $download_treino = AdicionarExercicio::where('treino_id', $treino_id)->where('divisao_treino', $divisao)->get();

        $pdf = PDF::loadView('app.treinos.aluno.personal.download_treinos.down_treino', compact('download_treino'));

        return $pdf->download($divisao.'.pdf');
    }
}
