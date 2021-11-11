<?php

namespace App\Http\Controllers\Aluno\Treinos;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\TreinoAluno\AdicionarExercicio;
use App\Models\TreinoAluno\MontarTreino;

class AdicionarExercicioController extends Controller
{
    public function index($treino_id)
    {
        $treino = MontarTreino::where('id', $treino_id)->orderBy('id', 'DESC')->first();

        return view('app.treinos.aluno.personal.montados.adicionar_exercicios.index', compact('treino'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($divisao, $treino_id)
    {
        $treino = MontarTreino::where('id', $treino_id)->first();
        $divisao_treino = $divisao;

        return view('app.treinos.aluno.personal.montados.adicionar_exercicios.divisao_treinos.treino', compact('treino', 'divisao_treino'));

        // if($divisao == 'treino_a') {
        //     return view('app.treinos.aluno.personal.montados.adicionar_exercicios.divisao_treinos.treino_a', compact('treino'));

        // } elseif($divisao == 'treino_b') {
        //     return view('app.treinos.aluno.personal.montados.adicionar_exercicios.divisao_treinos.treino_b', compact('treino'));

        // } elseif($divisao == 'treino_c') {
        //     return view('app.treinos.aluno.personal.montados.adicionar_exercicios.divisao_treinos.treino_c', compact('treino'));

        // } else {
        //     return view('app.treinos.aluno.personal.montados.adicionar_exercicios.divisao_treinos.treino_d', compact('treino')) ;           
        // }
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
     * @param  \App\Models\TreinoAluno\AdicionarExercicio  $adicionarExercicio
     * @return \Illuminate\Http\Response
     */
    public function show(AdicionarExercicio $adicionarExercicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TreinoAluno\AdicionarExercicio  $adicionarExercicio
     * @return \Illuminate\Http\Response
     */
    public function edit(AdicionarExercicio $adicionarExercicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TreinoAluno\AdicionarExercicio  $adicionarExercicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdicionarExercicio $adicionarExercicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TreinoAluno\AdicionarExercicio  $adicionarExercicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdicionarExercicio $adicionarExercicio)
    {
        //
    }
}
