<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            padding: 50px;
        }

        * {
            box-sizing: border-box;
        }

        .receipt-main {
            display: inline-block;
            width: 40%;
            padding: 15px;
            font-size: 12px;
            border: 1px solid #000;
        }

        .receipt-title {
            text-align: center;
            text-transform: uppercase;
            font-size: 20px;
            font-weight: 600;
            margin: 0;
        }

        .receipt-label {
            font-weight: 600;
        }

        .text-large {
            font-size: 16px;
        }

        .receipt-section {
            margin-top: 10px;
        }

        .receipt-footer {
            text-align: center;
            background: #ff0000;
        }

        .receipt-signature {
            height: 80px;
            margin: 50px 0;
            padding: 0 50px;
            background: #fff;

            .receipt-line {
                margin-bottom: 10px;
                border-bottom: 1px solid #000;
            }

            p {
                text-align: center;
                margin: 0;
            }
        }

    </style>
</head>

<body>
    <div class="receipt-main">

        <p class="receipt-title">TREINO A</p>

        <div class="receipt-section pull-left">
            <span class="receipt-label text-large">PROFESSOR: </span>
            <span class="text-large">PAULO</span>
        </div>

        <div class="pull-right receipt-section">
            <span class="text-large receipt-label">ALUNO:</span>
            <span class="text-large">LUIAN ALVES DE MORAIS</span>
        </div>

        <div class="clearfix"></div>

        <div class="receipt-section">
            <span class="receipt-label">SERVIÇO:</span>
            <span>PERSONAL</span>
        </div>

        <div class="receipt-section">
            <span class="receipt-label">DATA DE CRIAÇÃO DO TREINO:</span>
            <span>12/11/2021</span>
        </div>

        <div class="receipt-section">
            <p>Recebi de Tabata Ruiz a importância de cinquenta reais</p>
            <p>Referente a meus serviços profissionais</p>
        </div>

        <div class="receipt-section">
            <p class="pull-right text-large">São Paulo, DATA DO DIA - HORA DO DOWNLOAD</p>
        </div>

        <div class="clearfix"></div>

        <div class="receipt-signature col-xs-6">
            <p class="receipt-line"></p>

            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Exercícios</th>
                        <th>Séries</th>
                        <th>Repetições</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($download_treino as $treino)
                      <tr>
                        <td>{{ $treino->exercicio->nome_exercicio }}</td>
                        <td>{{ $treino->serie }} x</td>
                        <td>{{ $treino->repeticao }}</td>
                      </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</body>

</html>
