<!DOCTYPE html>
@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row justify-content-center">
            <div class="card mt-3">
                <div class="card-body">

                    <form action="{{ route('montar-contrato.etapa-professor.store') }}" method="post">

                        <input type="hidden" name="aluno_id" value="{{ $aluno->id }}">
                        <input type="hidden" name="professor_id" value="{{ $professor->id }}">
                        <input type="hidden" name="codigo_contrato" value="{{ $codigo_contrato->codigo_contrato }}">

                        <h4 class="card-title text-center mb-5">Dados do Professor</h4>

                        {{-- Dados do Professor --}}
                        <p>
                            <b class="text-uppercase">Contratado: </b>
                            <input type="text" name="nome_professor" class="input-contrato" required
                                placeholder="Nome Completo"
                                value="{{ $professor->nome_professor != '' ? $professor->nome_professor : '' }}">,
                            Brasileira,
                            <input type="text" name="estado_civil_professor" class="input-contrato"
                                placeholder="Estado Cívil"
                                value="{{ $professor->estado_civil_professor != '' ? $professor->estado_civil_professor : '' }}">,
                            <input type="text" name="profissao_professor" class="input-contrato" placeholder="Profissão"
                                value="{{ $professor->profissao_professor != '' ? $professor->profissao_professor : '' }}">,
                            Carteira de Identidade nº <input type="text" name="rg_professor" class="input-contrato" required
                                placeholder="RG"
                                value="{{ $professor->rg_professor != '' ? $professor->rg_professor : '' }}">,
                            C.P.F. nº <input type="text" name="cpf_professor" class="input-contrato" required
                                placeholder="CPF"
                                value="{{ $professor->cpf_professor != '' ? $professor->cpf_professor : '' }}">,
                            residente e domiciliado na Rua <input type="text" name="endereco_professor"
                                class="input-contrato" required placeholder="Endereço"
                                value="{{ $professor->endereco_professor != '' ? $professor->endereco_professor : '' }}">,
                            nº <input type="text" name="numero_casa_professor" class="input-contrato" required
                                placeholder="Número Casa"
                                value="{{ $professor->numero_casa_professor != '' ? $professor->numero_casa_professor : '' }}">,
                            bairro <input type="text" name="bairro_professor" class="input-contrato" required
                                placeholder="Bairro"
                                value="{{ $professor->bairro_professor != '' ? $professor->bairro_professor : '' }}">,
                            CEP <input type="text" name="cep_professor" class="input-contrato" required placeholder="Cep"
                                value="{{ $professor->cep_professor != '' ? $professor->cep_professor : '' }}">,
                            Cidade <input type="text" name="cidade_professor" class="input-contrato" required
                                placeholder="Cidade"
                                value="{{ $professor->cidade_professor != '' ? $professor->cidade_professor : '' }}">,
                            no Estado <input type="text" name="estado_professor" class="input-contrato" placeholder="Estado"
                                value="{{ $professor->estado_professor != '' ? $professor->estado_professor : '' }}">,
                            Telefone: <input type="text" name="telefone_fixo_professor" class="input-contrato"
                                placeholder="Telefone Fixo"
                                value="{{ $professor->telefone_fixo_professor != '' ? $professor->telefone_fixo_professor : '' }}">
                            cel./whatsApp: <input type="text" name="telefone_celular_professor" class="input-contrato"
                                placeholder="Celular"
                                value="{{ $professor->telefone_celular_professor != '' ? $professor->telefone_celular_professor : '' }}">,
                            E-mail: <input type="text" name="email_professor" class="input-contrato" placeholder="Email"
                                value="{{ $professor->email_professor != '' ? $professor->email_professor : '' }}">.
                        </p>

                        <div class="row justify-content-center mt-5">
                            <div class="col-3">
                                <button class="btn btn-sm btn-success">
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
