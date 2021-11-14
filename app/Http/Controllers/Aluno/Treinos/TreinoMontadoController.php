<?php

namespace App\Http\Controllers\Aluno\Treinos;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Aluno;
use App\Models\TreinoAluno\MontarTreino;

use Carbon\Carbon;

class TreinoMontadoController extends Controller
{
    public function index($aluno_id)
    {
        $id = Aluno::where('id', $aluno_id)->first();

        $treinos = MontarTreino::where('aluno_id', $aluno_id)->paginate(10);

        // Deixando A Data em Português 
        date_default_timezone_set('America/Sao_paulo');
        setlocale(LC_ALL, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese_brazil', 'portuguese_brazilian', 'bra', 'brazil', 'br');
        setlocale(LC_TIME, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese_brazil', 'portuguese_brazilian', 'bra', 'brazil', 'br');

        // $dt = Carbon::now();

        // dd($dt->formatLocalized('%A %d %B %Y'));

        return view('app.treinos.aluno.personal.montados.index', compact('treinos', 'id'));
    }
}