<?php

namespace App\Http\Controllers\Aluno\Contratos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Aluno;
use App\Models\Contratos\Contratos;
// use App\Models\Contratos\DadosProfessorContrato;
use App\Models\Contratos\InfoAdicionalContrato;


use Carbon\Carbon;

class ContratosController extends Controller
{
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

    // =====================================
    
    public function destroy($contrato_id, $codigo_contrato)
    {
        Contratos::where('id', $contrato_id)->delete();
        InfoAdicionalContrato::where('codigo_contrato', $codigo_contrato)->delete();

        return redirect()->back();
    }
}
