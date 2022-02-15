@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section dashboard">
        <div class="row">

            <!-- Lado Esquerdo -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Dinheiro do Mês -->
                    <div class="col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Pagamentos <span>| Mês</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>R$ {{ str_replace('.', ',', $caixa_mes) }}</h6>
                                        <span
                                            class="text-success small pt-1 fw-bold">{{ $caixa_mes != 0 ? $caixa_mes / 1000 : '0' }}%</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Pendentes -->
                    <div class="col-md-6">
                        <div class="card info-card customers-card ">

                            <div class="card-body">
                                <h5 class="card-title">Pendentes <span>| Todos</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bx-block"></i>
                                    </div>

                                    <div class="ps-3">
                                        <h6>R$ {{ str_replace('.', ',', $caixa_pendente_mes) }}</h6>
                                        <span
                                            class="text-danger small pt-1 fw-bold">{{ $caixa_pendente_mes != 0 ? $caixa_pendente_mes / 1000 : '0' }}%</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Novos Alunos -->
                    <div class="col-xl-5">

                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Novos Alunos <span>| Mês</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $alunos_novos }}</h6>
                                        <span class="text-primary small pt-1 fw-bold">{{ $alunos_novos != 0 ? $alunos_novos / 10 : '0' }}%</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    
                    <!-- Avaliações Realizadas -->
                    <div class="col-xl-7">

                        <div class="card info-card">

                            <div class="card-body">
                                <h5 class="card-title">Avaliações Realizadas <span>| Mês</span></h5>
                                
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background: rgba(255, 0, 0, 0.226)">
                                        <i class="bx bx-heart text-danger"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $avaliacoes }}</h6>
                                        <span class="text-secondary small pt-1 fw-bold">{{ $avaliacoes != 0 ? $avaliacoes / 10 : '0' }}%</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- Gráfico de Pagamentos -->
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <h5 class="card-title">Entrada de Caixa <span>/Mês</span></h5>

                                <div id="chart" style="min-height: 200px;"></div>

                                @push('js')
                                    <script>
                                        const pagamento = new Chartisan({
                                            el: '#chart',
                                            url: "@chart('pagamento_chart')",
                                            hooks: new ChartisanHooks()
                                                .colors()
                                                .datasets([{
                                                        type: 'line',
                                                        fill: false,
                                                        borderColor: 'green'
                                                    },
                                                    {
                                                        type: 'line',
                                                        fill: false,
                                                        borderColor: 'red'
                                                    }
                                                ]),

                                        });
                                    </script>
                                @endpush
                            </div>

                        </div>
                    </div>

                    <!-- PAGAMENTOS PENDENTES -->
                    <div class="col-12">
                        <div class="card recent-sales">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Pagamentos <span>| Pendentes</span></h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Serviço</th>
                                            <th scope="col">Aluno</th>
                                            <th scope="col">Valor</th>
                                            <th scope="col">Validar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pagamentos_pendentes as $pgt)
                                            <tr>
                                                <td style="font-weight: 550;">{{ ucfirst($pgt->tipo_servico) }}</td>
                                                <td>{{ $pgt->aluno->nome }}</td>
                                                <td><b class="text-danger">R$ {{ $pgt->valor_pagamento_geral }}</b>
                                                </td>
                                                <td>
                                                    <a href="{{ route('pagamentos.pagou', $pgt->id) }}"><i
                                                            class="bx bx-checkbox-checked fs-3 text-success"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>

                </div>
            </div>


            <!-- Lado Direito -->
            <div class="col-lg-4">

                <!-- Alunos -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Alunos Recentes</h5>
                        <div class="activity">
                            @foreach ($alunos as $aluno)
                                <div class="activity-item d-flex">
                                    <div class="activite-label col-5">{{ Carbon\Carbon::parse($aluno->created_at)->diffForHumans() }}</div>
                                    <i class='bi bi-circle-fill col-1 activity-badge align-self-start'></i>
                                    <div class="activity-content col-6">
                                        Novo Aluno <a href="#" class="fw-bold" style="color: #11ac6c;">{{ $aluno->nome }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <!-- Ultimos Treinos -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Treinos Recentes</h5>
                        <div class="activity">
                            @foreach($treinos as $exe)
                                <div class="activity-item d-flex">
                                    <div class="activite-label col-5">{{ Carbon\Carbon::parse($exe->created_at)->diffForHumans() }}</div>
                                    <i class='bi bi-circle-fill col-1 activity-badge align-self-start'></i>
                                    <div class="activity-content col-6">
                                        Treino <a href="{{ route('adicionar.index', $exe->id) }}" class="fw-bold" style="color: #11ac6c;">[{{ $exe->codigo_treino }}]</a> criado para o aluno <b>{{ $exe->aluno->nome }}</b>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Ultimos Alunos -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Avaliações Recentes</h5>
                        <div class="activity">
                            @foreach ($ava_recent as $ava)
                                <div class="activity-item d-flex">
                                    <div class="activite-label col-5">{{ Carbon\Carbon::parse($ava->created_at)->diffForHumans() }}</div>
                                    <i class='bi bi-circle-fill col-1 activity-badge align-self-start'></i>
                                    <div class="activity-content col-6">
                                        Avaliação <a href="{{ route('download.avaliacao.fisica', $ava->codigo_avaliacao) }}" class="fw-bold" style="color: #11ac6c;">[{{ $ava->codigo_avaliacao }}]</a> realizada para o aluno <b>{{ $ava->aluno->nome }}</b>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

@endsection