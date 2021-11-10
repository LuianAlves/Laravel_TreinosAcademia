@extends('app.main_template')

@section('content')
    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    {{-- Exercicios --}}
    <section class="section">
        <div class="row">
            <div class="card">
                <h5 class="card-title text-center">Treinos</h5>
                <div class="card-body">
                    <div class="row m-4">
    
                        {{-- ADICIONAR FOREACH COM ID DO ALUNO E TODOS OS TREINOS VINCULADOS AO SEU ID --}}
    
                                <script>
    
                                    $(document).ready(function(){
                                    $('.vclick').click(function(){
                                        $(this).closest('.vflipper').toggleClass('vflip');
                                    });
                                    
                                
                                    //
                                    // Listen for change event 
                                    //
                                    $('.vback :checkbox').on('change', function(e) {
                                        //
                                        // get the labels list of all  checked elements
                                        //
                                        var result = $('.vback :checkbox:checked').map(function(index, element) {
                                        if (element.checked) {
                                            return element.parentNode.textContent;
                                        }
                                        }).get();
                                        
                                        //
                                        // add this text to the label
                                        //
                                        $('#lbl').text(result.join(', '))
                                    })
                                    }); 
    
                                </script>
    
                        {{-- Treino A --}}
                        <div class="col-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#treino_a">
                                Treino A
                            </button>
                        </div>
    
                        <div class="modal fade" id="treino_a" tabindex="-1" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="card-title text-center">Adicionar exercícios ao treino A</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
    
                                    <form action="{{ route('treino_a.exercicio.store', $codigo) }}" method="post">                               
    
                                        <div class="modal-body">
                                            {{-- Tabs com Categorias de Treinos A --}}
                                            <div class="card">
                                                <div class="card-body">
    
                                                    <!-- Botões com Categorias de Treino -->
                                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    
                                                        {{-- Todas as Categorias --}}
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" id="todas-categorias-tab"
                                                                data-bs-toggle="pill" data-bs-target="#todas-as-categorias"
                                                                type="button" role="tab" aria-controls="todas-as-categorias"
                                                                aria-selected="true">TODOS</button>
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
                                                                <button class="nav-link"
                                                                    id="{{ strtolower($categoria) }}-tab" data-bs-toggle="pill"
                                                                    data-bs-target="#{{ strtolower($categoria) }}" type="button"
                                                                    role="tab" aria-controls="{{ strtolower($categoria) }}"
                                                                    aria-selected="false">{{ strtoupper($cat->nome_categoria_treino) }}</button>
                                                            </li>
                                                        @endforeach
                                                    </ul>
    
                                                </div>
                                            </div>
    
                                            <div class="row">
                                                <!-- Conteudo do Tab -->
                                                <div class="col-6" style="max-height: 500px; overflow-y: auto;">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="tab-content pt-2" id="myTabContent">
    
                                                                {{-- Todos --}}
                                                                <div class="tab-pane fade show active vflipper"id="todas-as-categorias" role="tabpanel" aria-labelledby="home-tab">
                                                                    <table class="table table-sm">
                                                                        <h5 class="card-title text-muted">Exercícios</h5>
                                                                        <tbody>
                                                                            @foreach ($exercicioTreinos as $exercicio)
                                                                                <tr class="vback" id="val">
                                                                                    <td class="text-muted p-3">
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="checkbox" name="{{ $exercicio->id }}" value="{{ $exercicio->nome_exercicio }}" id="{{ $exercicio->id }}">
                                                                                            <label class="form-check-label" for="{{ $exercicio->id }}">
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
                                                                    <div class="tab-pane fade  vflipper" id="{{ strtolower($categoria) }}" role="tabpanel" aria-labelledby="profile-tab">
                                                                        <table class="table table-sm">
                                                                            <h5 class="card-title text-muted">Exercícios</h5>
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
                                                                                                <input class="form-check-input" type="checkbox" name="{{ $exercicio->id }}" value="{{ $exercicio->nome_exercicio }}" id="{{ $exercicio->id }}">
                                                                                                <label class="form-check-label" for="{{ $exercicio->id }}">
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
                                                </div>
    
                                                <!-- Conteudos Selecionados do Tab -->
                                                <div class="col-6" style="max-height: 500px; overflow-y: auto;">
    
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <h5 class="card-title text-muted">Selecionados</h5>
                                                                </div>
                                                                <div>
                                                                    <table class="vclick vfront">
                                                                        <tbody>
                                                                            <tr class="text-success" id=lbl></tr>                                                                    
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                </div>
    
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="pull-right"><input type="submit" value="Adicionar" class="btn btn-sm btn-success vclick"></div>
                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
    
                        {{-- Treino B --}}
                        <div class="col-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#treino_b">
                                Treino B
                            </button>
                        </div>
    
                        <div class="modal fade" id="treino_b" tabindex="-1" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="card-title text-center">Adicionar exercícios ao treino B</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
    
                                    <form action="{{ route('treino_b.exercicio.store', $codigo) }}" method="post">                               
    
                                        <div class="modal-body">
                                            {{-- Tabs com Categorias de Treinos A --}}
                                            <div class="card">
                                                <div class="card-body">
    
                                                    <!-- Botões com Categorias de Treino -->
                                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    
                                                        {{-- Todas as Categorias --}}
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" id="todas-categorias-tab"
                                                                data-bs-toggle="pill" data-bs-target="#todas-as-categorias"
                                                                type="button" role="tab" aria-controls="todas-as-categorias"
                                                                aria-selected="true">TODOS</button>
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
                                                                <button class="nav-link"
                                                                    id="{{ strtolower($categoria) }}-tab" data-bs-toggle="pill"
                                                                    data-bs-target="#{{ strtolower($categoria) }}" type="button"
                                                                    role="tab" aria-controls="{{ strtolower($categoria) }}"
                                                                    aria-selected="false">{{ strtoupper($cat->nome_categoria_treino) }}</button>
                                                            </li>
                                                        @endforeach
                                                    </ul>
    
                                                </div>
                                            </div>
    
                                            <div class="row">
                                                <!-- Conteudo do Tab -->
                                                <div class="col-6" style="max-height: 500px; overflow-y: auto;">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="tab-content pt-2" id="myTabContent">
    
                                                                {{-- Todos --}}
                                                                <div class="tab-pane fade show active vflipper"id="todas-as-categorias" role="tabpanel" aria-labelledby="home-tab">
                                                                    <table class="table table-sm">
                                                                        <h5 class="card-title text-muted">Exercícios</h5>
                                                                        <tbody>
                                                                            @foreach ($exercicioTreinos as $exercicio)
                                                                                <tr class="vback" id="val">
                                                                                    <td class="text-muted p-3">
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="checkbox" name="{{ $exercicio->id }}" value="{{ $exercicio->nome_exercicio }}" id="{{ $exercicio->id }}">
                                                                                            <label class="form-check-label" for="{{ $exercicio->id }}">
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
                                                                    <div class="tab-pane fade  vflipper" id="{{ strtolower($categoria) }}" role="tabpanel" aria-labelledby="profile-tab">
                                                                        <table class="table table-sm">
                                                                            <h5 class="card-title text-muted">Exercícios</h5>
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
                                                                                                <input class="form-check-input" type="checkbox" name="{{ $exercicio->id }}" value="{{ $exercicio->nome_exercicio }}" id="{{ $exercicio->id }}">
                                                                                                <label class="form-check-label" for="{{ $exercicio->id }}">
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
                                                </div>
    
                                                <!-- Conteudos Selecionados do Tab -->
                                                <div class="col-6" style="max-height: 500px; overflow-y: auto;">
    
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <h5 class="card-title text-muted">Selecionados</h5>
                                                                </div>
                                                                <div>
                                                                    <table class="vclick vfront">
                                                                        <tbody>
                                                                            <tr class="text-success" id=lbl></tr>                                                                    
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                </div>
    
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="pull-right"><input type="submit" value="Adicionar" class="btn btn-sm btn-success vclick"></div>
                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
    
                        {{-- Treino C --}}
                        <div class="col-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#treino_c">
                                Treino C
                            </button>
                        </div>
    
                        <div class="modal fade" id="treino_c" tabindex="-1" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="card-title text-center">Adicionar exercícios ao treino C</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
    
                                    <form action="{{ route('treino_c.exercicio.store', $codigo) }}" method="post">                               
    
                                        <div class="modal-body">
                                            {{-- Tabs com Categorias de Treinos A --}}
                                            <div class="card">
                                                <div class="card-body">
    
                                                    <!-- Botões com Categorias de Treino -->
                                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    
                                                        {{-- Todas as Categorias --}}
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" id="todas-categorias-tab"
                                                                data-bs-toggle="pill" data-bs-target="#todas-as-categorias"
                                                                type="button" role="tab" aria-controls="todas-as-categorias"
                                                                aria-selected="true">TODOS</button>
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
                                                                <button class="nav-link"
                                                                    id="{{ strtolower($categoria) }}-tab" data-bs-toggle="pill"
                                                                    data-bs-target="#{{ strtolower($categoria) }}" type="button"
                                                                    role="tab" aria-controls="{{ strtolower($categoria) }}"
                                                                    aria-selected="false">{{ strtoupper($cat->nome_categoria_treino) }}</button>
                                                            </li>
                                                        @endforeach
                                                    </ul>
    
                                                </div>
                                            </div>
    
                                            <div class="row">
                                                <!-- Conteudo do Tab -->
                                                <div class="col-6" style="max-height: 500px; overflow-y: auto;">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="tab-content pt-2" id="myTabContent">
    
                                                                {{-- Todos --}}
                                                                <div class="tab-pane fade show active vflipper"id="todas-as-categorias" role="tabpanel" aria-labelledby="home-tab">
                                                                    <table class="table table-sm">
                                                                        <h5 class="card-title text-muted">Exercícios</h5>
                                                                        <tbody>
                                                                            @foreach ($exercicioTreinos as $exercicio)
                                                                                <tr class="vback" id="val">
                                                                                    <td class="text-muted p-3">
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="checkbox" name="{{ $exercicio->id }}" value="{{ $exercicio->nome_exercicio }}" id="{{ $exercicio->id }}">
                                                                                            <label class="form-check-label" for="{{ $exercicio->id }}">
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
                                                                    <div class="tab-pane fade  vflipper" id="{{ strtolower($categoria) }}" role="tabpanel" aria-labelledby="profile-tab">
                                                                        <table class="table table-sm">
                                                                            <h5 class="card-title text-muted">Exercícios</h5>
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
                                                                                                <input class="form-check-input" type="checkbox" name="{{ $exercicio->id }}" value="{{ $exercicio->nome_exercicio }}" id="{{ $exercicio->id }}">
                                                                                                <label class="form-check-label" for="{{ $exercicio->id }}">
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
                                                </div>
    
                                                <!-- Conteudos Selecionados do Tab -->
                                                <div class="col-6" style="max-height: 500px; overflow-y: auto;">
    
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <h5 class="card-title text-muted">Selecionados</h5>
                                                                </div>
                                                                <div>
                                                                    <table class="vclick vfront">
                                                                        <tbody>
                                                                            <tr class="text-success" id=lbl></tr>                                                                    
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                </div>
    
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="pull-right"><input type="submit" value="Adicionar" class="btn btn-sm btn-success vclick"></div>
                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
    
                        {{-- Treino D --}}
                        <div class="col-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#treino_d">
                                Treino D
                            </button>
                        </div>
    
                        <div class="modal fade" id="treino_d" tabindex="-1" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="card-title text-center">Adicionar exercícios ao treino D</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
    
                                    <form action="{{ route('treino_d.exercicio.store', $codigo) }}" method="post">                               
    
                                        <div class="modal-body">
                                            {{-- Tabs com Categorias de Treinos A --}}
                                            <div class="card">
                                                <div class="card-body">
    
                                                    <!-- Botões com Categorias de Treino -->
                                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    
                                                        {{-- Todas as Categorias --}}
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" id="todas-categorias-tab"
                                                                data-bs-toggle="pill" data-bs-target="#todas-as-categorias"
                                                                type="button" role="tab" aria-controls="todas-as-categorias"
                                                                aria-selected="true">TODOS</button>
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
                                                                <button class="nav-link"
                                                                    id="{{ strtolower($categoria) }}-tab" data-bs-toggle="pill"
                                                                    data-bs-target="#{{ strtolower($categoria) }}" type="button"
                                                                    role="tab" aria-controls="{{ strtolower($categoria) }}"
                                                                    aria-selected="false">{{ strtoupper($cat->nome_categoria_treino) }}</button>
                                                            </li>
                                                        @endforeach
                                                    </ul>
    
                                                </div>
                                            </div>
    
                                            <div class="row">
                                                <!-- Conteudo do Tab -->
                                                <div class="col-6" style="max-height: 500px; overflow-y: auto;">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="tab-content pt-2" id="myTabContent">
    
                                                                {{-- Todos --}}
                                                                <div class="tab-pane fade show active vflipper"id="todas-as-categorias" role="tabpanel" aria-labelledby="home-tab">
                                                                    <table class="table table-sm">
                                                                        <h5 class="card-title text-muted">Exercícios</h5>
                                                                        <tbody>
                                                                            @foreach ($exercicioTreinos as $exercicio)
                                                                                <tr class="vback" id="val">
                                                                                    <td class="text-muted p-3">
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="checkbox" name="{{ $exercicio->id }}" value="{{ $exercicio->nome_exercicio }}" id="{{ $exercicio->id }}">
                                                                                            <label class="form-check-label" for="{{ $exercicio->id }}">
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
                                                                    <div class="tab-pane fade  vflipper" id="{{ strtolower($categoria) }}" role="tabpanel" aria-labelledby="profile-tab">
                                                                        <table class="table table-sm">
                                                                            <h5 class="card-title text-muted">Exercícios</h5>
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
                                                                                                <input class="form-check-input" type="checkbox" name="{{ $exercicio->id }}" value="{{ $exercicio->nome_exercicio }}" id="{{ $exercicio->id }}">
                                                                                                <label class="form-check-label" for="{{ $exercicio->id }}">
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
                                                </div>
    
                                                <!-- Conteudos Selecionados do Tab -->
                                                <div class="col-6" style="max-height: 500px; overflow-y: auto;">
    
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <h5 class="card-title text-muted">Selecionados</h5>
                                                                </div>
                                                                <div>
                                                                    <table class="vclick vfront">
                                                                        <tbody>
                                                                            <tr class="text-success" id=lbl></tr>                                                                    
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                </div>
    
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="pull-right"><input type="submit" value="Adicionar" class="btn btn-sm btn-success vclick"></div>
                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
    
        </div>
    </section>

@endsection
