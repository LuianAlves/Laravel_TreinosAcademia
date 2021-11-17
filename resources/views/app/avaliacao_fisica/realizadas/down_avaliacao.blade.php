<!DOCTYPE html>

    <section class="section">

        <div class="row">
            <div class="card">
                <div class="card-body mt-4">

                    {{-- Dados --}}
                    <div class="row m-5">
                        <h5 class="card-title text-center">Dados do Aluno</h5>
                        <ul>
                            <li>
                                <div class="row">
                                    <div class="col-6">
                                        <b> Nome: </b> 
                                        <span class="text-muted">{{ $dados->aluno->nome }}</span>
                                    </div>
                                    <div class="col-6">
                                        <b> Data de Nasc: </b> 
                                        <span class="text-muted">{{ $dados->data_nasc }}</span>
                                    </div>
                                </div>
                            </li>
                            
                            <li>
                                <div class="row">
                                    <div class="col-6">
                                        <b> Celular: </b> 
                                        <span class="text-muted">{{ $dados->aluno->telefone }}</span>
                                    </div>
                                    <div class="col-6">
                                        <b> E-mail: </b> 
                                        <span class="text-muted">{{ $dados->aluno->email }}</span>
                                    </div>
                                </div>
                            </li>
                            
                            <li>
                                <div class="row">
                                    <div class="col-6">
                                        <b> Histórico Familiar: </b> 
                                        <span class="text-muted">{{ $dados->historico_familiar }}</span>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="row">
                                    <div class="col-6">
                                        <b> Objetivo: </b> 
                                        <span class="text-muted">{{ $dados->aluno->objetivo }}</span>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="row">
                                    <div class="col-6">
                                        <b> Estatura: </b> 
                                        <span class="text-muted">{{ $dados->estatura }}</span>
                                    </div>
                                    <div class="col-6">
                                        <b> Peso: </b> 
                                        <span class="text-muted">{{ $dados->peso }}</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-12">
                                        <b> Restrições: </b> 
                                        <span class="text-muted">{{ $dados->aluno->observacao_restricao }}</span>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>

                    {{-- Perímetros --}}
                    <div class="row m-5">
                        <h5 class="card-title text-center">Perímetros</h5>  
                        <table class="table">
                            <tbody class="borda-tabela">
                                <tr>
                                    <th colspan="5"></th>
                                    <th class="borda-direita">Direito (a)</th>
                                    <th>Esquerdo (a)</th>
                                </tr>
                                <tr>
                                    <th colspan="3">Tórax:</th>
                                    <th class="borda-direita"><span>{{ $perimetros->torax }}</span></th>
                                    <th>Antebraço: </th>
                                    <th class="borda-direita"><span> {{ $perimetros->antebraco_direito }}</span></th>
                                    <th><span>{{ $perimetros->antebraco_esquerdo }}</span></th>
                                </tr>
                                <tr>
                                    <th colspan="3">Cintura:</th>
                                    <th class="borda-direita"><span>{{ $perimetros->cintura }}</span></th>
                                    <th>Braço: </th>
                                    <th class="borda-direita"><span> {{ $perimetros->braco_direito }}</span></th>
                                    <th><span>{{ $perimetros->braco_esquerdo }}</span></th>
                                </tr>
                                <tr>
                                    <th colspan="3">Abdomê:</th>
                                    <th class="borda-direita"><span>{{ $perimetros->cintura }}</span></th>
                                    <th>Coxa: </th>
                                    <th class="borda-direita"><span> {{ $perimetros->coxa_direita }}</span></th>
                                    <th><span>{{ $perimetros->coxa_esquerda }}</span></th>
                                </tr>
                                <tr>
                                    <th colspan="3">Quadril:</th>
                                    <th class="borda-direita"><span>{{ $perimetros->cintura }}</span></th>
                                    <th>Panturrilha: </th>
                                    <th class="borda-direita"><span> {{ $perimetros->panturrilha_direita }}</span></th>
                                    <th><span>{{ $perimetros->panturrilha_esquerda }}</span></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    {{-- Dobras Cutaneas --}}
                    <div class="row m-5">
                        <h5 class="card-title text-center mb-5">Dobras Cutâneas</h5>
                        <table class="table">
                            <tbody class="borda-tabela">
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
                    </div>
                    
                    {{-- Neuromotores --}}
                    <div class="row m-5">
                        <h5 class="card-title text-center mb-5">Neuromotores</h5>
                        <table class="table">
                            <tbody class="borda-tabela">
                                <tr>
                                    <th class="borda-direita" colspan="">Flexões: <span>{{ $neuro->flexoes }}</span></th>

                                    <th class="borda-direita" colspan="4">Abdominais: <span>{{ $neuro->abdominais }}</span></th>

                                    <th class="borda-direita" colspan="4">Flexibilidade: <span>{{ $neuro->flexibilidade }}</span></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- Anamnese --}}
                    <div class="row m-5">
                        <h5 class="card-title text-center mb-5">Anamnese</h5>
                        <ul class="borda-tabela">
                            {{-- Atividade Física --}}
                            <li>
                                <div class="row borda-lista">
                                    <div class="col-8">
                                        <p>Pratica atividade física atualmente?</p>
                                    </div>

                                    <div class="col-2">
                                        {{ strtoupper($anamnese->atividade_fisica) }}
                                    </div>
                                    
                                </div>
                            </li>

                            {{-- Medicamento --}}
                            <li>
                                <div class="row borda-lista">
                                    <div class="col-8">
                                        <p>Utiliza algum tipo de medicamento?</p>
                                    </div>

                                    <div class="col-2">
                                        {{ strtoupper($anamnese->medicamento) }}
                                    </div>

                                </div>
                            </li>

                            {{-- Cirurgia --}}
                            <li>
                                <div class="row borda-lista">
                                    <div class="col-8">
                                        <p>Já passou por alguma Cirurgia?</p>
                                    </div>

                                    <div class="col-2">
                                        {{ strtoupper($anamnese->cirurgia) }}
                                    </div>
                                </div>
                            </li>

                            {{-- Doença na Familia --}}
                            <li>
                                <div class="row borda-lista">
                                    <div class="col-8">
                                        <p>Possui alguma doença na família?</p>
                                    </div>

                                    <div class="col-2">
                                        {{ strtoupper($anamnese->doenca_familia) }}
                                    </div>
                                </div>
                            </li>

                            {{-- Observações --}}
                            <li>
                                <div class="row borda-lista mt-5">
                                    <div class="col-4">
                                        <h5>Observações: </h5>
                                    </div>
                                    <div class="col-8">
                                        {{ ucfirst($anamnese->observacoes) }}
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    {{-- Questionário --}}
                    <div class="row m-5">
                        <h5 class="card-title text-center mb-5">Questionário de Prontidão para Atividade Física (PAR-Q)</h5>
                        <ul class="borda-tabela">
                            {{-- Prescrição Médica --}}
                            <li>
                                <div class="row align-items-justify">
                                    <p>Alguma vez o médico lhe disse que você possuía um problema do coração e lhe
                                        recomendou
                                        que só fizesse atividade física sob prescrição medica?</p>
                                </div>
                                <div class="row borda-lista">
                                    <div class="col-8">
                                        <b>{{ strtoupper($anamnese->prescricao_medica) }}</b>
                                    </div>
                                </div>
                            </li>

                            

                            {{-- Dor no Peito --}}
                            <li>
                                <div class="row align-items-justify">
                                    <p>Você sente dor no peito, causada pela práticada de atividade física?</p>
                                </div>
                                <div class="row borda-lista">
                                    <div class="col-8">
                                        <b>{{ strtoupper($anamnese->dor_peito) }}</b>
                                    </div>
                                </div>
                            </li>

                            

                            {{-- Dor no Peito Ultimo Mês --}}
                            <li>
                                <div class="row align-items-justify">
                                    <p>Você sentiu dor no peito no ultimo mês?</p>
                                </div>
                                <div class="row borda-lista">
                                    <div class="col-8">
                                        <b>{{ strtoupper($anamnese->dor_peito_ult_mes) }}</b>
                                    </div>
                                </div>
                            </li>

                            

                            {{-- Tonteira ou Desmaio --}}
                            <li>
                                <div class="row align-items-justify">
                                    <p>Você tende a perder a consciência ou cair, como resultado de tonteira ou desmaio?</p>
                                </div>
                                <div class="row borda-lista">
                                    <div class="col-8">
                                        <b>{{ strtoupper($anamnese->tonteira_desmaio) }}</b>
                                    </div>
                                </div>
                            </li>

                            

                            {{-- Problema òsseo --}}
                            <li>
                                <div class="row align-items-justify">
                                    <p>Você tem algum problema ósseo ou muscular que poderia ser agravado com pratica de
                                        atividade física?</p>
                                </div>
                                <div class="row borda-lista">
                                    <div class="col-8">
                                        <b>{{ strtoupper($anamnese->problema_osseo) }}</b>
                                    </div>
                                </div>
                            </li>

                            

                            {{-- Medicamento para Pressão Arterial --}}
                            <li>
                                <div class="row align-items-justify">
                                    <p>Algum medico já lhe recomendou o uso de medicamentos para pressão arterial, para
                                        circulação ou coração?</p>
                                </div>
                                <div class="row borda-lista">
                                    <div class="col-8">
                                        <b>{{ strtoupper($anamnese->medicamento_pressao_arterial) }}</b>
                                    </div>
                                </div>
                            </li>

                            

                            {{-- Atividade Física sem Supervisão --}}
                            <li>
                                <div class="row align-items-justify">
                                    <p>Você tem consciência, através da sua própria experiência ou aconselhamento medico, de
                                        alguma outra razão física que impeça sua pratica de atividade física sem supervisão
                                        medica?</p>
                                </div>
                                <div class="row borda-lista">
                                    <div class="col-8">
                                        <b>{{ strtoupper($anamnese->atividade_sem_supervisao) }}</b>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>

