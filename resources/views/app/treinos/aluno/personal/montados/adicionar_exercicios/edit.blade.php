@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row">

            <div class="card">
                <div class="card-header">{{ $treino->exercicio->nome_exercicio }}</div>

                <div class="card-body">

                    <form action="{{ route('adicionar.update', ['id' => $treino->id, 'exercicio_id' => $treino->exercicio_id]) }}" method="post">
                        {{-- Repetição/Série --}}
                        <div class="row m-3">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="number" name="serie" class="form-control" placeholder="Série" value="{{ $treino->serie }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">@</span>
                                    <input type="number" name="repeticao" class="form-control" placeholder="Repetição" value="{{ $treino->repeticao }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <button type="submit">Editar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </section>
@endsection
