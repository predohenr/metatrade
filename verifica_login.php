<?php
    session_start();
    include('conexao.php');

    if(!isset($_SESSION['email'])){
        header('Location: login.html');
    }else{
        if($_SESSION['tipo_user'] == 1){
            header('Location: perfilcomerciante.php');

        }else if($_SESSION['tipo_user'] == 2){
            header('Location: perfilfornecedor.php');

        }else{
            echo"Tipo de usuario não identificado!";
            exit();
        }
    }
?>
