<?php

    session_start();
    include('conexao.php');

    if(($_POST['senha']) != ($_POST['senhaconfirme'])){
        header('Location: login.html');
        exit();
    }

        $cnpjuser = $_SESSION['cnpj'];

        $razao_social = mysqli_real_escape_string($conexao, $_POST['razao_social']);
        $ddd = mysqli_real_escape_string($conexao, $_POST['ddd']);
        $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
        $email = mysqli_real_escape_string($conexao, $_POST['email']);
        $cnpj = mysqli_real_escape_string($conexao, $_POST['cnpj']);
        $data_abertura = mysqli_real_escape_string($conexao, $_POST['data_abertura']);
        $rua_endereco = mysqli_real_escape_string($conexao, $_POST['rua_endereco']);
        $cidade_endereco = mysqli_real_escape_string($conexao, $_POST['cidade_endereco']);
        $numero_endereco = mysqli_real_escape_string($conexao, $_POST['numero_endereco']);
        $cep = mysqli_real_escape_string($conexao, $_POST['cep']);
        $uf = mysqli_real_escape_string($conexao, $_POST['uf']);
        

        $sql_code = "UPDATE  `usuario` SET `CNPJ` = '{$cnpj}', `razao_social` = '{$razao_social}', `data_abertura` = '{$data_abertura}', `rua_endereco` = '{$rua_endereco}', `cidade_endereco` = '{$cidade_endereco}', `cod_uf_endereco` = '{$uf}', `cep_endereco`='{$cep}', `numero_endereco`='{$numero_endereco}', `email`='{$email}', `telefone`='{$telefone}', `ddd`='{$ddd}' WHERE `CNPJ` = '{$cnpjuser}'";
        $sql_result = mysqli_query($conexao, $sql_code);

        header("Location: logout.php?logout=true");
        

?>


