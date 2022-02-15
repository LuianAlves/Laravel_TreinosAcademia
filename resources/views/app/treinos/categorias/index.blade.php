@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row">
            <div class="col-12" style="max-height: 500px; overflow-y: auto;">
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
                        
                        @if(App\Models\Treinos\CategoriaTreinos::count() != 0)
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
                                            <td class="col-10 text-muted fw-bold">{{ $cat->nome_categoria_treino }}</td>
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
                        @else
                            <div class="row justify-content-around mt-4">
                                <h6 class="text-danger text-center mb-4" style="font-family: 'Poppins', sans-serif;">
                                    Parece que nenhum exercício foi configurado.
                                </h6>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="text-muted text-center" style="font-family: 'Poppins', sans-serif; margin-top: 20px;">   
                Total de <b>{{ count($categoria_treino) }} </b> Categorias Cadastradas.
            </div>
        </div>
    </section>
@endsection
