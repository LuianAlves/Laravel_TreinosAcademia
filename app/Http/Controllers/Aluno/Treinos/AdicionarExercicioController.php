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
        // $treinos = AdicionarExercicio::where('treino_id', $treino_id)->pluck('divisao_treino')->first();
        $treino_a = AdicionarExercicio::where('treino_id', $treino_id)->where('divisao_treino', 'treino_a')->orderBy('order')->get();
        $treino_b = AdicionarExercicio::where('treino_id', $treino_id)->where('divisao_treino', 'treino_b')->orderBy('order')->get();
        $treino_c = AdicionarExercicio::where('treino_id', $treino_id)->where('divisao_treino', 'treino_c')->orderBy('order')->get();
        $treino_d = AdicionarExercicio::where('treino_id', $treino_id)->where('divisao_treino', 'treino_d')->orderBy('order')->get();

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

        $alldata = $request->all();

        $data = array_unique($alldata);

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

        $noti = [
            'message' => 'Exercicio adicionado ao treino!',
            'alert-type' => 'success'
        ];

        return redirect()->route('adicionar.index', $treino_id)->with($noti);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TreinoAluno\AdicionarExercicio  $adicionarExercicio
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $exercicio_id)
    {
        $treino = AdicionarExercicio::where('id', $id)->where('exercicio_id', $exercicio_id)->first();

        return view('app.treinos.aluno.personal.montados.adicionar_exercicios.edit', compact('treino'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TreinoAluno\AdicionarExercicio  $adicionarExercicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $exercicio_id)
    {
        $get_id = AdicionarExercicio::where('id', $id)->first();
        $treino_id = MontarTreino::where('id', $get_id->treino_id)->orderBy('id', 'DESC')->first();
        
        AdicionarExercicio::where('id', $id)->where('exercicio_id', $exercicio_id)->update([
            'serie' => $request->serie,
            'repeticao' => $request->repeticao,
            'updated_at' => Carbon::now()
        ]);

        $noti = [
            'message' => 'Exercicio alterado com sucesso!',
            'alert-type' => 'warning'
        ];

        return redirect()->route('adicionar.index', $treino_id)->with($noti);
    }

    public function updateItems(Request $request) {
        $input = $request->all();

        if(!empty($input['treino_a'])) {
            foreach($input['treino_a'] as $key => $value) {
                $key = $key + 1;

                AdicionarExercicio::where('id', $value)->update([
                    'order' => $key
                ]);
            }
        }

        if(!empty($input['treino_b'])) {
            foreach($input['treino_b'] as $key => $value) {
                $key = $key + 1;

                AdicionarExercicio::where('id', $value)->update([
                    'order' => $key
                ]);
            }
        }

        if(!empty($input['treino_c'])) {
            foreach($input['treino_c'] as $key => $value) {
                $key = $key + 1;

                AdicionarExercicio::where('id', $value)->update([
                    'order' => $key
                ]);
            }
        }

        if(!empty($input['treino_d'])) {
            foreach($input['treino_d'] as $key => $value) {
                $key = $key + 1;

                AdicionarExercicio::where('id', $value)->update([
                    'order' => $key
                ]);
            }
        }

        return response()->json([
            'status' => 'Sucesso!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TreinoAluno\AdicionarExercicio  $adicionarExercicio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $exercicio_id)
    {
        $get_id = AdicionarExercicio::where('id', $id)->first();
        $treino_id = MontarTreino::where('id', $get_id->treino_id)->orderBy('id', 'DESC')->first();

        AdicionarExercicio::where('id', $id)->where('exercicio_id', $exercicio_id)->delete();

        $noti = [
            'message' => 'Exercicio removido com sucesso!',
            'alert-type' => 'error'
        ];

        return redirect()->route('adicionar.index', $treino_id)->with($noti);
    }
}
