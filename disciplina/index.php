<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Disciplina</title>

    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
    <?php
    include "../navbar.php";
    ?>

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nova Disciplina</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <label for="">Insira o nome da nova disciplina:</label><br>
                        <input id="nova_disciplina" style="width: 100%; text-transform: uppercase;" type="text" placeholder="Disciplina" require>
                    </div>
                </div>
                <form action="#" method="post" class="">
                    <input name="sucesso" type="hidden" value="1">
                    <button id='sucesso' class='invisivel' type="submit"></button>
                </form>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick='inserir_linha()'>Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- search bar -->
    <div id="barra_pesquisa">
        <input value="" id="pesquisa" class="form-control" type="text" placeholder="Pesquisar" aria-label="Search">
    </div>

    <!-- Sucesso -->
    <?php
    if(isset($_POST['sucesso'])) {
        echo '
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Disciplina criada com sucesso!
        </div>';
    }
    ?>

    <div id="lista" class="card">
        <!-- <img class="card-img-top" data-src="holder.js/100x180/?text=Image cap" alt="Card image cap"> -->
        <div class="card-body">
            <h4 class="card-title"><strong>Disciplinas</strong></h4>
            <p id="subtitulo" class="card-text ">Listas das Disciplinas</p>
            <br>
            <a name="" id="inserir_linha" class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#modelId">Nova Disciplina</a>
            <a id="del_selecionados" style="float: right;" class="btn btn-danger" href="#" role="button" onclick='del_selecionados()'>Excluir</a>

        </div>
        <ul>

            <?php
            include "../banco.php";
            $con = conexao();

            $result = buscar($con, "disciplina");
            $resultados = [];

            while ($linha = $result->fetch_array()) {
                $id = $linha["id"];
                $nome = $linha["nome"];

                echo "
                    <li id='{$id}' class='list-group-item'>
                        <input type='checkbox' name='checkbox'>
                        <input name='campo' class='input-lista' type='text' value='{$nome}' id='{$id}' disabled>
                        <div name='icons' class='icons-lista'>                        
                            <i name='edit' class='icon-lista material-icons edit-icon' onclick='editar_campos({$id})'>edit</i>
                            
                        </div>
                   
                    </li>";
                // <i name='delete' class='icon-lista material-icons delete-icon' onclick='deletar_linha({$id})' >delete</i>
            }
            $con->close();
            ?>

        </ul>
    </div>

    <!-- Import aqruivos js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/ajudantes.js"></script>
    <script>
        $('#pesquisa').on('input', () => {
            filtrar_lista($("#pesquisa")[0].value)
        })

        $('input[type="checkbox"]').on('input', () => {
            const n = $(":checkbox:checked").length
            let texto = "Deletar"

            if (n > 0) texto = "Excluir " + n + " disciplina(s)"

            $('#del_selecionados').text(texto)
        })

        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
        });

        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 4000);
    </script>
</body>

</html>