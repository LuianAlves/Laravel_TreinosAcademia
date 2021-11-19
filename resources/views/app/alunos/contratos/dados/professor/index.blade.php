@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row justify-content-center">
            <div class="card mt-3">
                <h5 class="card-title text-center">Adicionar Informações do Professor</h5>
                <div class="card-body mt-3 pt-3">

                    <form action="{{ route('dados-professores.store') }}" method="post">
                        @csrf

                        {{-- Nome Professor --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="nome_professor" class="form-control" placeholder="Nome Completo" value="">
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
                                    <input type="text" name="estado_civil_professor" class="form-control" placeholder="Estado Cívil" value="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="profissao_professor" class="form-control" placeholder="Profissão" value="">
                                </div>
                            </div>
                        </div>

                        {{-- RG/CPF/CREEF --}}
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="rg_professor" class="form-control" placeholder="RG" value="">
                                </div>
                                @error('rg_professor')
                                    <span class="text-danger m-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="cpf_professor" class="form-control" placeholder="CPF" value="">
                                </div>
                                @error('cpf_professor')
                                    <span class="text-danger m-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="cref_professor" class="form-control" placeholder="CREF" value="">
                                </div>
                            </div>
                        </div>

                        {{-- ENDEREÇO/NUMERO DA CASA --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="endereco_professor" class="form-control" placeholder="Endereço" value="">
                                </div>
                                @error('endereco_professor')
                                    <span class="text-danger m-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="numero_casa_professor" class="form-control" placeholder="Número" value="">
                                </div>
                                @error('numero_casa_professor')
                                    <span class="text-danger m-3">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- BAIRRO/CIDADE/ESTADO --}}
                        <div class="row">
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" name="bairro_professor" class="form-control" placeholder="Bairro" value="">
                                </div>
                                @error('bairro_professor')
                                    <span class="text-danger m-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" name="cep_professor" class="form-control" placeholder="CEP" value="">
                                </div>
                                @error('cep_professor')
                                    <span class="text-danger m-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" name="cidade_professor" class="form-control" placeholder="Cidade" value="">
                                </div>
                                @error('cidade_professor')
                                    <span class="text-danger m-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" name="estado_professor" class="form-control" placeholder="Estado" value="">
                                </div>
                            </div>
                        </div>

                        {{-- CELULAR/FIXO --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="telefone_fixo_professor" class="form-control" placeholder="Telefone Fixo" value="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="telefone_celular_professor" class="form-control" placeholder="Celular" value="">
                                </div>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="email_professor" class="form-control" placeholder="E-mail" value="">
                                </div>
                            </div>
                        </div>

                        {{-- Button --}}
                        <div class="row mt-5">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-sm text-white float-right" style="font-weight: 700; background: #4154f1;">Adicionar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12" style="max-height: 700px; overflow-y: auto;">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Lista de Professores</h4>

                                <div class="d-flex align-items-center">
                                    <input class="form-control form-control-sm" style="margin-right: 10px;" id="inputPesquisarTabela" type="text" placeholder="Pesquisar">
                                    <a href="#" class="btn btn-sm text-white fs-5 pb-0 pt-0" data-bs-toggle="modal" data-bs-target="#createAluno" style="font-weight: 700; background: #4154f1;">+</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead style="color: #7b84d6;">
                                    <tr>
                                        <th scope="col">Professor</th>
                                        <th class="text-center" scope="col">CREF</th>
                                        <th class="text-center" scope="col">Celular</th>
                                        <th class="text-center" scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody id="pesquisarNaTabela">
                                    @foreach ($professores as $professor)
                        
                                        <tr>
                                            <th class="text-muted">{{ $professor->nome_professor }}</th>
                                            <th class="text-center">{{ $professor->cref_professor }}</th>
                                            <th class="text-center">{{ $professor->telefone_celular_professor }}</th>
                                            <td class="text-center">
                                                <li class="nav-item dropdown" style="list-style: none;">
                                                    <a class="nav-link nav-profile text-success" href="#" data-bs-toggle="dropdown">
                                                        <i class="bx bx-category fs-4"></i>
                                                    </a>
                                                    
                                                    <ul class="dropdown-menu" id="dropdown-menu-user">
                                                        {{-- Visualizar --}}
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" style="font-weight: 600;" href="{{ route('dados-professores.edit', $professor->id) }}">
                                                                <i class="bx bx-minus-front fs-4 text-primary"></i>
                                                                <span>Editar Informações</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
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
