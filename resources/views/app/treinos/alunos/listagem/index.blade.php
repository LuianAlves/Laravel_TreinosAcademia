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
                                <h4 class="card-title">Código do Treino</h4>
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
                                <h4 class="card-title">Data de Cadastro do Treino</h4>
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
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Lista de Treinos do <span class="fs-5" style="color: #4154f1;">{{ $aluno->nome }}</span></h4>

                                @php
                                    $prefix = Request::route()->getName();
                                @endphp

                                <div class="mt-3">
                                    <a href="#" class="btn btn-sm text-white fs-5 pb-0 pt-0" data-bs-toggle="modal" data-bs-target="#createAluno" style="font-weight: 700; background: #4154f1;">+</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-sm datatable">
                                <thead style="color: #7b84d6;">
                                    <tr>
                                        <th scope="col">Código</th>
                                        {{-- <th scope="col">Professor</th> --}}
                                        <th class="text-center" scope="col">Nome</th>
                                        {{-- <th class="text-center" scope="col">Categoria</th> --}}
                                        <th class="text-center" scope="col">Criado</th>
                                        <th class="text-center" scope="col">Serviços</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($treino as $item)
                                        <tr>
                                            <th class="text-muted">{{ $item->codigo_treino }}</th>
                                            {{-- <th>{{ $item->user->name }}</th> --}}
                                            <td class="text-center" width="25%">{{ $item->nome_treino }}</td>
                                            <td class="text-center">{{ $item->created_at }}</td>
                                            <td class="text-center pt-1">
                                                <a href="{{ route('treino.show', $item->codigo_treino) }}">
                                                    <i class="bx bx-chevron-right-square fs-4"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="row">
                            <div class="d-flex justify-content-end">
                                @if ($prefix != 'alunos.index')
                                    <a href="{{ route('alunos.index') }}" style="font-weight: 700; color: #692222; padding-top: 3px; margin-right: 5px;">
                                        Limpar Filtro
                                    </a>
                                @endif
                            </div>
                        </div>
                        {{-- {{ $alunos->links('app.geral.paginate') }} --}}

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
