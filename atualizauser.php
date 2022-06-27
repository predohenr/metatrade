<?php

    session_start();
    include('conexao.php');


        $cnpjuser = $_SESSION['cnpj'];

        $razao_social = filter_input(INPUT_POST, 'razao_social', FILTER_SANITIZE_STRING);
        $ddd = filter_input(INPUT_POST, 'ddd', FILTER_SANITIZE_NUMBER_INT);
        $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_NUMBER_INT);
        $data_abertura = mysqli_real_escape_string($conexao, $_POST['data_abertura']);
        $rua_endereco = filter_input(INPUT_POST, 'rua_endereco', FILTER_SANITIZE_STRING);
        $cidade_endereco = filter_input(INPUT_POST, 'cidade_endereco', FILTER_SANITIZE_STRING);
        $numero_endereco = filter_input(INPUT_POST, 'numero_endereco', FILTER_SANITIZE_STRING);
        $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT);
        $uf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);

        $sql_code = "UPDATE usuario SET CNPJ = '$cnpj', razao_social ='$razao_social', data_abertura = '$data_abertura', rua_endereco = '$rua_endereco', cidade_endereco = '$cidade_endereco', cod_uf_endereco = '$uf', cep_endereco='$cep', numero_endereco='$numero_endereco', email='$email', telefone='$telefone', ddd='$ddd' WHERE cnpj = '$cnpjuser'";
        $sql_result = mysqli_query($conexao, $sql_code);
        
        if(mysql_affected_rows($conexao)){

            $_SESSION['msg'] = '<div class="ocultar">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol>
              </svg>
              
              <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                  Usuário Modificado!
                </div>
              </div>

            </div>';
            header('Location: verifica_login.php');

        }else{
            
            $_SESSION['msg'] = '<div class="ocultar">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol>
              </svg>
              
              <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                    Usuario não modificado
                </div>
              </div>

            </div>';
            
            header('Location: logout.php?logout=true');
        }
?>