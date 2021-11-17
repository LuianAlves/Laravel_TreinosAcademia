@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">

        
        <div class="row">
            @php
                $prefix = Request::route()->getName();
            @endphp

            <div class="d-flex justify-content-end">
                @if ($prefix != 'categoria.index')
                    <a href="{{ route('categoria.index') }}" class="btn btn-sm btn-danger" style="font-weight: 700;">
                        Limpar Filtro
                    </a>
                @endif
            </div>
        </div>

        <div class="row">

            {{-- Pesquisar pela categoria --}}
            <div class="col-lg-5">
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
                                    <div class="input-group">
                                        <input type="text" name="search_categoria_treino" class="form-control form-control-sm"
                                            placeholder="Insira a Categoria" required>
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

            {{-- Listagem de Categorias --}}
            <div class="col-lg-7" style="max-height: 500px; overflow-y: auto;">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Lista de Categorias</h4>

                                <div class="d-flex align-items-center">
                                    <input class="form-control form-control-sm" style="margin-right: 10px;" id="inputPesquisarTabela" type="text" placeholder="Pesquisar">
                                    <a href="#" class="btn btn-sm text-white fs-5 pb-0 pt-0" data-bs-toggle="modal" data-bs-target="#createCategoriaTreino" style="font-weight: 700; background: #4154f1;">+</a>
                                </div>
                            </div>
                        </div>

                        
                        <table class="table table-sm">
                            <thead style="color: #7b84d6;">
                                <tr>
                                    <th scope="col">Categorias</th>
                                    <th class="text-center" scope="col">Serviços</th>
                                </tr>
                            </thead>
                            <tbody id="pesquisarNaTabela">
                                @foreach ($categoria_treino as $cat)
                                    <tr>
                                        <th class="text-muted">{{ $cat->nome_categoria_treino }}</th>
                                        <td class="text-center pt-1">
                                            <li class="nav-item dropdown" style="list-style: none;">
                                                <a class="nav-link nav-profile text-success pe-0" href="#" data-bs-toggle="dropdown">
                                                    <i class="bx bx-category fs-4"></i>
                                                </a>
                                                
                                                <ul class="dropdown-menu" id="dropdown-menu-user">
                                                    
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center" href="{{ route('categoria.edit', $cat->id) }}">
                                                            <i class="bx bx-edit"></i>
                                                            <span>Editar Categoria</span>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>

                                                    <li>
                                                        <form id="form_{{ $cat->id }}" action="{{ route('categoria.destroy', $cat->id) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                            <a class="dropdown-item d-flex align-items-center" href="#" onclick="document.getElementById('form_{{ $cat->id }}').submit()">
                                                                <i class="bx bx-block text-danger"></i>
                                                                <span class="text-danger">Remover Categoria</span>
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

    </section>
@endsection
