<?php

    //inicia o session_start() e valida se o usuário está logado
    require_once("logado.php");
    session_destroy();
    header("location: index.php");
    