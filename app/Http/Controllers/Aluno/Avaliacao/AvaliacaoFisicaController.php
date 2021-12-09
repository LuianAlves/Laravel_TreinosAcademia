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

class AvaliacaoFisicaController extends Controller
{
    public function index($aluno_id)
    {
        $aluno = Aluno::where('id', $aluno_id)->first();
        $treino = MontarTreino::where('aluno_id', $aluno_id)->first();

        return view('app.avaliacao_fisica.index', compact('aluno', 'treino'));
    }

    public function indexAnamnese($aluno_id, $codigo) {

        $aluno = Aluno::where('id', $aluno_id)->first();
        $treino = MontarTreino::where('aluno_id', $aluno_id)->first();

        return view('app.avaliacao_fisica.index_anamnese', compact('aluno', 'treino', 'codigo'));
    }

    public function storeAnamnese(Request $request, $aluno_id) {

        $codigo = $request->codigo_ava;

        AnamneseAvaliacaoFisica::insert([
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
            'data_mes_ava' => Carbon::now()->format('m'),
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('avaliacoes.show', $aluno_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aluno_id = $request->aluno_id;
        $codigo = mt_rand(1, 9999);

            DadosAvaliacaoFisica::insert([
                'aluno_id' => $aluno_id,
                'codigo_avaliacao' => $codigo,
                'data_nasc' => $request->data_nasc,
                'historico_familiar' => $request->historico_familiar,
                'estatura' => $request->estatura,
                'peso' => $request->peso,
                'data_mes_ava' => Carbon::now()->format('m'),
                'created_at' => Carbon::now()
            ]);

            PerimetrosAvaliacaoFisica::insert([
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
                'data_mes_ava' => Carbon::now()->format('m'), 
                'created_at' => Carbon::now()
            ]);
            
            DobrasCutaneasAvaliacaoFisica::insert([
                'aluno_id' => $request->aluno_id,
                'codigo_avaliacao' => $codigo,
                'subscapular' => $request->subscapular, 
                'axilar_media' => $request->axilar_media, 
                'supra_iliaca' => $request->supra_iliaca, 
                'peitoral' => $request->peitoral, 
                'triciptal' => $request->triciptal, 
                'abdominal' => $request->abdominal, 
                'coxa' => $request->coxa,
                'data_mes_ava' => Carbon::now()->format('m'), 
                'created_at' => Carbon::now()
            ]);
            
            NeuromotoresAvaliacaoFisica::insert([
                'aluno_id' => $request->aluno_id,
                'codigo_avaliacao' => $codigo,
                'flexoes' => $request->flexoes, 
                'abdominais' => $request->abdominais, 
                'flexibilidade' => $request->flexibilidade,
                'data_mes_ava' => Carbon::now()->format('m'), 
                'created_at' => Carbon::now()
            ]);

        return redirect()->route('realizar.index.anamnese', ['aluno_id' => $aluno_id, 'codigo' => $codigo]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Avaliacao\AvaliacaoFisica  $avaliacaoFisica
     * @return \Illuminate\Http\Response
     */
    public function show(AvaliacaoFisica $avaliacaoFisica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Avaliacao\AvaliacaoFisica  $avaliacaoFisica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AvaliacaoFisica $avaliacaoFisica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Avaliacao\AvaliacaoFisica  $avaliacaoFisica
     * @return \Illuminate\Http\Response
     */
    public function destroy(AvaliacaoFisica $avaliacaoFisica)
    {
        //
    }
}
