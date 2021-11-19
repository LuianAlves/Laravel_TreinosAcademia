@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row justify-content-center">
            <div class="card mt-3">
                <h5 class="card-title text-center">Adicionar Informações do Professor</h5>
                <div class="card-body mt-3 pt-3">

                    <form action="{{ route('dados-professores.update', $professor->id) }}" method="post">
                        @csrf
                        @method('PATCH')

                        {{-- Nome Professor --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="nome_professor" class="form-control" placeholder="Nome Completo" value="{{ $professor->nome_professor }}">
                                </div>
                                @error('nome_professor')
                                    <span class="text-danger m-3">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Profissao/EstadoCivil --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="estado_civil_professor" class="form-control" placeholder="Estado Cívil" value="{{ $professor->estado_civil_professor }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="profissao_professor" class="form-control" placeholder="Profissão" value="{{ $professor->profissao_professor }}">
                                </div>
                            </div>
                        </div>

                        {{-- RG/CPF/CREEF --}}
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="rg_professor" class="form-control" placeholder="RG" value="{{ $professor->rg_professor }}">
                                </div>
                                @error('rg_professor')
                                    <span class="text-danger m-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="cpf_professor" class="form-control" placeholder="CPF" value="{{ $professor->cpf_professor }}">
                                </div>
                                @error('cpf_professor')
                                    <span class="text-danger m-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="cref_professor" class="form-control" placeholder="CREF" value="{{ $professor->cref_professor }}">
                                </div>
                            </div>
                        </div>

                        {{-- ENDEREÇO/NUMERO DA CASA --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="endereco_professor" class="form-control" placeholder="Endereço" value="{{ $professor->endereco_professor }}">
                                </div>
                                @error('endereco_professor')
                                    <span class="text-danger m-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="numero_casa_professor" class="form-control" placeholder="Número" value="{{ $professor->numero_casa_professor }}">
                                </div>
                                @error('numero_casa_professor')
                                    <span class="text-danger m-3">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- BAIRRO/CIDADE/ESTADO --}}
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="bairro_professor" class="form-control" placeholder="Bairro" value="{{ $professor->bairro_professor }}">
                                </div>
                                @error('bairro_professor')
                                    <span class="text-danger m-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="cidade_professor" class="form-control" placeholder="Cidade" value="{{ $professor->cidade_professor }}">
                                </div>
                                @error('cidade_professor')
                                    <span class="text-danger m-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="estado_professor" class="form-control" placeholder="Estado" value="{{ $professor->estado_professor }}">
                                </div>
                            </div>
                        </div>

                        {{-- CELULAR/FIXO --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="telefone_fixo_professor" class="form-control" placeholder="Telefone Fixo" value="{{ $professor->telefone_fixo_professor }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="telefone_celular_professor" class="form-control" placeholder="Celular" value="{{ $professor->telefone_celular_professor }}">
                                </div>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="email_professor" class="form-control" placeholder="E-mail" value="{{ $professor->email_professor }}">
                                </div>
                            </div>
                        </div>

                        {{-- Button --}}
                        <div class="row mt-5">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-sm text-white float-right" style="font-weight: 700; background: #4154f1;">Atualizar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
