@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-8">

                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Editar Categoria: <span style="color: #63699e; font-size: 18px;">{{ $exercicioTreinos->nome_exercicio }}</span></h4>
                                <a href="{{ route('categoria.index') }}" class="btn btn-sm text-white"
                                    style="font-weight: 700; background: #4154f1; padding-top: 3px;">Todas as Categorias</a>
                            </div>
                        </div>

                        <form action="{{ route('exercicio.update', $exercicioTreinos->id) }}" method="post">
                        @csrf
                        @method('PATCH')

                            {{-- Nome/Email --}}
                            <div class="row mt-3">
                                <div class="col-6">
                                    <select class="form-select form-select-sm" name="categoria_treino_id">
                                        <option selected disabled>Selecione a Categoria</option>
                                        @foreach($categoriaTreinos as $cat)
                                            <option value="{{ $cat->id }}" {{ $cat->id == $exercicioTreinos->categoria_treino_id ? 'selected' : ''}}>{{ $cat->nome_categoria_treino }}</option>
                                        @endforeach
                                    </select>
                                    @error('categoria_treino_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-8">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="bx bx-dumbbell"></i></span>
                                        <input type="text" name="nome_exercicio" value="{{$exercicioTreinos->nome_exercicio}}" class="form-control form-control-sm" placeholder="Exercício">
                                    </div>
                                    @error('nome_exercicio')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-sm text-white float-right" style="font-weight: 700; background: #4154f1; padding-top: 3px;">Atualizar</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

