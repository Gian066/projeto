<nav id="navbar" class="navbar navbar-expand-lg navbar-dark primary-color">
  <a class="navbar-brand" href="http://<?php echo $_SERVER["SERVER_NAME"]; ?>/projeto">Carga horária</a>
  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse collapse" id="navbarSupportedContent" style="">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light" href="#">Home</a>
      </li>

      <li class="nav-item dropdown text-white">
        <a style="cursor: pointer;" class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tabelas
        </a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item waves-effect waves-light" href="http://<?php echo $_SERVER["SERVER_NAME"]; ?>/projeto/professor">Professor</a>
          <a class="dropdown-item waves-effect waves-light" href="http://<?php echo $_SERVER["SERVER_NAME"]; ?>/projeto/disciplina">Disciplina</a>
          <a class="dropdown-item waves-effect waves-light" href="http://<?php echo $_SERVER["SERVER_NAME"]; ?>/projeto/ppc">PPC</a>
          <a class="dropdown-item waves-effect waves-light" href="http://<?php echo $_SERVER["SERVER_NAME"]; ?>/projeto/curso">Curso</a>


        </div>
      </li>
    </ul>

  </div>
</nav>