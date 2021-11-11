@extends('app.main_template')

@section('content')
    
    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')
    
    <section class="section">
        <div class="row">

            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Treinos do Aluno <b class="fs-5" style="color: #7b84d6;">{{ $id->nome }}</b></h4>

                                <div class="mt-3">
                                    <a href="{{ route('montar.index') }}" class="btn btn-sm text-white fs-5 pb-0 pt-0" style="font-weight: 700; background: #4154f1;">Voltar</a>
                                    <a href="#" class="btn btn-sm text-white fs-5 pb-0 pt-0" data-bs-toggle="modal" data-bs-target="#createAluno" style="font-weight: 700; background: #4154f1;">+</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-sm datatable">
                                <thead style="color: #7b84d6;">
                                    <tr>
                                        <th scope="col"># Código</th>
                                        <th scope="col">Professor</th>
                                        <th class="text-center" scope="col">Nível do Treino</th>
                                        <th class="text-center" scope="col">Categorias</th>
                                        <th class="text-center" scope="col">Criado</th>
                                        <th class="text-center" scope="col">Serviços</th>
                                    </tr>
                                </thead>
                                <tbody>
    
                                    @foreach ($treinos as $treino)
                                        <tr>
                                            <th class="text-muted">
                                                {{ $treino->codigo_treino }}
                                            </th>
                                            {{-- <th>{{ $aluno->user->name }}</th> --}}
                                            <td class="text-center" width="25%">{{ ucfirst($treino->professor) }}</td>
                                            <td class="text-center">
                                                @if($treino->nivel_aluno == 'iniciante')
                                                    Iniciante
                                                @elseif($treino->nivel_aluno == 'intermediario')
                                                    Intermediário
                                                @elseif($treino->nivel_aluno == 'avancado')
                                                    Avançado
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($treino->divisao == '1')
                                                    <b>A</b>
                                                @elseif($treino->divisao == '2')
                                                    <b>A/B</b>
                                                @elseif($treino->divisao == '3')
                                                    <b>A/B/C</b>
                                                @else
                                                    <b>A/B/C/D</b>
                                                @endif
                                            </td>
                                            <th class="text-muted text-center">
                                                {{ Carbon\Carbon::parse($treino->created_at)->format('d/m/Y') }}
                                            </th>
                                            <td class="text-center pt-1">
                                                <li class="nav-item dropdown" style="list-style: none;">
                                                    <a class="nav-link nav-profile text-success pe-0" href="#" data-bs-toggle="dropdown">
                                                        <i class="bx bx-category fs-4"></i>
                                                    </a>
                                                    
                                                    <ul class="dropdown-menu" id="dropdown-menu-user">
    
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" style="font-weight: 600;" href="{{ route('adicionar.index', $treino->id) }}">
                                                                <i class="bx bx-minus-front fs-4 text-primary"></i>
                                                               <span>Adicionar Exercícios</span>
                                                            </a>
                                                        </li>
    
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" style="font-weight: 600;" href="{{ route('montar.edit', $treino->id) }}">
                                                                <i class="bx bx-edit fs-4 text-warning"></i>
                                                                <span>Editar Treino</span>
                                                            </a>
                                                        </li>
    
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
    
                                                        <li>
                                                            <form id="form_{{ $treino->id }}" action="{{ route('montar.destroy', $treino->id) }}" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                                <input type="hidden" name="aluno_id" value="{{ $treino->aluno_id }}">
                                                                <a class="dropdown-item d-flex align-items-center" style="font-weight: 600;" href="#" onclick="document.getElementById('form_{{ $treino->id }}').submit()">
                                                                    <i class="bx bx-block fs-4 text-danger"></i>
                                                                    <span class="text-danger">Remover Treino</span>
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
                        
                        {{ $treinos->links('app.geral.paginate') }}

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection