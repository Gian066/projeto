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


// Filtra lista em relação a barra de pesquisa
function filtrar_lista(texto_pesquisa) {
    texto_pesquisa = texto_pesquisa.toUpperCase()

    $.each($(`input[name='nome'][value*='${texto_pesquisa}']`), (id, linha) => {
        $(linha.parentNode).removeClass('invisivel')
    })

    if (texto_pesquisa === '') {
        $.each($('.invisivel'), (id, linha) => {
            $(linha).removeClass('invisivel')
        })
    } else {
        $.each($(`input[name='nome']:not([value*='${texto_pesquisa}'])`), (id, nome) => {
            $(nome.parentNode).addClass('invisivel')
        })
    }

    $.each($(''))
}