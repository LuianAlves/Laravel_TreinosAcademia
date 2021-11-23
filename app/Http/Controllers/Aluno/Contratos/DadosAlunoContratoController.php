<?php

namespace App\Http\Controllers\Aluno\Contratos;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Aluno;
use App\Models\Contratos\DadosAlunoContrato;
use App\Models\Contratos\DadosProfessorContrato;
use App\Models\Contratos\Contratos;

use Carbon\Carbon;

class DadosAlunoContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index($aluno_id, $professor_id, $cod_contrato)
    // {
    //     $aluno = Aluno::where('id', $aluno_id)->first();
    //     $d_aluno = DadosAlunoContrato::where('aluno_id', $aluno_id)->first();
    //     $d_professor = DadosProfessorContrato::where('id', $professor_id)->first();
    //     // $infos_adicionais = InfoAdicionalContrato::where('codigo_contrato', $cod_contrato)->first();

    //     return view('app.alunos.contratos.dados.alunos.index', compact('aluno', 'd_aluno', 'd_professor'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($aluno_id, $professor_id, $codigo_contrato)
    {   
        $aluno = Aluno::where('id', $aluno_id)->first();
        $professor = DadosProfessorContrato::where('id', $professor_id)->first();
        $codigo_contrato = Contratos::where('codigo_contrato', $codigo_contrato)->first();

        return view('app.alunos.contratos.montar_contrato.etapa_aluno', compact('aluno', 'professor', 'codigo_contrato'));
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
        $professor_id = $request->professor_id;
        $codigo_contrato = $request->codigo_contrato;

        DadosAlunoContrato::insert([
            'aluno_id' => $aluno_id,
            'nome' => $request->nome,
            'estado_civil' => $request->estado_civil,
            'profissao' => $request->profissao,
            'rg' => $request->rg,
            'cpf' => $request->cpf,
            'endereco' => $request->endereco,
            'numero_casa' => $request->numero_casa,
            'bairro' => $request->bairro,
            'cep' => $request->cep,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'telefone_fixo' => $request->telefone_fixo,
            'telefone_celular' => $request->telefone_celular,
            'email' => $request->email,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('montar-contrato.etapa-professor.create', ['aluno_id' => $aluno_id, 'codigo_contrato' => $codigo_contrato, 'professor_id' => $professor_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contratos\DadosContrato  $dadosContrato
     * @return \Illuminate\Http\Response
     */
    public function show(DadosContrato $dadosContrato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contratos\DadosContrato  $dadosContrato
     * @return \Illuminate\Http\Response
     */
    public function edit(DadosContrato $dadosContrato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contratos\DadosContrato  $dadosContrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DadosContrato $dadosContrato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contratos\DadosContrato  $dadosContrato
     * @return \Illuminate\Http\Response
     */
    public function destroy(DadosContrato $dadosContrato)
    {
        //
    }
}
