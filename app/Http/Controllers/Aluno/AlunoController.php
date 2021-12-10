<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Aluno;

// Treino
use App\Models\TreinoAluno\MontarTreino;
use App\Models\TreinoAluno\AdicionarExercicio;

// Avaliação Física
use App\Models\Avaliacao\DadosAvaliacaoFisica;
use App\Models\Avaliacao\DobrasCutaneasAvaliacaoFisica;
use App\Models\Avaliacao\PerimetrosAvaliacaoFisica;
use App\Models\Avaliacao\NeuromotoresAvaliacaoFisica;
use App\Models\Avaliacao\AnamneseAvaliacaoFisica;

// Contratos
use App\Models\Contratos\Contratos;
use App\Models\Contratos\DadosAlunoContrato;
use App\Models\Contratos\InfoAdicionalContrato;

// Pagamentos
use App\Models\Pagamentos\Pagamento;

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
        $alunos = Aluno::orderBy('id', 'DESC')->get();
        
        return view('app.alunos.index', compact('alunos'));
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
            'mes_cadastro' => Carbon::now()->format('m'),
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
    public function edit($id)
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

        return redirect()->route('area-aluno.index', $id);
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

        // Delete Aluno Avaliação Física
        if(DadosAvaliacaoFisica::where('aluno_id', $aluno->id)) {
            DadosAvaliacaoFisica::where('aluno_id', $aluno->id)->delete();
            DobrasCutaneasAvaliacaoFisica::where('aluno_id', $aluno->id)->delete();
            PerimetrosAvaliacaoFisica::where('aluno_id', $aluno->id)->delete();
            NeuromotoresAvaliacaoFisica::where('aluno_id', $aluno->id)->delete();
            AnamneseAvaliacaoFisica::where('aluno_id', $aluno->id)->delete();
        }
        
        // Delete Aluno Contratos
        if(DadosAlunoContrato::where('aluno_id', $aluno->id)) {
            Contratos::where('aluno_id', $aluno->id)->delete();
            DadosAlunoContrato::where('aluno_id', $aluno->id)->delete();
            InfoAdicionalContrato::where('aluno_id', $aluno->id)->delete();
        }

        if(Pagamento::where('aluno_id', $aluno->id)) {
            Pagamento::where('aluno_id', $aluno->id)->delete();
        }

        // Delete Aluno Treinos
        if(MontarTreino::where('aluno_id', $aluno->id)) {
            
            $treinos = MontarTreino::where('aluno_id', $aluno->id)->get();

            foreach($treinos as $treino) {            
                $codigo = $treino->codigo_treino;

                MontarTreino::where('aluno_id', $aluno->id)->where('codigo_treino', $codigo)->delete();
                AdicionarExercicio::where('codigo_treino', $codigo)->delete();
            }    
        }


        return redirect()->route('alunos.index');
    }
}
