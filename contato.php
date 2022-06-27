<?php

//ini_set();

function checaDados($vet){
        foreach($vet as $val){ 
            if (preg_match("/(%0A|%0D|\n+|\r+)/i", $val) != 0){ echo "Tentativa de injeção de dados."; return 1; }
            }
        return 0;
        }

    //Const
    define("TO", "arianekevinny@gmail.com");
    define("ASS", "teste");
    //if (checaDados($_POST)){ exit(1); }
    // send mail :
    $_POST['mensagem'] = "Mensagem de " . $_POST['nome'] . " " . $_POST['email'];
    $_POST['mensagem'] .= "\n\n" . $_POST['mensagem'];
    $_POST['email'] = "From: " . $_POST['email'];

    if ( mail(TO, ASS, $_POST['mensagem'], $_POST['email']) ){
        // display confirmation message if mail sent successfully
        header("Location: obrigado.html");
        //Para utilizar a funcao header nao pode haver nenhum dado enviado antes do header
        //Redirecionamento por META tag:
        //echo '<meta http-equiv="refresh" content="0;url=localhost/metatrade/index.php" />';
        //Redirecionamento por JavaScript: 
        //echo " <script> location='http://www.seudominio.com.br/' </script> "; 
    }

    else{
    // sending failed, display error message
        header("Deu ruim");
    }
?>
<!-- FIM DO CODIGO -->