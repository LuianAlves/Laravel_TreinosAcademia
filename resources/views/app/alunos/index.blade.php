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
                                <h4 class="card-title">Lista de Alunos</h4>
                                <a href="{{ route('alunos.create') }}" class="btn btn-sm text-white" style="font-weight: 700; background: #4154f1; padding-top: 3px;">Novo Aluno +</a>
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
                                    <th class="text-center" scope="col">Action</th>
                                    <th class="text-center" scope="col">X</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alunos as $aluno)
                                    <tr>
                                        <th class="text-muted">{{ $aluno->codigo_aluno }}</th>
                                        {{-- <th>{{ $aluno->user->name }}</th> --}}
                                        <td class="text-center">{{ $aluno->nome }}</td>
                                        <td class="text-center">{{ $aluno->telefone }}</td>
                                        <td class="text-center"><b>{{ ucfirst($aluno->tipo_treino) }}</b></td>
                                        <td class="text-center">
                                            <a title="Visualizar Informações" href="#" class="text-info" data-bs-toggle="modal" data-bs-target="#showAluno" id="{{$aluno->id}}" onclick="visualizarAluno(this.id)"><i class="bx bx-minus-front" style="font-size: 26px;"></i></a>
                                            <a title="Edit Informações" href="{{ route('alunos.edit', $aluno->id) }}" class="text-primary"><i class="bx bx-edit" style="font-size: 26px;"></i></a>
                                            <a title="Montar Treino" href="" class="text-warning"><i class="bx bx-dumbbell" style="font-size: 26px;"></i></a>
                                            <a title="Pagamentos" href="" class="text-success"><i class="bx bx-dollar-circle" style="font-size: 26px;"></i></a>
                                            <a title="Montar Contrato" href="" class="text-orange" style="color: rgb(172, 112, 2);"><i class="bx bx-notepad" style="font-size: 26px;"></i></a>
                                        </td>
                                        <td>
                                            <form id="form_{{$aluno->id}}" action="{{ route('alunos.destroy', $aluno->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                                <a title="Remover Aluno" href="#" onclick="document.getElementById('form_{{$aluno->id}}').submit()" class="text-danger"><i class="bx bx-block" style="font-size: 26px;"></i></a>
                                            </form>
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
