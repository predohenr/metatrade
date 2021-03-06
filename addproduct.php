<?php
    
    session_start();
    include('protect.php');
    include('conexao.php');
    if($_SESSION['tipo_user'] == 1){
        echo"Você não tem aceso a essa página!";
        header('Location: index.php');
        exit();
    }

    $dbh = new PDO('mysql:host=127.0.0.1; dbname=metatrade', 'root', '');
    $sth = $dbh->prepare('SELECT `cod_categoria_produto`, `nome_categoria` FROM `categoria_produto`');
    $sth->execute();

    $resultados = $sth->fetchAll(PDO::FETCH_ASSOC);

    $sth = $dbh->prepare('SELECT `cod_cor`, `nome_cor` FROM `cor_produto`');
    $sth->execute();

    $cores = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>metatrade - Adicionar Produto</title> 
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/metatrade_logoBranco.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
         <!-- Bootstrap core CSS -->
        <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <!-- Responsive navbar-->
            <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-danger">
                <div class="container px-5">
                    <img src="assets/img/metatrade_logoBranco.png" alt="logo metatrade">
                    <a class="navbar-brand text-light me-5" href="index.php">metatrade</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link ms-2" aria-current="page" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link ms-2" href="aboutus.html">Sobre nós</a></li>
                            <li class="nav-item"><a class="btn btn-outline-light ms-3" href="#!">Login</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <div class="container bg-white mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="mb-3">
                                <h4 class="text-right">Adicionar Produto</h4>
                            </div>



                            <form action="insertProduto.php" method="post" accept-charset="utf-8" autocomplete="on" enctype="multipart/form-data">
                                <div class="row mt-2">
                                    <div class="form-floating col-md-12">
                                        <input name="nome_produto" class="form-control" type="text" id="nome" placeholder="Nome do Produto">
                                        <label for="nome">Nome do Produto</label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-floating col-md-12">
                                        <input name="valor_produto" class="form-control" id="preco" type="text" placeholder="Preço" required>
                                        <label class="preco">Preço</label>
                                    </div>
                                    <div class="form-floating mt-2 col-md-12">
                                        <input name="qtd_estoque" class="form-control" id="estoque" type="number" placeholder="Estoque" required>
                                        <label class="estoque">Estoque Disponível</label>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating mt-3 col-md-12">
                                            <input name="descricao_produto" class="form-control" id="inputMessage" style="height:10rem;" type="text" placeholder="Descrição" required>
                                            <label for="inputMessage">Descrição</label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">

                                    <div class="form-floating mt-3 col-md-12">
                                        <select name="categoria_produto"><?php     if(count($resultados)){
                                                foreach($resultados as $Resultado){ { 
                                            ?> <option value="<?php echo $Resultado['cod_categoria_produto'] ?>"><?php echo $Resultado['nome_categoria'] ?></option> <?php } }}?> </select>
                                    </div>


                                    <div class="form-floating mt-3 col-md-12">
                                        <select name="cor_produto"><?php     if(count($cores)){
                                                foreach($cores as $cor){ { 
                                            ?> <option value="<?php echo $cor['cod_cor'] ?>"><?php echo $cor['nome_cor'] ?></option> <?php } }}?> </select>
                                    </div>

                                    </div>

                                    <div class="row mt-2">
                                        <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                                        <input class="form-control" type="file" id="formFileMultiple" multiple required/>
                                    </div>
                                </div>
                                
                                <div class="row mt-5">
                                    <div class="col-md-6"><label class="labels">Senha</label><input name="senha" type="password" class="form-control" placeholder="Senha" required></div>
                                    <div class="col-md-6"><label class="labels">Confirmar Senha</label><input name="senhaconfirme" type="password" class="form-control" placeholder="Confirmar Senha" required></div>
                                </div>
                                <div class="mt-5 text-center">
                                    <button class="btn btn-danger" type="submit">Adicionar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="bg-danger">
            <div class="row">
                <div class="col-3 ms-5 my-5 ">
                    <img class="mt-5" src="assets/img/logo_ufca.png" width="300" height="50">
                </div>
                <div class="col-4 ms-5 my-5">
                    <div class="text-white text-center">
                        <p>Desenvolvido por:</p>
                        <a href="https://github.com/predohenr" style="text-decoration:none" target="_blank"><p class="text-white">Pedro Henrique Lopes</p></a>
                        <a href="https://github.com/gabiqueiroga" style="text-decoration:none" target="_blank"><p class="text-white">Gabriela Queiroga Guimarães</p></a> 
                        <a href="https://github.com/arianekevinny" style="text-decoration:none" target="_blank"><p class="text-white">Ariane Kevinny Muniz</p></a>
                    </div>
                </div>
                <div class="col my-5">
                    <img src="assets/img/logoKV_branco.png">
                    <img class="mx-3" src="assets/img/logoPi2.png" width="112.5" height="150">
                    <img src="assets/img/logoGoogle.png" width="120" height="120">
                </div>
            </div>
          </footer>
    </body>
</html>