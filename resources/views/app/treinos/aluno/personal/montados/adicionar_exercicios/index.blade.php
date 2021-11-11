@extends('app.main_template')

@section('content')
    
    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')
    
    <section class="section">
        <div class="row">

            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Treino do Aluno {{ strtoupper($treino->aluno->nome) }}</b></h4>

                                <div class="mt-3">
                                    <a href="{{ route('montar.index') }}" class="btn btn-sm text-white" style="font-weight: 700; background: #4154f1;">Voltar</a>
                                    <a href="#" class="btn btn-sm text-white" data-bs-toggle="modal" data-bs-target="#createAluno" style="font-weight: 700; background: #4154f1;">Adicionar +</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mt-5">

                            <div class="col-3">
                                <a href="{{ route('adicionar.create', ['divisao' => 'treino_a', 'treino_id' => $treino->id]) }}" class="btn btn-sm btn-info">Treino A</a>
                            </div>

                            @if($treino->divisao >= 2)
                            <div class="col-3">
                                <a href="{{ route('adicionar.create', ['divisao' => 'treino_b', 'treino_id' => $treino->id]) }}" class="btn btn-sm btn-info">Treino B</a>
                            </div>
                            @endif

                            @if($treino->divisao >= 3)
                            <div class="col-3">
                                <a href="{{ route('adicionar.create', ['divisao' => 'treino_c', 'treino_id' => $treino->id]) }}" class="btn btn-sm btn-info">Treino C</a>
                            </div>
                            @endif

                            @if($treino->divisao >= 4)
                            <div class="col-3">
                                <a href="{{ route('adicionar.create', ['divisao' => 'treino_d', 'treino_id' => $treino->id]) }}" class="btn btn-sm btn-info">Treino D</a>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection