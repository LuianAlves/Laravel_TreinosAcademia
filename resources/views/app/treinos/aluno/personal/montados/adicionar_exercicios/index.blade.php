@extends('app.main_template')

@section('content')
    
    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row">

            {{-- BUTTONS --}}
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Treinos do Aluno {{ strtoupper($treino->aluno->nome) }}</b></h4>

                                <div class="mt-3">
                                    <a href="{{ route('montar.index') }}" class="btn btn-sm text-white" style="font-weight: 700; background: #4154f1;">Voltar</a>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-around mt-4">

                            <div class="col-3">
                                <a href="{{ route('adicionar.create', ['divisao' => 'treino_a', 'treino_id' => $treino->id]) }}" class="btn btn-sm" id="button-treinos">Treino A</a>
                            </div>

                            @if($treino->divisao >= 2)
                            <div class="col-3">
                                <a href="{{ route('adicionar.create', ['divisao' => 'treino_b', 'treino_id' => $treino->id]) }}" class="btn btn-sm" id="button-treinos">Treino B</a>
                            </div>
                            @endif

                            @if($treino->divisao >= 3)
                            <div class="col-3">
                                <a href="{{ route('adicionar.create', ['divisao' => 'treino_c', 'treino_id' => $treino->id]) }}" class="btn btn-sm" id="button-treinos">Treino C</a>
                            </div>
                            @endif

                            @if($treino->divisao >= 4)
                            <div class="col-3">
                                <a href="{{ route('adicionar.create', ['divisao' => 'treino_d', 'treino_id' => $treino->id]) }}" class="btn btn-sm" id="button-treinos">Treino D</a>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            {{-- LISTA DE EXERCICIOS - TREINO A --}}
            <div class="col-12" style="margin-top: 15px; max-height: 500px; overflow-y: auto;">
                <div class="card">
                    <div class="card-header">Treino A</div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th class="text-muted" width="40%">Exercícios</th>
                                    <th class="text-center" width="25%">Séries</th>
                                    <th class="text-center">Repetições</th>
                                    <th class="text-center serie" style="display: none; width: 50px;">Editar Séries</th>
                                    <th class="text-center repeticao" style="display: none;">Editar Repetições</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 18px; font-family: 'Poppins', sans-serif;">
                                @foreach($treino_a as $treino)
                                    <tr>
                                        <td>{{ $treino->exercicio->nome_exercicio }}</td>

                                        {{-- Séries --}}
                                        <td>
                                            <div class="row">
                                                <div class="d-flex justify-content-around">
                                                    {{ $treino->serie }} x
                                                    <a href="#" id="edit_serie" onclick="$('.serie').slideToggle(function(){$('#edit_serie')});"><i class="bx bx-message-square-edit text-warning fs-5"></i></a>
                                                </div>
                                            </div>
                                        </td>

                                        {{-- Repetições --}}
                                        <td class="text-center">
                                            <div class="row">
                                                <div class="d-flex justify-content-around">
                                                    {{ $treino->repeticao }}
                                                    <a href="#" id="edit_repeticao" onclick="$('.repeticao').slideToggle(function(){$('#edit_repeticao')});"><i class="bx bx-message-square-edit text-warning fs-5"></i></a>
                                                </div>
                                            </div>
                                        </td>

                                        <form action="{{ route('adicionar.update', ['id' => $treino->id, 'exercicio_id' => $treino->exercicio_id]) }}" method="post">
                                            @csrf

                                            {{-- Editar Séries --}}
                                            <td class="serie text-center" style="font-size: 18px; display: none;">
                                                <div class="row">
                                                    <div class="d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-sm btn-success"><i class="bx bx-check"></i></button>
                                                        <input type="number" min="1" name="serie" class="text-center" style="width: 75px; height: 30px;" value="{{ $treino->serie }}">
                                                    </div>
                                                </div>
                                            </td>

                                            {{-- Editar Repetições --}}
                                            <td class="repeticao text-center" style="font-size: 18px; display: none;">
                                                <div class="row">
                                                    <div class="d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-sm btn-success"><i class="bx bx-check"></i></button>
                                                        <input type="number" min="1" name="repeticao" class="text-center" style="width: 85px; height: 30px;" value="{{ $treino->repeticao }}">
                                                    </div>
                                                </div>
                                            </td>
                                        </form>
                                        <td class="text-center">
                                            <a href="{{ route('adicionar.destroy', ['id' => $treino->id, 'exercicio_id' => $treino->exercicio_id]) }}"><i class="bx bx-block fs-5 text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- LISTA DE EXERCICIOS - TREINO B --}}
            <div class="col-12" style="margin-top: 15px; max-height: 500px; overflow-y: auto;">
                <div class="card">
                    <div class="card-header">Treino B</div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th class="text-muted" width="40%">Exercícios</th>
                                    <th class="text-center" width="25%">Séries</th>
                                    <th class="text-center">Repetições</th>
                                    <th class="text-center serie" style="display: none; width: 50px;">Editar Séries</th>
                                    <th class="text-center repeticao" style="display: none;">Editar Repetições</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 18px; font-family: 'Poppins', sans-serif;">
                                @foreach($treino_b as $treino)
                                    <tr>
                                        <td>{{ $treino->exercicio->nome_exercicio }}</td>

                                        {{-- Séries --}}
                                        <td>
                                            <div class="row">
                                                <div class="d-flex justify-content-around">
                                                    {{ $treino->serie }} x
                                                    <a href="#" id="edit_serie" onclick="$('.serie').slideToggle(function(){$('#edit_serie')});"><i class="bx bx-message-square-edit text-warning fs-5"></i></a>
                                                </div>
                                            </div>
                                        </td>

                                        {{-- Repetições --}}
                                        <td class="text-center">
                                            <div class="row">
                                                <div class="d-flex justify-content-around">
                                                    {{ $treino->repeticao }}
                                                    <a href="#" id="edit_repeticao" onclick="$('.repeticao').slideToggle(function(){$('#edit_repeticao')});"><i class="bx bx-message-square-edit text-warning fs-5"></i></a>
                                                </div>
                                            </div>
                                        </td>

                                        <form action="{{ route('adicionar.update', ['id' => $treino->id, 'exercicio_id' => $treino->exercicio_id]) }}" method="post">
                                            @csrf

                                            {{-- Editar Séries --}}
                                            <td class="serie text-center" style="font-size: 18px; display: none;">
                                                <div class="row">
                                                    <div class="d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-sm btn-success"><i class="bx bx-check"></i></button>
                                                        <input type="number" min="1" name="serie" class="text-center" style="width: 75px; height: 30px;" value="{{ $treino->serie }}">
                                                    </div>
                                                </div>
                                            </td>

                                            {{-- Editar Repetições --}}
                                            <td class="repeticao text-center" style="font-size: 18px; display: none;">
                                                <div class="row">
                                                    <div class="d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-sm btn-success"><i class="bx bx-check"></i></button>
                                                        <input type="number" min="1" name="repeticao" class="text-center" style="width: 85px; height: 30px;" value="{{ $treino->repeticao }}">
                                                    </div>
                                                </div>
                                            </td>
                                        </form>
                                        <td class="text-center">
                                            <a href="{{ route('adicionar.destroy', ['id' => $treino->id, 'exercicio_id' => $treino->exercicio_id]) }}"><i class="bx bx-block fs-5 text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- LISTA DE EXERCICIOS - TREINO C --}}
            <div class="col-12" style="margin-top: 15px; max-height: 500px; overflow-y: auto;">
                <div class="card">
                    <div class="card-header">Treino C</div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th class="text-muted" width="40%">Exercícios</th>
                                    <th class="text-center" width="25%">Séries</th>
                                    <th class="text-center">Repetições</th>
                                    <th class="text-center serie" style="display: none; width: 50px;">Editar Séries</th>
                                    <th class="text-center repeticao" style="display: none;">Editar Repetições</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 18px; font-family: 'Poppins', sans-serif;">
                                @foreach($treino_c as $treino)
                                    <tr>
                                        <td>{{ $treino->exercicio->nome_exercicio }}</td>

                                        {{-- Séries --}}
                                        <td>
                                            <div class="row">
                                                <div class="d-flex justify-content-around">
                                                    {{ $treino->serie }} x
                                                    <a href="#" id="edit_serie" onclick="$('.serie').slideToggle(function(){$('#edit_serie')});"><i class="bx bx-message-square-edit text-warning fs-5"></i></a>
                                                </div>
                                            </div>
                                        </td>

                                        {{-- Repetições --}}
                                        <td class="text-center">
                                            <div class="row">
                                                <div class="d-flex justify-content-around">
                                                    {{ $treino->repeticao }}
                                                    <a href="#" id="edit_repeticao" onclick="$('.repeticao').slideToggle(function(){$('#edit_repeticao')});"><i class="bx bx-message-square-edit text-warning fs-5"></i></a>
                                                </div>
                                            </div>
                                        </td>

                                        <form action="{{ route('adicionar.update', ['id' => $treino->id, 'exercicio_id' => $treino->exercicio_id]) }}" method="post">
                                            @csrf

                                            {{-- Editar Séries --}}
                                            <td class="serie text-center" style="font-size: 18px; display: none;">
                                                <div class="row">
                                                    <div class="d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-sm btn-success"><i class="bx bx-check"></i></button>
                                                        <input type="number" min="1" name="serie" class="text-center" style="width: 75px; height: 30px;" value="{{ $treino->serie }}">
                                                    </div>
                                                </div>
                                            </td>

                                            {{-- Editar Repetições --}}
                                            <td class="repeticao text-center" style="font-size: 18px; display: none;">
                                                <div class="row">
                                                    <div class="d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-sm btn-success"><i class="bx bx-check"></i></button>
                                                        <input type="number" min="1" name="repeticao" class="text-center" style="width: 85px; height: 30px;" value="{{ $treino->repeticao }}">
                                                    </div>
                                                </div>
                                            </td>
                                        </form>
                                        <td class="text-center">
                                            <a href="{{ route('adicionar.destroy', ['id' => $treino->id, 'exercicio_id' => $treino->exercicio_id]) }}"><i class="bx bx-block fs-5 text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- LISTA DE EXERCICIOS - TREINO D --}}
            <div class="col-12" style="margin-top: 15px; max-height: 500px; overflow-y: auto;">
                <div class="card">
                    <div class="card-header">Treino D</div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th class="text-muted" width="40%">Exercícios</th>
                                    <th class="text-center" width="25%">Séries</th>
                                    <th class="text-center">Repetições</th>
                                    <th class="text-center serie" style="display: none; width: 50px;">Editar Séries</th>
                                    <th class="text-center repeticao" style="display: none;">Editar Repetições</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 18px; font-family: 'Poppins', sans-serif;">
                                @foreach($treino_d as $treino)
                                    <tr>
                                        <td>{{ $treino->exercicio->nome_exercicio }}</td>

                                        {{-- Séries --}}
                                        <td>
                                            <div class="row">
                                                <div class="d-flex justify-content-around">
                                                    {{ $treino->serie }} x
                                                    <a href="#" id="edit_serie" onclick="$('.serie').slideToggle(function(){$('#edit_serie')});"><i class="bx bx-message-square-edit text-warning fs-5"></i></a>
                                                </div>
                                            </div>
                                        </td>

                                        {{-- Repetições --}}
                                        <td class="text-center">
                                            <div class="row">
                                                <div class="d-flex justify-content-around">
                                                    {{ $treino->repeticao }}
                                                    <a href="#" id="edit_repeticao" onclick="$('.repeticao').slideToggle(function(){$('#edit_repeticao')});"><i class="bx bx-message-square-edit text-warning fs-5"></i></a>
                                                </div>
                                            </div>
                                        </td>

                                        <form action="{{ route('adicionar.update', ['id' => $treino->id, 'exercicio_id' => $treino->exercicio_id]) }}" method="post">
                                            @csrf

                                            {{-- Editar Séries --}}
                                            <td class="serie text-center" style="font-size: 18px; display: none;">
                                                <div class="row">
                                                    <div class="d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-sm btn-success"><i class="bx bx-check"></i></button>
                                                        <input type="number" min="1" name="serie" class="text-center" style="width: 75px; height: 30px;" value="{{ $treino->serie }}">
                                                    </div>
                                                </div>
                                            </td>

                                            {{-- Editar Repetições --}}
                                            <td class="repeticao text-center" style="font-size: 18px; display: none;">
                                                <div class="row">
                                                    <div class="d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-sm btn-success"><i class="bx bx-check"></i></button>
                                                        <input type="number" min="1" name="repeticao" class="text-center" style="width: 85px; height: 30px;" value="{{ $treino->repeticao }}">
                                                    </div>
                                                </div>
                                            </td>
                                        </form>
                                        <td class="text-center">
                                            <a href="{{ route('adicionar.destroy', ['id' => $treino->id, 'exercicio_id' => $treino->exercicio_id]) }}"><i class="bx bx-block fs-5 text-danger"></i></a>
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
