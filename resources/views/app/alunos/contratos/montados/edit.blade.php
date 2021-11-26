<!DOCTYPE html>

@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row">
            <form action="{{ route('contratos-montados.update', ['codigo_contrato' => $contrato->codigo_contrato, 'aluno_id' => $contrato->aluno_id]) }}" method="post">

                <div class="col-lg-12">
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title">Contrato número #<b>{{ $contrato->codigo_contrato }}</b> do
                                        Aluno: <b class="fs-5" style="color: #7b84d6;">{{ $aluno->nome }}</b>
                                    </h4>

                                    <div class="mt-3">
                                        <a href="{{ route('contratos-montados.index', $contrato->aluno_id) }}" class="btn btn-sm text-white"
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
                                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#nome_contrato_{{ $contrato->id }}" type="button" role="tab"
                                        aria-controls="v-pills-home" aria-selected="true">Nome do Contrato</button>
                                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-profile" type="button" role="tab"
                                        aria-controls="v-pills-profile" aria-selected="false">Professor</button>
                                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-messages" type="button" role="tab"
                                        aria-controls="v-pills-messages" aria-selected="false">Informações</button>
                                </div>

                                {{-- Conteudo do Nav-Tab --}}
                                <div class="m-3">
                                    <div class="tab-content" id="v-pills-tabContent">

                                        {{-- Nome do Contrato --}}
                                        <div class="tab-pane fade show active" id="nome_contrato_{{ $contrato->id }}"
                                            role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <div class="row">
                                                <div class="input-group mb-3">
                                                    <input type="text" name="nome_contrato" class="form-control"
                                                        placeholder="Nome do Contrato"
                                                        value="{{ $contrato->nome_contrato }}">
                                                </div>
                                                @error('nome_contrato')
                                                    <span class="text-danger m-3">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Professores --}}
                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                            aria-labelledby="v-pills-profile-tab">
                                            <div class="mt-5">
                                                @foreach ($professores as $professor)
                                                    <div class="row">
                                                        <div class="col-12 mt-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="professor_id" id="prof_{{ $professor->id }}"
                                                                    value="{{ $professor->id }}"
                                                                    {{ $professor->id == $contrato->professor_id ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="prof_{{ $professor->id }}">{{ $professor->nome_professor }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        {{-- Informações do Contrato --}}
                                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                            aria-labelledby="v-pills-messages-tab">

                                            <div align="justify" class="col-12">
                                                    {{-- Informações Adicionais --}}
                                                <p>
                                                    <b style="margin-right: 10px;">Cláusula 1ª. </b> O <b>CONTRATADO</b>
                                                    exercerá a função de <input type="text" name="funcao_professor"
                                                        class="input-contrato" placeholder="Função do Professor" value="{{ $info_adicional->funcao_professor }}">,
                                                    realizando um treinamento físico personalizado, que será elaborado e/ou
                                                    ministrado para o
                                                    <b>CONTRATANTE</b>,
                                                    com objetivo de <input type="text" name="objetivo_aluno"
                                                        class="input-contrato" placeholder="Objetivo do Aluno" value="{{ $info_adicional->objetivo_aluno }}">.
                                                </p>

                                                <h4 class="card-title">Local</h4>

                                                <p>
                                                    <b style="margin-right: 10px;">Cláusula 2ª. </b> O <b>CONTRATADO</b>
                                                    prestará seus serviços em
                                                    local pré-determinado ou poderá oferecer alternativas de locais, desde que
                                                    seja anteriormente
                                                    acordado entre as partes. Os locais poderão ser: Residência, Academia,
                                                    Parques, Calçadão, etc.
                                                </p>

                                                <p>
                                                    <b style="margin-right: 10px;">Cláusula 3ª.</b> Quando a natureza das suas
                                                    atividades e/ou
                                                    necessidade do <b>CONTRATANTE</b> o exigir, o
                                                    <b>CONTRATADO</b> poderá transferi-la para outra localidade, tendo de ser
                                                    avisado com no mínimo
                                                    8 horas
                                                    de antecedência.
                                                </p>

                                                <h4 class="card-title">Horário</h4>

                                                <p>
                                                    <b style="margin-right: 10px;">Cláusula 4ª.</b> O <b>CONTRATADO</b> prestará
                                                    os serviços
                                                    compreendidos
                                                    entre <input type="time" name="hora_inicio" class="input-contrato"
                                                        placeholder="Hora de Início" value="{{ $info_adicional->hora_inicio }}"> e <input type="time"
                                                        name="hora_final" class="input-contrato" placeholder="Hora de Término"
                                                        value="{{ $info_adicional->hora_final }}"> horas na <input type="text" name="dia_semana"
                                                        class="input-contrato" placeholder="Dia da Semana" value="{{ $info_adicional->dia_semana }}"> Feira.
                                                </p>

                                                <p>
                                                    <b style="margin-right: 10px;">Cláusula 5ª.</b> Eventual mudança do horário
                                                    deverá ser avisada à
                                                    outra parte com 6 horas de antecedência.
                                                </p>

                                                <p>
                                                    <b style="margin-right: 10px;">Cláusula 6ª.</b> Caso o <b>CONTRATANTE</b>
                                                    descumpra o previsto
                                                    na cláusula anterior, considerar-se o serviço
                                                    como prestado, não podendo haver qualquer tipo de desconto no pagamento
                                                    mensal.
                                                </p>

                                                <p>
                                                    <b style="margin-right: 10px;">Cláusula 7ª.</b> Se o <b>CONTRATADO</b>
                                                    descumprir o previsto na
                                                    cláusula 4ª será marcado novo horário pelo
                                                    <b>CONTRATANTE</b>, de acordo com sua disponibilidade, ou haverá o desconto
                                                    proporcional no
                                                    pagamento
                                                    mensal.
                                                </p>

                                                <h4 class="card-title">Reposição e Atraso</h4>

                                                <p>
                                                    <b style="margin-right: 10px;">Cláusula 8ª.</b> O sistema de reposição de
                                                    sessão poderá ser:
                                                    reposição com aviso antecipado da falta,
                                                    podendo ter no máximo <input type="text" name="reposicao_aula_mensal"
                                                        class="input-contrato" placeholder="Número de Reposições de Aula"
                                                        value="{{ $info_adicional->reposicao_aula_mensal }}"> reposições mensais, com a
                                                    impossibilidade de desconto em um mês
                                                    futuro em função das perdas de sessões durante o mês vigente ou anteriores.
                                                    Caso o
                                                    <b>CONTRATANTE</b> falte
                                                    uma sessão sem aviso prévio, pagará ao <b>CONTRATADO</b> o valor da sessão
                                                    correspondente.
                                                </p>

                                                <h4 class="card-title">Remuneração</h4>

                                                <p>
                                                    <b style="margin-right: 10px;">Cláusula 9ª.</b> Pela prestação dos serviços
                                                    contratados, o
                                                    <b>CONTRATANTE</b> pagará ao <b>CONTRATADO</b> a quantia
                                                    mensal de R$ <input type="text" name="pagamento_mensal"
                                                        class="input-contrato" placeholder="Pagamento Mensal" value="{{ $info_adicional->pagamento_mensal }}"> (<input
                                                        type="text" name="pagamento_mensal_inscrito" class="input-contrato"
                                                        placeholder="Pagamento por Extenso" value="{{ $info_adicional->pagamento_mensal_inscrito }}"> reais), podendo ser paga
                                                    todo dia <input type="text" name="vencimento_pagamento"
                                                        class="input-contrato" placeholder="Dia de Vencimento" value="{{ $info_adicional->vencimento_pagamento }}"> de cada
                                                    mês,
                                                    iniciando-se a primeira parcela no ato da assinatura do contrato pelas
                                                    partes.
                                                </p>

                                                <p>
                                                    <b style="margin-right: 10px;">Cláusula 10ª.</b>Será permitida a tolerância
                                                    de <input type="text" name="dia_de_tolerancia" class="input-contrato"
                                                        placeholder="Quantidade de Dias" value="{{ $info_adicional->dia_de_tolerancia }}">
                                                    dias para o pagamento da mensalidade, sendo cobrada,
                                                    no caso de desrespeito a esse prazo, multa de <input type="text"
                                                        name="multa_atraso" class="input-contrato"
                                                        placeholder="Porcentagem de Multa" value="{{ $info_adicional->multa_atraso }}">% do valor mensal.
                                                </p>

                                                <p>
                                                    <b style="margin-right: 10px;">Cláusula 11ª.</b> Este contrato tem a duração
                                                    de <input type="text" name="duracao_contrato" class="input-contrato"
                                                        placeholder="Total de Dias" value="{{ $info_adicional->duracao_contrato }}"> dias, com início em <input
                                                        type="date" name="inicio_contrato" class="input-contrato"
                                                        placeholder="Data de Início" value="{{ $info_adicional->inicio_contrato }}"> e término em
                                                    <input type="date" name="final_contrato" class="input-contrato"
                                                        placeholder="Data de Término" value="{{ $info_adicional->final_contrato }}">.
                                                </p>

                                                <p>
                                                    <b style="margin-right: 10px;">Cláusula 12ª.</b>Aos Domingos e Feriados os
                                                    valores são cobrados
                                                    a parte.
                                                </p>

                                                <h4 class="card-title">Rescisão e Férias</h4>

                                                <p>
                                                    <b style="margin-right: 10px;">Cláusula 13ª.</b>Caso o <b>CONTRATANTE</b>
                                                    venha a desistir da
                                                    prestação de serviço, pagará ao <b>CONTRATADO</b> o
                                                    percentual de 100% sobre o valor total da prestação de serviço e deverá
                                                    comunicar com
                                                    antecedência
                                                    mínima de 30 (trinta) dias.
                                                </p>

                                                <p>
                                                    <b style="margin-right: 10px;">Cláusula 14ª.</b>Em períodos de
                                                    viagens/férias, o
                                                    <b>CONTRATANTE</b> deverá pagar integralmente o período que
                                                    ficar ausente, garantindo o horário acordado no item 3 acima, no
                                                    planejamento de trabalho do
                                                    <b>CONTRATADO</b>.
                                                </p>

                                                <h4 class="card-title">Exames</h4>

                                                <p>
                                                    <b style="margin-right: 10px;">Cláusula 15ª.</b>Qualquer exame ou avaliação
                                                    médica necessária
                                                    que o <b>CONTRATANTE</b> deverá se submeter,
                                                    não estará inclusa na remuneração acordada no item 4 acima.
                                                </p>

                                                <h4 class="card-title">Vestimentas</h4>

                                                <p>
                                                    <b style="margin-right: 10px;">Cláusula 16ª.</b>Deverá o <b>CONTRATADO</b> e
                                                    o
                                                    <b>CONTRATANTE</b>, durante a sessão de treinamento, permanecer com
                                                    vestimentas e acessórios adequados para a atividade que irá exercer,
                                                    observando sempre o aspecto
                                                    higiene na sua apresentação. Roupas leves, tênis, meia, garrafa de água,
                                                    medidor de frequência
                                                    cardíaca, boné e etc.
                                                </p>

                                                <h4 class="card-title">Foro</h4>

                                                <p>
                                                    <b style="margin-right: 10px;">Cláusula 17ª.</b>Com as condições de trabalho
                                                    assim ajustadas,
                                                    lidas e achadas conformes, o presente
                                                    contrato é firmado pelas partes em duas vias de igual teor e forma. As
                                                    partes elegem o foro de
                                                    <input type="text" name="nome_foro" class="input-contrato"
                                                        placeholder="Nome do Foro" value="{{ $info_adicional->nome_foro }}">-<input type="text"
                                                        name="estado_foro" class="input-contrato" placeholder="Estado do Foro"
                                                        value="{{ $info_adicional->estado_foro}}">, para dirimir qualquer dúvida.
                                                </p>

                                                <p style="margin: 50px auto;">
                                                    <input type="text" name="data_estado_contrato" class="input-contrato w-25"
                                                        placeholder="Estado" value="{{ $info_adicional->data_estado_contrato }}">,
                                                    <input type="text" name="data_dia_contrato" class="input-contrato"
                                                        style="width: 50px;" placeholder="Dia" value="{{ $info_adicional->data_dia_contrato }}"> de
                                                    <input type="text" name="data_mes_contrato" class="input-contrato w-25"
                                                        placeholder="Mês" value="{{ $info_adicional->data_mes_contrato }}"> de
                                                    <input type="text" name="data_ano_contrato" class="input-contrato"
                                                        style="width: 50px;" placeholder="Ano" value="{{ $info_adicional->data_ano_contrato }}">.
                                                </p>


                                                <h4 class="card-title mt-5">Testemunhas: </h4>


                                                <div class="row mt-5">
                                                    <div class="col-6">
                                                        <p>
                                                            1) <input type="text" name="testemunha_um" class="input-contrato"
                                                                placeholder="Nome da Testemunha 1" value="{{ $info_adicional->testemunha_um }}">
                                                        </p>
                                                        <p>
                                                            2) <input type="text" name="testemunha_dois" class="input-contrato"
                                                                placeholder="Nome da Testemunha 2" value="{{ $info_adicional->testemunha_dois }}">
                                                        </p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p>
                                                            RG: <input type="text" name="testemunha_um_rg"
                                                                class="input-contrato" placeholder="RG da Testemunha 1" value="{{ $info_adicional->testemunha_um_rg }}">
                                                        </p>
                                                        <p>
                                                            RG: <input type="text" name="testemunha_dois_rg"
                                                                class="input-contrato" placeholder="RG da Testemunha 2" value="{{ $info_adicional->testemunha_dois_rg }}">
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="row justify-content-end mt-4">
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

    .input-contrato {
        border: none;
        font-weight: bold;
        color: #4154f1;
        text-transform: uppercase;
    }

    ::placeholder {
        color: red;
    }

</style>