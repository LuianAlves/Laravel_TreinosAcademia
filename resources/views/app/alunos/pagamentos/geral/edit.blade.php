@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row justify-content-center">

            {{-- Valor do Pagamento --}}
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header" style="background: #4154f1; font-family: 'Poppins', sans-serif; font-size: 18px;"><b class="text-white">{{ $aluno->nome }}</b></div>
                    <div class="card-body pt-3">

                        <form action="{{ route('pagamentos.geral.update', $pagamento->id) }}" method="post">
                            @csrf

                            <input type="hidden" name="aluno_id" value="{{ $aluno->id }}">

                            <div class="row" style="font-weight: bold;">
                                <div class="col-6">
                                    <label class="text-muted mb-3">Valor <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bx bxs-dollar-circle fs-3"></i></span>
                                        <input type="text" name="valor_pagamento_geral" class="form-control" placeholder="Valor" value="{{ $pagamento->valor_pagamento_geral }}">
                                    </div>
                                    @error('valor_pagamento_geral')
                                        <span class="text-danger m-3">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label class="text-muted mb-3">Data de Vencimento <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bx bx-calendar fs-3"></i></span>
                                        <input type="date" name="data_pagamento_geral" id="data_pagamento_geral" class="form-control" value="{{ $pagamento->data_pagamento_geral }}">
                                    </div>
                                    @error('data_pagamento_geral')
                                        <span class="text-danger m-3">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row" style="font-weight: bold;">
                                <div class="col-6 mt-3">
                                    <label class="text-muted mb-3">Descrição</label>
                                    <div class="input-group">
                                        <textarea name="descricao" class="form-control" rows="5"
                                            placeholder="Adicione uma descrição (Opcional)">{{ $pagamento->descricao }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-sm text-white float-right" style="font-weight: 700; background: #4154f1;">Atualizar</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection


