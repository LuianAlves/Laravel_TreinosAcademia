<?php

namespace App\Http\Controllers\Aluno\Contratos;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Aluno;
use App\Models\Contratos\DadosProfessorContrato;
use App\Models\Contratos\DadosAlunoContrato;
use App\Models\Contratos\Contratos;

use Carbon\Carbon;

class MontarContratoController extends Controller
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
    public function create($aluno_id)
    {
        $aluno = Aluno::where('id', $aluno_id)->first();
        $professores = DadosProfessorContrato::get();

        return view('app.alunos.contratos.montar_contrato.create', compact('aluno', 'professores'));
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
        $codigo_contrato = mt_rand(0, 99999);

        $request->validate([
            'nome_contrato' => 'required'
        ], [
            'nome_contrato.required' => 'Insira um nome para o contrato!'
        ]);

        Contratos::insert([
            'professor_id' => $professor_id,
            'aluno_id' => $aluno_id,
            'nome_contrato' => $request->nome_contrato,
            'codigo_contrato' => $codigo_contrato,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('contratos.dados-aluno.create', ['aluno_id' => $aluno_id, 'codigo_contrato' => $codigo_contrato, 'professor_id' => $professor_id]);
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

    // ============================================ //

    public function etapaProfessor($aluno_id, $professor_id, $codigo_contrato) 
    {     
        $aluno = Aluno::where('id', $aluno_id)->first();
        $professor = DadosProfessorContrato::where('id', $professor_id)->first();
        $codigo_contrato = Contratos::where('codigo_contrato', $codigo_contrato)->first();

        return view('app.alunos.contratos.montar_contrato.etapa_professor', compact('professor', 'aluno', 'codigo_contrato'));
    }
}


