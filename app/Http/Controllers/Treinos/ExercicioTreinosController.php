<?php

namespace App\Http\Controllers\Treinos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Treinos\ExercicioTreinos;
use App\Models\Treinos\CategoriaTreinos;

use Carbon\Carbon;

class ExercicioTreinosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriaTreinos = CategoriaTreinos::orderBy('nome_categoria_treino', 'ASC')->get();
        $exercicioTreinos = ExercicioTreinos::orderBy('nome_exercicio', 'ASC')->paginate(10);

        return view('app.treinos.exercicios.index', compact('categoriaTreinos', 'exercicioTreinos'));
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
            'categoria_treino_id' => 'required',
            'nome_exercicio' => 'required',
        ], [
            'categoria_treino_id.required' => 'Adicione uma Categoria!',
            'nome_exercicio.required' => 'Adicione um Exercício!'
        ]);

        ExercicioTreinos::insert([
            'categoria_treino_id' => $request->categoria_treino_id,
            'nome_exercicio' => $request->nome_exercicio,
            'created_at' => Carbon::now()
        ]); 

        return redirect()->route('exercicio.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Treinos\ExercicioTreinos  $exercicioTreinos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exercicioTreinos = ExercicioTreinos::findOrFail($id);
        $categoriaTreinos = CategoriaTreinos::orderBy('nome_categoria_treino', 'ASC')->get();

        return view('app.treinos.exercicios.edit', compact('categoriaTreinos', 'exercicioTreinos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Treinos\ExercicioTreinos  $exercicioTreinos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'categoria_treino_id' => 'required',
            'nome_exercicio' => 'required',
        ], [
            'categoria_treino_id.required' => 'Adicione uma Categoria!',
            'nome_exercicio.required' => 'Adicione um Exercício!'
        ]);

        ExercicioTreinos::findOrFail($id)->update([
            'categoria_treino_id' => $request->categoria_treino_id,
            'nome_exercicio' => $request->nome_exercicio,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('exercicio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Treinos\ExercicioTreinos  $exercicioTreinos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ExercicioTreinos::findOrFail($id)->delete();

        return redirect()->route('exercicio.index');
    }
}
