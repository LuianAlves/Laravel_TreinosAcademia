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
                                <h4 class="card-title">Contratos do Aluno <b class="fs-5" style="color: #7b84d6;">{{ $aluno->nome }}</b></h4>

                                <div class="mt-3">
                                    <a href="{{ route('alunos.index') }}" class="btn btn-sm text-white" style="font-weight: 700; background: #4154f1;">Voltar</a>
                                    <a href="{{ route('montar-contrato.create', $aluno->id) }}" class="btn btn-sm text-white" style="font-weight: 700; background: #4154f1;">Novo Contrato</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-sm datatable">
                                <thead style="color: #7b84d6;">
                                    <tr>
                                        <th scope="col"># Código</th>
                                        <th scope="col">Professor</th>
                                        <th class="text-center" scope="col">Treino</th>
                                        <th class="text-center" scope="col">Criado</th>
                                        <th class="text-center" scope="col">Serviços</th>
                                    </tr>
                                </thead>
                                <tbody>
    
                                    @foreach ($contratos as $contrato)
                                        <tr>
                                            <th class="text-muted">
                                                {{ $contrato->codigo_contrato }}
                                            </th>
                                            <th class="text-center">{{ $contrato->professor->nome_professor }}</th>
                                            <th class="text-center">{{ $contrato->nome_contrato }}</th>
                                            <td class="text-center" width="25%">{{ Carbon\Carbon::parse($contrato->created_at)->format('d m Y') }}</td>
                                            
                                            <td class="text-center pt-1">
                                                <li class="nav-item dropdown" style="list-style: none;">
                                                    <a class="nav-link nav-profile text-success pe-0" href="#" data-bs-toggle="dropdown">
                                                        <i class="bx bx-category fs-4"></i>
                                                    </a>
                                                    
                                                    <ul class="dropdown-menu" id="dropdown-menu-user">
    
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" style="font-weight: 600;" href="{{ route('contratos.download', ['codigo_contrato' => $contrato->codigo_contrato, 'aluno_id' => $contrato->aluno_id, 'professor_id' => $contrato->professor_id]) }}">
                                                                <i class="bx bx-download fs-4 text-success"></i>
                                                               <span>Baixar Contrato</span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center"
                                                                style="font-weight: 600;" href="{{ route('contratos-montados.edit', ['codigo_contrato' => $contrato->codigo_contrato, 'aluno_id' => $contrato->aluno_id, 'professor_id' => $contrato->professor_id]) }}">
                                                                <i class="bx bx-edit fs-4 text-warning"></i>
                                                                <span>Editar Contrato</span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
    
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" style="font-weight: 600;" href="{{ route('montar-contrato.destroy', ['contrato_id' => $contrato->id, 'codigo_contrato' => $contrato->codigo_contrato]) }}">
                                                                <i class="bx bx-block fs-4 text-danger"></i>
                                                                <span class="text-danger">Remover Contrato</span>
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