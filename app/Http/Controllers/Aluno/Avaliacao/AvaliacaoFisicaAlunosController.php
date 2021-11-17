<?php

namespace App\Http\Controllers\Aluno\Avaliacao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Avaliacao\DadosAvaliacaoFisica;
use App\Models\Avaliacao\AnamneseAvaliacaoFisica;
use App\Models\Avaliacao\PerimetrosAvaliacaoFisica;
use App\Models\Avaliacao\DobrasCutaneasAvaliacaoFisica;
use App\Models\Avaliacao\NeuromotoresAvaliacaoFisica;

use App\Models\TreinoAluno\MontarTreino;
use App\Models\Aluno;

class AvaliacaoFisicaAlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::where('tipo_treino', 'avaliação física')->get();

        return view('app.avaliacao_fisica.lista_alunos_avaliacao.index', compact('alunos'));
    }

    public function create($aluno_id)
    {
        $aluno = Aluno::where('id', $aluno_id)->first();
        $treino = MontarTreino::where('aluno_id', $aluno_id)->first();

        return view('app.avaliacao_fisica.index', compact('aluno', 'treino'));
    }

    public function show($id)
    {
        $avaliacoes = DadosAvaliacaoFisica::where('aluno_id', $id)->get();

        $aluno = Aluno::where('id', $id)->first();

        date_default_timezone_set('America/Sao_paulo');
        setlocale(LC_ALL, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese_brazil', 'portuguese_brazilian', 'bra', 'brazil', 'br');
        setlocale(LC_TIME, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese_brazil', 'portuguese_brazilian', 'bra', 'brazil', 'br');


        return view('app.avaliacao_fisica.realizadas.show', compact('avaliacoes', 'aluno'));
    }

    public function destroy(Request $request, $aluno_id, $codigo)
    {
        DadosAvaliacaoFisica::where('aluno_id', $aluno_id)->where('codigo_avaliacao', $codigo)->delete();
        AnamneseAvaliacaoFisica::where('aluno_id', $aluno_id)->where('codigo_avaliacao', $codigo)->delete();
        PerimetrosAvaliacaoFisica::where('aluno_id', $aluno_id)->where('codigo_avaliacao', $codigo)->delete();
        DobrasCutaneasAvaliacaoFisica::where('aluno_id', $aluno_id)->where('codigo_avaliacao', $codigo)->delete();
        NeuromotoresAvaliacaoFisica::where('aluno_id', $aluno_id)->where('codigo_avaliacao', $codigo)->delete();

        return redirect()->route('avaliacoes.show', $aluno_id);
    }
}
