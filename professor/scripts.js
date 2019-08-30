function editar_campos(id) {
    let nome = document.getElementById(id).children['nome']
    let siape = document.getElementById(id).children['siape']
    let icone = document.getElementById(id).children['icons'].children['edit']

    if (icone.innerText == "edit") {
        nome.disabled = false
        nome.focus()
        siape.disabled = false
        icone.style.animationName = "editar_p_salvar";
        icone.innerText = "save"
        icone.style.color = "#269e46"
    } else if (icone.innerText == "save") {
        nome.disabled = true
        siape.disabled = true
        icone.style.animationName = "salvar_p_editar";
        icone.innerText = "edit"
        icone.style.color = "black"

        let novoNome = nome.value
        let novoSiape = siape.value
        
        $.ajax({
            method: 'POST',
            url: 'editar.php',
            data: { id: id, nome: novoNome, siape: novoSiape }
        });
    }
}