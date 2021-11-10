<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Aluno;
use App\Models\Treinos\CategoriaTreinos;
use App\Models\Treinos\MontarExercicios;

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

    public function teste(Request $request)
    {
        $data = $request->all();

        foreach ($data as $dt => $value) {
            $result = substr($dt, 0, 3);

            echo "<pre>";
            print_r($result);
            echo "</pre>";
        }
    }
}
