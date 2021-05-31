<?php

    //inicia o session_start() e valida se o usuário está logado
    require_once("logado.php");
    //if(!logado()){ header("location: index.php"); }

    //verifica se o usuário tem permissao de acessar esta página
    require_once("permissoes.php");
    if(!Aluno()){ header("location: index.php"); }
?>
<div class="jumbotron">
  <h1>Aluno</h1>
  <p>Você tem permissão apenas para Aluno</p>
</div>


    
    
  