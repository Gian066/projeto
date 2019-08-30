
// Edita no html e no banco de dados um certo campo
function editar_campos(id) {
    let campo = document.getElementById(id).children['campo']
    let icone = document.getElementById(id).children['icons'].children['edit']

    if (icone.innerText == "edit") {
        campo.disabled = false
        campo.focus()
        icone.style.animationName = "editar_p_salvar";
        icone.innerText = "save"
        icone.style.color = "#269e46"
    } else if (icone.innerText == "save") {
        campo.disabled = true
        icone.style.animationName = "salvar_p_editar";
        icone.innerText = "edit"
        icone.style.color = "black"

        let id = campo.id
        let novoNome = campo.value
        $.ajax({
            method: 'POST',
            url: 'editar.php',
            data: { id: id, nome: novoNome }
        });
    }
}

// Deleta no html e no banco de dados os dados selecionados
function del_selecionados() {
    let lista = document.getElementById('lista').children[1].children
    if (confirm("Você quer realmente excluir os campos selecionados?")) {
        $.each($("input:checked"), (id_campo, campo) => {
            id = campo.parentNode.id
            campo.parentNode.remove()
            console.log(id)
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