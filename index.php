<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>metatrade - Home</title>
        
    </head>
    <body>
        teste
    </body>
</html>

<?php

$login_cookie = $COOKIE['login'];
    if(isset($login_cookie)){
        echo"Bem Vindo, $login_cookie <br>";
        echo"logado";
    }else{
        echo"Faça login por favor";
        echo"<a href='login.html'>CLIQUE AQUI PARA ENTRAR NA SUA CONTA</a>";
    }

?>