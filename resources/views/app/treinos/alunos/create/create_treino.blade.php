<!DOCTYPE html>

@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')


    <section class="section">
        <form action="{{ route('treino.info.store', $codigo) }}" method="post">
            @csrf

                <input type="hidden" name="aluno_id" value="{{ $aluno->id }}">

                {{-- Nivel do Aluno --}}
                <div class="row">
                    <div class="card mt-3">
                        <h5 class="card-title text-center">Qual o nível do aluno?</h5>
                        <strong class="text-center">Ao trocar o nível do aluno irá afetar o progresso do perfil do aluno</strong>
                        <div class="card-body">
                            <div class="row justify-content-center mt-5">
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="nivel_treino" id="iniciante" value="iniciante"
                                            checked="">
                                        <label class="form-check-label" for="iniciante">
                                            Iniciante
                                        </label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="nivel_treino" id="intermediario"
                                            value="intermediario" checked="">
                                        <label class="form-check-label" for="intermediario">
                                            Intermediário
                                        </label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="nivel_treino" id="avancado" value="avancado"
                                            checked="">
                                        <label class="form-check-label" for="avancado">
                                            Avançado
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                {{-- Frequencia --}}
                <div class="row">
                    <div class="card">
                        <h5 class="card-title text-center">Qual a frequência semanal do aluno?</h5>
                        <div class="card-body">
                            <div class="mt-3 mb-5">
                                <div class="text-center">
                                    <input type="range" class="form-range" id="frequencia" name="frequencia" min="0" max="4"
                                        value="0" step="1">
                                    <div class="num-fixed">
                                        <div class="indicator text-center">1</div>
                                        <span class="indicator-fixed-bar">/</span>
                                        <span class="indicator-fixed">5 +</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Divisão de Treino --}}
                <div class="row">
                    <div class="card">
                        <h5 class="card-title text-center">Divisão de Treino do Aluno</h5>
                        <div class="card-body">
                            <div class="row justify-content-center mt-3">
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="divisao_treino" id="divisao_a" value="divisao_a"
                                            checked="">
                                        <label class="form-check-label" for="divisao_a">
                                            A
                                        </label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="divisao_treino" id="divisao_ab" value="divisao_ab"
                                            checked="">
                                        <label class="form-check-label" for="divisao_ab">
                                            A/B
                                        </label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="divisao_treino" id="divisao_abc" value="divisao_abc"
                                            checked="">
                                        <label class="form-check-label" for="divisao_abc">
                                            A/B/C
                                        </label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="divisao_treino" id="divisao_abcd" value="divisao_abcd"
                                            checked="">
                                        <label class="form-check-label" for="divisao_abcd">
                                            A/B/C/D
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row justify-content-end">
                                <div class="col-2 mt-3">
                                    <button type="submit" class="btn btn-sm btn-primary">Próximo</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        </form>
    </section>

@endsection

{{-- Input Range de Frequencia --}}
<style>
    * {
        margin: 0;
        box-sizing: border-box;
    }

    .container {
        background-color: #ccc;
        width: 100%;
        display: block;
        position: relative;
    }

    input[type=range] {
        width: 100%;
        display: block;
    }

    .num-fixed {
        margin-top: 15px;
        font-family: "Poppins", sans-serif;
        font-weight: bold;

    }

    .indicator {
        left: 47%;
        position: absolute;
    }

    .indicator-fixed-bar {
        left: 50%;
        position: absolute;
    }

    .indicator-fixed {
        left: 53%;
        position: absolute;
    }

</style>

<style>
    .btn-primary {
        background: none;
        font-family: "Poppins", sans-serif;
        color: #45505b;
        border: 1px solid #6776f4;
        border-radius: 0.25rem;
        font-weight: 700;
    }

</style>
