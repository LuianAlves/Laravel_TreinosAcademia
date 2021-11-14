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
                    <div class="card-header">
                        <div class="row justify-content-between" style="font-size: 16px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #6776f4;">
                            <div class="col-6">
                                <h5>Treino A</h5>
                            </div>
                            @if($treinos == 'treino_a')
                                <div class="col-1">
                                    <a href="{{ route('download.personal', ['divisao' => 'treino_a', 'treino_id' => $treino->id]) }}">PDF</a> 
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th class="text-muted" width="40%">Exercícios</th>
                                    <th class="text-center" width="25%">Séries</th>
                                    <th class="text-center">Repetições</th>
                                    <th class="text-center serie_a" style="display: none; width: 50px;">Editar Séries</th>
                                    <th class="text-center repeticao_a" style="display: none;">Editar Repetições</th>
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
                                                    <a href="#" id="edit_serie_a" onclick="$('.serie_a').slideToggle(function(){$('#edit_serie_a')});"><i class="bx bx-message-square-edit text-success fs-5"></i></a>
                                                </div>
                                            </div>
                                        </td>

                                        {{-- Repetições --}}
                                        <td class="text-center">
                                            <div class="row">
                                                <div class="d-flex justify-content-around">
                                                    {{ $treino->repeticao }}
                                                    <a href="#" id="edit_repeticao_a" onclick="$('.repeticao_a').slideToggle(function(){$('#edit_repeticao_a')});"><i class="bx bx-message-square-edit text-success fs-5"></i></a>
                                                </div>
                                            </div>
                                        </td>

                                        <form action="{{ route('adicionar.update', ['id' => $treino->id, 'exercicio_id' => $treino->exercicio_id]) }}" method="post">
                                            @csrf

                                            {{-- Editar Séries --}}
                                            <td class="serie_a text-center" style="font-size: 18px; display: none;">
                                                <div class="row">
                                                    <div class="d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-sm btn-success"><i class="bx bx-check"></i></button>
                                                        <input type="number" min="1" name="serie" class="text-center" style="width: 75px; height: 30px;" value="{{ $treino->serie }}">
                                                    </div>
                                                </div>
                                            </td>

                                            {{-- Editar Repetições --}}
                                            <td class="repeticao_a text-center" style="font-size: 18px; display: none;">
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
                        <div class="card-header">
                            <div class="row justify-content-between" style="font-size: 16px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #6776f4;">
                                <div class="col-6">
                                    <h5>Treino B</h5>
                                </div>
                                <div class="col-1">
                                    {{-- <a href="{{ route('download.personal', ['divisao' => 'treino_b', 'treino_id' => $treino->treino_id]) }}">PDF </a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-muted" width="40%">Exercícios</th>
                                        <th class="text-center" width="25%">Séries</th>
                                        <th class="text-center">Repetições</th>
                                        <th class="text-center serie_a" style="display: none; width: 50px;">Editar Séries</th>
                                        <th class="text-center repeticao_a" style="display: none;">Editar Repetições</th>
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
                                                        <a href="#" id="edit_serie_b" onclick="$('.serie_b').slideToggle(function(){$('#edit_serie_b')});"><i class="bx bx-message-square-edit text-success fs-5"></i></a>
                                                    </div>
                                                </div>
                                            </td>

                                            {{-- Repetições --}}
                                            <td class="text-center">
                                                <div class="row">
                                                    <div class="d-flex justify-content-around">
                                                        {{ $treino->repeticao }}
                                                        <a href="#" id="edit_repeticao_b" onclick="$('.repeticao_b').slideToggle(function(){$('#edit_repeticao_b')});"><i class="bx bx-message-square-edit text-success fs-5"></i></a>
                                                    </div>
                                                </div>
                                            </td>

                                            <form action="{{ route('adicionar.update', ['id' => $treino->id, 'exercicio_id' => $treino->exercicio_id]) }}" method="post">
                                                @csrf

                                                {{-- Editar Séries --}}
                                                <td class="serie_b text-center" style="font-size: 18px; display: none;">
                                                    <div class="row">
                                                        <div class="d-flex justify-content-center">
                                                            <button type="submit" class="btn btn-sm btn-success"><i class="bx bx-check"></i></button>
                                                            <input type="number" min="1" name="serie" class="text-center" style="width: 75px; height: 30px;" value="{{ $treino->serie }}">
                                                        </div>
                                                    </div>
                                                </td>

                                                {{-- Editar Repetições --}}
                                                <td class="repeticao_b text-center" style="font-size: 18px; display: none;">
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
                        <div class="card-header">
                            <div class="row justify-content-between" style="font-size: 16px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #6776f4;">
                                <div class="col-6">
                                    <h5>Treino C</h5>
                                </div>
                                <div class="col-1">
                                    {{-- <a href="{{ route('download.personal', ['divisao' => 'treino_c', 'treino_id' => $treino->treino_id]) }}">PDF</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-muted" width="40%">Exercícios</th>
                                        <th class="text-center" width="25%">Séries</th>
                                        <th class="text-center">Repetições</th>
                                        <th class="text-center serie_a" style="display: none; width: 50px;">Editar Séries</th>
                                        <th class="text-center repeticao_a" style="display: none;">Editar Repetições</th>
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
                                                        <a href="#" id="edit_serie_c" onclick="$('.serie_c').slideToggle(function(){$('#edit_serie_c')});"><i class="bx bx-message-square-edit text-success fs-5"></i></a>
                                                    </div>
                                                </div>
                                            </td>

                                            {{-- Repetições --}}
                                            <td class="text-center">
                                                <div class="row">
                                                    <div class="d-flex justify-content-around">
                                                        {{ $treino->repeticao }}
                                                        <a href="#" id="edit_repeticao_c" onclick="$('.repeticao_c').slideToggle(function(){$('#edit_repeticao_c')});"><i class="bx bx-message-square-edit text-success fs-5"></i></a>
                                                    </div>
                                                </div>
                                            </td>

                                            <form action="{{ route('adicionar.update', ['id' => $treino->id, 'exercicio_id' => $treino->exercicio_id]) }}" method="post">
                                                @csrf

                                                {{-- Editar Séries --}}
                                                <td class="serie_c text-center" style="font-size: 18px; display: none;">
                                                    <div class="row">
                                                        <div class="d-flex justify-content-center">
                                                            <button type="submit" class="btn btn-sm btn-success"><i class="bx bx-check"></i></button>
                                                            <input type="number" min="1" name="serie" class="text-center" style="width: 75px; height: 30px;" value="{{ $treino->serie }}">
                                                        </div>
                                                    </div>
                                                </td>

                                                {{-- Editar Repetições --}}
                                                <td class="repeticao_c text-center" style="font-size: 18px; display: none;">
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
                        <div class="card-header">
                            <div class="row justify-content-between" style="font-size: 16px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #6776f4;">
                                <div class="col-6">
                                    <h5>Treino D</h5>
                                </div>
                                <div class="col-1">
                                    {{-- <a href="{{ route('download.personal', ['divisao' => 'treino_d', 'treino_id' => $treino->treino_id]) }}">PDF</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-muted" width="40%">Exercícios</th>
                                        <th class="text-center" width="25%">Séries</th>
                                        <th class="text-center">Repetições</th>
                                        <th class="text-center serie_a" style="display: none; width: 50px;">Editar Séries</th>
                                        <th class="text-center repeticao_a" style="display: none;">Editar Repetições</th>
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
                                                        <a href="#" id="edit_serie_d" onclick="$('.serie_d').slideToggle(function(){$('#edit_serie_d')});"><i class="bx bx-message-square-edit text-success fs-5"></i></a>
                                                    </div>
                                                </div>
                                            </td>

                                            {{-- Repetições --}}
                                            <td class="text-center">
                                                <div class="row">
                                                    <div class="d-flex justify-content-around">
                                                        {{ $treino->repeticao }}
                                                        <a href="#" id="edit_repeticao_d" onclick="$('.repeticao_d').slideToggle(function(){$('#edit_repeticao_d')});"><i class="bx bx-message-square-edit text-success fs-5"></i></a>
                                                    </div>
                                                </div>
                                            </td>

                                            <form action="{{ route('adicionar.update', ['id' => $treino->id, 'exercicio_id' => $treino->exercicio_id]) }}" method="post">
                                                @csrf

                                                {{-- Editar Séries --}}
                                                <td class="serie_d text-center" style="font-size: 18px; display: none;">
                                                    <div class="row">
                                                        <div class="d-flex justify-content-center">
                                                            <button type="submit" class="btn btn-sm btn-success"><i class="bx bx-check"></i></button>
                                                            <input type="number" min="1" name="serie" class="text-center" style="width: 75px; height: 30px;" value="{{ $treino->serie }}">
                                                        </div>
                                                    </div>
                                                </td>

                                                {{-- Editar Repetições --}}
                                                <td class="repeticao_d text-center" style="font-size: 18px; display: none;">
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
