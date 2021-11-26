@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row justify-content-center">
            <div class="card mt-3">
                <h5 class="card-title text-center">Adicionar Informações do Professor</h5>
                <div class="card-body mt-3 pt-3">

                    <form action="{{ route('dados-alunos.update', $aluno->id) }}" method="post">
                        @csrf
                        @method('PATCH')

                        {{-- Nome Professor --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="nome" class="form-control" placeholder="Nome Completo" value="{{ $aluno->nome }}">
                                </div>
                                @error('nome')
                                    <span class="text-danger m-3">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Profissao/EstadoCivil --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="estado_civil" class="form-control" placeholder="Estado Cívil" value="{{ $aluno->estado_civil }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="profissao" class="form-control" placeholder="Profissão" value="{{ $aluno->profissao }}">
                                </div>
                            </div>
                        </div>

                        {{-- RG/CPF --}}
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="rg" class="form-control" placeholder="RG" value="{{ $aluno->rg }}">
                                </div>
                                @error('rg')
                                    <span class="text-danger m-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="cpf" class="form-control" placeholder="CPF" value="{{ $aluno->cpf }}">
                                </div>
                                @error('cpf')
                                    <span class="text-danger m-3">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- ENDEREÇO/NUMERO DA CASA --}}
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="endereco" class="form-control" placeholder="Endereço" value="{{ $aluno->endereco }}">
                                </div>
                                @error('endereco')
                                    <span class="text-danger m-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="numero_casa" class="form-control" placeholder="Número" value="{{ $aluno->numero_casa }}">
                                </div>
                                @error('numero_casa')
                                    <span class="text-danger m-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="cep" class="form-control" placeholder="CEP" value="{{ $aluno->cep }}">
                                </div>
                                @error('cep')
                                    <span class="text-danger m-3">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- BAIRRO/CIDADE/ESTADO --}}
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="bairro" class="form-control" placeholder="Bairro" value="{{ $aluno->bairro }}">
                                </div>
                                @error('bairro')
                                    <span class="text-danger m-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="cidade" class="form-control" placeholder="Cidade" value="{{ $aluno->cidade }}">
                                </div>
                                @error('cidade')
                                    <span class="text-danger m-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="estado" class="form-control" placeholder="Estado" value="{{ $aluno->estado }}">
                                </div>
                            </div>
                        </div>

                        {{-- CELULAR/FIXO --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="telefone_fixo" class="form-control" placeholder="Telefone Fixo" value="{{ $aluno->telefone_fixo }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="telefone_celular" class="form-control" placeholder="Celular" value="{{ $aluno->telefone_celular }}">
                                </div>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="email" class="form-control" placeholder="E-mail" value="{{ $aluno->email }}">
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
