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
            $cnpj = $row[0];
            $razao_social = $row[3];
            $data_abertura = $row[4];
            $rua_endereco = $row[5];
            $cidade_endereco = $row[6];
            $cod_uf_endereco = $row[7];
            $cep_endereco = $row[8];
            $numero_endereco = $row[9];
            $telefone = $row[11];
            $ddd = $row[12];
    
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['tipo_user'] = $tipo_user;
            $_SESSION['cnpj'] = $cnpj;
            $_SESSION['razao_social'] = $razao_social;
            $_SESSION['data_abertura'] = $data_abertura;
            $_SESSION['rua_endereco'] = $rua_endereco;
            $_SESSION['cidade_endereco'] = $cidade_endereco;
            $_SESSION['cod_uf_endereco'] = $cod_uf_endereco;
            $_SESSION['cep_endereco'] = $cep_endereco;
            $_SESSION['numero_endereco'] = $numero_endereco;
            $_SESSION['telefone'] = $telefone;
            $_SESSION['ddd'] =$ddd;

    
            if($tipo_user == 1){
                header('Location: perfilcomerciante.php');
    
            }else if($tipo_user == 2){
                header('Location: perfilfornecedor.php');
    
            }else{
                echo"Tipo de usuario não identificado!";
                exit();
            }
    
        }else{
            ?>
            <?php
            header('Location: login.html');
            
        }

       # return($numrow);
    #}

?>