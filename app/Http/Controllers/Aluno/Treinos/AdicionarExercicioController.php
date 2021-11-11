<?php

namespace App\Http\Controllers\Aluno\Treinos;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\TreinoAluno\AdicionarExercicio;
use App\Models\TreinoAluno\MontarTreino;
use App\Models\Treinos\CategoriaTreinos;
use App\Models\Treinos\ExercicioTreinos;

use Carbon\Carbon;

class AdicionarExercicioController extends Controller
{
    public function index($treino_id)
    {
        $treino_a = AdicionarExercicio::where('treino_id', $treino_id)->where('divisao_treino', 'treino_a')->get();
        $treino_b = AdicionarExercicio::where('treino_id', $treino_id)->where('divisao_treino', 'treino_b')->get();
        $treino_c = AdicionarExercicio::where('treino_id', $treino_id)->where('divisao_treino', 'treino_c')->get();
        $treino_d = AdicionarExercicio::where('treino_id', $treino_id)->where('divisao_treino', 'treino_d')->get();

        $treino = MontarTreino::where('id', $treino_id)->orderBy('id', 'DESC')->first();

        return view('app.treinos.aluno.personal.montados.adicionar_exercicios.index', compact('treino', 'treino_a', 'treino_b', 'treino_c', 'treino_d'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($divisao, $treino_id)
    {
        $treino = MontarTreino::where('id', $treino_id)->first();
        $categoriaTreinos = CategoriaTreinos::orderBy('nome_categoria_treino', 'ASC')->get();
        $exercicioTreinos = ExercicioTreinos::orderBy('nome_exercicio', 'ASC')->get();

        $divisao_treino = $divisao;

        return view('app.treinos.aluno.personal.montados.adicionar_exercicios.divisao_treinos.treino', compact('treino', 'divisao_treino', 'exercicioTreinos', 'categoriaTreinos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $divisao, $treino_id)
    {
        $treino = MontarTreino::where('id', $treino_id)->first();

        switch ($divisao) {
            case 'treino_a':
                $div = 'treino_a';
                break;

            case 'treino_b':
                $div = 'treino_b';
                break;

            case 'treino_c':
                $div = 'treino_c';
                break;

            case 'treino_d':
                $div = 'treino_d';
                break;
        }

        $data = $request->all();

        foreach ($data as $dt => $value) {
            $result = substr($dt, 0, 100);

            AdicionarExercicio::insert([
                'treino_id' => $treino_id,
                'exercicio_id' => $result,
                'repeticao' => 12,
                'serie' => 4,
                'codigo_treino' => $treino->codigo_treino,
                'divisao_treino' => $div,
                'created_at' => Carbon::now()
            ]);
        }

        return redirect()->route('adicionar.index', $treino_id);
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
