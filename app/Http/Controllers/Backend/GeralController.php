<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Aluno;
use Datetime;

class GeralController extends Controller
{

// Pesquisa de Alunos
    public function searchAluno(Request $request) {
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

    public function searchCadastroAluno(Request $request) {
        $request->validate(
            ['search_cadastro' => 'required' ],
            [ 'required' => 'Este Campo é Obrigatório!' ]
        );

        $data = new Datetime($request->search_cadastro);
        $data_formatada = $data->format('d m Y');

        $alunos = Aluno::where('data_cadastro', $data_formatada)->latest()->paginate(10);

        return view('app.alunos.index', compact('alunos'));
  
    }
}
