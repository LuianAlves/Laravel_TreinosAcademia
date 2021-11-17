<!DOCTYPE html>

@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row">

            <div class="card">
                <h5 class="card-title text-center">Anamnese</h5>
                <div class="card-body mt-4">
                    
                    <form action="{{ route('realizar.store.anamnese', $aluno->id) }}" method="post">

                        <input type="hidden" name="codigo_ava" value="{{ $codigo }}">
                        <div class="row">
                            <ul>
                                {{-- Atividade Física --}}
                                <li>
                                    <div class="row">
                                        <div class="col-5">
                                            <p>Pratica atividade física atualmente?</p>
                                        </div>

                                        <div class="col-2">
                                            <div class="col-3 offset-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="atividade_fisica"
                                                        value="sim">
                                                    <label class="form-check-label" for="atividade_fisica">
                                                        Sim
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="col-3 offset-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="atividade_fisica"
                                                        value="não">
                                                    <label class="form-check-label" for="atividade_fisica">
                                                        Não
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                {{-- Medicamento --}}
                                <li>
                                    <div class="row">
                                        <div class="col-5">
                                            <p>Utiliza algum tipo de medicamento?</p>
                                        </div>

                                        <div class="col-2">
                                            <div class="col-3 offset-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="medicamento" value="sim">
                                                    <label class="form-check-label" for="medicamento">
                                                        Sim
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="col-3 offset-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="medicamento" value="não">
                                                    <label class="form-check-label" for="medicamento">
                                                        Não
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <p>Qual?</p>
                                        </div>
                                    </div>
                                </li>

                                {{-- Cirurgia --}}
                                <li>
                                    <div class="row">
                                        <div class="col-5">
                                            <p>Já passou por alguma Cirurgia?</p>
                                        </div>

                                        <div class="col-2">
                                            <div class="col-3 offset-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="cirurgia" value="sim">
                                                    <label class="form-check-label" for="cirurgia">
                                                        Sim
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="col-3 offset-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="cirurgia" value="não">
                                                    <label class="form-check-label" for="cirurgia">
                                                        Não
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <p>Qual?</p>
                                        </div>
                                    </div>
                                </li>

                                {{-- Doença na Familia --}}
                                <li>
                                    <div class="row">
                                        <div class="col-5">
                                            <p>Possui alguma doença na família?</p>
                                        </div>

                                        <div class="col-2">
                                            <div class="col-3 offset-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="doenca_familia"
                                                        value="sim">
                                                    <label class="form-check-label" for="doenca_familia">
                                                        Sim
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="col-3 offset-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="doenca_familia"
                                                        value="não">
                                                    <label class="form-check-label" for="doenca_familia">
                                                        Não
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <p>Qual?</p>
                                        </div>
                                    </div>
                                </li>

                                {{-- Observações --}}
                                <li>
                                    <div class="row mt-5">
                                        <h4>Observações </h4>
                                        <textarea class="form-control w-50 m-3" name="observacoes" id="" cols="4"
                                            rows="6"></textarea>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="row mt-5">
                            <h5 class="card-title text-center">Questionário de Prontidão para Atividade Física (PAR-Q)</h5>
                            <ul>
                                {{-- Prescrição Médica --}}
                                <li>
                                    <div class="row align-items-justify">
                                        <p>Alguma vez o médico lhe disse que você possuía um problema do coração e lhe
                                            recomendou
                                            que só fizesse atividade física sob prescrição medica?</p>
                                    </div>
                                    <div class="row m-3">
                                        <div class="col-2">
                                            <div class="col-3 offset-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="prescricao_medica"
                                                        value="sim">
                                                    <label class="form-check-label" for="prescricao_medica">
                                                        Sim
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="col-3 offset-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="prescricao_medica"
                                                        value="não">
                                                    <label class="form-check-label" for="prescricao_medica">
                                                        Não
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <hr>

                                {{-- Dor no Peito --}}
                                <li>
                                    <div class="row align-items-justify">
                                        <p>Você sente dor no peito, causada pela práticada de atividade física?</p>
                                    </div>
                                    <div class="row m-3">
                                        <div class="col-2">
                                            <div class="col-3 offset-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dor_peito" value="sim">
                                                    <label class="form-check-label" for="dor_peito">
                                                        Sim
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="col-3 offset-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dor_peito" value="não">
                                                    <label class="form-check-label" for="dor_peito">
                                                        Não
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <hr>

                                {{-- Dor no Peito Ultimo Mês --}}
                                <li>
                                    <div class="row align-items-justify">
                                        <p>Você sentiu dor no peito no ultimo mês?</p>
                                    </div>
                                    <div class="row m-3">
                                        <div class="col-2">
                                            <div class="col-3 offset-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dor_peito_ult_mes"
                                                        value="sim">
                                                    <label class="form-check-label" for="dor_peito_ult_mes">
                                                        Sim
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="col-3 offset-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dor_peito_ult_mes"
                                                        value="não">
                                                    <label class="form-check-label" for="dor_peito_ult_mes">
                                                        Não
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <hr>

                                {{-- Tonteira ou Desmaio --}}
                                <li>
                                    <div class="row align-items-justify">
                                        <p>Você tende a perder a consciência ou cair, como resultado de tonteira ou desmaio?</p>
                                    </div>
                                    <div class="row m-3">
                                        <div class="col-2">
                                            <div class="col-3 offset-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="tonteira_desmaio"
                                                        value="sim">
                                                    <label class="form-check-label" for="tonteira_desmaio">
                                                        Sim
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="col-3 offset-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="tonteira_desmaio"
                                                        value="não">
                                                    <label class="form-check-label" for="tonteira_desmaio">
                                                        Não
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <hr>

                                {{-- Problema òsseo --}}
                                <li>
                                    <div class="row align-items-justify">
                                        <p>Você tem algum problema ósseo ou muscular que poderia ser agravado com pratica de
                                            atividade física?</p>
                                    </div>
                                    <div class="row m-3">
                                        <div class="col-2">
                                            <div class="col-3 offset-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="problema_osseo"
                                                        value="sim">
                                                    <label class="form-check-label" for="problema_osseo">
                                                        Sim
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="col-3 offset-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="problema_osseo"
                                                        value="não">
                                                    <label class="form-check-label" for="problema_osseo">
                                                        Não
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <hr>

                                {{-- Medicamento para Pressão Arterial --}}
                                <li>
                                    <div class="row align-items-justify">
                                        <p>Algum medico já lhe recomendou o uso de medicamentos para pressão arterial, para
                                            circulação ou coração?</p>
                                    </div>
                                    <div class="row m-3">
                                        <div class="col-2">
                                            <div class="col-3 offset-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="medicamento_pressao_arterial" value="sim">
                                                    <label class="form-check-label" for="medicamento_pressao_arterial">
                                                        Sim
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="col-3 offset-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="medicamento_pressao_arterial" value="não">
                                                    <label class="form-check-label" for="medicamento_pressao_arterial">
                                                        Não
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <hr>

                                {{-- Atividade Física sem Supervisão --}}
                                <li>
                                    <div class="row align-items-justify">
                                        <p>Você tem consciência, através da sua própria experiência ou aconselhamento medico, de
                                            alguma outra razão física que impeça sua pratica de atividade física sem supervisão
                                            medica?</p>
                                    </div>
                                    <div class="row m-3">
                                        <div class="col-2">
                                            <div class="col-3 offset-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="atividade_sem_supervisao" value="sim">
                                                    <label class="form-check-label" for="atividade_sem_supervisao">
                                                        Sim
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="col-3 offset-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="atividade_sem_supervisao" value="não">
                                                    <label class="form-check-label" for="atividade_sem_supervisao">
                                                        Não
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="row justify-content-end mt-3 pb-4">
                            <div class="col-2">
                                <button type="submit" class="btn btn-sm btn-success float-right">Finalizar</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </section>
@endsection

<style>
    ul {
        list-style: none;
    }

    ul li,
    li h4 {
        font-family: "Poppins", sans-serif;
    }

</style>
