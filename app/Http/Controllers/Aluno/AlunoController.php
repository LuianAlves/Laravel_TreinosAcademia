<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Aluno;

use Carbon\Carbon;
use Auth;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::orderBy('id', 'DESC')->paginate(10);
        
        return view('app.alunos.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.alunos.create');
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
            'nome' => 'required',
            'telefone' => 'required'
        ],
        [
           'required' => 'Este campo é obrigatório!' 
        ]);

        Aluno::insert([
            'professor_id' => Auth::id(),
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'observacao_restricao' => $request->observacao_restricao,
            'tipo_treino' => $request->tipo_treino,
            'pagamento' => $request->pagamento,
            'objetivo' => $request->objetivo,
            'codigo_aluno' => 'JP' . mt_rand(1000, 9999),
            'genero' => $request->genero,
            'data_cadastro' => Carbon::now()->format('d m Y'),
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('alunos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $aluno)
    {
        $aluno->id;

        return response()->json([
            'aluno' => $aluno
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit(Aluno $aluno)
    {
        $aluno = Aluno::findOrFail($id);

        return view('app.alunos.edit', compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'telefone' => 'required'
        ],
        [
           'required' => 'Este campo é obrigatório!' 
        ]);

        Aluno::findOrFail($id)->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'observacao_restricao' => $request->observacao_restricao,
            'objetivo' => $request->objetivo,
            'tipo_treino' => $request->tipo_treino,
            'pagamento' => $request->pagamento,
            'genero' => $request->genero,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('alunos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno)
    {
        $aluno->delete();

        return redirect()->route('alunos.index');
    }
}
