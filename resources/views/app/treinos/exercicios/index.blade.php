@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row">

            {{-- Pesquisar por Categoria --}}
            <div class="col-6">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Categoria</h4>
                            </div>
                        </div>

                        <form action="{{ route('categoria.treinos.search') }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <select class="form-select form-select-sm" name="search_categoria_treino">
                                        <option selected="" disabled="" value="">Selecione a Categoria</option>
                                        @foreach($categoriaTreinos as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->nome_categoria_treino }}</option>
                                        @endforeach
                                    </select>
                                    @error('search_categoria_treino')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-sm text-white float-right" style="font-weight: 700; background: #4154f1; padding-top: 8px;"><i class="bx bx-search"></i></button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            {{-- Pesquisar pela Exercício --}}
            <div class="col-6">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Exercício</h4>
                            </div>
                        </div>

                        <form action="{{ route('categoria.treinos.search') }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bx bx-dumbbell"></i></span>
                                        <input type="text" name="search_exercicio_treino"
                                            class="form-control form-control-sm" placeholder="Insira o Exercício" required>
                                    </div>
                                    @error('search_categoria_treino')
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

        {{-- Listagem de Categorias --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Lista de Exercícios</h4>

                                @php
                                    $prefix = Request::route()->getName();
                                @endphp

                                <div class="mt-3">
                                    <a href="#" class="btn btn-sm text-white fs-5 pb-0 pt-0" data-bs-toggle="modal"
                                        data-bs-target="#createExercicioTreino"
                                        style="font-weight: 700; background: #4154f1;">+</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-sm datatable">
                                <thead style="color: #7b84d6;">
                                    <tr>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Exercício</th>
                                        <th class="text-center" scope="col">Serviços</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exercicioTreinos as $exercicio)
                                        <tr>
                                            <th class="text-muted">{{ $exercicio->categoriaTreino->nome_categoria_treino }}</th>
                                            <th class="text-muted">{{ $exercicio->nome_exercicio }}</th>
                                            <td class="text-center pt-1">
                                                <li class="nav-item dropdown" style="list-style: none;">
                                                    <a class="nav-link nav-profile text-success pe-0" href="#" data-bs-toggle="dropdown">
                                                        <i class="bx bx-category fs-4"></i>
                                                    </a>
                                                    
                                                    <ul class="dropdown-menu" id="dropdown-menu-user">
                                                        
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" href="{{ route('exercicio.edit', $exercicio->id) }}">
                                                                <i class="bx bx-edit"></i>
                                                                <span>Editar Exercício</span>
                                                            </a>
                                                        </li>
    
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
    
                                                        <li>
                                                            <form id="form_{{ $exercicio->id }}" action="{{ route('exercicio.destroy', $exercicio->id) }}" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                                <a class="dropdown-item d-flex align-items-center" href="#" onclick="document.getElementById('form_{{ $exercicio->id }}').submit()">
                                                                    <i class="bx bx-block text-danger"></i>
                                                                    <span class="text-danger">Remover Exercício</span>
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

                        <div class="row">
                            <div class="d-flex justify-content-end">
                                @if ($prefix != 'exercicio.index')
                                    <a href="{{ route('exercicio.index') }}"
                                        style="font-weight: 700; color: #692222; padding-top: 3px; margin-right: 5px;">
                                        Limpar Filtro
                                    </a>
                                @endif
                            </div>
                        </div>
                        {{ $exercicioTreinos->links('app.geral.paginate') }}

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
