@php
    $user = App\Models\User::where('id', Auth::id())->first();
@endphp

<div class="modal fade" id="createAluno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <span style="margin: auto 6px; font-size: 26px;"><span style="color: #63699e;">{{ $user->name }}</span></span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <form action="{{ route('alunos.store') }}" method="post">
                    @csrf

                        {{-- Nome/Email --}}
                        <div class="row m-3">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" name="nome" class="form-control" placeholder="Nome do Aluno">
                                </div>
                                @error('nome')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">@</span>
                                    <input type="email" name="email" class="form-control" placeholder="E-mail">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="bx bx-phone"></i></span>
                                    <input type="text" name="telefone" class="form-control" placeholder="Telefone">
                                </div>
                                @error('telefone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Tipo de Treino --}}
                        <div class="row m-3">
                            <label class="mt-2"><h5>Servi??os</h5></label>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_treino" id="assessoria" value="assessoria" checked="">
                                    <label class="form-check-label" for="assessoria">
                                        Assessoria
                                    </label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_treino" id="personal" value="personal" checked="">
                                    <label class="form-check-label" for="personal">
                                        Personal
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_treino" id="avaliacao" value="avalia????o f??sica" checked="">
                                    <label class="form-check-label" for="avaliacao">
                                        Avalia????o F??sica
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Forma de Pagamento --}}
                        <div class="row m-3">
                            <label class="mt-2"><h5>Forma de Pagamento</h5></label>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pagamento" id="dinheiro" value="dinheiro" checked="">
                                    <label class="form-check-label" for="dinheiro">
                                        Dinheiro
                                    </label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pagamento" id="cartao" value="cart??o" checked="">
                                    <label class="form-check-label" for="cartao">
                                        Cart??o
                                    </label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pagamento" id="pix" value="pix" checked="">
                                    <label class="form-check-label" for="pix">
                                        Pix
                                    </label>
                                </div>
                            </div>
                        </div>

                        {{-- G??nero --}}
                        <div class="row m-3">
                            <label class="mt-2"><h5>G??nero</h5></label>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" id="masculino" value="masculino" checked="">
                                    <label class="form-check-label" for="masculino">
                                        Masculino
                                    </label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" id="feminino" value="feminino" checked="">
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
                                        Condicionamento F??sico
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

                        {{-- Observa????o/Restri????o --}}
                        <div class="row m-3">
                            <div class="col-sm-12 mt-3">

                                <div class="input-group">
                                    <span class="input-group-text">Observa????o/Restri????o</span>
                                    <textarea class="form-control" name="observacao_restricao" rows="5" aria-label="With textarea"></textarea>
                                </div>

                            </div>
                        </div>

                        <div class="row mt-5 m-3">
                            <div class="col d-flex justify-content-end">
                                <button type="submit" class="btn btn-sm text-white float-right" style="font-weight: 700; background: #4154f1; padding-top: 3px;">Cadastrar</button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" style="margin-left: 5px; font-weight: 700; padding-top: 3px;">Fechar</button>
                            </div>
                        </div>

                    </form>

            </div>
        </div>
    </div>
</div>