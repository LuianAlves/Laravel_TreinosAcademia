<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Treino - {{ $dados_treino->aluno->nome}}</title>

    <style type="text/css">
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            padding: 20px;
        }

        th {
            text-align: left;
        }
        
        tr {
            line-height: 1.25;
        }

        ul {
            list-style: none;
        }

        ul li {
            font-family: 'Poppins', sans-serif;
            line-height: 2;
        }

        ul li b,
        table tr,
        table th {
            font-size: 16px;
            font-weight: 550;
            color: rgb(151, 141, 45);
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

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>

    {{-- Dados Aluno --}}
    <ul>
        <h4 style="text-transform: uppercase;">Dados do Aluno</h4>
        <li>    
            <b>Aluno: </b>{{ ucwords($dados_treino->aluno->nome) }}
        </li>
        <li>    
            <b>Telefone: </b>{{ strtoupper($dados_treino->aluno->telefone) }}
        </li>
        @if($dados_treino->aluno->email)
            <li>    
                <b>E-mail: </b>{{ $dados_treino->aluno->email }}
            </li>
        @endif
    </ul>
    
    {{-- Treino --}}
    <ul style="margin-top: 15px; padding-bottom: 50px;">
        <h4 style="text-transform: uppercase;">Dados do Professor</h4>
        <li>    
            <b>Professor: </b>{{ ucwords($dados_treino->professor) }}
        </li>
        <li>    
            <b>Tipo de Serviço Contratado: </b>{{ ucwords($dados_treino->aluno->tipo_treino) }}
        </li>
        <li>    
            <b>Treino Criado em: </b>{{ $data_treino }}
        </li>
        <li style="padding-bottom: 10px;">    
            <b>Baixado em: </b>{{ $data_download }}
        </li>
    </ul> 

        {{-- Treino A --}}
        @if ($treino_a->isEmpty())
        @else
            <div class="page-break"></div>
            <h4 align="center" style="color:rgb(151, 141, 45); margin-top: 60px;">Treino A</h4>

            <table align="center" class="borda-tabela" width="50%">
                <thead class="borda-lista">
                    <tr>
                        <th class="borda-direita" style="text-align: center">Exercícios</th>
                        <th class="borda-direita" style="text-align: center">Séries</th>
                        <th style="text-align: center">Repetições</th>
                    </tr>
                </thead>
                <tbody id="exercicios">
                    @foreach($treino_a as $treino)
                        <tr>
                            <td class="borda-direita borda-lista" align="center">
                                <span class="borda-direita">{{ $treino->exercicio->nome_exercicio }}</span> 
                            </td>
                            <td class="borda-direita borda-lista" align="center">
                                <span>{{ $treino->serie }} x</span> 
                            </td>
                            <td align="center" class="borda-lista">
                                <span>{{ $treino->repeticao }}</span> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        {{-- Treino B --}}
        @if ($treino_b->isEmpty())
        @else
            <div class="page-break"></div>
            <h4 align="center" style="color:rgb(151, 141, 45); margin-top: 60px;">Treino B</h4>

            <table align="center" class="borda-tabela" width="50%">
                <thead class="borda-lista">
                    <tr>
                        <th class="borda-direita" style="text-align: center">Exercícios</th>
                        <th class="borda-direita" style="text-align: center">Séries</th>
                        <th style="text-align: center">Repetições</th>
                    </tr>
                </thead>
                <tbody id="exercicios">
                    @foreach($treino_b as $treino)
                        <tr>
                            <td class="borda-direita borda-lista" align="center">
                                <span class="borda-direita">{{ $treino->exercicio->nome_exercicio }}</span> 
                            </td>
                            <td class="borda-direita borda-lista" align="center">
                                <span>{{ $treino->serie }} x</span> 
                            </td>
                            <td align="center" class="borda-lista">
                                <span>{{ $treino->repeticao }}</span> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        {{-- Treino C --}}
        @if ($treino_c->isEmpty())
        @else
            <div class="page-break"></div>
            <h4 align="center" style="color:rgb(151, 141, 45); margin-top: 60px;">Treino C</h4>

            <table align="center" class="borda-tabela" width="50%">
                <thead class="borda-lista">
                    <tr>
                        <th class="borda-direita" style="text-align: center">Exercícios</th>
                        <th class="borda-direita" style="text-align: center">Séries</th>
                        <th style="text-align: center">Repetições</th>
                    </tr>
                </thead>
                <tbody id="exercicios">
                    @foreach($treino_c as $treino)
                        <tr>
                            <td class="borda-direita borda-lista" align="center">
                                <span class="borda-direita">{{ $treino->exercicio->nome_exercicio }}</span> 
                            </td>
                            <td class="borda-direita borda-lista" align="center">
                                <span>{{ $treino->serie }} x</span> 
                            </td>
                            <td align="center" class="borda-lista">
                                <span>{{ $treino->repeticao }}</span> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        {{-- Treino D --}}
        @if ($treino_d->isEmpty())
        @else
            <div class="page-break"></div>
            <h4 align="center" style="color:rgb(151, 141, 45); margin-top: 60px;">Treino D</h4>

            <table align="center" class="borda-tabela" width="50%">
                <thead class="borda-lista">
                    <tr>
                        <th class="borda-direita" style="text-align: center">Exercícios</th>
                        <th class="borda-direita" style="text-align: center">Séries</th>
                        <th style="text-align: center">Repetições</th>
                    </tr>
                </thead>
                <tbody id="exercicios">
                    @foreach($treino_d as $treino)
                        <tr>
                            <td class="borda-direita borda-lista" align="center">
                                <span class="borda-direita">{{ $treino->exercicio->nome_exercicio }}</span> 
                            </td>
                            <td class="borda-direita borda-lista" align="center">
                                <span>{{ $treino->serie }} x</span> 
                            </td>
                            <td align="center" class="borda-lista">
                                <span>{{ $treino->repeticao }}</span> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif


</body>

</html>
