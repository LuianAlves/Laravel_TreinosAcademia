@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row">
            <div class="card mt-3">
                <h5 class="card-title text-center">Informações do Aluno</h5>
                <div class="card-body">
                    <div class="list-group m-3">
                        <li class="list-group-item">{{ $alunos->nome }}</li>
                        <li class="list-group-item">{{ $alunos->email }}</li>
                        <li class="list-group-item">{{ $alunos->telefone }}</li>
                        <li class="list-group-item">{{ $alunos->objetivo }}</li>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row m-3">
                        <form action="{{ route('treino.store', $alunos->id) }}" method="post">
                            @csrf

                            <div class="col-6">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-dumbbell"></i></span>
                                    <input type="text" class="form-control" placeholder="Nome do Treino"
                                        name="nome_treino">
                                </div>
                                @error('nome_treino')
                                    <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <h5 class="card-title">Professor</h5>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="professor"
                                                id="jessica" value="1" checked="">
                                            <label class="form-check-label" for="jessica">
                                                Jessica
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="professor"
                                                id="paulo" value="2" checked="">
                                            <label class="form-check-label" for="paulo">
                                                Paulo
                                            </label>
                                        </div>
                                    </div>                             
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <button type="submit" class="btn btn-sm btn-success" style="width: 150px;">Criar
                                    Treino</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
