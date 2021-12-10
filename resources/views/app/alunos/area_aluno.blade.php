<!DOCTYPE html>

@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3" id="card-main">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Área do Aluno {{ $aluno->nome }}</h4>
                                <a href="{{ route('alunos.index') }}" class="btn btn-sm btn-success text-white"
                                    style="font-weight: 700; padding-top: 3px;">Listagem de Alunos</a>
                            </div>
                            @if (App\Models\Contratos\DadosProfessorContrato::count() == 0)
                                <hr class="text-muted w-25">
                                <h6 class="text-danger text-center mb-4"
                                    style="font-family: 'Poppins', sans-serif; font-style: italic;">Adicione um <a
                                        href="{{ route('dados-professores.index') }}">Professor</a> para
                                    liberar o restante das informações!</h6>
                                <hr class="text-muted w-25">
                            @endif
                        </div>

                        {{-- Visualizar/Editar/Pagamentos --}}
                        <div class="row">
                            {{-- Visualizar --}}
                            <div class="col-4">
                                <div class="card mini-card">
                                    <div class="card-body">
                                        <h6 class="text-center fw-bold m-2">Visualizar Informações</h6>
                                        <div class="d-flex justify-content-center">
                                            <a href="" data-bs-toggle="modal" data-bs-target="#showAluno"
                                                id="{{ $aluno->id }}" onclick="visualizarAluno(this.id)">
                                                <i class="bx bx-minus-front"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Editar --}}
                            <div class="col-4">
                                <div class="card mini-card">
                                    <div class="card-body">
                                        <h6 class="text-center fw-bold m-2">Editar Informações</h6>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('alunos.edit', $aluno->id) }}">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Pagamentos --}}
                            <div class="col-4">
                                <div class="card mini-card">
                                    <div class="card-body">
                                        <h6 class="text-center fw-bold m-2">Pagamentos</h6>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('pagamentos.geral.index', $aluno->id) }}">
                                                <i class="bx bx-dollar-circle"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Treinos/Contratos/Avaliações --}}
                        @if (App\Models\Contratos\DadosProfessorContrato::count() != 0)
                            {{-- Treinos --}}
                            <div class="row">
                                {{-- Montar Treino --}}
                                <div class="col-4">
                                    <div class="card mini-card">
                                        <div class="card-body">
                                            <h6 class="text-center fw-bold m-3">Novo Treino</h6>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('montar.create', $aluno->id) }}">
                                                    <i class="bx bx-plus-circle"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Treinos Montados --}}
                                @if (!empty($treinos))
                                    <div class="col-4">
                                        <div class="card mini-card">
                                            <div class="card-body">
                                                <h6 class="text-center fw-bold m-3">Treinos Montados</h6>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('montado.index', $aluno->id) }}">
                                                        <i class="bx bx-dumbbell"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            {{-- Contratos --}}
                            <div class="row">
                                {{-- Montar Contratos --}}
                                <div class="col-4">
                                    <div class="card mini-card">
                                        <div class="card-body">
                                            <h6 class="text-center fw-bold m-3">Novo Contrato</h6>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('montar-contrato.create', $aluno->id) }}">
                                                    <i class="bx bx-plus-circle"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Contratos Montados --}}
                                @if (!empty($contratos))
                                    <div class="col-4">
                                        <div class="card mini-card">
                                            <div class="card-body">
                                                <h6 class="text-center fw-bold m-3">Contratos</h6>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('contratos-montados.index', $aluno->id) }}">
                                                        <i class="bx bx-notepad"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            {{-- Avaliações Físicas --}}
                            <div class="row">
                                {{-- Montar Avaliação --}}
                                <div class="col-4">
                                    <div class="card mini-card">
                                        <div class="card-body">
                                            <h6 class="text-center fw-bold m-3">Nova Avaliação Física</h6>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('realizar.index', $aluno->id) }}">
                                                    <i class="bx bx-plus-circle"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Treinos Montados --}}
                                @if (!empty($avaliacoes))
                                    <div class="col-4">
                                        <div class="card mini-card">
                                            <div class="card-body">
                                                <h6 class="text-center fw-bold m-3">Avaliações Realizadas</h6>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('avaliacoes.show', $aluno->id) }}">
                                                        <i class="bx bx-heart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif

                        {{-- Excluir Aluno --}}
                        <div class="row mt-3">
                            <div class="col-4">
                                <div class="card mini-card">
                                    <div class="card-body">
                                        <h6 class="text-center text-danger fw-bold m-2">Excluir Aluno</h6>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('area-aluno.destroy', $aluno->id) }}" id="delete">
                                                <i class="bx bx-block text-danger"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>


@endsection

<style>
    * {
        font-family: "Poppins", sans-serif;
    }

    h4 {
        font-size: 26px;
    }

    h6 {
        color: #45505b;
    }

    .card .mini-card {
        border-radius: 15px;
        align-items: center;
        background: rgba(255, 255, 255, 0.411);
    }

    .card .mini-card i {
        font-size: 50px;
        margin-top: 10px;
        color: #45505b;
    }

    .card .mini-card:hover i {
        font-size: 56px;
        color: #8e65fd;
    }

</style>
