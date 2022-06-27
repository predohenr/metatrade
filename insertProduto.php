<?php
    
    session_start();
    include('protect.php');
    include('conexao.php');
    if($_SESSION['tipo_user'] == 1){
        echo"Você não tem aceso a essa página!";
        header('Location: index.php');
        exit();
    }

    if(($_SESSION['senha']) != ($_POST['senhaconfirme'])){
        echo"Senha incorreta";
        header('Location: teste.php');
        exit();
    }

    $idfornecedor = $_SESSION['cnpj'];

    $nome_produto = mysqli_real_escape_string($conexao, $_POST['nome_produto']);
    $valor_produto = mysqli_real_escape_string($conexao, $_POST['valor_produto']);
    $qtd_estoque = mysqli_real_escape_string($conexao, $_POST['qtd_estoque']);
    $descricao_produto = mysqli_real_escape_string($conexao, $_POST['descricao_produto']);
    $categoria_produto = mysqli_real_escape_string($conexao, $_POST['categoria_produto']);
    $cor_produto = mysqli_real_escape_string($conexao, $_POST['cor_produto']);
    

    $sql_code = "INSERT INTO `produto`(`idfornecedor`, `cod_categoria`, `cod_cor_produto`, `nome_produto`, `descricao_produto`, `valor_produto`, `qtd_estoque`) VALUES ('{$idfornecedor}','{$categoria_produto}','{$cor_produto}','{$nome_produto}','{$descricao_produto}', '{$valor_produto}', '{$qtd_estoque}')";
    $sql_result = mysqli_query($conexao, $sql_code);

    header("Location: catalogfornecedor.php");

?>