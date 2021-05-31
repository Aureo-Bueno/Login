<?php

    function Admin() {
        return ($_SESSION["USUARIOPERMISSAO"]=="ADMIN"); //true
    }

    function Coordenador() {
        return ($_SESSION["USUARIOPERMISSAO"]=="ADMIN" ||
                $_SESSION["USUARIOPERMISSAO"]=="COORDENADOR"); //true
    }

    function Professor() {
        return ($_SESSION["USUARIOPERMISSAO"]=="ADMIN" ||
                $_SESSION["USUARIOPERMISSAO"]=="COORDENADOR" || 
                $_SESSION["USUARIOPERMISSAO"]=="PROFESSOR"); //true
    }

    function Aluno() {
        return ($_SESSION["USUARIOPERMISSAO"]=="ADMIN" ||
                $_SESSION["USUARIOPERMISSAO"]=="COORDENADOR" || 
                $_SESSION["USUARIOPERMISSAO"]=="PROFESSOR" ||
                $_SESSION["USUARIOPERMISSAO"]=="ALUNO"); //true
    }
