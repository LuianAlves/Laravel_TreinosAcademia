<?php

namespace App\Http\Controllers\Aluno\Contratos;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Contratos\Contratos;
use App\Models\Contratos\DadosAlunoContrato;
use App\Models\Contratos\InfoAdicionalContrato;
use App\Models\Contratos\DadosProfessorContrato;

use Carbon\Carbon;

class InfoAdicionalContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($aluno_id, $professor_id, $codigo_contrato)
    {   
        $aluno = DadosAlunoContrato::where('aluno_id', $aluno_id)->first();
        $professor = DadosProfessorContrato::where('id', $professor_id)->first();
        $codigo_contrato = Contratos::where('codigo_contrato', $codigo_contrato)->first();

        return view('app.alunos.contratos.montar_contrato.etapa_info_adicional', compact('aluno', 'professor', 'codigo_contrato'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $professor = $request->professor_id;
        $aluno = $request->aluno_id;
        $codigo = $request->codigo_contrato;

        InfoAdicionalContrato::insert([
            'professor_id' => $professor,
            'aluno_id' => $aluno,
            'codigo_contrato' => $codigo,
            'funcao_professor' => $request->funcao_professor,
            'objetivo_aluno' => $request->objetivo_aluno,
            'hora_inicio' => $request->hora_inicio,
            'hora_final' => $request->hora_final,
            'dia_semana' => $request->dia_semana,
            'reposicao_aula_mensal' => $request->reposicao_aula_mensal,
            'pagamento_mensal' => $request->pagamento_mensal,
            'pagamento_mensal_inscrito' => $request->pagamento_mensal_inscrito,
            'vencimento_pagamento' => $request->vencimento_pagamento,
            'dia_de_tolerancia' => $request->dia_de_tolerancia,
            'multa_atraso' => $request->multa_atraso,
            'duracao_contrato' => $request->duracao_contrato,
            'inicio_contrato' => $request->inicio_contrato,
            'final_contrato' => $request->final_contrato,
            'nome_foro' => $request->nome_foro,
            'estado_foro' => $request->estado_foro,
            'data_estado_contrato' => $request->data_estado_contrato,
            'data_dia_contrato' => $request->data_dia_contrato,
            'data_mes_contrato' => $request->data_mes_contrato,
            'data_ano_contrato' => $request->data_ano_contrato,
            'testemunha_um' => $request->testemunha_um,
            'testemunha_um_rg' => $request->testemunha_um_rg,
            'testemunha_dois' => $request->testemunha_dois,
            'testemunha_dois_rg' => $request->testemunha_dois_rg,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('contratos-montados.index',[$aluno, $codigo]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
