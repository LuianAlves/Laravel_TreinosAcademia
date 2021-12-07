@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-body">

                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Pagamento Pendente</h4>
                            </div>
                        </div>

                        <div class="row m-3">
                            <div class="col-6">
                                <div class="list-group">
                                    <li class="list-group-item">Aluno: </li>
                                    <li class="list-group-item">Serviço: </li>
                                    <li class="list-group-item">Valor: </li>
                                    <li class="list-group-item">Vencimento: </li>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="list-group" style="text-transform: capitalize; font-weight: 600;">
                                    <li class="list-group-item">
                                        {{ $pagamento->aluno->nome }}
                                    </li>
                                    <li class="list-group-item">
                                        {{ $pagamento->tipo_servico }}
                                    </li>
                                    <li class="list-group-item text-success">
                                        R$ {{ $pagamento->valor_pagamento_geral }}
                                    </li>
                                    <li class="list-group-item text-danger">
                                        {{ strftime('%d %B %Y.', strtotime($pagamento->data_pagamento_geral)) }}
                                    </li>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
