<?php

namespace App\Http\Controllers\Aluno\Pagamentos;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Pagamentos\Pagamento;
use App\Models\Aluno;

use Carbon\Carbon;

class PagamentoController extends Controller
{
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        Pagamento::insert([
            'aluno_id' => $aluno_id,
            'valor_pagamento_geral' => $request->valor_pagamento_geral,
            'data_pagamento_geral' => $request->data_pagamento_geral,
            'tipo_servico' => $servico,
            'status' => 0,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pagamentos\Pagamento  $pagamento
     * @return \Illuminate\Http\Response
     */
    public function show(Pagamento $pagamento)
    {
        //
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

        Pagamento::findOrFail($id)->update([
            'valor_pagamento_geral' => $request->valor_pagamento_geral,
            'data_pagamento_geral' => $request->data_pagamento_geral,
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
