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
                                <h4 class="card-title">Avaliações do Aluno <b class="fs-5" style="color: #7b84d6;">{{ $aluno->nome }}</b></h4>

                                <div class="mt-3">
                                    <a href="{{ route('avaliacoes.index') }}" class="btn btn-sm text-white" style="font-weight: 700; background: #4154f1;">Voltar</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-sm datatable">
                                <thead style="color: #7b84d6;">
                                    <tr>
                                        <th scope="col">Código</th>
                                        <th class="text-center" scope="col">Estatura</th>
                                        <th class="text-center" scope="col">Peso</th>
                                        <th class="text-center" scope="col">Data da Realização</th>
                                        <th class="text-center" scope="col">Serviços</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($avaliacoes as $avaliacao)
                                        <tr>
                                            <th class="text-muted">
                                                {{ $avaliacao->codigo_avaliacao }}
                                            </th>
                                            <td class="text-center">{{ $avaliacao->estatura }}</td>
                                            <td class="text-center">{{ $avaliacao->peso }}</td>
                                            
                                            <th class="text-muted text-center">
                                                {{ 
                                                    strftime('%d %B %Y', strtotime($avaliacao->created_at))
                                                }}
                                            </th>

                                            <td class="text-center pt-1">
                                                <li class="nav-item dropdown" style="list-style: none;">
                                                    <a class="nav-link nav-profile text-success pe-0" href="#" data-bs-toggle="dropdown">
                                                        <i class="bx bx-category fs-4"></i>
                                                    </a>
                                                    
                                                    <ul class="dropdown-menu" id="dropdown-menu-user">
    
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" style="font-weight: 600;" href="{{ route('download.avaliacao.fisica', $avaliacao->codigo_avaliacao) }}">
                                                                <i class="bx bx-minus-front fs-4 text-primary"></i>
                                                               <span>Visualizar Avaliação Física</span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" style="font-weight: 600;" href="#">
                                                                <i class="bx bx-download fs-4 text-success"></i>
                                                               <span>Baixar Avaliação Física</span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>

                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" style="font-weight: 600;" 
                                                                href="{{ route('avaliacoes.destroy', ['aluno_id' => $avaliacao->aluno_id, 'codigo' =>  $avaliacao->codigo_avaliacao]) }}">

                                                                <i class="bx bx-block fs-4 text-danger"></i>
                                                                <span class="text-danger">Remover Avaliação</span>
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