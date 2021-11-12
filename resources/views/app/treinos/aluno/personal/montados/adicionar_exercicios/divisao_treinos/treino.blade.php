@extends('app.main_template')

@section('content')
    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    {{-- Exercicios --}}
    <section class="section">
        <div class="row">
            <div class="card">
                <h5 class="card-title text-center">{{ $treino->aluno->nome }} - {{ strtoupper(str_replace('_', ' ', $divisao_treino)) }}</h5>

                <form action="{{ route('adicionar.store', ['divisao' => $divisao_treino, 'treino_id' => $treino->id]) }}" method="post">

                    {{-- Tabs com Categorias de Treinos A --}}
                    <div class="card-body">
                        <!-- Botões com Categorias de Treino -->
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                            {{-- Todas as Categorias --}}
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="todas-categorias-tab" data-bs-toggle="pill" data-bs-target="#todas-as-categorias" type="button" role="tab" aria-controls="todas-as-categorias" aria-selected="true">TODOS</button>
                            </li>

                            {{-- Foreach com Cada Categoria de Treino --}}
                            @foreach ($categoriaTreinos as $cat)
                                @php
                                    $limpar = $cat->nome_categoria_treino;
                                    $comAcentos = ['à', 'á', 'â', 'ã', 'ç', 'è', 'é', 'ê', 'ì', 'í', 'î', 'ò', 'ó', 'ô', 'õ', 'ù', 'ú', 'À', 'Á', 'Â', 'Ã', 'Ç', 'È', 'É', 'Ê', 'Ì', 'Í', 'Î', 'Ò', 'Ó', 'Ô', 'Õ', 'Ù', 'Ú'];
                                    $semAcentos = ['a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'U', 'U'];
                                    $categoria = str_replace($comAcentos, $semAcentos, $limpar);
                                @endphp
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="{{ strtolower($categoria) }}-tab" data-bs-toggle="pill" data-bs-target="#{{ strtolower($categoria) }}" type="button" role="tab" aria-controls="{{ strtolower($categoria) }}" aria-selected="false">{{ strtoupper($cat->nome_categoria_treino) }}</button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                
                    <div class="row">
                        <!-- Conteudo do Tab -->
                        <div class="col-6" style="max-height: 500px; overflow-y: auto;">
                            <div class="card-body">
                                <div class="tab-content pt-2" id="myTabContent">

                                    {{-- Todos --}}
                                    <div class="tab-pane fade show active vflipper" id="todas-as-categorias" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <table class="table table-sm">
                                            <h5 class="card-title text-muted">Exercícios</h5>
                                            <tbody>
                                                @foreach ($exercicioTreinos as $exercicio)
                                                    <tr class="vback" id="val">
                                                        <td class="text-muted p-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="{{ $exercicio->id }}"
                                                                    value="{{ $exercicio->nome_exercicio }}"
                                                                    id="todas_{{ $exercicio->id }}">
                                                                <label class="form-check-label" for="todas_{{ $exercicio->id }}">
                                                                    {{ $exercicio->nome_exercicio }}
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    {{-- Categoria --}}
                                    @foreach ($categoriaTreinos as $cat)
                                        @php
                                            $limpar = $cat->nome_categoria_treino;
                                            $comAcentos = ['à', 'á', 'â', 'ã', 'ç', 'è', 'é', 'ê', 'ì', 'í', 'î', 'ò', 'ó', 'ô', 'õ', 'ù', 'ú', 'À', 'Á', 'Â', 'Ã', 'Ç', 'È', 'É', 'Ê', 'Ì', 'Í', 'Î', 'Ò', 'Ó', 'Ô', 'Õ', 'Ù', 'Ú'];
                                            $semAcentos = ['a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'U', 'U'];
                                            $categoria = str_replace($comAcentos, $semAcentos, $limpar);
                                            
                                        @endphp
                                        <div class="tab-pane fade" id="{{ strtolower($categoria) }}"
                                            role="tabpanel" aria-labelledby="profile-tab">
                                            <table class="table table-sm">
                                                <h5 class="card-title text-muted">Exercícios
                                                </h5>
                                                <tbody>
                                                    @php
                                                        $exercicios = App\Models\Treinos\ExercicioTreinos::where('categoria_treino_id', $cat->id)
                                                            ->orderBy('nome_exercicio', 'ASC')
                                                            ->get();
                                                    @endphp
                                                    @foreach ($exercicios as $exercicio)
                                                    <tr class="vback" id="val">
                                                        <td class="text-muted p-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="{{ $exercicio->id }}"
                                                                    value="{{ $exercicio->nome_exercicio }}"
                                                                    id="cat_{{ $exercicio->id }}">
                                                                <label class="form-check-label" for="cat_{{ $exercicio->id }}">
                                                                    {{ $exercicio->nome_exercicio }}
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>

                                            </table>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <!-- Conteudos Selecionados do Tab -->
                        <div class="col-6" style="max-height: 500px; overflow-y: auto;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="card-title text-muted">Selecionados</h5>
                                    </div>
                                    <div>
                                        <table class="vclick vfront">
                                            <tbody>
                                                <td style="font-weight: bold; color: rgb(180, 140, 226); white-space: pre-line;" id=lbl></td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Footer com Button Submit --}}
                    <div class="card-footer">
                        <div class="row">
                            <div class="d-flex justify-content-end">
                                <input type="submit" value="Adicionar" class="btn btn-sm btn-success vclick">
                            </div>
                        </div>
                    </div>

                </form>
            </div>
    </section>

@endsection
