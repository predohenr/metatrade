<?php

    if(isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['cnpj'])){
        die("Você não tem acesso a esse sistema, Efetue o Login <p><a href=\"login.php\">Entrar</a></p>");
    }
?>