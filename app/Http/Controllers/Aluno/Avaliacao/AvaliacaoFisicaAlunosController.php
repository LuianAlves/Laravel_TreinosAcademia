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

use Carbon\Carbon;

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

    // Create
    public function create($aluno_id)
    {
        $aluno = Aluno::where('id', $aluno_id)->first();
        $treino = MontarTreino::where('aluno_id', $aluno_id)->first();

        return view('app.avaliacao_fisica.index', compact('aluno', 'treino'));
    }

    // Show
    public function show($id)
    {
        $avaliacoes = DadosAvaliacaoFisica::where('aluno_id', $id)->get();

        $aluno = Aluno::where('id', $id)->first();

        date_default_timezone_set('America/Sao_paulo');
        setlocale(LC_ALL, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese_brazil', 'portuguese_brazilian', 'bra', 'brazil', 'br');
        setlocale(LC_TIME, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese_brazil', 'portuguese_brazilian', 'bra', 'brazil', 'br');


        return view('app.avaliacao_fisica.realizadas.show', compact('avaliacoes', 'aluno'));
    }

    // Edit
    public function edit($aluno_id, $codigo)
    {
        $avaliacao = DadosAvaliacaoFisica::where('aluno_id', $aluno_id)->where('codigo_avaliacao', $codigo)->first();
        $dados_perimetro =  PerimetrosAvaliacaoFisica::where('aluno_id', $aluno_id)->where('codigo_avaliacao', $codigo)->first();
        $dados_dobra = DobrasCutaneasAvaliacaoFisica::where('aluno_id', $aluno_id)->where('codigo_avaliacao', $codigo)->first();
        $dados_neuro = NeuromotoresAvaliacaoFisica::where('aluno_id', $aluno_id)->where('codigo_avaliacao', $codigo)->first();
        $dados_anamnese = AnamneseAvaliacaoFisica::where('aluno_id', $aluno_id)->where('codigo_avaliacao', $codigo)->first();

        return view('app.avaliacao_fisica.realizadas.edit', compact('avaliacao', 'dados_perimetro', 'dados_dobra', 'dados_neuro', 'dados_anamnese'));   
    }

    // Update
    public function update(Request $request, $aluno_id) {

        $codigo = $request->codigo_avaliacao;

        DadosAvaliacaoFisica::where('aluno_id', $aluno_id)->where('codigo_avaliacao', $codigo)->update([
            'aluno_id' => $aluno_id,
            'codigo_avaliacao' => $codigo,
            'data_nasc' => $request->data_nasc,
            'historico_familiar' => $request->historico_familiar,
            'estatura' => $request->estatura,
            'peso' => $request->peso,
            'updated_at' => Carbon::now()
        ]);

        PerimetrosAvaliacaoFisica::where('aluno_id', $aluno_id)->where('codigo_avaliacao', $codigo)->update([
            'aluno_id' => $aluno_id,
            'codigo_avaliacao' => $codigo,
            'torax' => $request->torax, 
            'cintura' => $request->cintura, 
            'abdomen' => $request->abdomen, 
            'quadril' => $request->quadril, 
            'antebraco_direito' => $request->antebraco_direito, 
            'antebraco_esquerdo' => $request->antebraco_esquerdo, 
            'braco_direito' => $request->braco_direito, 
            'braco_esquerdo' => $request->braco_esquerdo, 
            'coxa_direita' => $request->coxa_direita, 
            'coxa_esquerda' => $request->coxa_esquerda, 
            'panturrilha_direita' => $request->panturrilha_direita, 
            'panturrilha_esquerda' => $request->panturrilha_esquerda, 
            'updated_at' => Carbon::now()
        ]);
        
        DobrasCutaneasAvaliacaoFisica::where('aluno_id', $aluno_id)->where('codigo_avaliacao', $codigo)->update([
            'aluno_id' => $request->aluno_id,
            'codigo_avaliacao' => $codigo,
            'subscapular' => $request->subscapular, 
            'axilar_media' => $request->axilar_media, 
            'supra_iliaca' => $request->supra_iliaca, 
            'peitoral' => $request->peitoral, 
            'triciptal' => $request->triciptal, 
            'abdominal' => $request->abdominal, 
            'coxa' => $request->coxa, 
            'updated_at' => Carbon::now()
        ]);
        
        NeuromotoresAvaliacaoFisica::where('aluno_id', $aluno_id)->where('codigo_avaliacao', $codigo)->update([
            'aluno_id' => $request->aluno_id,
            'codigo_avaliacao' => $codigo,
            'flexoes' => $request->flexoes, 
            'abdominais' => $request->abdominais, 
            'flexibilidade' => $request->flexibilidade, 
            'updated_at' => Carbon::now()
        ]);

        AnamneseAvaliacaoFisica::where('aluno_id', $aluno_id)->where('codigo_avaliacao', $codigo)->update([
            'aluno_id' => $aluno_id,
            'codigo_avaliacao' => $codigo,
            'atividade_fisica' => $request->atividade_fisica,
            'medicamento' => $request->medicamento,
            'cirurgia' => $request->cirurgia,
            'doenca_familia' => $request->doenca_familia,
            'observacoes' => $request->observacoes,
            'prescricao_medica' => $request->prescricao_medica,
            'dor_peito' => $request->dor_peito,
            'dor_peito_ult_mes' => $request->dor_peito_ult_mes,
            'tonteira_desmaio' => $request->tonteira_desmaio,
            'problema_osseo' => $request->problema_osseo,
            'medicamento_pressao_arterial' => $request->medicamento_pressao_arterial,
            'atividade_sem_supervisao' => $request->atividade_sem_supervisao,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('avaliacoes.show', $aluno_id);
    }

    // Delete
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
