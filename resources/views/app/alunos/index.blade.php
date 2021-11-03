@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row">
            <div class="d-flex justify-content-end">
                <div class="mt-3">
                </div>
            </div>

            {{-- Pesquisa por Nome --}}
            <div class="col-5">
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
            <div class="col-4">
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

            {{-- Pesquisa por Data de Cadastro --}}
            <div class="col-3">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Gênero</h4>
                            </div>
                        </div>

                        <form action="{{ route('alunos.search.cadastro') }}" method="post">
                            @csrf

                            {{-- Pesquisa por Nome --}}
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1" checked="">
                                        <label class="form-check-label" for="gridCheck1">
                                            Masculino
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck2" checked="">
                                        <label class="form-check-label" for="gridCheck2">
                                            Feminino
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin-top: 27px;">
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
                                <h4 class="card-title">Lista de Alunos</h4>

                                @php
                                    $prefix = Request::route()->getName();
                                @endphp

                                <div class="mt-3">
                                    @if ($prefix != 'alunos.index')
                                        <a href="{{ route('alunos.index') }}"
                                            style="font-weight: 700; color: #692222; padding-top: 3px; margin-right: 5px;">Limpar
                                            Filtro</a>
                                    @endif
                                    <a href="{{ route('alunos.create') }}" class="btn btn-sm text-white"
                                        style="font-weight: 700; background: #4154f1; padding-top: 3px;">Novo Aluno +</a>
                                </div>
                            </div>
                        </div>

                        <table class="table table-sm datatable">
                            <thead style="color: #7b84d6;">
                                <tr>
                                    <th scope="col">Código</th>
                                    {{-- <th scope="col">Professor</th> --}}
                                    <th class="text-center" scope="col">Aluno</th>
                                    <th class="text-center" scope="col">Telefone</th>
                                    <th class="text-center" scope="col">Treino</th>
                                    <th class="text-center" scope="col">Ação</th>
                                    <th class="text-center" scope="col">Serviços</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alunos as $aluno)
                                    <tr>
                                        <th class="text-muted">{{ $aluno->codigo_aluno }}</th>
                                        {{-- <th>{{ $aluno->user->name }}</th> --}}
                                        <td class="text-center" width="25%">{{ $aluno->nome }}</td>
                                        <td class="text-center">{{ $aluno->telefone }}</td>
                                        <td class="text-center"><b>{{ ucfirst($aluno->tipo_treino) }}</b></td>
                                        <td class="text-center">
                                            <form id="form_{{ $aluno->id }}"
                                                action="{{ route('alunos.destroy', $aluno->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <a title="Visualizar Informações" href="#" class="text-info"
                                                    data-bs-toggle="modal" data-bs-target="#showAluno"
                                                    id="{{ $aluno->id }}" onclick="visualizarAluno(this.id)"><i
                                                        class="bx bx-minus-front" style="font-size: 26px;"></i></a>
                                                <a title="Edit Informações" href="{{ route('alunos.edit', $aluno->id) }}"
                                                    class="text-primary"><i class="bx bx-edit"
                                                        style="font-size: 26px;"></i></a>
                                                <a title="Remover Aluno" href="#"
                                                    onclick="document.getElementById('form_{{ $aluno->id }}').submit()"
                                                    class="text-danger"><i class="bx bx-block"
                                                        style="font-size: 26px;"></i></a>
                                            </form>
                                        </td>
                                        <td class="text-center">
                                            <a title="Montar Treino" href="" class="text-warning"><i
                                                    class="bx bx-dumbbell" style="font-size: 26px;"></i></a>
                                            <a title="Pagamentos" href="" class="text-success"><i
                                                    class="bx bx-dollar-circle" style="font-size: 26px;"></i></a>
                                            <a title="Montar Contrato" href="" class="text-orange"
                                                style="color: rgb(172, 112, 2);"><i class="bx bx-notepad"
                                                    style="font-size: 26px;"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $alunos->links('app.geral.paginate') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
