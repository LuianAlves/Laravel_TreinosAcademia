<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Aluno;

// // Treino
use App\Models\TreinoAluno\MontarTreino;
use App\Models\TreinoAluno\AdicionarExercicio;

// // Avaliação Física
use App\Models\Avaliacao\DadosAvaliacaoFisica;
use App\Models\Avaliacao\DobrasCutaneasAvaliacaoFisica;
use App\Models\Avaliacao\PerimetrosAvaliacaoFisica;
use App\Models\Avaliacao\NeuromotoresAvaliacaoFisica;
use App\Models\Avaliacao\AnamneseAvaliacaoFisica;

// // Contratos
use App\Models\Contratos\Contratos;
use App\Models\Contratos\DadosAlunoContrato;
use App\Models\Contratos\InfoAdicionalContrato;

// // Pagamentos
use App\Models\Pagamentos\Pagamento;

use Carbon\Carbon;
use Auth;

class AreaAlunoController extends Controller
{
    public function index($aluno_id) {
        $aluno = Aluno::where('id', $aluno_id)->first();
        $treinos = MontarTreino::where('aluno_id', $aluno_id)->first();
        $contratos = Contratos::where('aluno_id', $aluno_id)->first();
        $avaliacoes = DadosAvaliacaoFisica::where('aluno_id', $aluno_id)->first();

        return view('app.alunos.area_aluno', compact('aluno', 'treinos', 'contratos', 'avaliacoes'));
    }

    public function destroy($aluno_id) {

        Aluno::findOrFail($aluno_id)->delete();

        // Delete Aluno Avaliação Física
        if(DadosAvaliacaoFisica::where('aluno_id', $aluno_id)) {
            DadosAvaliacaoFisica::where('aluno_id', $aluno_id)->delete();
            DobrasCutaneasAvaliacaoFisica::where('aluno_id', $aluno_id)->delete();
            PerimetrosAvaliacaoFisica::where('aluno_id', $aluno_id)->delete();
            NeuromotoresAvaliacaoFisica::where('aluno_id', $aluno_id)->delete();
            AnamneseAvaliacaoFisica::where('aluno_id', $aluno_id)->delete();
        }
        
        // Delete Aluno Contratos
        if(DadosAlunoContrato::where('aluno_id', $aluno_id)) {
            Contratos::where('aluno_id', $aluno_id)->delete();
            DadosAlunoContrato::where('aluno_id', $aluno_id)->delete();
            InfoAdicionalContrato::where('aluno_id', $aluno_id)->delete();
        }

        if(Pagamento::where('aluno_id', $aluno_id)) {
            Pagamento::where('aluno_id', $aluno_id)->delete();
        }

        // Delete Aluno Treinos
        if(MontarTreino::where('aluno_id', $aluno_id)) {  
            $treinos = MontarTreino::where('aluno_id', $aluno_id)->get();

            foreach($treinos as $treino) {            
                $codigo = $treino->codigo_treino;

                MontarTreino::where('aluno_id', $aluno_id)->where('codigo_treino', $codigo)->delete();
                AdicionarExercicio::where('codigo_treino', $codigo)->delete();
            }    
        }

        return redirect()->route('alunos.index');
    }
}
