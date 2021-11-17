@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">

        {{-- Form - Controller/Model Dados Cadastrais --}}
        <div class="row">
            <div class="card">
                <div class="card-body mt-4">

                    <form action="{{ route('realizar.store') }}" method="post">
                    @csrf
                    
                        <input type="hidden" name="aluno_id" value="{{ $aluno->id }}">

                        <div class="row mb-5">
                            <h5 class="card-title text-center">Ficha de Avaliação Física</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nome: <span class="text-muted">{{ strtoupper($aluno->nome) }}</span></th>
                                        <th>Data de Nasc: <input type="text" name="data_nasc"></th>
                                    </tr>
                                    <tr>
                                        <th>Celular: <span class="text-muted">{{ strtoupper($aluno->telefone) }}</span></th>
                                        <th>E-mail: <span class="text-muted">{{ strtoupper($aluno->email) }}</span></th>
                                    </tr>
                                    <tr>
                                        <th>Histórico Familiar: <input type="text" name="historico_familiar"></th>
                                        <th class="col-6">Restrições: <span class="text-muted">{{ strtoupper($aluno->observacao_restricao) }}</span></th>
                                    </tr>
                                    <tr>
                                        <th>Objetivo: <span class="text-muted">{{ strtoupper($aluno->objetivo) }}</span></th>
                                    </tr>
                                    <tr>
                                        <th>Estatura: <input type="text" name="estatura"></th>
                                        <th>Peso: <input type="text" name="peso"></th>
                                    </tr>
                                    <tr>
                                        @if($aluno->tipo_treino == 'personal' || $aluno->tipo_treino == 'Personal')
                                            <th>Nível: <span class="text-muted">{{ strtoupper($treino->nivel_aluno) }}</span></th>
                                        @else
                                        @endif
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="row">
                            <h6 class="card-title">Perímetros</h6>       
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th colspan="6"></th>
                                        <th>Direito (a)</th>
                                        <th>Esquerdo (a)</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Torax</th>
                                        <th colspan="4"><input type="text" class="w-50" name="torax"></th>
                                        <th>Antebraço: </th>
                                        <th><input type="text" class="w-50" name="antebraco_direito"></th>
                                        <th><input type="text" class="w-50" name="antebraco_esquerdo"></th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Cintura</th>
                                        <th colspan="4"><input type="text" class="w-50" name="cintura"></th>
                                        <th>Braço: </th>
                                        <th><input type="text" class="w-50" name="braco_direito"></th>
                                        <th><input type="text" class="w-50" name="braco_esquerdo"></th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Abdôme</th>
                                        <th colspan="4"><input type="text" class="w-50" name="abdomen"></th>
                                        <th>Coxa: </th>
                                        <th><input type="text" class="w-50" name="coxa_direita"></th>
                                        <th><input type="text" class="w-50" name="coxa_esquerda"></th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Quadril</th>
                                        <th colspan="4"><input type="text" class="w-50" name="quadril"></th>
                                        <th>Panturrilha: </th>
                                        <th><input type="text" class="w-50" name="panturrilha_direita"></th>
                                        <th><input type="text" class="w-50" name="panturrilha_esquerda"></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="row">
                            <h6 class="card-title mt-5">Dobras Cutâneas</h6>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Subscapular: </th>
                                        <th><input type="text" class="w-50" name="subscapular"></th>
                                        <th>Triciptal: </th>
                                        <th><input type="text" class="w-50" name="triciptal"></th>
                                    </tr>
                                    <tr>
                                        <th>Axilar-Média: </th>
                                        <th><input type="text" class="w-50" name="axilar_media"></th>
                                        <th>Abdominal: </th>
                                        <th><input type="text" class="w-50" name="abdominal"></th>
                                    </tr>
                                    <tr>
                                        <th>Supra-Íliaca: </th>
                                        <th><input type="text" class="w-50" name="supra_iliaca"></th>
                                        <th>Coxa: </th>
                                        <th><input type="text" class="w-50" name="coxa"></th>
                                    </tr>
                                    <tr>
                                        <th>Peitoral: </th>
                                        <th><input type="text" class="w-50" name="peitoral"></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="row">
                            <h6 class="card-title mt-5">Neuromotores</h6>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Flexões: </th>
                                        <th><input type="text" class="w-50" name="flexoes"></th>
                                        <th>Abdominais: </th>
                                        <th><input type="text" class="w-50" name="abdominais"></th>
                                        <th>Flexibilidade: </th>
                                        <th><input type="text" class="w-50" name="flexibilidade"></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row justify-content-end mt-5 pb-3">
                            <div class="col-2">
                                <button type="submit" class="btn btn-sm btn-success float-right">Próxima Etapa</button>
                            </div>  
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </section>
@endsection
