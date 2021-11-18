<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>{{ strtoupper(str_replace('_', ' ', $divisao)) }} - {{ $treino->aluno->nome}}</title>

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
    <ul>
        <h3 style="text-transform: uppercase;">Dados do Aluno</h3>
        <li>    
            <b>Aluno: </b>{{ strtoupper($treino->aluno->nome) }}
        </li>
        <li>    
            <b>Telefone: </b>{{ strtoupper($treino->aluno->telefone) }}
        </li>
        <li>    
            <b>E-mail: </b>{{ $treino->aluno->email }}
        </li>
    </ul>

    {{-- Treino --}}
    <ul style="margin-top: 50px; padding-bottom: 50px;">
        <h3>{{ strtoupper(str_replace('_', ' ', $divisao)) }}</h3>
        <li>    
            <b>Professor: </b>{{ strtoupper($treino->professor) }}
        </li>
        <li>    
            <b>Tipo de Serviço Contratado: </b>{{ strtoupper($treino->aluno->tipo_treino) }}
        </li>
        <li>    
            <b>Treino Criado em: </b>{{ $data_treino }}
        </li>
        <li style="padding-bottom: 10px;">    
            <b>Baixado em: </b>{{ $data_download }}
        </li>
    
        <table align="center" class="borda-tabela" width="75%" style="margin-top: 60px;">
            <thead class="borda-lista">
                <tr>
                    <th class="borda-direita" style="text-align: center">Exercícios</th>
                    <th class="borda-direita" style="text-align: center">Séries</th>
                    <th style="text-align: center">Repetições</th>
                </tr>
            </thead>
            <tbody id="exercicios">
                @foreach($download_treino as $treino)
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
    </ul>

</body>

</html>
