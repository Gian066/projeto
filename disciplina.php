<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
    <?php
        include "navbar.php";
    ?>

    <!-- Mostrar tabela-->
    <?php
        include "conexao.php";
    ?>

    

    <!-- search bar -->
    <div id="barra_procura" >  
        <input class="form-control" type="text" placeholder="Pesquisar" aria-label="Search">
    </div>
    
    
    <div id="lista" class="card">
      <!-- <img class="card-img-top" data-src="holder.js/100x180/?text=Image cap" alt="Card image cap"> -->
        <div class="card-body">
            <h4 class="card-title"><strong>Disciplinas</strong></h4>
            <p class="card-text">Listas das Disciplinas</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <input class="input-lista" 
                        type="text" value="Portugues" id="1" disabled>
                <i name="delete" class="icons-lista material-icons delete-icon">delete</i>
                <i name="edit" class="icons-lista material-icons edit-icon" id="editar-1" onclick="editar_campos('1')">edit</i>
                
            </li>

            <li class="list-group-item">
            <input class="input-lista" 
                        type="text" value="Matematica" id="2" disabled>
                <i name="delete" class="icons-lista material-icons delete-icon">delete</i>
                <i name="edit" class="icons-lista material-icons edit-icon" id="editar-2" onclick="editar_campos('2')">edit</i>
                
            </li>
     
         </ul>
    </div>
        
    <!-- Import aqruivos js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/ajudantes.js"></script>
</body>

</html>