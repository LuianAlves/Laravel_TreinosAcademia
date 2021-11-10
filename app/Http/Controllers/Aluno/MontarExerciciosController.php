<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Treinos\MontarTreino;
use App\Models\Treinos\MontarExercicios;
use App\Models\Treinos\CategoriaTreinos;
use App\Models\Treinos\ExercicioTreinos;

use Auth;

class MontarExerciciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($aluno_id)
    {
        $treinos = MontarTreino::where('professor_id', Auth::id())->where('aluno_id', $aluno_id)->where('codigo_treino', '!=', null)->get();

        return view('app.alunos.montar_treino.treinos_montados', compact('treinos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriaTreinos = CategoriaTreinos::orderBy('id', 'ASC')->get();
        $exercicioTreinos = ExercicioTreinos::orderBy('id', 'ASC')->get();

        return view('app.alunos.montar_treino.montar_exercicios', compact('categoriaTreinos', 'exercicioTreinos'));
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MontarExercicios  $montarExercicios
     * @return \Illuminate\Http\Response
     */
    public function edit(MontarExercicios $montarExercicios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MontarExercicios  $montarExercicios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MontarExercicios $montarExercicios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MontarExercicios  $montarExercicios
     * @return \Illuminate\Http\Response
     */
    public function destroy(MontarExercicios $montarExercicios)
    {
        //
    }
}
