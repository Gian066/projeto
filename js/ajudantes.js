// Deleta no html e no banco de dados os dados selecionados
function del_selecionados() {
    let lista = document.getElementById('lista').children[1].children
    if (confirm("Você quer realmente excluir os campos selecionados?")) {
        $.each($("input:checked"), (_id, nome) => {
            id = nome.parentNode.id
            nome.parentNode.remove()
            $.ajax({
                url: "deletar.php?id='" + id + "'",
                type: 'GET'
            });
        });
    }

    $('#del_selecionados').text("Excluir")
}

jQuery.expr[':'].contains = function (a, i, m) {
    return jQuery(a).text().toUpperCase()
        .indexOf(m[3].toUpperCase()) >= 0;
};


// Filtra lista em relação a barra de pesquisa
function filtrar_lista(texto_pesquisa) {

    $.each($(`.nome-lista:contains(${texto_pesquisa})`), (id, linha) => {
        $(linha.parentNode).removeClass('invisivel')
    })

    if (texto_pesquisa === '') {
        $.each($('.invisivel'), (id, linha) => {
            $(linha).removeClass('invisivel')
        })
    } else {
        $.each($(`.nome-lista:not(:contains(${texto_pesquisa}))`), (id, nome) => {
            $(nome.parentNode).addClass('invisivel')
        })
    }

    $.each($(''))
}