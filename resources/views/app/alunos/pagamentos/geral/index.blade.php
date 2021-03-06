@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row justify-content-center">

            {{-- Valor do Pagamento --}}
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Editar Informações do Aluno: <span
                                        style="color: #63699e; font-size: 18px;">{{ $aluno->nome }}</span></h4>
                                <a href="{{ route('area-aluno.index', $aluno->id) }}" class="btn btn-sm btn-success text-white"
                                    style="font-weight: 700; padding-top: 3px;">Área do Aluno</a>
                            </div>
                        </div>

                        <form action="{{ route('pagamentos.geral.store') }}" method="post">
                            @csrf

                            <input type="hidden" name="aluno_id" value="{{ $aluno->id }}">
                            <input type="hidden" name="servico" value="{{ $aluno->tipo_treino }}">

                            <div class="row" style="font-weight: bold;">
                                <div class="col-4 offset-2">
                                    <label class="text-muted mb-3">Valor <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bx bxs-dollar-circle fs-5"></i></span>
                                        <input type="text" name="valor_pagamento_geral" class="form-control form-control-sm"
                                            placeholder="Valor">
                                    </div>
                                    @error('valor_pagamento_geral')
                                        <span class="text-danger m-3">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label class="text-muted mb-3">Data de Vencimento <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bx bx-calendar fs-5"></i></span>
                                        <input type="date" name="data_pagamento_geral" id="data_pagamento_geral"
                                            class="form-control form-control-sm">
                                    </div>
                                    @error('data_pagamento_geral')
                                        <span class="text-danger m-3">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row" style="font-weight: bold;">
                                <div class="col-8 offset-2">
                                    <div class="input-group mt-3">
                                        <textarea name="descricao" class="form-control" rows="5"
                                            placeholder="Adicione uma descrição (Opcional)"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-sm text-white float-right"
                                        style="font-weight: 700; background: #4154f1;">Adicionar</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12" style="max-height: 700px; overflow-y: auto;">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Lista de Pagamentos</h4>

                                <div class="d-flex align-items-center">
                                    <input class="form-control form-control-sm" style="margin-right: 10px;"
                                        id="inputPesquisarTabela" type="text" placeholder="Procurar pagamento">
                                </div>
                            </div>
                        </div>

                        <table class="table">
                            <thead style="color: #7b84d6;">
                                <tr>
                                    <th class="text-center">Serviço</th>
                                    <th class="text-center">Valor</th>
                                    <th class="text-center">Data do Pagamento</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Validar</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody id="pesquisarNaTabela">
                                @foreach ($pagamentos as $pgt)
                                    <tr class="text-center">
                                        <td style="font-weight: 550;">{{ $pgt->descricao != null ? ucfirst($pgt->descricao) : ucfirst($pgt->tipo_servico) }}</td>
                                        <td><b class="text-success">R$ </b>{{ $pgt->valor_pagamento_geral }}</td>
                                        <td>
                                            @if (Carbon\Carbon::now()->format('Y-m-d') > $pgt->data_pagamento_geral)
                                                <b>{{ strftime('%d %B %Y', strtotime($pgt->data_pagamento_geral)) }}</b>
                                            @elseif(Carbon\Carbon::now()->format('Y-m-d') ==
                                                $pgt->data_pagamento_geral)
                                                <b>{{ strftime('%d %B %Y', strtotime($pgt->data_pagamento_geral)) }}</b>
                                            @else
                                                <b>{{ strftime('%d %B %Y', strtotime($pgt->data_pagamento_geral)) }}</b>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pgt->status == 0)
                                                <span class="badge text-danger w-75" style="border: 1px solid red;">Não
                                                    Pagou</span>
                                            @else
                                                <span class="badge text-success w-75"
                                                    style="border: 1px solid green;">Pago</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pgt->status == 0)
                                                <a href="{{ route('pagamentos.pagou', $pgt->id) }}"><i
                                                        class="bx bx-checkbox-checked fs-3 text-success"></i></a>
                                            @else
                                                <a href="{{ route('pagamentos.naopagou', $pgt->id) }}"><i
                                                        class="bx bx-checkbox-minus fs-3 text-danger"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('pagamentos.geral.edit', $pgt->id) }}"><i
                                                    class="bx bxs-edit text-warning fs-5 mt-1"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
