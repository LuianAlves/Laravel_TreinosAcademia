<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Treinos\MontarTreino;
use App\Models\Treinos\CategoriaTreinos;
use App\Models\Treinos\ExercicioTreinos;
use App\Models\Aluno;

use Auth;
use Carbon\Carbon;

class MontarTreinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($aluno_id)
    {
        $alunos = Aluno::where('id', $aluno_id)->first();

        return view('app.alunos.montar_treino.index', compact('alunos'));
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
        $request->validate([
            'nome_treino' => 'required'
        ], [
            'nome_treino.required' => 'Escreva um nome para o Treino!'
        ]);

        $aluno_id = $request->aluno_id;

        $codigo_treino = $request->codigo_treino;

        $codigo_treino = mt_rand(1, 100000);

        MontarTreino::insert([
            'professor_id' => Auth::id(),
            'aluno_id' => $aluno_id,
            'codigo_treino' => $codigo_treino,
            'nome_treino' => ucfirst($request->nome_treino),
            'nivel_treino' => $request->nivel_treino,
            'frequencia' => $request->frequencia,
            'divisao_treino' => $request->divisao_treino,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('montar.exercicios.index', $aluno_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Treinos\MontarTreino  $montarTreino
     * @return \Illuminate\Http\Response
     */
    public function show(MontarTreino $montarTreino)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Treinos\MontarTreino  $montarTreino
     * @return \Illuminate\Http\Response
     */
    public function edit(MontarTreino $montarTreino)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Treinos\MontarTreino  $montarTreino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MontarTreino $montarTreino)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Treinos\MontarTreino  $montarTreino
     * @return \Illuminate\Http\Response
     */
    public function destroy(MontarTreino $montarTreino)
    {
        //
    }
}
