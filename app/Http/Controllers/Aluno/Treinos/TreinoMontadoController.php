<?php

namespace App\Http\Controllers\Aluno\Treinos;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Aluno;
use App\Models\TreinoAluno\MontarTreino;

class TreinoMontadoController extends Controller
{
    public function index($aluno_id)
    {
        $id = Aluno::where('id', $aluno_id)->first();

        $treinos = MontarTreino::where('aluno_id', $aluno_id)->paginate(10);
    
        return view('app.treinos.aluno.personal.montados.index', compact('treinos', 'id'));
    }
}