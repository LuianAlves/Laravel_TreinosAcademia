<?php

namespace App\Http\Controllers\Aluno\Pagamentos;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Pagamentos\Pagamento;
use App\Models\Aluno;

use Carbon\Carbon;

class PagamentoController extends Controller
{
    public function Pagamentos()
    {
        $pagamentos = Pagamento::orderBy('status', 'asc')->get();

        return view('app.alunos.pagamentos.geral.todos', compact('pagamentos'));
    }

    public function PagamentosPendentes()
    {
        $pagamentos = Pagamento::where('status', 0)->orderBy('data_pagamento_geral', 'DESC')->get();

        return view('app.alunos.pagamentos.geral.todos_pendentes', compact('pagamentos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($aluno_id)
    {
        $aluno = Aluno::where('id', $aluno_id)->first();
        $pagamentos = Pagamento::where('aluno_id', $aluno_id)->orderBy('status', 'ASC')->get();

        date_default_timezone_set('America/Sao_paulo');
        setlocale(LC_ALL, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese_brazil', 'portuguese_brazilian', 'bra', 'brazil', 'br');
        setlocale(LC_TIME, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese_brazil', 'portuguese_brazilian', 'bra', 'brazil', 'br');

        return view('app.alunos.pagamentos.geral.index', compact('aluno', 'pagamentos'));
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
            'valor_pagamento_geral' => 'required',
            'data_pagamento_geral' => 'required',
        ],
        [
            'valor_pagamento_geral.required' => 'Digite o valor a ser pago',
            'data_pagamento_geral.required' => 'Digite a data de vencimento',
        ]);

        $aluno_id = $request->aluno_id;
        $servico = $request->servico;

        $valor = $request->valor_pagamento_geral;
        $valorPagamento = str_replace(',', '.', $valor); 
        
        $dataPagamento = $request->data_pagamento_geral;

        $diaPagamento = substr($dataPagamento, 8);
        $mesPagamento = substr($dataPagamento, 5, -3);
        $anoPagamento = substr($dataPagamento, 0, -6);

        Pagamento::insert([
            'aluno_id' => $aluno_id,
            'valor_pagamento_geral' => $valorPagamento,
            'data_pagamento_geral' => $dataPagamento,
            'descricao' => $request->descricao,
            'dia_pagamento_geral' => $diaPagamento,
            'mes_pagamento_geral' => $mesPagamento,
            'ano_pagamento_geral' => $anoPagamento,
            'tipo_servico' => $servico,
            'status' => 0,
            'status_noti' => 0,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pagamentos\Pagamento  $pagamento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pagamento = Pagamento::where('id', $id)->first();
        $aluno = Aluno::where('id', $pagamento->aluno_id)->first();

        return view('app.alunos.pagamentos.geral.edit', compact('aluno', 'pagamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pagamentos\Pagamento  $pagamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $aluno_id = $request->aluno_id;

        $valor = $request->valor_pagamento_geral;
        $valorPagamento = str_replace(',', '.', $valor); 

        $dataPagamento = $request->data_pagamento_geral;

        $diaPagamento = substr($dataPagamento, 8);
        $mesPagamento = substr($dataPagamento, 5, -3);
        $anoPagamento = substr($dataPagamento, 0, -6);
        
        Pagamento::findOrFail($id)->update([
            'valor_pagamento_geral' => $valorPagamento,
            'data_pagamento_geral' => $dataPagamento,
            'descricao' => $request->descricao,
            'dia_pagamento_geral' => $diaPagamento,
            'mes_pagamento_geral' => $mesPagamento,
            'ano_pagamento_geral' => $anoPagamento,
            'updated_at' => Carbon::now()
        ]); 

        return redirect()->route('pagamentos.geral.index', $aluno_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pagamentos\Pagamento  $pagamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagamento $pagamento)
    {
        //
    }


}
