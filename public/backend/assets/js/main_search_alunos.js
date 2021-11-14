const url = "http://127.0.0.1:8000/";


// NAVBAR - Direciona para a página de treinos montados do aluno atravéz do ID
$('body').on("keyup", "#pesquisar", function() {

    let texto = $("#pesquisar").val();

    if (texto.length > 0) {
        $.ajax({
            data: { pesquisar: texto },
            url: url + 'pesquisar/alunos',
            method: 'post',

            beforeSend: function(request) {
                return request.setRequestHeader('X-CSRF-Token', ("meta[name='csrf-token']"))
            },

            success: function(result) {
                $("#pesquisarAlunos").html(result);
            }

        });

    } else {
        $("#pesquisarAlunos").html("");
    }

    // console.log(texto);
});


// ALUNOS INDEX - Pesquisar pelo nome do aluno
$('body').on("keyup", "#pesquisarAluno", function() {

});