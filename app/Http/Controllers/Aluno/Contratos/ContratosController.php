<?php

namespace App\Http\Controllers\Aluno\Contratos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Aluno;
use App\Models\Contratos\Contratos;
use App\Models\Contratos\DadosProfessorContrato;

use Carbon\Carbon;

class ContratosController extends Controller
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

        return view('app.alunos.contratos.create', compact('aluno', 'professores'));
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
        $cod_contrato = mt_rand(0, 9999);

        Contratos::insert([
            'professor_id' => $professor_id,
            'aluno_id' => $aluno_id,
            'codigo_contrato' => $cod_contrato,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('contratos.dados.alunos.index', ['aluno_id' => $aluno_id, 'cod_contrato' => $cod_contrato, 'professor_id' => $professor_id]);
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
