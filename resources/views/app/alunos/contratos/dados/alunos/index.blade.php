@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">   
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
                                        <th scope="col">Aluno</th>
                                        <th>Celular</th>
                                        <th>E-mail</th>
                                        <th class="text-center" scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody id="pesquisarNaTabela">
                                    @foreach ($alunos as $aluno)
                        
                                        <tr>
                                            <th class="text-muted">{{ $aluno->nome }}</th>
                                            <th>{{ $aluno->telefone_celular }}</th>
                                            <th>{{ $aluno->email }}</th>
                                            <td>
                                                <li class="nav-item dropdown" style="list-style: none;">
                                                    <a class="nav-link nav-profile text-success" href="#" data-bs-toggle="dropdown">
                                                        <i class="bx bx-category fs-4"></i>
                                                    </a>
                                                    
                                                    <ul class="dropdown-menu" id="dropdown-menu-user">
                                                        {{-- Visualizar --}}
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" style="font-weight: 600;" href="{{ route('dados-alunos.show', $aluno->id) }}">
                                                                <i class="bx bx-minus-front fs-4 text-primary"></i>
                                                                <span>Visualizar Informações</span>
                                                            </a>
                                                        </li>

                                                        {{-- Editar --}}
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" style="font-weight: 600;" href="{{ route('dados-alunos.edit', $aluno->id) }}">
                                                                <i class="bx bx-edit fs-4 text-success"></i>
                                                                <span>Editar Informações</span>
                                                            </a>
                                                        </li>

                                                        {{-- Excluir --}}
                                                        <li>
                                                            <form id="form_{{$aluno->id}}" action="{{ route('dados-alunos.destroy', $aluno->id) }}" method="post">
                                                                @method('DELETE')
                                                                @csrf

                                                                <a href="#" class="dropdown-item d-flex align-items-center" style="font-weight: 600;" onclick="document.getElementById('form_{{$aluno->id}}').submit()">
                                                                    <i class="bx bx-block text-danger fs-4"></i>
                                                                    <span>Remover Dados</span>
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