<style>
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

    ul li b, table tr, table th {
        font-size: 16px;
        font-weight: 550;
        color: rgb(179, 158, 204);
    }

    ul li span, table span {
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

<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Aloha!</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"><img src="{{asset('images/meteor-logo.png')}}" alt="" width="150"/></td>
        <td align="right">
            <h3>Shinra Electric power company</h3>
            <pre>
                Company representative name
                Company address
                Tax ID
                phone
                fax
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <td><strong>From:</strong> Linblum - Barrio teatral</td>
        <td><strong>To:</strong> Linblum - Barrio Comercial</td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Unit Price $</th>
        <th>Total $</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Playstation IV - Black</td>
        <td align="right">1</td>
        <td align="right">1400.00</td>
        <td align="right">1400.00</td>
      </tr>
      <tr>
          <th scope="row">1</th>
          <td>Metal Gear Solid - Phantom</td>
          <td align="right">1</td>
          <td align="right">105.00</td>
          <td align="right">105.00</td>
      </tr>
      <tr>
          <th scope="row">1</th>
          <td>Final Fantasy XV - Game</td>
          <td align="right">1</td>
          <td align="right">130.00</td>
          <td align="right">130.00</td>
      </tr>
    </tbody>

    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Subtotal $</td>
            <td align="right">1635.00</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Tax $</td>
            <td align="right">294.3</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total $</td>
            <td align="right" class="gray">$ 1929.3</td>
        </tr>
    </tfoot>
  </table>

</body>
</html>