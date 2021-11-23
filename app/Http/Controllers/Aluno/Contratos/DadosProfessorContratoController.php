<?php

namespace App\Http\Controllers\Aluno\Contratos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contratos\DadosProfessorContrato;
use App\Models\Contratos\DadosAlunoContrato;
use App\Models\Contratos\Contratos;

use Carbon\Carbon;
use Route;

class DadosProfessorContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professores = DadosProfessorContrato::get();

        return view('app.alunos.contratos.dados.professor.index', compact('professores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->professor_id != '') {
            
            $aluno = $request->aluno_id;
            $professor = $request->professor_id;
            $codigo_contrato = $request->codigo_contrato;

            DadosProfessorContrato::findOrFail($request->professor_id)->update([
                'nome_professor' => $request->nome_professor,
                'estado_civil_professor' => $request->estado_civil_professor,
                'profissao_professor' => $request->profissao_professor,
                'rg_professor' => $request->rg_professor,
                'cpf_professor' => $request->cpf_professor,
                'cref_professor' => $request->cref_professor,
                'endereco_professor' => $request->endereco_professor,
                'numero_casa_professor' => $request->numero_casa_professor,
                'bairro_professor' => $request->bairro_professor,
                'cep_professor' => $request->cep_professor,
                'cidade_professor' => $request->cidade_professor,
                'estado_professor' => $request->estado_professor,
                'telefone_fixo_professor' => $request->telefone_fixo_professor,
                'telefone_celular_professor' => $request->telefone_celular_professor,
                'email_professor' => $request->email_professor,
                'updated_at' => Carbon::now()
            ]);

            return redirect()->route('contratos.info-adicionais.create', ['aluno_id' => $aluno, 'professor_id' => $professor, 'codigo_contrato' => $codigo_contrato]);

        } else {
            DadosProfessorContrato::insert([
                'nome_professor' => $request->nome_professor,
                'estado_civil_professor' => $request->estado_civil_professor,
                'profissao_professor' => $request->profissao_professor,
                'rg_professor' => $request->rg_professor,
                'cpf_professor' => $request->cpf_professor,
                'cref_professor' => $request->cref_professor,
                'endereco_professor' => $request->endereco_professor,
                'numero_casa_professor' => $request->numero_casa_professor,
                'bairro_professor' => $request->bairro_professor,
                'cep_professor' => $request->cep_professor,
                'cidade_professor' => $request->cidade_professor,
                'estado_professor' => $request->estado_professor,
                'telefone_fixo_professor' => $request->telefone_fixo_professor,
                'telefone_celular_professor' => $request->telefone_celular_professor,
                'email_professor' => $request->email_professor,
                'created_at' => Carbon::now()
            ]);
            
            return redirect()->back();
        }
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
        $professor = DadosProfessorContrato::where('id', $id)->first();

        return view('app.alunos.contratos.dados.professor.edit', compact('professor'));
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
        DadosProfessorContrato::findOrFail($id)->update([
            'nome_professor' => $request->nome_professor,
            'estado_civil_professor' => $request->estado_civil_professor,
            'profissao_professor' => $request->profissao_professor,
            'rg_professor' => $request->rg_professor,
            'cpf_professor' => $request->cpf_professor,
            'cref_professor' => $request->cref_professor,
            'endereco_professor' => $request->endereco_professor,
            'numero_casa_professor' => $request->numero_casa_professor,
            'bairro_professor' => $request->bairro_professor,
            'cidade_professor' => $request->cidade_professor,
            'estado_professor' => $request->estado_professor,
            'telefone_fixo_professor' => $request->telefone_fixo_professor,
            'telefone_celular_professor' => $request->telefone_celular_professor,
            'email_professor' => $request->email_professor,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('dados-professores.index');
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
    