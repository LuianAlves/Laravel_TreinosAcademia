<div class="modal fade" id="createCategoriaTreino" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <span style="margin: auto 6px; font-size: 26px; color: #63699e;">Adicionar Categoria de Treino</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <form action="{{ route('categoria.store') }}" method="post">
                    @csrf

                        {{-- Nome/Email --}}
                        <div class="row mt-3">
                            <div class="col-8">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="bx bx-dumbbell"></i></span>
                                    <input type="text" name="nome_categoria_treino" class="form-control" placeholder="Categoria" autofocus>
                                </div>
                                @error('nome_categoria_treino')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-5 m-3">
                            <div class="col d-flex justify-content-end">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" style="font-weight: 700; padding-top: 3px;">Fechar</button>
                                <button type="submit" class="btn btn-sm text-white float-right" style="margin-left: 5px; font-weight: 700; background: #4154f1; padding-top: 3px;">Adicionar</button>
                            </div>
                        </div>

                    </form>

            </div>
        </div>
    </div>
</div>