@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row">
            <div class="col-lg-12" style="max-height: 700px; overflow-y: auto;">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Lista de Pagamentos</h4>

                                <div class="d-flex align-items-center">
                                    <input class="form-control form-control-sm" style="margin-right: 10px;" id="inputPesquisarTabela" type="text" placeholder="Pesquisar">
                                    <a href="#" class="btn btn-sm text-white fs-5 pb-0 pt-0" data-bs-toggle="modal" data-bs-target="#createAluno" style="font-weight: 700; background: #4154f1;">+</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead style="color: #7b84d6;">
                                    <tr>
                                        <th class="text-center">Aluno</th>
                                        <th class="text-center">Serviço</th>
                                        <th class="text-center">Valor</th>
                                        <th class="text-center">Data</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Validar</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody id="pesquisarNaTabela">
                                    @foreach ($pagamentos as $pgt)
                                        <tr class="text-center">
                                            <td style="font-weight: 550;">{{ $pgt->descricao != null ? ucfirst($pgt->descricao) : ucfirst($pgt->tipo_servico) }}</td>
                                            <td style="font-weight: 550;">{{ ucfirst($pgt->tipo_servico) }}</td>
                                            <td><b class="text-success">R$ </b>{{ $pgt->valor_pagamento_geral }}</td>
                                            <td>
                                                {{  strftime('%d/%m/%Y', strtotime($pgt->data_pagamento_geral)) }}
                                            </td>
                                            <td>
                                                @if($pgt->status == 0)
                                                    <span class="badge text-danger w-100" style="border: 1px solid red;">Não Pagou</span>
                                                @else
                                                    <span class="badge text-success w-100" style="border: 1px solid green;">Pago</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($pgt->status == 0)
                                                    <a href="{{ route('pagamentos.pagou', $pgt->id) }}"><i class="bx bx-checkbox-checked fs-3 text-success"></i></a>
                                                @else
                                                    <a href="{{ route('pagamentos.naopagou', $pgt->id) }}"><i class="bx bx-checkbox-minus fs-3 text-danger"></i></a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('pagamentos.geral.edit', $pgt->id) }}"><i class="bx bxs-edit text-warning fs-5 mt-1"></i></a>
                                            </td>
                                        </tr>   
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


