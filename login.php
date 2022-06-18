<?php

    session_start();
    include('conexao.php');

    if(empty($_POST['email']) || empty($_POST['senha'])){
        header('Location: login.html');
        exit();
    }

    
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $sql_code = "SELECT * FROM usuario WHERE email = '{$email}' AND senha = '{$senha}'";
    $sql_result = mysqli_query($conexao, $sql_code);
    $numrow = mysqli_num_rows($sql_result);   
    $row = mysqli_fetch_array($sql_result); 

    if($numrow == 1){

        $tipo_user = $row[1];

        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['tipo_user'] = $tipo_user;

        if($tipo_user == 1){
            header('Location: perfilcomerciante.php');

        }else if($tipo_user == 2){
            header('Location: perfilfornecedor.php');

        }else{
            echo"Tipo de usuario não identificado!";
            exit();
        }

    }else{
        header('Location: login.html');
    }

?>