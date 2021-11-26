<!DOCTYPE html>
@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row justify-content-center">
            <div class="card mt-3">
                <div class="card-body">

                    <form action="{{ route('info-adicional.store') }}" method="post">

                        <input type="hidden" name="aluno_id" value="{{ $aluno->aluno_id }}">
                        <input type="hidden" name="professor_id" value="{{ $professor->id }}">
                        <input type="hidden" name="codigo_contrato" value="{{ $codigo_contrato->codigo_contrato }}">

                        <h4 class="card-title text-center mb-5">Informações Adicionais do Contrato</h4>

                        {{-- Informações Adicionais --}}
                        <p>
                            <b style="margin-right: 10px;">Cláusula 1ª. </b> O <b>CONTRATADO</b> exercerá a função de <input
                                type="text" name="funcao_professor" class="input-contrato" placeholder="Função do Professor"
                                value="">,
                            realizando um treinamento físico personalizado, que será elaborado e/ou ministrado para o
                            <b>CONTRATANTE</b>,
                            com objetivo de <input type="text" name="objetivo_aluno" class="input-contrato"
                                placeholder="Objetivo do Aluno" value="">.
                        </p>

                        <h4 class="card-title">Local</h4>

                        <p>
                            <b style="margin-right: 10px;">Cláusula 2ª. </b> O <b>CONTRATADO</b> prestará seus serviços em
                            local pré-determinado ou poderá oferecer alternativas de locais, desde que seja anteriormente
                            acordado entre as partes. Os locais poderão ser: Residência, Academia, Parques, Calçadão, etc.
                        </p>

                        <p>
                            <b style="margin-right: 10px;">Cláusula 3ª.</b> Quando a natureza das suas atividades e/ou
                            necessidade do <b>CONTRATANTE</b> o exigir, o
                            <b>CONTRATADO</b> poderá transferi-la para outra localidade, tendo de ser avisado com no mínimo
                            8 horas
                            de antecedência.
                        </p>

                        <h4 class="card-title">Horário</h4>

                        <p>
                            <b style="margin-right: 10px;">Cláusula 4ª.</b> O <b>CONTRATADO</b> prestará os serviços
                            compreendidos
                            entre <input type="time" name="hora_inicio" class="input-contrato" placeholder="Hora de Início"
                                value=""> e <input type="time" name="hora_final" class="input-contrato"
                                placeholder="Hora de Término" value=""> horas na <input type="text" name="dia_semana"
                                class="input-contrato" placeholder="Dia da Semana" value=""> Feira.
                        </p>

                        <p>
                            <b style="margin-right: 10px;">Cláusula 5ª.</b> Eventual mudança do horário deverá ser avisada à
                            outra parte com 6 horas de antecedência.
                        </p>

                        <p>
                            <b style="margin-right: 10px;">Cláusula 6ª.</b> Caso o <b>CONTRATANTE</b> descumpra o previsto
                            na cláusula anterior, considerar-se o serviço
                            como prestado, não podendo haver qualquer tipo de desconto no pagamento mensal.
                        </p>

                        <p>
                            <b style="margin-right: 10px;">Cláusula 7ª.</b> Se o <b>CONTRATADO</b> descumprir o previsto na
                            cláusula 4ª será marcado novo horário pelo
                            <b>CONTRATANTE</b>, de acordo com sua disponibilidade, ou haverá o desconto proporcional no
                            pagamento
                            mensal.
                        </p>

                        <h4 class="card-title">Reposição e Atraso</h4>

                        <p>
                            <b style="margin-right: 10px;">Cláusula 8ª.</b> O sistema de reposição de sessão poderá ser:
                            reposição com aviso antecipado da falta,
                            podendo ter no máximo <input type="text" name="reposicao_aula_mensal" class="input-contrato"
                                placeholder="Número de Reposições de Aula" value=""> reposições mensais, com a
                            impossibilidade de desconto em um mês
                            futuro em função das perdas de sessões durante o mês vigente ou anteriores. Caso o
                            <b>CONTRATANTE</b> falte
                            uma sessão sem aviso prévio, pagará ao <b>CONTRATADO</b> o valor da sessão correspondente.
                        </p>

                        <h4 class="card-title">Remuneração</h4>

                        <p>
                            <b style="margin-right: 10px;">Cláusula 9ª.</b> Pela prestação dos serviços contratados, o
                            <b>CONTRATANTE</b> pagará ao <b>CONTRATADO</b> a quantia
                            mensal de R$ <input type="text" name="pagamento_mensal" class="input-contrato"
                                placeholder="Pagamento Mensal" value=""> (<input type="text"
                                name="pagamento_mensal_inscrito" class="input-contrato" placeholder="Pagamento por Extenso"
                                value=""> reais), podendo ser paga todo dia <input type="text" name="vencimento_pagamento"
                                class="input-contrato" placeholder="Dia de Vencimento" value=""> de cada mês,
                            iniciando-se a primeira parcela no ato da assinatura do contrato pelas partes.
                        </p>

                        <p>
                            <b style="margin-right: 10px;">Cláusula 10ª.</b>Será permitida a tolerância de <input type="text"
                                name="dia_de_tolerancia" class="input-contrato" placeholder="Quantidade de Dias" value="">
                            dias para o pagamento da mensalidade, sendo cobrada,
                            no caso de desrespeito a esse prazo, multa de <input type="text" name="multa_atraso"
                                class="input-contrato" placeholder="Porcentagem de Multa" value="">% do valor mensal.
                        </p>

                        <p>
                            <b style="margin-right: 10px;">Cláusula 11ª.</b> Este contrato tem a duração de <input
                                type="text" name="duracao_contrato" class="input-contrato" placeholder="Total de Dias"
                                value=""> dias, com início em <input type="date" name="inicio_contrato"
                                class="input-contrato" placeholder="Data de Início" value=""> e término em
                            <input type="date" name="final_contrato" class="input-contrato" placeholder="Data de Término"
                                value="">.
                        </p>

                        <p>
                            <b style="margin-right: 10px;">Cláusula 12ª.</b>Aos Domingos e Feriados os valores são cobrados
                            a parte.
                        </p>

                        <h4 class="card-title">Rescisão e Férias</h4>

                        <p>
                            <b style="margin-right: 10px;">Cláusula 13ª.</b>Caso o <b>CONTRATANTE</b> venha a desistir da
                            prestação de serviço, pagará ao <b>CONTRATADO</b> o
                            percentual de 100% sobre o valor total da prestação de serviço e deverá comunicar com
                            antecedência
                            mínima de 30 (trinta) dias.
                        </p>

                        <p>
                            <b style="margin-right: 10px;">Cláusula 14ª.</b>Em períodos de viagens/férias, o
                            <b>CONTRATANTE</b> deverá pagar integralmente o período que
                            ficar ausente, garantindo o horário acordado no item 3 acima, no planejamento de trabalho do
                            <b>CONTRATADO</b>.
                        </p>

                        <h4 class="card-title">Exames</h4>

                        <p>
                            <b style="margin-right: 10px;">Cláusula 15ª.</b>Qualquer exame ou avaliação médica necessária
                            que o <b>CONTRATANTE</b> deverá se submeter,
                            não estará inclusa na remuneração acordada no item 4 acima.
                        </p>

                        <h4 class="card-title">Vestimentas</h4>

                        <p>
                            <b style="margin-right: 10px;">Cláusula 16ª.</b>Deverá o <b>CONTRATADO</b> e o
                            <b>CONTRATANTE</b>, durante a sessão de treinamento, permanecer com
                            vestimentas e acessórios adequados para a atividade que irá exercer, observando sempre o aspecto
                            higiene na sua apresentação. Roupas leves, tênis, meia, garrafa de água, medidor de frequência
                            cardíaca, boné e etc.
                        </p>

                        <h4 class="card-title">Foro</h4>

                        <p>
                            <b style="margin-right: 10px;">Cláusula 17ª.</b>Com as condições de trabalho assim ajustadas,
                            lidas e achadas conformes, o presente
                            contrato é firmado pelas partes em duas vias de igual teor e forma. As partes elegem o foro de
                            <input type="text" name="nome_foro" class="input-contrato" placeholder="Nome do Foro"
                                value="">-<input type="text" name="estado_foro" class="input-contrato" placeholder="Estado do Foro"
                                value="">, para dirimir qualquer dúvida.
                        </p>
                        
                        <p style="margin: 50px auto;">
                            <input type="text" name="data_estado_contrato" class="input-contrato w-25" placeholder="Estado" value="">,
                            <input type="text" name="data_dia_contrato" class="input-contrato" style="width: 50px;" placeholder="Dia" value=""> de 
                            <input type="text" name="data_mes_contrato" class="input-contrato w-25" placeholder="Mês" value=""> de
                            <input type="text" name="data_ano_contrato" class="input-contrato" style="width: 50px;" placeholder="Ano" value="">.
                        </p>

                        <br><br><br>
                        
                        <p class="text-center mt-5">
                            __________________________________________________________________
                        </p>
                        <p>
                            <b>Contratado: </b> <input type="text" name="nome_professor" class="input-contrato w-100" style="text-align: center;" placeholder="Nome Completo do Contratado" 
                            value="{{ $professor->nome_professor != '' ? $professor->nome_professor : '' }}">
                        </p>

                        <br>

                        <p class="text-center mt-5">
                            __________________________________________________________________
                        </p>
                        <p>
                            <b>Contratante: </b> <input type="text" name="nome" class="input-contrato w-100" style="text-align: center;" placeholder="Nome Completo do Contratante" 
                            value="{{ $aluno->nome != '' ? $aluno->nome : '' }}">
                        </p>

                        <h4 class="card-title mt-5">Testemunhas: </h4>


                        <div class="row mt-5">
                            <div class="col-6">
                                <p>
                                    1) <input type="text" name="testemunha_um" class="input-contrato" placeholder="Nome da Testemunha 1">
                                </p>
                                <p>
                                    2) <input type="text" name="testemunha_dois" class="input-contrato" placeholder="Nome da Testemunha 2">
                                </p>
                            </div>
                            <div class="col-6">
                                <p>
                                    RG: <input type="text" name="testemunha_um_rg" class="input-contrato" placeholder="RG da Testemunha 1">
                                </p>
                                <p>
                                    RG: <input type="text" name="testemunha_dois_rg" class="input-contrato" placeholder="RG da Testemunha 2">
                                </p>
                            </div>         
                        </div>


                        <div class="row justify-content-center mt-5">
                            <div class="col-3">
                                <button class="btn btn-sm btn-success">
                                    Gerar Contrato
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
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
