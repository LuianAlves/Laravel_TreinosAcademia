<?php

namespace App\Http\Controllers\Aluno\Contratos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Aluno;
use App\Models\Contratos\Contratos;
use App\Models\Contratos\DadosProfessorContrato;
use App\Models\Contratos\InfoAdicionalContrato;


use Carbon\Carbon;

class ContratosController extends Controller
{
    public function indexTodos() {
        $todos_contratos = Contratos::orderBy('id', 'DESC')->get();

        return view('app.alunos.contratos.montados.index_todos', compact('todos_contratos'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($aluno_id)
    {
        $aluno = Aluno::where('id', $aluno_id)->first();
        $contratos = Contratos::where('aluno_id', $aluno_id)->get();

        return view('app.alunos.contratos.montados.index', compact('contratos', 'aluno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo_contrato, $aluno_id, $professor_id)
    {
        $aluno = Aluno::where('id', $aluno_id)->first();
        $info_adicional = InfoAdicionalContrato::where('codigo_contrato', $codigo_contrato)->first(); 
        $contrato = Contratos::where('codigo_contrato', $codigo_contrato)->first(); 
        $professores = DadosProfessorContrato::orderBy('nome_professor', 'ASC')->get();

        return view('app.alunos.contratos.montados.edit', compact('aluno', 'contrato', 'professores', 'info_adicional'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $codigo_contrato, $aluno_id)
    {
        Contratos::where('codigo_contrato', $codigo_contrato)->update([
            'professor_id' => $request->professor_id,
            'nome_contrato' => $request->nome_contrato,
            'updated_at' => Carbon::now()
        ]); 

        InfoAdicionalContrato::where('codigo_contrato', $codigo_contrato)->where('aluno_id', $aluno_id)->update([
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
            'updated_at' => Carbon::now()
        ]); 

        return redirect()->route('contratos-montados.index', $aluno_id);
    }

    // =====================================
    
    public function destroy($contrato_id, $codigo_contrato)
    {
        Contratos::where('id', $contrato_id)->delete();
        InfoAdicionalContrato::where('codigo_contrato', $codigo_contrato)->delete();

        return redirect()->back();
    }

    public function downloadContrato() {
        
    }
}
