function editar_campos(id) {
    let campo = document.getElementById(id)
    let icon_editar = document.getElementById("editar-" + id)
    campo.disabled = false
    campo.focus()
    icon_editar.style.animationName = "editar_p_salvar";
    icon_editar.innerText = "save"    
    icon_editar.style.color = "#269e46"

}