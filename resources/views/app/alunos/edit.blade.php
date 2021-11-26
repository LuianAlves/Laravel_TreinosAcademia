@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Editar Informações do Aluno: <span style="color: #63699e; font-size: 18px;">{{ $aluno->nome }}</span></h4>
                                <a href="{{ route('alunos.index') }}" class="btn btn-sm text-white"
                                    style="font-weight: 700; background: #4154f1; padding-top: 3px;">Lista de Alunos</a>
                            </div>
                        </div>

                        <form action="{{ route('alunos.update', $aluno->id) }}" method="post">
                        @csrf
                        @method('PATCH')

                            {{-- Nome/Email --}}
                            <div class="row m-3">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="bx bx-user"></i></span>
                                        <input type="text" name="nome" value="{{ $aluno->nome }}" class="form-control" placeholder="Nome do Aluno">
                                    </div>
                                    @error('nome')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">@</span>
                                        <input type="email" name="email" value="{{ $aluno->email }}" class="form-control" placeholder="E-mail">
                                    </div>
                                </div>
                            </div>

                            {{-- Telefone --}}
                            <div class="row m-3">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="bx bx-phone"></i></span>
                                        <input type="number" name="telefone" value="{{ $aluno->telefone }}" class="form-control" placeholder="Telefone">
                                    </div>
                                    @error('telefone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Tipo de Treino --}}
                            <div class="row m-3">
                                <label class="mt-2"><h5>Tipo de Treino</h5></label>
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_treino" id="assessoria" value="assessoria"  @if($aluno->tipo_treino == 'assessoria') checked="" @endif>
                                        <label class="form-check-label" for="assessoria">
                                            Assessoria
                                        </label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_treino" id="personal" value="personal"  @if($aluno->tipo_treino == 'personal') checked="" @endif>
                                        <label class="form-check-label" for="personal">
                                            Personal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_treino" id="avaliacao_fisica" value="avaliação física"  @if($aluno->tipo_treino == 'avaliação física') checked="" @endif>
                                        <label class="form-check-label" for="avaliacao_fisica">
                                            Avaliação Física
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Forma de Pagamento --}}
                            <div class="row m-3">
                                <label class="mt-2"><h5>Forma de Pagamento</h5></label>
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pagamento" id="dinheiro" value="dinheiro"  @if($aluno->pagamento == 'dinheiro') checked="" @endif>
                                        <label class="form-check-label" for="dinheiro">
                                            Dinheiro
                                        </label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pagamento" id="cartao" value="cartao"  @if($aluno->pagamento == 'cartao') checked="" @endif>
                                        <label class="form-check-label" for="cartao">
                                            Cartão
                                        </label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pagamento" id="pix" value="pix"  @if($aluno->pagamento == 'pix') checked="" @endif>
                                        <label class="form-check-label" for="pix">
                                            Pix
                                        </label>
                                    </div>
                                </div>
                            </div>

                            {{-- Gênero --}}
                            <div class="row m-3">
                                <label class="mt-2"><h5>Gênero</h5></label>
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="genero" id="masculino" value="masculino" @if($aluno->genero == 'masculino') checked="" @endif>
                                        <label class="form-check-label" for="masculino">
                                            Masculino
                                        </label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="genero" id="feminino" value="feminino" @if($aluno->genero == 'feminino') checked="" @endif>
                                        <label class="form-check-label" for="feminino">
                                            Feminino
                                        </label>
                                    </div>
                                </div>
                            </div>

                            {{--Objetivos --}}
                            <div class="row m-3">
                                <label class="mt-2"><h5>Objetivo</h5></label>
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="objetivo" id="hipertrofia" value="hipertrofia" checked="">
                                        <label class="form-check-label" for="hipertrofia">
                                            Hipertrofia
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="objetivo" id="condicionamento" value="condicionamento" checked="">
                                        <label class="form-check-label" for="condicionamento">
                                            Condicionamento Físico
                                        </label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="objetivo" id="emagrecimento" value="emagrecimento" checked="">
                                        <label class="form-check-label" for="emagrecimento">
                                            Emagrecimento
                                        </label>
                                    </div>
                                </div>
                            </div>

                            {{-- Observação/Restrição --}}
                            <div class="row m-3">
                                <div class="col-sm-12 mt-3">

                                    <div class="input-group">
                                        <span class="input-group-text">Observação/Restrição</span>
                                        <textarea class="form-control" name="observacao_restricao" rows="5" aria-label="With textarea">{{ $aluno->observacao_restricao }}</textarea>
                                    </div>

                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-sm text-white float-right" style="font-weight: 700; background: #4154f1; padding-top: 3px;">Cadastrar</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

