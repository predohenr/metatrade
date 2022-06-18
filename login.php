<?php

    include('conexao.php');

    if(empty($_POST['email']) || empty($_POST['senha'])){
        echo"Chegou Aqui 1";
       # header('Location: login.html');
       # exit();
    }

    
    $email = mysqli->real_escape_string($conexao, $_POST['email']);
    $senha = mysqli->real_escape_string($conexao, $_POST['senha']);

    $sql_code = "SELECT * FROM usuario WHERE email = {'$email'} AND senha = {'$senha'}";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
        
    echo"Chegou Aqui";

?>