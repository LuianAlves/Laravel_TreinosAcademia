@extends('app.main_template')

@section('content')
    
    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row">

            <div class="col-lg-12" style="overflow-y: auto;">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Lista de Alunos PERSONAL</h4>

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
                                        <th class="text-center" scope="col">Aluno</th>
                                        <th class="text-center" scope="col">Telefone</th>
                                        <th class="text-center" scope="col">Treino</th>
                                        <th class="text-center" scope="col">Serviços</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alunos as $aluno)
                        
                                        <tr>
                                            <th class="text-muted">
                                                {{ $aluno->codigo_aluno }}
                                            </th>
                                            {{-- <th>{{ $aluno->user->name }}</th> --}}
                                            <td class="text-center" width="25%">{{ $aluno->nome }}</td>
                                            <td class="text-center">{{ $aluno->telefone }}</td>
                                            <td class="text-center"><b>{{ ucfirst($aluno->tipo_treino) }}</b></td>
                                            <td class="text-center pt-1">
                                                <li class="nav-item dropdown" style="list-style: none;">
                                                    <a class="nav-link nav-profile text-success pe-0" href="#" data-bs-toggle="dropdown">
                                                        <i class="bx bx-category fs-4"></i>
                                                    </a>
                                                    
                                                    <ul class="dropdown-menu" id="dropdown-menu-user">

                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" href="{{ route('realizar.index', $aluno->id) }}">
                                                                <i class="bx bx-heart"></i>
                                                                <span>Realizar Avaliação Física</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" href="{{ route('montado.index', $aluno->id) }}">
                                                                <i class="bx bx-minus-front"></i>
                                                                <span>Avaliações Realizadas</span>
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