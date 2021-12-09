<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CONTRATO {{$contrato->codigo_contrato }} - {{ strtoupper($aluno->nome) }}</title>

    <style>
        .page-break {
            page-break-after: always;
        }

        body {
            font-family: Arial;
        }

        h4 {
            text-align: center;
            font-size: 26px;
            text-transform: uppercase;
            margin-bottom: 25px;
        }

        ul {
            list-style: none;
            text-align: justify;
        }

        li .texto-up {
            text-transform: uppercase;
        }

        ul li .dados {
            line-height: 1.5;
            font-size: 18px;
        }

        .informacoes {
            margin: 20px;
        }
        
        .assinatura {
            margin: 40px 30px;
        }

        .subtitulo {
            padding-top: 20px;
            font-size: 18px;
        }

    </style>

</head>

<body>
    <ul>

        <h4>Contrato de Prestação de Serviços de Personal Trainer</h4>

        {{-- Dados Aluno --}}
        <li class="informacoes">
            <p class="dados">
                <b class="texto-up">Contratante: </b>
                <span>
                    {{ strtoupper($aluno->nome) }}, Brasileiro (a), {{ ucwords($aluno->estado_civil) }},
                    {{ ucwords($aluno->profissao) }},
                    Carteira de Identidade nº {{ ucwords($aluno->rg) }}, C.P.F. nº {{ ucwords($aluno->cpf) }},
                    residente e domiciliado na Rua
                    {{ ucwords($aluno->endereco) }}, nº {{ ucwords($aluno->numero_casa) }}, Bairro
                    {{ ucwords($aluno->bairro) }}, CEP {{ ucwords($aluno->cep) }}, Cidade de
                    {{ ucwords($aluno->cidade) }},
                    {{ $aluno->estado != '' ? 'no Estado de '.ucwords($aluno->estado) : '' }}
                    {{ $aluno->telefone_fixo != '' ? ', Telefone: '.ucwords($aluno->telefone_fixo) : '' }} 
                    {{ $aluno->telefone_celular != '' ? ', cel./whatsApp: '.ucwords($aluno->telefone_celular) : '' }}
                    {{ $aluno->email != '' ? 'Email: '.$aluno->email  : '' }}.
                </span>
            </p>
        </li>

        {{-- Dados Professor --}}
        <li class="informacoes">
            <p class="dados">
                <b class="texto-up">Contratado: </b>
                <span>
                    {{ strtoupper($professor->nome_professor) }}, Brasileiro (a),
                    {{ ucwords($professor->estado_civil_professor) }},
                    {{ ucwords($professor->profissao_professor) }},
                    Carteira de Identidade nº {{ $professor->rg_professor }}, C.P.F. nº
                    {{ $professor->cpf_professor }}, CREEF° {{ $professor->cref_professor }},
                    residente e domiciliado na Rua
                    {{ ucwords($professor->endereco_professor) }}, nº
                    {{ $professor->numero_casa_professor }}, Bairro
                    {{ ucwords($professor->bairro_professor) }}, CEP {{ ucwords($professor->cep_professor) }},
                    Cidade de
                    {{ ucwords($professor->cidade_professor) }}, no Estado de
                    {{ ucwords($professor->estado_professor) }}, Telefone:
                    {{ ucwords($professor->telefone_fixo_professor) }} cel./whatsApp:
                    {{ ucwords($professor->telefone_celular_professor) }}, Email:
                    {{ $professor->email_professor }}.
                </span>
            </p>
        </li>

        {{-- Cláusula 01 --}}
        <li class="informacoes">
            <p class="dados">
                <b>Cláusula 01ª. </b>
                <span>
                    O <b>CONTRATADO</b> exercerá a função de {{ ucwords($info_adicional->funcao_professor) }},
                    realizando um treinamento físico personalizado, que será elaborado e/ou ministrado para o
                    <b>CONTRATANTE</b>,
                    com o objetivo de {{ ucwords($info_adicional->objetivo_aluno) }}.
                </span>
            </p>
        </li>

        <h5 class="informacoes subtitulo">Local</h5>

        {{-- Cláusula 02 --}}
        <li class="informacoes">
            <p class="dados">
                <b>Cláusula 02ª. </b>
                <span>
                    O <b>CONTRATADO</b> prestará seus serviços em
                    local pré-determinado ou poderá oferecer alternativas de locais, desde que seja anteriormente
                    acordado entre as partes. Os locais poderão ser: Residência, Academia, Parques, Calçadão, etc.
                </span>
            </p>
        </li>

        {{-- Cláusula 03 --}}
        <li class="informacoes">
            <p class="dados">
                <b>Cláusula 03ª. </b>
                <span>
                    Quando a natureza das suas atividades e/ou
                    necessidade do <b>CONTRATANTE</b> o exigir, o
                    <b>CONTRATADO</b> poderá transferi-la para outra localidade, tendo de ser avisado com no mínimo
                    8 horas
                    de antecedência.
                </span>
            </p>
        </li>

        {{-- PULAR PÁGINA --}}
        <div class="page-break"></div>

        <h5 class="informacoes subtitulo">Horário</h5>

        {{-- Cláusula 04 --}}
        <li class="informacoes">
            <p class="dados">
                <b>Cláusula 04ª. </b>
                <span>
                    O <b>CONTRATADO</b> prestará os serviços
                    compreendidos
                    entre {{ $info_adicional->hora_inicio }} e {{ $info_adicional->hora_final }} horas na
                    {{ ucwords($info_adicional->dia_semana) }}-Feira.
                </span>
            </p>
        </li>

        {{-- Cláusula 05 --}}
        <li class="informacoes">
            <p class="dados">
                <b>Cláusula 05ª. </b>
                <span>
                    Eventual mudança do horário deverá ser avisada à
                    outra parte com 6 horas de antecedência.
                </span>
            </p>
        </li>

        {{-- Cláusula 06 --}}
        <li class="informacoes">
            <p class="dados">
                <b>Cláusula 06ª. </b>
                <span>
                    Caso o <b>CONTRATANTE</b> descumpra o previsto
                    na cláusula anterior, considerar-se o serviço
                    como prestado, não podendo haver qualquer tipo de desconto no pagamento mensal.
                </span>
            </p>
        </li>

        {{-- Cláusula 07 --}}
        <li class="informacoes">
            <p class="dados">
                <b>Cláusula 07ª. </b>
                <span>
                    Se o <b>CONTRATADO</b> descumprir o previsto na
                    cláusula 4ª será marcado novo horário pelo
                    <b>CONTRATANTE</b>, de acordo com sua disponibilidade, ou haverá o desconto proporcional no
                    pagamento
                    mensal.
                </span>
            </p>
        </li>

        <h5 class="informacoes subtitulo">Reposição e Atraso</h5>

        {{-- Cláusula 08 --}}
        <li class="informacoes">
            <p class="dados">
                <b>Cláusula 08ª. </b>
                <span>
                    O sistema de reposição de sessão poderá ser:
                    reposição com aviso antecipado da falta,
                    podendo ter no máximo {{ ucwords($info_adicional->reposicao_aula_mensal) }} reposições mensais,
                    com a
                    impossibilidade de desconto em um mês
                    futuro em função das perdas de sessões durante o mês vigente ou anteriores. Caso o
                    <b>CONTRATANTE</b> falte
                    uma sessão sem aviso prévio, pagará ao <b>CONTRATADO</b> o valor da sessão correspondente.
                </span>
            </p>
        </li>

        <h5 class="informacoes subtitulo">Remuneração</h5>

        {{-- Cláusula 09 --}}
        <li class="informacoes">
            <p class="dados">
                <b>Cláusula 09ª. </b>
                <span>
                    Pela prestação dos serviços contratados, o
                    <b>CONTRATANTE</b> pagará ao <b>CONTRATADO</b> a quantia
                    mensal de R$ {{ ucwords($info_adicional->pagamento_mensal) }}
                    ({{ ucwords($info_adicional->pagamento_mensal_inscrito) }} Reais),
                    podendo ser paga todo dia {{ ucwords($info_adicional->vencimento_pagamento) }} de cada mês,
                    iniciando-se a primeira parcela no ato da assinatura do contrato pelas partes.
                </span>
            </p>
        </li>

        {{-- PULAR PÁGINA --}}
        <div class="page-break"></div>

        {{-- Cláusula 10 --}}
        <li class="informacoes">
            <p class="dados">
                <b>Cláusula 10ª. </b>
                <span>
                    Será permitida a tolerância de {{ ucwords($info_adicional->dia_de_tolerancia) }}
                    dias para o pagamento da mensalidade, sendo cobrada,
                    no caso de desrespeito a esse prazo, multa de {{ ucwords($info_adicional->multa_atraso) }}% do
                    valor mensal.
                </span>
            </p>
        </li>

        {{-- Cláusula 11 --}}
        <li class="informacoes">
            <p class="dados">
                <b>Cláusula 11ª. </b>
                <span>
                    Este contrato tem a duração de {{ ucwords($info_adicional->duracao_contrato) }} dias, com início
                    em
                    {{ Carbon\Carbon::parse($info_adicional->inicio_contrato)->format('d/m/Y') }} e término em
                    {{ Carbon\Carbon::parse($info_adicional->final_contrato)->format('d/m/Y') }}.
                </span>
            </p>
        </li>

        {{-- Cláusula 12 --}}
        <li class="informacoes">
            <p class="dados">
                <b>Cláusula 12ª. </b>
                <span>
                    Aos Domingos e Feriados os valores são cobrados
                    a parte.
                </span>
            </p>
        </li>

        <h5 class="informacoes subtitulo">Rescisão e Férias</h5>

        {{-- Cláusula 13 --}}
        <li class="informacoes">
            <p class="dados">
                <b>Cláusula 13ª. </b>
                <span>
                    Caso o <b>CONTRATANTE</b> venha a desistir da
                    prestação de serviço, pagará ao <b>CONTRATADO</b> o
                    percentual de 100% sobre o valor total da prestação de serviço e deverá comunicar com
                    antecedência
                    mínima de 30 (trinta) dias.
                </span>
            </p>
        </li>

        {{-- Cláusula 14 --}}
        <li class="informacoes">
            <p class="dados">
                <b>Cláusula 14ª. </b>
                <span>
                    Em períodos de viagens/férias, o
                    <b>CONTRATANTE</b> deverá pagar integralmente o período que
                    ficar ausente, garantindo o horário acordado no item 3 acima, no planejamento de trabalho do
                    <b>CONTRATADO</b>.
                </span>
            </p>
        </li>

        {{-- Cláusula 15 --}}
        <li class="informacoes">
            <p class="dados">
                <b>Cláusula 15ª. </b>
                <span>
                    Qualquer exame ou avaliação médica necessária
                    que o <b>CONTRATANTE</b> deverá se submeter,
                    não estará inclusa na remuneração acordada no item 4 acima.
                </span>
            </p>
        </li>

        {{-- Cláusula 16 --}}
        <li class="informacoes">
            <p class="dados">
                <b>Cláusula 16ª. </b>
                <span>
                    Deverá o <b>CONTRATADO</b> e o
                    <b>CONTRATANTE</b>, durante a sessão de treinamento, permanecer com
                    vestimentas e acessórios adequados para a atividade que irá exercer, observando sempre o aspecto
                    higiene na sua apresentação. Roupas leves, tênis, meia, garrafa de água, medidor de frequência
                    cardíaca, boné e etc.
                </span>
            </p>
        </li>

        {{-- PULAR PÁGINA --}}
        <div class="page-break"></div>

        {{-- Cláusula 17 --}}
        <li class="informacoes">
            <p class="dados">
                <b>Cláusula 17ª. </b>
                <span>
                    Com as condições de trabalho assim ajustadas,
                    lidas e achadas conformes, o presente
                    contrato é firmado pelas partes em duas vias de igual teor e forma. As partes elegem o foro de
                    {{ ucwords($info_adicional->nome_foro) }}-{{ strtoupper($info_adicional->estado_foro) }}, para
                    dirimir qualquer dúvida.
                </span>
            </p>
        </li>


        <li class="informacoes">
            <b class="dados">{{ ucwords($info_adicional->data_estado_contrato) }}, 
                {{ ucwords($info_adicional->data_dia_contrato) }} de {{ ucwords($info_adicional->data_mes_contrato) }} de
                {{ ucwords($info_adicional->data_ano_contrato) }}.   
            </b>
        </li>

        <li class="assinatura">
            <p align="center">____________________________________________________________</p>
            <p align="center">
                <b>
                    CONTRATADO: 
                </b>
                <span>{{ strtoupper($professor->nome_professor) }}</span>
            </p>
        </li>
        
        <li class="assinatura">
            <p align="center">____________________________________________________________</p>
            <p align="center">
                <b>
                    CONTRATANTE: 
                </b>
                <span>{{ strtoupper($aluno->nome) }}</span>
            </p>
        </li>

        <h5 class="informacoes subtitulo" style="text-transform: uppercase; margin-top: 200px;">Testemunhas</h5>


        <li class="informacoes">
            <p>
                1) ______________________________________
                RG: ___________________________
            </p>
            <p>
                2) ______________________________________
                RG: ___________________________
            </p>

        </li>





    </ul>
</body>

</html>
