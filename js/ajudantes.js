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

    }
}

function deletar_linha(id, sem_alert) {
    if (sem_alert) {
        document.getElementById(id).remove()
        $.ajax({
            url: "deletar.php?id='" + id + "'",
            type: 'GET',

            success: function (output) {
                console.log("apagou, boa!!!!!!!!!")
            }
        });
    } else {
        if (confirm("Você quer realmente apagar?")) {
            document.getElementById(id).remove()
            $.ajax({
                url: "deletar.php?id='" + id + "'",
                type: 'GET',

                success: function (output) {
                    console.log("apagou, boa!!!!!!!!!")
                }
            });
        }
    }
}

function del_selecionados() {
    let lista = document.getElementById('lista').children[1].children

    for (let linha of lista) {
        if (linha.children['checkbox'].checked) {
            console.log("------------")
            deletar_linha(linha.id, true)
        }
    }
}