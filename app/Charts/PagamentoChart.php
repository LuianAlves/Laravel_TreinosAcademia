<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

use App\Models\User;

class PagamentoChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $pago = User::pagamentosChart();
        $pendente = User::pagamentosPendenteChart();

        return Chartisan::build()
            ->labels($pago)
            ->dataset('Pagos', $pago)
            ->dataset('Pendentes', $pendente);

        
    }
}