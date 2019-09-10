// Edita no html e no banco de dados um certo campo
function editar_campos(componente, dados) {
    // let nome = document.getElementById(id).children['nome']
    // let icone = document.getElementById(id).children['icons'].children['edit']

    // if (icone.innerText == "edit") {
    //     nome.disabled = false
    //     nome.focus()
    //     icone.style.animationName = "editar_p_salvar";
    //     icone.innerText = "save"
    //     icone.style.color = "#269e46"
    // } else if (icone.innerText == "save") {
    //     nome.disabled = true
    //     icone.style.animationName = "salvar_p_editar";
    //     icone.innerText = "edit"
    //     icone.style.color = "black"

    //     let id = nome.parentNode.id
    //     let novoNome = nome.value
    //     $.ajax({
    //         method: 'POST',
    //         url: 'editar.php',
    //         data: {
    //             id: id,
    //             nome: novoNome
    //         }
    //     });
    // }


    $.each($('.data-modal')
        .children()
        .filter('input'), (id, input) => {
            input.value = dados[input.name]
            console.log(dados[input.name])
        })

    $('.form-modal')[0].action = 'editar.php'

}