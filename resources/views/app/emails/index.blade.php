@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row justify-content-center">

            {{-- Valor do Pagamento --}}
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body pt-3">

                        <form action="{{ route('pagamentos.geral.store') }}" method="post">
                            @csrf

                            <div class="row" style="font-weight: bold;">
                                <div class="col-6">
                                    <label class="text-muted mb-3">Aluno <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bx bxs-user"></i></span>
                                        <input type="text" name="nome_aluno_email" class="form-control form-control-sm" placeholder="Nome do Aluno">
                                    </div>
                                    @error('nome_aluno_email')
                                        <span class="text-danger m-3">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label class="text-muted mb-3">E-mail <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bx bx-voicemail"></i></span>
                                        <input type="email" name="endereco_email" id="email_aluno" class="form-control form-control-sm" placeholder="Email do Aluno">
                                    </div>
                                    @error('endereco_email')
                                        <span class="text-danger m-3">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-5" style="font-weight: bold;">
                                <div class="col-6">
                                    <label class="text-muted mb-3">Assunto <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bx bxs-file"></i></span>
                                        <input type="text" name="assunto_email" class="form-control form-control-sm" placeholder="Assunto do Email">
                                    </div>
                                    @error('assunto_email')
                                        <span class="text-danger m-3">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-5" style="font-weight: bold;">
                                <div class="col-12">
                                    <label class="text-muted mb-3">Mensagem <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <textarea class="form-control" name="mensagem_email" rows="8"></textarea>
                                    </div>
                                    @error('mensagem_email')
                                        <span class="text-danger m-3">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-sm btn-success text-white w-25"
                                        style="font-weight: 700;">Enviar</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
