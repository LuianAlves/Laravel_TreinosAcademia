<!DOCTYPE html>

@extends('app.main_template')

@section('content')
    
    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <form action="{{ route('montar-contrato.store') }}" method="post">

            <input type="hidden" name="aluno_id" value="{{ $aluno->id }}">

            {{-- Escolher Professor --}}
            <div class="row">
                <div class="card mt-3">
                    <h5 class="card-title">Montar Treino para <b class="fs-5" style="color: #7b84d6;">{{ $aluno->nome }}</b></h5>
                    <div class="card-body">
                        <h5 class="card-title text-center">Professor</h5>

                        <div class="row justify-content-center mt-5">
                            @foreach($professores as $professor)
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="professor_id" id="prof_{{ $professor->id }}" value="{{ $professor->id }}" checked="">
                                        <label class="form-check-label" for="prof_{{ $professor->id }}">{{ $professor->nome_professor }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row mt-5">
                            
                        </div>

                        <div class="row justify-content-end mt-5">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="nome_contrato" class="form-control form-control-sm" placeholder="Nome do Contrato">
                                </div>
                                @error('nome_contrato')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-2 offset-4">
                                <button class="btn btn-sm btn-success">Próximo</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </form>
    </section>
@endsection

