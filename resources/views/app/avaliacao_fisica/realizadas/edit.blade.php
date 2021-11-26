<!DOCTYPE html>

@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row">
            {{-- <form action="{{ route('contratos-montados.update', ['codigo_contrato' => $contrato->codigo_contrato, 'aluno_id' => $contrato->aluno_id]) }}" method="post"> --}}

            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Avaliação #<b>{{ $avaliacao->codigo_avaliacao }}</b> do
                                    Aluno: <b class="fs-5"
                                        style="color: #7b84d6;">{{ $avaliacao->aluno->nome }}</b>
                                </h4>

                                <div class="mt-3">
                                    <a href="{{ route('avaliacoes.show', $avaliacao->aluno_id) }}"
                                        class="btn btn-sm text-white"
                                        style="font-weight: 700; background: #4154f1;">Voltar</a>
                                    <button type="submit" class="btn btn-sm btn-success text-white"
                                        style="font-weight: 700;">Atualizar</button>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-start">
                            {{-- Botões do Nav-Tab --}}
                            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">

                                @if($avaliacao == '')
                                @else
                                <button class="nav-link active" id="v-pills-dados-avaliacao" data-bs-toggle="pill"
                                    data-bs-target="#dados_avaliacao_{{ $avaliacao->id }}" type="button" role="tab"
                                    aria-controls="v-pills-home" aria-selected="true">Dados do Aluno</button>
                                @endif

                                @if ($dados_perimetro == '')
                                @else
                                    <button class="nav-link" id="v-pills-dados-perimetro" data-bs-toggle="pill"
                                    data-bs-target="#dados_perimetros_{{ $avaliacao->id }}" type="button" role="tab"
                                    aria-controls="v-pills-profile" aria-selected="false">Perímetros</button>
                                @endif
                                
                                @if ($dados_dobra == '')
                                @else
                                    <button class="nav-link" id="v-pills-dados-dobra" data-bs-toggle="pill"
                                        data-bs-target="#dados_dobras_{{ $avaliacao->id }}" type="button" role="tab"
                                        aria-controls="v-pills-profile" aria-selected="false">Dobras Cutâneas</button>
                                @endif
                            </div>

                            {{-- Conteudo do Nav-Tab --}}
                            <div class="tab-content" id="v-pills-tabContent">

                                {{-- Dados do Aluno --}}
                                <div class="tab-pane fade show active" id="dados_avaliacao_{{ $avaliacao->id }}"
                                    role="tabpanel" aria-labelledby="v-pills-dados-avaliacao">
                                    <div class="row justify-content-center">
                                        <div class="col-10 mt-3">
                                            <ul>
                                                <li>
                                                    <p>Data de Nasc: <span class="text-danger"> *</span></p>
                                                    <span><input type="text" name="data_nasc"
                                                            value="{{ $avaliacao->data_nasc }}"></span>
                                                </li>
                                                <li>
                                                    <p>Histórico Familiar: <span class="text-danger"> *</span></p>
                                                    <span><input type="text" name="historico_familiar"
                                                            value="{{ $avaliacao->historico_familiar }}"></span>
                                                </li>
                                                <li>
                                                    <p>Estatura: <span class="text-danger"> *</span></p>
                                                    <span><input type="text" name="estatura"
                                                            value="{{ $avaliacao->estatura }}"></span>
                                                </li>
                                                <li>
                                                    <p>Peso: <span class="text-danger"> *</span></p>
                                                    <span><input type="text" name="peso"
                                                            value="{{ $avaliacao->peso }}"></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                {{-- Dados Perímetro --}}
                                <div class="tab-pane fade" id="dados_perimetros_{{ $avaliacao->id }}" role="tabpanel"
                                    aria-labelledby="v-pills-dados-perimetro">
                                    <div class="row justify-content-center">
                                        <div class="col-12 mt-3">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th colspan="6"></th>
                                                        <th>Direito (a)</th>
                                                        <th>Esquerdo (a)</th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Torax</th>
                                                        <th colspan="4"><input type="text" class="w-50"
                                                                name="torax" value="{{ $dados_perimetro->torax }}"></th>
                                                        <th>Antebraço: </th>
                                                        <th><input type="text" class="w-50"
                                                                name="antebraco_direito"
                                                                value="{{ $dados_perimetro->antebraco_direito }}"></th>
                                                        <th><input type="text" class="w-50"
                                                                name="antebraco_esquerdo"
                                                                value="{{ $dados_perimetro->antebraco_esquerdo }}"></th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Cintura</th>
                                                        <th colspan="4"><input type="text" class="w-50"
                                                                name="cintura" value="{{ $dados_perimetro->cintura }}">
                                                        </th>
                                                        <th>Braço: </th>
                                                        <th><input type="text" class="w-50" name="braco_direito"
                                                                value="{{ $dados_perimetro->braco_direito }}"></th>
                                                        <th><input type="text" class="w-50" name="braco_esquerdo"
                                                                value="{{ $dados_perimetro->braco_esquerdo }}"></th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Abdôme</th>
                                                        <th colspan="4"><input type="text" class="w-50"
                                                                name="abdomen" value="{{ $dados_perimetro->abdomen }}">
                                                        </th>
                                                        <th>Coxa: </th>
                                                        <th><input type="text" class="w-50" name="coxa_direita"
                                                                value="{{ $dados_perimetro->coxa_direita }}"></th>
                                                        <th><input type="text" class="w-50" name="coxa_esquerda"
                                                                value="{{ $dados_perimetro->coxa_esquerda }}"></th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Quadril</th>
                                                        <th colspan="4"><input type="text" class="w-50"
                                                                name="quadril" value="{{ $dados_perimetro->quadril }}">
                                                        </th>
                                                        <th>Panturrilha: </th>
                                                        <th><input type="text" class="w-50"
                                                                name="panturrilha_direita"
                                                                value="{{ $dados_perimetro->panturrilha_direita }}"></th>
                                                        <th><input type="text" class="w-50"
                                                                name="panturrilha_esquerda"
                                                                value="{{ $dados_perimetro->panturrilha_esquerda }}">
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                {{-- Dados Dobras --}}
                                <div class="tab-pane fade" id="dados_dobras_{{ $avaliacao->id }}" role="tabpanel"
                                    aria-labelledby="v-pills-dados-dobra">
                                    @if ($dados_dobra == '')
                                    @else
                                        <div class="row justify-content-center">
                                            <div class="col-10 mt-3">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th colspan="4">Subscapular: </th>
                                                            <th><input type="text" class="w-50" name="subscapular"
                                                                    value="{{ $dados_dobra->subscapular == '' ? '' : $dados_dobra->subscapular }}">
                                                            </th>
                                                            <th>Triciptal: </th>
                                                            <th><input type="text" class="w-50" name="triciptal"
                                                                    value="{{ $dados_dobra->triciptal == '' ? '' : $dados_dobra->triciptal }}">
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="4">Axilar-Média: </th>
                                                            <th><input type="text" class="w-50"
                                                                    name="axilar_media"
                                                                    value="{{ $dados_dobra->axilar_media == '' ? '' : $dados_dobra->axilar_media }}">
                                                            </th>
                                                            <th>Abdominal: </th>
                                                            <th><input type="text" class="w-50" name="abdominal"
                                                                    value="{{ $dados_dobra->abdominal == '' ? '' : $dados_dobra->abdominal }}">
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="4">Supra-Íliaca: </th>
                                                            <th><input type="text" class="w-50"
                                                                    name="supra_iliaca"
                                                                    value="{{ $dados_dobra->supra_iliaca == '' ? '' : $dados_dobra->supra_iliaca }}">
                                                            </th>
                                                            <th>Coxa: </th>
                                                            <th><input type="text" class="w-50" name="coxa"
                                                                    value="{{ $dados_dobra->coxa == '' ? '' : $dados_dobra->coxa }}">
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="4">Peitoral: </th>
                                                            <th><input type="text" class="w-50" name="peitoral"
                                                                    value="{{ $dados_dobra->peitoral == '' ? '' : $dados_dobra->peitoral }}">
                                                            </th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </form>
        </div>
    </section>
@endsection

<style>
    .card {
        font-family: "Poppins", sans-serif;
        font-size: 16px;
    }

    ul {
        list-style: none;
    }

    ul li {
        margin-bottom: 15px;
    }

</style>
