@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row">

            {{-- Pesquisa por Nome --}}
            <div class="col-6">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Nome ou Código do Aluno</h4>
                            </div>
                        </div>

                        <form action="{{ route('alunos.search') }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control form-control-sm"
                                            placeholder="Nome/Código do Aluno" required>
                                    </div>
                                    @error('search')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-sm text-white float-right"
                                        style="font-weight: 700; background: #4154f1; padding-top: 8px;"><i
                                            class="bx bx-search"></i></button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            {{-- Pesquisa por Data de Cadastro --}}
            <div class="col-6">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Data do Cadastro</h4>
                            </div>
                        </div>

                        <form action="{{ route('alunos.search.cadastro') }}" method="post">
                            @csrf

                            {{-- Pesquisa por Nome --}}
                            <div class="row">
                                <div class="col">
                                    <div class="input-group">
                                        <input type="date" name="search_cadastro" class="form-control form-control-sm"
                                            placeholder="Nome do Aluno" required>
                                    </div>
                                    @error('search_cadastro')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-sm text-white float-right"
                                        style="font-weight: 700; background: #4154f1; padding-top: 8px;"><i
                                            class="bx bx-search"></i></button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        
        <div class="row">

            @php
                $prefix = Request::route()->getName();
            @endphp

            <div class="d-flex justify-content-end">
                @if ($prefix != 'alunos.index')
                    <a href="{{ route('alunos.index') }}" class="btn btn-sm  btn-danger" style="font-weight: 700;">
                        Limpar Filtro
                    </a>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12" style="max-height: 700px; overflow-y: auto;">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Lista de Alunos</h4>
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
                                        <th scope="col">Código</th>
                                        {{-- <th scope="col">Professor</th> --}}
                                        <th class="text-center" scope="col">Aluno</th>
                                        <th class="text-center" scope="col">Telefone</th>
                                        <th class="text-center" scope="col">Treino</th>
                                        <th class="text-center" scope="col">Área do Aluno</th>
                                    </tr>
                                </thead>
                                <tbody id="pesquisarNaTabela">
                                    @foreach ($alunos as $aluno)
                        
                                        <tr>
                                            <th class="text-muted">
                                                {{ $aluno->codigo_aluno }}
                                            </th>
                                            {{-- <th>{{ $aluno->user->name }}</th> --}}
                                            <td class="text-center" width="25%">{{ $aluno->nome }}</td>
                                            <td class="text-center">{{ $aluno->telefone }}</td>
                                            <td class="text-center">
                                                @if($aluno->tipo_treino == 'personal' || $aluno->tipo_treino == 'Personal')
                                                    <b>{{ ucfirst($aluno->tipo_treino) }}</b>
                                                @else
                                                    <span class="text-muted">{{ ucfirst($aluno->tipo_treino) }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center pt-1">
                                                <a href="{{ route('area-aluno.index', $aluno->id) }}">
                                                    <i class="bx bx-arrow-to-right text-info fs-3"></i>
                                                </a>
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


