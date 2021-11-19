<?php

namespace App\Http\Controllers\Aluno\Contratos;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Aluno;
use App\Models\Contratos\DadosAlunoContrato;
use App\Models\Contratos\DadosProfessorContrato;
use App\Models\Contratos\InfoAdicionalContrato;

class DadosAlunoContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($aluno_id, $professor_id, $cod_contrato)
    {
        $aluno = Aluno::where('id', $aluno_id)->first();
        $d_aluno = DadosAlunoContrato::where('aluno_id', $aluno_id)->first();
        $d_professor = DadosProfessorContrato::where('id', $professor_id)->first();
        // $infos_adicionais = InfoAdicionalContrato::where('codigo_contrato', $cod_contrato)->first();

        return view('app.alunos.contratos.dados.alunos.index', compact('aluno', 'd_aluno', 'd_professor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
