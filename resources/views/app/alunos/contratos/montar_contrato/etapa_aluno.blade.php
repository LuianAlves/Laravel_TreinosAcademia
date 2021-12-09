<!DOCTYPE html>
@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row justify-content-center">
            <div class="card mt-3">
                <div class="card-body">

                    <form action="{{ route('dados-alunos.store') }}" method="post">

                        <input type="hidden" name="aluno_id" value="{{ $aluno->id }}">
                        <input type="hidden" name="professor_id" value="{{ $professor->id }}">
                        <input type="hidden" name="codigo_contrato" value="{{ $codigo_contrato->codigo_contrato }}">

                        <h4 class="card-title text-center mb-5">Dados Adicionais para o Contrato</h4>

                        {{-- Dados do Aluno --}}
                        <p>
                            <b class="text-uppercase mt-4">Contratante: </b>
                            <input type="text" name="nome" class="input-contrato" required placeholder="Nome Completo"
                                value="{{ $aluno->nome != '' ? $aluno->nome : '' }}">, Brasileira,
                            <input type="text" name="estado_civil" class="input-contrato" placeholder="Estado Cívil (Opcional)"
                                value="">,
                            <input type="text" name="profissao" class="input-contrato" placeholder="Profissão (Opcional)" value="">,
                            Carteira de Identidade nº <input type="text" name="rg" class="input-contrato" required
                                placeholder="RG" value="">,
                            C.P.F. nº <input type="text" name="cpf" class="input-contrato" required placeholder="CPF"
                                value="">,
                            residente e domiciliado na Rua <input type="text" name="endereco" class="input-contrato"
                                required placeholder="Endereço" value="">,
                            nº <input type="text" name="numero_casa" class="input-contrato" required
                                placeholder="Número Casa" value="">,
                            bairro <input type="text" name="bairro" class="input-contrato" required placeholder="Bairro"
                                value="">,
                            CEP <input type="text" name="cep" class="input-contrato" required placeholder="Cep" value="">,
                            Cidade <input type="text" name="cidade" class="input-contrato" required placeholder="Cidade"
                                value="">,
                            no Estado <input type="text" name="estado" class="input-contrato" placeholder="Estado (Opcional)"
                                value="">,
                            Telefone: <input type="text" name="telefone_fixo" class="input-contrato"
                                placeholder="Telefone Fixo (Opcional)" value="">
                            cel./whatsApp: <input type="text" name="telefone_celular" class="input-contrato"
                                placeholder="Celular (Opcional)" value="">,
                            E-mail: <input type="text" name="email" class="input-contrato" placeholder="Email (Opcional)" value="{{$aluno->email != '' ? $aluno->email : ''}}">.
                        </p>

                        <div class="row justify-content-end mt-5">
                            <div class="col-2">
                                <button class="btn btn-sm btn-primary">
                                    Próximo
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection

<style>
    .card {
        font-family: "Poppins", sans-serif;
        font-size: 16px;
    }

    .input-contrato {
        border: none;
        font-weight: bold;
        color: #4154f1;
        text-transform: uppercase;
    }

    ::placeholder {
        color: red;
    }

</style>
