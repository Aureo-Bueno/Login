<?php

    session_start();
    
    function logado() {
        return (
                isset($_SESSION["USUARIONOME"]) &&
                strlen(trim($_SESSION["USUARIONOME"]))>0 &&
                isset($_SESSION["USUARIOID"]) &&
                strlen(trim($_SESSION["USUARIOID"]))>0 &&
                isset($_SESSION["USUARIOPERMISSAO"]) &&
                strlen(trim($_SESSION["USUARIOPERMISSAO"]))>0
        );
        //FALSE OU TRUE
    }