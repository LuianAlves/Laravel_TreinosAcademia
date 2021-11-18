<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Ficha de Avaliação Física {{ $dados->aluno->nome}}</title>

    <style type="text/css">
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            padding: 20px;
        }

        table {
            font-size: x-small;
        }

        th {
            text-align: left;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        .page-break {
            page-break-after: always;
        }

        ul {
            list-style: none;
        }

        ul li {
            font-family: 'Poppins', sans-serif;
            line-height: 3;
        }

        ul li b,
        table tr,
        table th {
            font-size: 16px;
            font-weight: 550;
            color: rgb(179, 158, 204);
        }

        ul li span,
        table span {
            margin-left: 5px;
            text-transform: capitalize;
            font-weight: 400;
            color: #45505b;
        }

        .borda-tabela {
            border: 1px solid rgba(236, 236, 236, 0.5);
        }

        .borda-lista {
            border-bottom: 1px solid rgba(236, 236, 236, 0.5);
        }

        .borda-direita {
            border-right: 1px solid rgba(236, 236, 236, 0.5);
        }
    </style>
</head>

<body>

    {{-- Dados --}}
    <h3 align="center">Dados do Aluno</h3>
    <table class="borda-tabela" width="100%" style="margin-top: 60px;">
        <tr>
            <td>
                <b> Nome: </b>
                <span>{{ $dados->aluno->nome }}</span>
            </td>
            <td>
                <b> Data de Nasc: </b>
                <span>{{ $dados->data_nasc }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <b> Celular: </b>
                <span>{{ $dados->aluno->telefone }}</span>
            </td>
            <td>
                <b> E-mail: </b>
                <span>{{ $dados->aluno->email }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <b> Histórico Familiar: </b>
                <span>{{ $dados->historico_familiar }}</span>
            </td>
            <td>
                <b> Objetivo: </b>
                <span>{{ $dados->aluno->objetivo }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <b> Estatura: </b>
                <span class="text-muted">{{ $dados->estatura }}</span>
            </td>
            <td>
                <b> Peso: </b>
                <span class="text-muted">{{ $dados->peso }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <b> Restrições: </b>
                <span class="text-muted">{{ $dados->aluno->observacao_restricao }}</span>
            </td>
        </tr>

    </table>

    {{-- Perímetros --}}
    <h3 align="center" style="margin-top: 50px;">Perímetros</h3>
    <table class="borda-tabela" width="100%" style="margin-top: 60px;">
        <thead>
            <tr>
                <td width="65%"></td>
                <td align="center">Direito(a)</td>
                <td>Esquerdo(a)</td>
            </tr>
        </thead>
    </table>

    <table class="borda-tabela" width="100%" style="margin-bottom: 60px;">
        <tbody>
            <tr>
                <th>Tórax:</th>
                <th class="borda-direita" width="30%"><span>{{ $perimetros->torax }}</span></th>
                <th>Antebraço: </th>
                <th width="15%"><span> {{ $perimetros->antebraco_direito }}</span></th>
                <th width="16%"><span>{{ $perimetros->antebraco_esquerdo }}</span></th>
            </tr>
            <tr>
                <th>Cintura:</th>
                <th class="borda-direita"><span>{{ $perimetros->cintura }}</span></th>
                <th>Braço: </th>
                <th><span> {{ $perimetros->braco_direito }}</span></th>
                <th><span>{{ $perimetros->braco_esquerdo }}</span></th>
            </tr>
            <tr>
                <th>Abdomê:</th>
                <th class="borda-direita"><span>{{ $perimetros->cintura }}</span></th>
                <th>Coxa: </th>
                <th><span> {{ $perimetros->coxa_direita }}</span></th>
                <th><span>{{ $perimetros->coxa_esquerda }}</span></th>
            </tr>
            <tr>
                <th>Quadril:</th>
                <th class="borda-direita"><span>{{ $perimetros->cintura }}</span></th>
                <th>Panturrilha: </th>
                <th><span> {{ $perimetros->panturrilha_direita }}</span></th>
                <th><span>{{ $perimetros->panturrilha_esquerda }}</span></th>
            </tr>
        </tbody>

    </table>

    {{-- Dobras Cutaneas --}}
    <h3 align="center" style="margin-top: 60px;">Dobras Cutâneas</h3>
    <table class="borda-tabela" width="100%" style="margin-top: 60px;">
        <tbody>
            <tr>
                <th class="borda-direita" colspan="4">Subscapular: <span>{{ $dobras->subscapular }}</span></th>
                <th>Triciptal: <span> {{ $dobras->triciptal }}</span></th>
            </tr>
            <tr>
                <th class="borda-direita" colspan="4">Axilar-Média: <span>{{ $dobras->axilar_media }}</span></th>
                <th>abdominal: <span> {{ $dobras->abdominal }}</span></th>
            </tr>
            <tr>
                <th class="borda-direita" colspan="4">Supra-Íliaca: <span>{{ $dobras->supra_iliaca }}</span></th>
                <th>Coxa: <span> {{ $dobras->coxa }}</span></th>
            </tr>
            <tr>
                <th class="borda-direita" colspan="4">Peitoral: <span>{{ $dobras->peitoral }}</span></th>
            </tr>
        </tbody>

    </table>

    {{-- Neuromotores --}}
    <h3 align="center" style="margin-top: 60px;">Neuromotores</h3>
    <table class="borda-tabela" width="100%" style="margin-top: 60px;">
        <tbody>
            <tr>
                <th class="borda-direita" colspan="">Flexões: <span>{{ $neuro->flexoes }}</span>
                </th>

                <th class="borda-direita" colspan="4">Abdominais:
                    <span>{{ $neuro->abdominais }}</span>
                </th>

                <th class="borda-direita" colspan="4">Flexibilidade:
                    <span>{{ $neuro->flexibilidade }}</span>
                </th>
            </tr>
        </tbody>
    </table>

    <div class="page-break"></div>

    {{-- Anamnese --}}
    <h3 align="center">Anamnese</h3>
    <ul class="borda-tabela" style="margin-top: 60px;">
        {{-- Atividade Física --}}
        <li>
            <b>Pratica atividade física atualmente?</b>
            <div class="borda-lista">
                {{ ucfirst($anamnese->atividade_fisica) }}
            </div>
        </li>

        {{-- Medicamento --}}
        <li>
            <b>Utiliza algum tipo de medicamento?</b>
            <div class="borda-lista">
                {{ ucfirst($anamnese->medicamento) }}
            </div>
        </li>

        {{-- Cirurgia --}}
        <li>
            <b>Já passou por alguma Cirurgia?</b>
            <div class="borda-lista">
                {{ ucfirst($anamnese->cirurgia) }}
            </div>
        </li>

        {{-- Doença na Familia --}}
        <li>
            <b>Possui alguma doença na família?</b>
            <div class="borda-lista">
                {{ ucfirst($anamnese->doenca_familia) }}
            </div>
        </li>

        {{-- Observações --}}
        <li>
            <b>Observações: </b>
            <div class="borda-lista">
                {{ ucfirst($anamnese->observacoes) }}
            </div>
        </li>
    </ul>

    <div class="page-break"></div>

    {{-- Questionário --}}
    <h3 align="center">Questionário de Prontidão para Atividade Física (PAR-Q)</h3>
    <ul class="borda-tabela" style="margin-top: 60px;">
        {{-- Prescrição Médica --}}
        <li>
            <p>Alguma vez o médico lhe disse que você possuía um problema do coração e lhe
                recomendou
                que só fizesse atividade física sob prescrição medica?</p>
            <div class="borda-lista">
                <b>{{ ucfirst($anamnese->prescricao_medica) }}</b>
            </div>
        </li>



        {{-- Dor no Peito --}}
        <li>
            <p>Você sente dor no peito, causada pela práticada de atividade física?</p>
            <div class="borda-lista">
                <b>{{ ucfirst($anamnese->dor_peito) }}</b>
            </div>
        </li>



        {{-- Dor no Peito Ultimo Mês --}}
        <li>
            <p>Você sentiu dor no peito no ultimo mês?</p>
            <div class="borda-lista">
                <b>{{ ucfirst($anamnese->dor_peito_ult_mes) }}</b>
            </div>
        </li>



        {{-- Tonteira ou Desmaio --}}
        <li>
            <p>Você tende a perder a consciência ou cair, como resultado de tonteira ou desmaio?</p>
            <div class="borda-lista">
                <b>{{ ucfirst($anamnese->tonteira_desmaio) }}</b>
            </div>
        </li>



        {{-- Problema òsseo --}}
        <li>
            <p>Você tem algum problema ósseo ou muscular que poderia ser agravado com pratica de
                atividade física?</p>
            <div class="borda-lista">
                <b>{{ ucfirst($anamnese->problema_osseo) }}</b>
            </div>
        </li>



        {{-- Medicamento para Pressão Arterial --}}
        <li>
            <p>Algum medico já lhe recomendou o uso de medicamentos para pressão arterial, para
                circulação ou coração?</p>
            <div class="borda-lista">
                <b>{{ ucfirst($anamnese->medicamento_pressao_arterial) }}</b>
            </div>
        </li>



        {{-- Atividade Física sem Supervisão --}}
        <li>
            <p>Você tem consciência, através da sua própria experiência ou aconselhamento medico, de
                alguma outra razão física que impeça sua pratica de atividade física sem supervisão
                medica?</p>
            <div class="borda-lista">
                <b>{{ ucfirst($anamnese->atividade_sem_supervisao) }}</b>
            </div>
        </li>
    </ul>

</body>

</html>
