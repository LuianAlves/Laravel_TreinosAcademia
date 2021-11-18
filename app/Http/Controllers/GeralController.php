<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Aluno;

use App\Models\Treinos\CategoriaTreinos;
use App\Models\Treinos\MontarExercicios;

use App\Models\Pagamentos\Pagamento;

use Carbon\Carbon;
use Datetime;
use Auth;

class GeralController extends Controller
{

// Pesquisa de Alunos
    public function searchAluno(Request $request)
    {
        $request->validate(
            ['search' => 'required' ],
            [ 'required' => 'Este Campo é Obrigatório!' ]
        );

        $alunos = Aluno::where('nome', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('codigo_aluno', 'LIKE', '%'.$request->search.'%')
                        ->latest()
                        ->paginate(10);

        return view('app.alunos.index', compact('alunos'));
    }

    public function searchCadastroAluno(Request $request)
    {
        $request->validate(
            ['search_cadastro' => 'required' ],
            [ 'required' => 'Este Campo é Obrigatório!' ]
        );

        $data = new Datetime($request->search_cadastro);
        $data_formatada = $data->format('d m Y');

        $alunos = Aluno::where('data_cadastro', $data_formatada)->latest()->paginate(10);

        return view('app.alunos.index', compact('alunos'));
    }

    public function searchCategoriaTreino(Request $request)
    {
        $request->validate(
            ['search_categoria_treino' => 'required' ],
            [ 'required' => 'Digite uma categoria!' ]
        );

        $categoria_treino = CategoriaTreinos::where('nome_categoria_treino', 'LIKE', '%'.$request->search_categoria_treino.'%')->latest()->paginate(6);

        return view('app.treinos.categorias.index', compact('categoria_treino'));
    }

// NavBar Persquisar Alunos com JQuery
    public function pesquisarAlunos(Request $request) {
        $request->validate(['pesquisar' => 'required']);

        $pesquisar = $request->pesquisar;

        $alunos = Aluno::where('nome', 'LIKE', "%$pesquisar%")->select('id', 'nome', 'telefone')->orderBy('nome', 'ASC')->limit(6)->get();

        return view('app.geral.pesquisas.pesquisar_alunos_navbar', compact('alunos'));
    }

// Validação dos Pagamentos

    public function pagou($pgt_id) {

        Pagamento::findOrFail($pgt_id)->update([
            'status' => 1,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->back();
    }

    public function naoPagou($pgt_id) {

        Pagamento::findOrFail($pgt_id)->update([
            'status' => 0,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->back();
    }
}
