// Deleta no html e no banco de dados os dados selecionados
function del_selecionados() {
    let lista = document.getElementById('lista').children[1].children
    if (confirm("Você quer realmente excluir os campos selecionados?")) {
        $.each($("input:checked"), (id_campo, campo) => {
            id = campo.parentNode.id
            campo.parentNode.remove()
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

    $.each($(`input[name='campo'][value*='${texto_pesquisa}']`), (id, linha) => {
        console.log('invisivel');
        $(linha.parentNode).removeClass('invisivel')
    })

    if (texto_pesquisa === '') {
        $.each($('.invisivel'), (id, linha) => {
            $(linha).removeClass('invisivel')
        })
    } else {
        $.each($(`input[name='campo']:not([value*='${texto_pesquisa}'])`), (id, campo) => {
            $(campo.parentNode).addClass('invisivel')
        })
    }
}