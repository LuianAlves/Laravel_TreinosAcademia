<div class="modal fade" id="showAluno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="codigo_aluno"></h5>
                <span style="margin: auto 6px; font-size: 26px;">-</span>
                <span style="font-size: 20px; font-weight: bold; text-transform: capitalize; color: #63699e;" id="nome"></span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row m-3">
                    <div class="col-6">
                        <div class="list-group">
                            <li class="list-group-item">Telefone</li>
                            <li class="list-group-item">E-mail</li>
                            <li class="list-group-item">Serviço</li>
                            <li class="list-group-item">Pagamento Via</li>
                            <li class="list-group-item">Objetivo</li>
                            <li class="list-group-item">Observação/Restrição</li>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="list-group" style="text-transform: capitalize;">
                            <li class="list-group-item" id="telefone"></li>
                            <li class="list-group-item" id="email"></li>
                            <li class="list-group-item" id="tipo_treino"></li>
                            <li class="list-group-item" id="pagamento"></li>
                            <li class="list-group-item" id="objetivo"></li>
                            <li class="list-group-item" id="observacao_restricao"></li>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


{{-- AJAX - VISUALIZAR ALUNOS --}}
<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    function visualizarAluno(id) {
        $.ajax({
            type: 'GET',
            url: '/alunos/'+id,
            dataType: 'json',

            success: function(data) {
                
                $('#professor').text(data.aluno.professor_id)
                $('#nome').text(data.aluno.nome)
                $('#email').text(data.aluno.email)
                $('#telefone').text(data.aluno.telefone)
                $('#observacao_restricao').text(data.aluno.observacao_restricao)
                $('#tipo_treino').text(data.aluno.tipo_treino)
                $('#objetivo').text(data.aluno.objetivo)
                $('#pagamento').text(data.aluno.pagamento)
                $('#codigo_aluno').text(data.aluno.codigo_aluno)
                $('#genero').text(data.aluno.genero)
            }
        })
    }
</script>