@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row">
            <div class="row align-items-center justify-content-between">
                <div class="col-6">
                    <h4 class="card-title">{{ $treino->nome_treino }}</h4>
                </div>
                <div class="col-2">
                    <a href="{{ route('treino.modificar', $treino->codigo_treino) }}" class="btn btn-sm text-white" style="font-weight: 700; background: #4154f1;">Modificar +</a>
                </div>
            </div>

            {{-- TREINO A --}}
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Treino A</h4>
                            </div>
                        </div>

                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Exercício</th>
                                    <th>Séries</th>
                                    <th>Repetições</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($treino_a as $treino)
                                    <tr>
                                        <td>{{ $treino->exercicio->nome_exercicio }}</td>
                                        <td>4x</td>
                                        <td>12</td>
                                        <td>
                                            <a href="">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            {{-- TREINO B --}}
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Treino B </h4>
                            </div>
                        </div>

                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Exercício</th>
                                    <th>Séries</th>
                                    <th>Repetições</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($treino_b))
                                    @foreach ($treino_b as $treino)
                                        <tr>
                                            <td>{{ $treino->exercicio->nome_exercicio }}</td>
                                            <td>4x</td>
                                            <td>12</td>
                                            <td>
                                                <a href="">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            {{-- TREINO C --}}
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Treino C</h4>
                            </div>
                        </div>

                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Exercício</th>
                                    <th>Séries</th>
                                    <th>Repetições</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($treino_c))
                                    @foreach ($treino_c as $treino)
                                        <tr>
                                            <td>{{ $treino->exercicio->nome_exercicio }}</td>
                                            <td>4x</td>
                                            <td>12</td>
                                            <td>
                                                <a href="">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            {{-- TREINO D --}}
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Treino D</h4>
                            </div>
                        </div>

                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Exercício</th>
                                    <th>Séries</th>
                                    <th>Repetições</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($treino_d))
                                    @foreach ($treino_d as $treino)
                                        <tr>
                                            <td>{{ $treino->exercicio->nome_exercicio }}</td>
                                            <td>4x</td>
                                            <td>12</td>
                                            <td>
                                                <a href="">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
