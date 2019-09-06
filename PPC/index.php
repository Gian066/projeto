<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PPC</title>

    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="estilos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
    <?php
    include "../navbar.php";
    ?>

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Novo PPC</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="inserir.php" method="post" class="form-modal">
                    <div class="modal-body">
                        <div class="container-fluid data-modal">
                            <label for="">Insira o ano do PPC:</label><br>
                            <input min='2010' max='2100' type='number' class="form-control" name="ano" placeholder="Ex.: 2018" required>
                            <label for="">Insira o nome do PPC:</label><br>
                            <input onkeyup="this.value = this.value.toUpperCase();" class="form-control" name="nome" placeholder="Ex.: INFORMATICA" required>
                            <label for="">Insira a formação do PPC:</label><br>
                            <input onkeyup="this.value = this.value.toUpperCase();" class="form-control" name="formacao" placeholder="Ex.: INTEGRADO" required>
                            <input name='id' hidden>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn-modal btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn-modal btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Barra de pesquisa -->
    <div id="barra_pesquisa">
        <input value="" id="pesquisa" class="form-control" type="text" placeholder="Pesquisar" aria-label="Search">
    </div>

    <!-- Mensagens de sucesso e erro -->
    <?php
    session_start();
    if (isset($_SESSION['nova_entrada'])) {
        echo '
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            PPC criado com sucesso!
        </div>';
        unset($_SESSION['nova_entrada']);
    }
    if (isset($_SESSION['entrada_duplicada'])) {
        echo '
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            PPC já existente no banco de dados!
        </div>';
        unset($_SESSION['entrada_duplicada']);
    }
    ?>

    <div id="lista" class="card">
        <div class="card-body">
            <h4 class="card-title"><strong>PPCs</strong></h4>
            <p id="subtitulo" class="card-text ">Lista dos PPCs</p><br>
            <a name="" id="inserir_linha" class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#modelId">Novo PPC</a>
            <a id="del_selecionados" style="float: right;" class="btn btn-danger" href="#" role="button" onclick='del_selecionados()'>Excluir</a>

        </div>
        <ul>

            <?php
            include "../banco.php";
            $con = new Conexao();

            $result = $con->buscar('ppc');
            $resultados = [];

            while ($linha = $result->fetch_array()) {
                $id = $linha["id"];
                $ano = $linha["ano"];
                $nome = $linha["nome"];
                $formacao = $linha["formacao"];

                echo "
                    <li id='{$id}' class='list-group-item'>
                        <input type='checkbox' name='checkbox' >
                        <span class='nome-lista'>$nome $formacao - $ano</span><br>
                        <div name='icons' class='icons-lista'>                        
                            <i name='edit' class='icon-lista material-icons edit-icon' onclick='editar_campos(this, {id: $id, ano: {$ano}, nome: `{$nome}`, formacao:`{$formacao}`})' data-toggle='modal' data-target='#modelId'>edit</i>
                            
                        </div>
                        <span class='info-compl'>Ano: $ano </span> <br>
                        <span class='info-compl'>Nome: $nome </span> <br>
                        <span class='info-compl'>Formação: $formacao </span> <br>
                    </li>";
            }
            ?>

        </ul>
    </div>

    <!-- Import aqruivos js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="scripts.js"></script>
    <script src="../js/ajudantes.js"></script>

    <!-- Funções do JQuery -->
    <script>
        $('#pesquisa').on('input', () => {
            filtrar_lista($("#pesquisa")[0].value)
        })

        $('input[type="checkbox"]').on('input', () => {
            const n = $(":checkbox:checked").length
            let texto = "Excluir"

            if (n > 0) texto = "Excluir " + n + " PPC(s)"

            $('#del_selecionados').text(texto)
        })

        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
        });

        $('#inserir_linha').on('click', () => {
            $.each($('.data-modal')
                .children()
                .filter('input'), (id, input) => {
                    input.value = ''
                })
            $('.form-modal')[0].action = 'inserir.php'
        })

        window.setTimeout(() => {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 4000);
    </script>


</body>

</html>