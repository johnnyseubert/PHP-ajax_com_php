$('#form1').submit(function (e) {
    e.preventDefault();

    let nome = $('#name').val();
    let comentario = $('#comment').val();

    $.ajax({
        url: 'http://localhost/ajax_com_php-master/inserir.php',
        method: 'POST',
        data: { name: nome, comment: comentario },
        dataType: 'json'
    }).done(function (resultado) {
        $('#name').val('');
        $('#comment').val('');
        console.log(`Nome: ${nome} e Comentário: ${comentario.toUpperCase()} SALVO COM SUCESSO`);
        getComments();
    });
})


function getComments() {
    $.ajax({
        url: 'http://localhost/ajax_com_php-master/selecionar.php',
        method: 'GET',
        dataType: 'json'
    }).done(function (resultado) {
        console.log(resultado);
        for (let i = 0; i < resultado.length; i++) {
            $('.box_comment').prepend(`<div class="b_comm">
                                            <h4>${resultado[i].name}</h4>
                                            <p>${resultado[i].comment}</p>
                                        </div>`)
        };

    });
};

getComments();