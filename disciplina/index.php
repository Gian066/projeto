<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

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

    

    <!-- search bar -->
    <div id="barra_pesquisa" >  
        <input value="" id="pesquisa" class="form-control" type="text" placeholder="Pesquisar" aria-label="Search">
    </div>
    
    
    <div id="lista" class="card">
      <!-- <img class="card-img-top" data-src="holder.js/100x180/?text=Image cap" alt="Card image cap"> -->
        <div class="card-body">
            <h4 class="card-title"><strong>Disciplinas</strong></h4>
            <p id="subtitulo" class="card-text ">Listas das Disciplinas</p>
            <i id="delete-all" class='delete-selected material-icons delete-icon' onclick='del_selecionados()' >delete</i>
        </div>
        
        <ul>
            
            <?php 
                include "../banco.php";
                $con = conexao();
                
                $result = buscar($con, "disciplina");
                $resultados = [];

                while($linha = $result->fetch_array()) {
                    $id = $linha["id"];
                    $nome = $linha["nome"];

                    echo "
                    <li id='{$id}' class='list-group-item'>
                        <input type='checkbox' name='checkbox'>
                        <input name='campo' class='input-lista' type='text' value='{$nome}' id='{$id}' disabled>
                        <div name='icons' class='icons-lista'>                        
                            <i name='edit' class='icon-lista material-icons edit-icon' onclick='editar_campos({$id})'>edit</i>
                            <i name='delete' class='icon-lista material-icons delete-icon' onclick='deletar_linha({$id})' >delete</i>
                        </div>
                   
                    </li>";
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
        $("#pesquisa").on('change', () => {
            filtrar_lista($("#pesquisa")[0].value)
        })
    </script>
</body>

</html>