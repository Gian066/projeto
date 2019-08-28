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
            type: 'GET'
        });
    } else {
        if (confirm("Você quer realmente apagar?")) {
            document.getElementById(id).remove()
            $.ajax({
                url: "deletar.php?id='" + id + "'",
                type: 'GET'
            });
        }
    }
}

function del_selecionados() {
    let lista = document.getElementById('lista').children[1].children

    for (let linha of lista) {
        if (linha.children['checkbox'].checked) {
            deletar_linha(linha.id, true)
        }
    }
}

function filtrar_lista(texto_pesquisa) {
    let lista = document.getElementById('lista').children[1].children
    texto_pesquisa = texto_pesquisa.toUpperCase()
    texto_pesquisa = remover_acentos(texto_pesquisa)
    for (linha of lista) {
        linha.className = linha.className.replace(" invisivel", "")
        const texto_campo = remover_acentos(linha.children['campo'].value)
        if (!texto_campo.includes(texto_pesquisa)) {
            linha.className += " invisivel"
        }
    }
}

function remover_acentos(str) {
    var accents = 'ÀÁÂÃÄÅàáâãäåÒÓÔÕÕÖØòóôõöøÈÉÊËèéêëðÇçÐÌÍÎÏìíîïÙÚÛÜùúûüÑñŠšŸÿýŽž';
    var accentsOut = "AAAAAAaaaaaaOOOOOOOooooooEEEEeeeeeCcDIIIIiiiiUUUUuuuuNnSsYyyZz";
    str = str.split('');
    var strLen = str.length;
    var i, x;
    for (i = 0; i < strLen; i++) {
        if ((x = accents.indexOf(str[i])) != -1) {
            str[i] = accentsOut[x];
        }
    }
    return str.join('');
}