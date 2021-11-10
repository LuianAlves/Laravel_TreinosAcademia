<?php

namespace App\Http\Controllers\Treinos;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Treinos\Treino;
use App\Models\Treinos\TreinoAluno;
use App\Models\Treinos\TreinoExercicios;
use App\Models\Treinos\CategoriaTreinos;
use App\Models\Treinos\ExercicioTreinos;

use App\Models\Aluno;

use Carbon\Carbon;
use Auth;

class TreinoController extends Controller
{
    public function index($aluno_id) {
        $aluno = Aluno::findOrFail($aluno_id);
        $treino = Treino::where('aluno_id', $aluno_id)->orderBy('id', 'desc')->get();
        // $treino_info = TreinoAluno::where('codigo_treino', $treino->codigo_treino)->latest();

        return view('app.treinos.alunos.listagem.index', compact('treino', 'aluno'));
    }

    public function create($aluno_id)
    {
        $alunos = Aluno::findOrFail($aluno_id);

        return view('app.treinos.alunos.create.create', compact('alunos'));
    }

    public function show($codigo_treino) {

        $treino = Treino::where('codigo_treino', $codigo_treino)->first();
        $treino_a = TreinoExercicios::where('treino_id', $codigo_treino)->where('divisao_treino', 'treino_a')->get();
        $treino_b = TreinoExercicios::where('treino_id', $codigo_treino)->where('divisao_treino', 'treino_b')->get();
        $treino_c = TreinoExercicios::where('treino_id', $codigo_treino)->where('divisao_treino', 'treino_c')->get();
        $treino_d = TreinoExercicios::where('treino_id', $codigo_treino)->where('divisao_treino', 'treino_d')->get();

        return view('app.treinos.alunos.listagem.show', compact('treino', 'treino_a', 'treino_b', 'treino_c', 'treino_d'));
    }

    public function modificar($codigo) {
        $categoriaTreinos = CategoriaTreinos::orderBy('id', 'ASC')->get();
        $exercicioTreinos = ExercicioTreinos::orderBy('id', 'ASC')->get();

        return view('app.treinos.alunos.create.create_treino_exercicios', compact('categoriaTreinos', 'exercicioTreinos','codigo'));
    }

    // ------------------------------------------------------------------------------------------

    public function store(Request $request, $aluno_id)
    {
        $request->validate([
            'nome_treino' => 'required'
        ], [
            'nome_treino.required' => 'Digite um nome para o Treino'
        ]);

        $aluno = Aluno::where('id', $aluno_id)->first();
        $codigo = mt_rand(1, 100000);

        Treino::insert([
            'professor_id' => Auth::id(),
            'aluno_id' => $aluno_id,
            'nome_treino' => $request->nome_treino,
            'codigo_treino' => $codigo,
            'created_at' => Carbon::now()
        ]);

        return view('app.treinos.alunos.create.create_treino', compact('aluno', 'codigo'));
    }

    public function storeInfo(Request $request, $codigo)
    {
        $aluno = Aluno::where('id', $request->aluno_id)->first();
        $categoriaTreinos = CategoriaTreinos::orderBy('id', 'ASC')->get();
        $exercicioTreinos = ExercicioTreinos::orderBy('id', 'ASC')->get();

        TreinoAluno::insert([
            'codigo_treino' => $codigo,
            'nivel_aluno' => $request->nivel_treino,
            'frequencia_semanal' => $request->frequencia,
            'divisao_treino' => $request->divisao_treino,
            'created_at' => Carbon::now(),
        ]);

        return view('app.treinos.alunos.create.create_treino_exercicios', compact('categoriaTreinos', 'exercicioTreinos', 'aluno', 'codigo'));
    }

    public function storeExercicioA(Request $request, $codigo)
    {
        $data = $request->all();

        foreach ($data as $dt => $value) {
            $result = substr($dt, 0, 100);
            
            TreinoExercicios::insert([
                    'treino_id' => $codigo,
                    'exercicio_id' => $result,
                    'divisao_treino' => 'treino_a',
                    'created_at' => Carbon::now(),
            ]);
        }
        
        return redirect()->route('treino.show', $codigo);
    }

    public function storeExercicioB(Request $request, $codigo)
    {
        $data = $request->all();

        foreach ($data as $dt => $value) {
            $result = substr($dt, 0, 100);
            
            TreinoExercicios::insert([
                    'treino_id' => $codigo,
                    'exercicio_id' => $result,
                    'divisao_treino' => 'treino_b',
                    'created_at' => Carbon::now(),
            ]);
        }
        
        return redirect()->route('treino.show', $codigo);
    }

    public function storeExercicioC(Request $request, $codigo)
    {
        $data = $request->all();

        foreach ($data as $dt => $value) {
            $result = substr($dt, 0, 100);
            
            TreinoExercicios::insert([
                    'treino_id' => $codigo,
                    'exercicio_id' => $result,
                    'divisao_treino' => 'treino_c',
                    'created_at' => Carbon::now(),
            ]);
        }
        
        return redirect()->route('treino.show', $codigo);
    }
    public function storeExercicioD(Request $request, $codigo)
    {
        $data = $request->all();

        foreach ($data as $dt => $value) {
            $result = substr($dt, 0, 100);
            
            TreinoExercicios::insert([
                    'treino_id' => $codigo,
                    'exercicio_id' => $result,
                    'divisao_treino' => 'treino_d',
                    'created_at' => Carbon::now(),
            ]);
        }
        
        return redirect()->route('treino.show', $codigo);
    }
}


