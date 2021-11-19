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
                                        <th class="text-center" scope="col">Serviços</th>
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
                                                <li class="nav-item dropdown" style="list-style: none;">
                                                    <a class="nav-link nav-profile text-success pe-0" href="#" data-bs-toggle="dropdown">
                                                        <i class="bx bx-category fs-4"></i>
                                                    </a>
                                                    
                                                    <ul class="dropdown-menu" id="dropdown-menu-user">

                                                        {{-- Visualizar --}}
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" style="font-weight: 600;" href="#" data-bs-toggle="modal" data-bs-target="#showAluno" id="{{ $aluno->id }}" onclick="visualizarAluno(this.id)">
                                                                <i class="bx bx-minus-front fs-4 text-primary"></i>
                                                                <span>Visualizar Informações</span>
                                                            </a>
                                                        </li>
                                                        
                                                        {{-- Editar --}}
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" style="font-weight: 600;" href="{{ route('alunos.edit', $aluno->id) }}">
                                                                <i class="bx bx-edit fs-4 text-warning"></i>
                                                                <span>Editar Informações</span>
                                                            </a>
                                                        </li>
                                                        
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        
                                                        {{-- Treinos --}}
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" style="font-weight: 600;" href="{{ route('montar.create', $aluno->id) }}">
                                                                <i class="bx bx-dumbbell fs-4 text-info"></i>
                                                                <span>Montar Treino</span>
                                                            </a>
                                                        </li>

                                                        @php
                                                            $treinos = App\Models\TreinoAluno\MontarTreino::where('aluno_id', $aluno->id)->first();
                                                        @endphp

                                                        @if(!empty($treinos))
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center" style="font-weight: 600;" href="{{ route('montado.index', $aluno->id) }}">
                                                                    <i class="bx bx-abacus fs-4" style="color: rgb(103, 17, 153);"></i>
                                                                    <span>Treinos Montados</span>
                                                                </a>
                                                            </li>
                                                        @endif

                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>

                                                        {{-- Contratos --}}
                                                        @if($aluno->tipo_treino == 'personal' || $aluno->tipo_treino == 'Personal')
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center" style="font-weight: 600;" href="{{ route('montar-contratos.create', $aluno->id) }}">
                                                                    <i class="bx bx-notepad fs-4" style="color: rgb(129, 86, 5);"></i>
                                                                    <span>Montar Contrato</span>
                                                                </a>
                                                            </li>
                                                        @endif

                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>

                                                        {{-- Avaliações Físicas --}}
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" href="{{ route('realizar.index', $aluno->id) }}" style="font-weight: 600;">
                                                                <i class="bx bxs-heart fs-4 text-danger"></i>
                                                                <span>Avaliação Física</span>
                                                            </a>
                                                        </li>  

                                                        @php
                                                            $avaliacoes = App\Models\Avaliacao\DadosAvaliacaoFisica::where('aluno_id', $aluno->id)->first();
                                                        @endphp

                                                        @if(!empty($avaliacoes))
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center" style="font-weight: 600;" href="{{ route('montado.index', $aluno->id) }}">
                                                                    <i class="bx bx-heart text-danger fs-4"></i>
                                                                    <span>Avaliações Realizadas</span>
                                                                </a>
                                                            </li>
                                                        @endif

                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>

                                                        {{-- Excluir --}}
                                                        <li>
                                                            @if($aluno->tipo_treino == 'personal')
                                                            @else
                                                                <a class="dropdown-item d-flex align-items-center" href="{{ route('pagamentos.geral.index', $aluno->id) }}" style="font-weight: 600;">
                                                                    <i class="bx bx-dollar-circle fs-4 text-success"></i>
                                                                    <span>Pagamentos</span>
                                                                </a>
                                                            @endif
                                                        </li>
    

                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>

                                                        <li>
                                                            <form id="form_{{ $aluno->id }}" action="{{ route('alunos.destroy', $aluno->id) }}" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                                <a class="dropdown-item d-flex align-items-center" href="#" style="font-weight: 600;" onclick="document.getElementById('form_{{ $aluno->id }}').submit()">
                                                                    <i class="bx bx-block fs-4 text-danger"></i>
                                                                    <span class="text-danger">Remover Aluno</span>
                                                                </a>
                                                            </form>
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


