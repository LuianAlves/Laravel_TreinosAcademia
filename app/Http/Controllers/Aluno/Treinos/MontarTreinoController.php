<?php

namespace App\Http\Controllers\Aluno\Treinos;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Aluno;
use App\Models\TreinoAluno\MontarTreino;

use Carbon\Carbon;

class MontarTreinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::where('tipo_treino', 'personal')->orderBy('id')->paginate(10);

        return view('app.treinos.aluno.personal.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($aluno_id)
    {
        $aluno = Aluno::findOrFail($aluno_id);
        return view('app.treinos.aluno.personal.create', compact('aluno'));
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

        MontarTreino::insert([
            'aluno_id' => $aluno_id,
            'codigo_treino' => mt_rand(1, 9999),
            'professor' => $request->professor,
            'nivel_aluno' => $request->nivel_aluno,
            'frequencia' => $request->frequencia,
            'divisao' => $request->divisao,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('montado.index', $aluno_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TreinoAluno\MontarTreino  $montarTreino
     * @return \Illuminate\Http\Response
     */
    public function show(MontarTreino $montarTreino)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TreinoAluno\MontarTreino  $montarTreino
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $treino = MontarTreino::with('aluno')->where('id', $id)->first();

        return view('app.treinos.aluno.personal.montados.edit', compact('treino'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TreinoAluno\MontarTreino  $montarTreino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $treino_id)
    {
        $aluno_id = $request->aluno_id;

        MontarTreino::findOrFail($treino_id)->update([
            'aluno_id' => $aluno_id,
            'professor' => $request->professor,
            'nivel_aluno' => $request->nivel_aluno,
            'frequencia' => $request->frequencia,
            'divisao' => $request->divisao,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('montado.index', $aluno_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TreinoAluno\MontarTreino  $montarTreino
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $treino_id)
    {
        $aluno_id = $request->aluno_id;

        MontarTreino::findOrFail($treino_id)->delete();

        return redirect()->route('montado.index', $aluno_id);
    }
}
