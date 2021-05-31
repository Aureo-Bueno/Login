<?php

//inicia o session_start() e valida se o usuário está logado
require_once("logado.php");
if (!logado()) {
  header("location: index.php");
}

//verifica se o usuário tem permissao de acessar esta página
require_once("permissoes.php");
if (!Admin()) {
  header("location: index.php");
}


?>
<div class="jumbotron">
    <h1>Adeministrador</h1>
    <p>Você tem permissão para Administrador, Coordenador, Professor e Aluno</p>
</div>