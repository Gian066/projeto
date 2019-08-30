
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