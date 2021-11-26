<!DOCTYPE html>

@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row">
            <form action="{{ route('avaliacoes.update', $avaliacao->aluno_id) }}" method="post">

                <input type="hidden" name="codigo_avaliacao" value="{{ $avaliacao->codigo_avaliacao }}">

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
                                    <button class="nav-link active" id="v-pills-dados-avaliacao" data-bs-toggle="pill"
                                        data-bs-target="#dados_avaliacao_{{ $avaliacao->id }}" type="button" role="tab"
                                        aria-controls="v-pills-home" aria-selected="true">Dados do Aluno</button>
                                    <button class="nav-link" id="v-pills-dados-perimetro" data-bs-toggle="pill"
                                        data-bs-target="#dados_perimetros_{{ $avaliacao->id }}" type="button" role="tab"
                                        aria-controls="v-pills-profile" aria-selected="false">Perímetros</button>
                                    <button class="nav-link" id="v-pills-dados-dobra" data-bs-toggle="pill"
                                        data-bs-target="#dados_dobras_{{ $avaliacao->id }}" type="button" role="tab"
                                        aria-controls="v-pills-profile" aria-selected="false">Dobras Cutâneas</button>
                                    <button class="nav-link" id="v-pills-dados-neuro" data-bs-toggle="pill"
                                        data-bs-target="#dados_neuro_{{ $avaliacao->id }}" type="button" role="tab"
                                        aria-controls="v-pills-profile" aria-selected="false">Neuromotores</button>
                                    <button class="nav-link" id="v-pills-dados-anamnese" data-bs-toggle="pill"
                                        data-bs-target="#dados_anamnese_{{ $avaliacao->id }}" type="button" role="tab"
                                        aria-controls="v-pills-profile" aria-selected="false">Anamnese</button>
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
                                                                value="{{ $avaliacao->data_nasc == '' ? '-' : $avaliacao->data_nasc }}"></span>
                                                    </li>
                                                    <li>
                                                        <p>Histórico Familiar: <span class="text-danger"> *</span></p>
                                                        <span><input type="text" name="historico_familiar"
                                                                value="{{ $avaliacao->historico_familiar == '' ? '-' : $avaliacao->historico_familiar }}"></span>
                                                    </li>
                                                    <li>
                                                        <p>Estatura: <span class="text-danger"> *</span></p>
                                                        <span><input type="text" name="estatura"
                                                                value="{{ $avaliacao->estatura == '' ? '-' : $avaliacao->estatura }}"></span>
                                                    </li>
                                                    <li>
                                                        <p>Peso: <span class="text-danger"> *</span></p>
                                                        <span><input type="text" name="peso"
                                                                value="{{ $avaliacao->peso == '' ? '-' : $avaliacao->peso }}"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Dados Perímetro --}}
                                    <div class="tab-pane fade" id="dados_perimetros_{{ $avaliacao->id }}"
                                        role="tabpanel" aria-labelledby="v-pills-dados-perimetro">
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
                                                                    name="torax"
                                                                    value="{{ $dados_perimetro->torax == '' ? '-' : $dados_perimetro->torax }}">
                                                            </th>
                                                            <th>Antebraço: </th>
                                                            <th><input type="text" class="w-50"
                                                                    name="antebraco_direito"
                                                                    value="{{ $dados_perimetro->antebraco_direito == '' ? '-' : $dados_perimetro->antebraco_direito }}">
                                                            </th>
                                                            <th><input type="text" class="w-50"
                                                                    name="antebraco_esquerdo"
                                                                    value="{{ $dados_perimetro->antebraco_esquerdo == '' ? '-' : $dados_perimetro->antebraco_esquerdo }}">
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Cintura</th>
                                                            <th colspan="4"><input type="text" class="w-50"
                                                                    name="cintura"
                                                                    value="{{ $dados_perimetro->cintura == '' ? '-' : $dados_perimetro->cintura }}">
                                                            </th>
                                                            <th>Braço: </th>
                                                            <th><input type="text" class="w-50"
                                                                    name="braco_direito"
                                                                    value="{{ $dados_perimetro->braco_direito == '' ? '-' : $dados_perimetro->braco_direito }}">
                                                            </th>
                                                            <th><input type="text" class="w-50"
                                                                    name="braco_esquerdo"
                                                                    value="{{ $dados_perimetro->braco_esquerdo == '' ? '-' : $dados_perimetro->braco_esquerdo }}">
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Abdôme</th>
                                                            <th colspan="4"><input type="text" class="w-50"
                                                                    name="abdomen"
                                                                    value="{{ $dados_perimetro->abdomen == '' ? '-' : $dados_perimetro->abdomen }}">
                                                            </th>
                                                            <th>Coxa: </th>
                                                            <th><input type="text" class="w-50"
                                                                    name="coxa_direita"
                                                                    value="{{ $dados_perimetro->coxa_direita == '' ? '-' : $dados_perimetro->coxa_direita }}">
                                                            </th>
                                                            <th><input type="text" class="w-50"
                                                                    name="coxa_esquerda"
                                                                    value="{{ $dados_perimetro->coxa_esquerda == '' ? '-' : $dados_perimetro->coxa_esquerda }}">
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Quadril</th>
                                                            <th colspan="4"><input type="text" class="w-50"
                                                                    name="quadril"
                                                                    value="{{ $dados_perimetro->quadril == '' ? '-' : $dados_perimetro->quadril }}">
                                                            </th>
                                                            <th>Panturrilha: </th>
                                                            <th><input type="text" class="w-50"
                                                                    name="panturrilha_direita"
                                                                    value="{{ $dados_perimetro->panturrilha_direita == '' ? '-' : $dados_perimetro->panturrilha_direita }}">
                                                            </th>
                                                            <th><input type="text" class="w-50"
                                                                    name="panturrilha_esquerda"
                                                                    value="{{ $dados_perimetro->panturrilha_esquerda == '' ? '-' : $dados_perimetro->panturrilha_esquerda }}">
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
                                        <div class="row justify-content-center">
                                            <div class="col-10 mt-3">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th colspan="4">Subscapular: </th>
                                                            <th><input type="text" class="w-50" name="subscapular"
                                                                    value="{{ $dados_dobra->subscapular == '' ? '-' : $dados_dobra->subscapular }}">
                                                            </th>
                                                            <th>Triciptal: </th>
                                                            <th><input type="text" class="w-50" name="triciptal"
                                                                    value="{{ $dados_dobra->triciptal == '' ? '-' : $dados_dobra->triciptal }}">
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="4">Axilar-Média: </th>
                                                            <th><input type="text" class="w-50"
                                                                    name="axilar_media"
                                                                    value="{{ $dados_dobra->axilar_media == '' ? '-' : $dados_dobra->axilar_media }}">
                                                            </th>
                                                            <th>Abdominal: </th>
                                                            <th><input type="text" class="w-50" name="abdominal"
                                                                    value="{{ $dados_dobra->abdominal == '' ? '-' : $dados_dobra->abdominal }}">
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="4">Supra-Íliaca: </th>
                                                            <th><input type="text" class="w-50"
                                                                    name="supra_iliaca"
                                                                    value="{{ $dados_dobra->supra_iliaca == '' ? '-' : $dados_dobra->supra_iliaca }}">
                                                            </th>
                                                            <th>Coxa: </th>
                                                            <th><input type="text" class="w-50" name="coxa"
                                                                    value="{{ $dados_dobra->coxa == '' ? '-' : $dados_dobra->coxa }}">
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="4">Peitoral: </th>
                                                            <th><input type="text" class="w-50" name="peitoral"
                                                                    value="{{ $dados_dobra->peitoral == '' ? '-' : $dados_dobra->peitoral }}">
                                                            </th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Neuromotores --}}
                                    <div class="tab-pane fade" id="dados_neuro_{{ $avaliacao->id }}" role="tabpanel"
                                        aria-labelledby="v-pills-dados-neuro">
                                        <div class="row justify-content-center">
                                            <div class="col-10 mt-3">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th>Flexões: </th>
                                                            <th>
                                                                <input type="text" class="w-50" name="flexoes"
                                                                    value="{{ $dados_neuro->flexoes == '' ? '-' : $dados_neuro->flexoes }}">
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>Abdominais: </th>
                                                            <th>
                                                                <input type="text" class="w-50" name="abdominais"
                                                                    value="{{ $dados_neuro->abdominais == '' ? '-' : $dados_neuro->abdominais }}">
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>Flexibilidade: </th>
                                                            <th>
                                                                <input type="text" class="w-50"
                                                                    name="flexibilidade"
                                                                    value="{{ $dados_neuro->flexibilidade == '' ? '-' : $dados_neuro->flexibilidade }}">
                                                            </th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Anamnese --}}
                                    <div class="tab-pane fade" id="dados_anamnese_{{ $avaliacao->id }}" role="tabpanel"
                                        aria-labelledby="v-pills-dados-neuro">

                                        <div class="row m-5">
                                            <ul>
                                                {{-- Atividade Física --}}
                                                <li>
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <p>Pratica atividade física atualmente?</p>
                                                        </div>

                                                        <div class="col-2">
                                                            <div class="col-3 offset-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="atividade_fisica" value="sim"
                                                                        {{ $dados_anamnese->atividade_fisica == 'sim' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="atividade_fisica">
                                                                        Sim
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-2">
                                                            <div class="col-3 offset-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="atividade_fisica" value="não"
                                                                        {{ $dados_anamnese->atividade_fisica == 'não' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="atividade_fisica">
                                                                        Não
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                {{-- Medicamento --}}
                                                <li>
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <p>Utiliza algum tipo de medicamento?</p>
                                                        </div>

                                                        <div class="col-2">
                                                            <div class="col-3 offset-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="medicamento" value="sim"
                                                                        {{ $dados_anamnese->medicamento == 'sim' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="medicamento">
                                                                        Sim
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-2">
                                                            <div class="col-3 offset-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="medicamento" value="não"
                                                                        {{ $dados_anamnese->medicamento == 'não' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="medicamento">
                                                                        Não
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </li>

                                                {{-- Cirurgia --}}
                                                <li>
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <p>Já passou por alguma Cirurgia?</p>
                                                        </div>

                                                        <div class="col-2">
                                                            <div class="col-3 offset-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="cirurgia" value="sim"
                                                                        {{ $dados_anamnese->cirurgia == 'sim' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="cirurgia">
                                                                        Sim
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-2">
                                                            <div class="col-3 offset-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="cirurgia" value="não"
                                                                        {{ $dados_anamnese->cirurgia == 'não' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="cirurgia">
                                                                        Não
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </li>

                                                {{-- Doença na Familia --}}
                                                <li>
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <p>Possui alguma doença na família?</p>
                                                        </div>

                                                        <div class="col-2">
                                                            <div class="col-3 offset-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="doenca_familia" value="sim"
                                                                        {{ $dados_anamnese->doenca_familia == 'sim' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="doenca_familia">
                                                                        Sim
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-2">
                                                            <div class="col-3 offset-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="doenca_familia" value="não"
                                                                        {{ $dados_anamnese->doenca_familia == 'não' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="doenca_familia">
                                                                        Não
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </li>

                                                {{-- Observações --}}
                                                <li>
                                                    <div class="row mt-5">
                                                        <h4>Observações </h4>
                                                        <textarea class="form-control w-50 m-3" name="observacoes" id=""
                                                            cols="4"
                                                            rows="6">{{ $dados_anamnese->observacoes }}</textarea>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="row m-5">
                                            <h5 class="card-title text-center">Questionário de Prontidão para Atividade
                                                Física
                                                (PAR-Q)</h5>
                                            <ul>
                                                {{-- Prescrição Médica --}}
                                                <li>
                                                    <div class="row align-items-justify">
                                                        <p>Alguma vez o médico lhe disse que você possuía um problema do
                                                            coração
                                                            e lhe
                                                            recomendou
                                                            que só fizesse atividade física sob prescrição medica?</p>
                                                    </div>
                                                    <div class="row m-3">
                                                        <div class="col-2">
                                                            <div class="col-3 offset-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="prescricao_medica" value="sim"
                                                                        {{ $dados_anamnese->prescricao_medica == 'sim' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="prescricao_medica">
                                                                        Sim
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-2">
                                                            <div class="col-3 offset-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="prescricao_medica" value="não"
                                                                        {{ $dados_anamnese->prescricao_medica == 'não' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="prescricao_medica">
                                                                        Não
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <hr>

                                                {{-- Dor no Peito --}}
                                                <li>
                                                    <div class="row align-items-justify">
                                                        <p>Você sente dor no peito, causada pela práticada de atividade
                                                            física?
                                                        </p>
                                                    </div>
                                                    <div class="row m-3">
                                                        <div class="col-2">
                                                            <div class="col-3 offset-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="dor_peito" value="sim"
                                                                        {{ $dados_anamnese->dor_peito == 'sim' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="dor_peito">
                                                                        Sim
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-2">
                                                            <div class="col-3 offset-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="dor_peito" value="não"
                                                                        {{ $dados_anamnese->dor_peito == 'não' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="dor_peito">
                                                                        Não
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <hr>

                                                {{-- Dor no Peito Ultimo Mês --}}
                                                <li>
                                                    <div class="row align-items-justify">
                                                        <p>Você sentiu dor no peito no ultimo mês?</p>
                                                    </div>
                                                    <div class="row m-3">
                                                        <div class="col-2">
                                                            <div class="col-3 offset-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="dor_peito_ult_mes" value="sim"
                                                                        {{ $dados_anamnese->dor_peito_ult_mes == 'sim' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="dor_peito_ult_mes">
                                                                        Sim
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-2">
                                                            <div class="col-3 offset-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="dor_peito_ult_mes" value="não"
                                                                        {{ $dados_anamnese->dor_peito_ult_mes == 'não' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="dor_peito_ult_mes">
                                                                        Não
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <hr>

                                                {{-- Tonteira ou Desmaio --}}
                                                <li>
                                                    <div class="row align-items-justify">
                                                        <p>Você tende a perder a consciência ou cair, como resultado de
                                                            tonteira
                                                            ou desmaio?</p>
                                                    </div>
                                                    <div class="row m-3">
                                                        <div class="col-2">
                                                            <div class="col-3 offset-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="tonteira_desmaio" value="sim"
                                                                        {{ $dados_anamnese->tonteira_desmaio == 'sim' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="tonteira_desmaio">
                                                                        Sim
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-2">
                                                            <div class="col-3 offset-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="tonteira_desmaio" value="não"
                                                                        {{ $dados_anamnese->tonteira_desmaio == 'não' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="tonteira_desmaio">
                                                                        Não
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <hr>

                                                {{-- Problema òsseo --}}
                                                <li>
                                                    <div class="row align-items-justify">
                                                        <p>Você tem algum problema ósseo ou muscular que poderia ser
                                                            agravado
                                                            com pratica de
                                                            atividade física?</p>
                                                    </div>
                                                    <div class="row m-3">
                                                        <div class="col-2">
                                                            <div class="col-3 offset-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="problema_osseo" value="sim"
                                                                        {{ $dados_anamnese->problema_osseo == 'sim' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="problema_osseo">
                                                                        Sim
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-2">
                                                            <div class="col-3 offset-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="problema_osseo" value="não"
                                                                        {{ $dados_anamnese->problema_osseo == 'não' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="problema_osseo">
                                                                        Não
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <hr>

                                                {{-- Medicamento para Pressão Arterial --}}
                                                <li>
                                                    <div class="row align-items-justify">
                                                        <p>Algum medico já lhe recomendou o uso de medicamentos para pressão
                                                            arterial, para
                                                            circulação ou coração?</p>
                                                    </div>
                                                    <div class="row m-3">
                                                        <div class="col-2">
                                                            <div class="col-3 offset-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="medicamento_pressao_arterial" value="sim"
                                                                        {{ $dados_anamnese->medicamento_pressao_arterial == 'sim' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="medicamento_pressao_arterial">
                                                                        Sim
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-2">
                                                            <div class="col-3 offset-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="medicamento_pressao_arterial" value="não"
                                                                        {{ $dados_anamnese->medicamento_pressao_arterial == 'não' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="medicamento_pressao_arterial">
                                                                        Não
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <hr>

                                                {{-- Atividade Física sem Supervisão --}}
                                                <li>
                                                    <div class="row align-items-justify">
                                                        <p>Você tem consciência, através da sua própria experiência ou
                                                            aconselhamento medico, de
                                                            alguma outra razão física que impeça sua pratica de atividade
                                                            física
                                                            sem supervisão
                                                            medica?</p>
                                                    </div>
                                                    <div class="row m-3">
                                                        <div class="col-2">
                                                            <div class="col-3 offset-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="atividade_sem_supervisao" value="sim"
                                                                        {{ $dados_anamnese->atividade_sem_supervisao == 'sim' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="atividade_sem_supervisao">
                                                                        Sim
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-2">
                                                            <div class="col-3 offset-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="atividade_sem_supervisao" value="não"
                                                                        {{ $dados_anamnese->atividade_sem_supervisao == 'não' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="atividade_sem_supervisao">
                                                                        Não
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="row justify-content-end m-5">
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-sm btn-success text-white"
                                                    style="font-weight: 700;">Atualizar</button>
                                            </div>
                                        </div>
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
