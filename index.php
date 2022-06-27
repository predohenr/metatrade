<!DOCTYPE html>

<?php

session_start();

$dbh = new PDO('mysql:host=127.0.0.1; dbname=metatrade', 'root', '');
$sth = $dbh->prepare('SELECT * FROM `produto` INNER JOIN `nota_produto` ON `produto`.`idproduto` = `nota_produto`.`idproduto` WHERE `nota_produto`.`nota` > "5"');
$sth->execute();

$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);

?>


<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>metatrade - Home</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/metatrade_logoBranco.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
    <!-- Responsive navbar-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-danger bg-danger">
        <div class="container px-5">
            <img src="assets/img/metatrade_logoBranco.png" alt="logo metatrade">
            <a class="navbar-brand text-light me-5" href="index.php">metatrade</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class=" col justify-content-center">
                  <form action="busca.php" method="get" class="d-flex" role="search">
                    <input name="busca_produto" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Buscar</button>
                  </form>
                </div>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link ms-2 text-light" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link ms-2 text-light" href="aboutus.html">Sobre nós</a></li>
                    <li class="nav-item"><a class="btn btn-outline-light ms-3" href="verifica_login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
        <!-- Header-->
        <header class="bg-danger py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center my-5">
                            <h1 class="display-5 fw-bolder text-white mb-2">Encontre os melhores fornecedores para o seu negócio!</h1>
                            <p class="lead text-white-50 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos cumque deleniti corrupti obcaecati fugit alias, recusandae possimus bld accusantium eum alias!</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </header>
        
    <!-- PRINCIPAIS CATEGORIAS-->
    
    <section class="bg-light py-5">
        <div class="container px-5">

        <div class="title m-4 text-center"> 
            <h3>Principais Categorias</h3>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4 m-2">
            <div class="col">
                <div class="card">
                  <a href="busca_categoria.php?busca_categoria=moda" style="text-decoration:none;">
                    <div class="card-body">
                        <div class="feature bg-danger bg-gradient text-white rounded-3 mb-3"><i class="bi bi-handbag"></i></div>
                        <h5 style="color: black;" class="card-title">Moda</h5>
                        <p style="color: black;" class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                  </a>
                </div>
            </div>
            <div class="col">
                <div class="card">
                  <a href="busca_categoria.php?busca_categoria=casa" style="text-decoration:none;">
                    <div class="card-body">
                        <div class="feature bg-danger bg-gradient text-white rounded-3 mb-3"><i class="bi bi-house"></i></div>
                        <h5 style="color: black;" class="card-title">Casa</h5>
                        <p style="color: black;" class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                  </a>
                </div>
            </div>
            <div class="col">
                <div class="card">
                  <a href="busca_categoria.php?busca_categoria=eletronico" style="text-decoration:none;">
                    <div class="card-body">
                        <div class="feature bg-danger bg-gradient text-white rounded-3 mb-3"><i class="bi bi-laptop"></i></div>
                        <h5 style="color: black;" class="card-title">Eletronicos</h5>
                        <p style="color: black;" class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                  </a>
                </div>
            </div>
        </div>
    </section>

    <!--VOCE PODE GOSTAR-->

    <section class="py-5">
        <div class="container px-5">

            <div class="title m-4 text-center"> 
                <h3>Você pode gostar</h3>
            </div>

            <div class="album py-5">
                <div class="container px-5">
                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <!--CARD-->
                    <?php
                      if(count($resultados)){
                          foreach($resultados as $Resultado){
                      ?>
                                  <!--CARD-->
                                  <div class="col">
                                  <div class="card shadow-sm">
                                      <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Foto Produto</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Foto Produto</text></svg>

                                      <div class="card-body">
                                      <h5 class="card-title text-center"><?php echo $Resultado['nome_produto']; ?></h5>
                                      <p class="card-text"><?php echo $Resultado['descricao_produto']; ?>.</p>
                                      <div class="d-flex justify-content-between align-items-center">
                                          
                                    
                                          <small class="text-muted"><?php echo $Resultado['valor_produto']; ?></small>
                                          <!--CORAÇAO-->
                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                          <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                          </svg>
                                      </div>
                                      </div>
                                  </div>
                                  </div>


                                  <?php
                                  }}else{
                                      ?>
                                      <label>Não foi encontrado resultado</label>
                                  <?php
                                  }
                                  ?>


        </div>


    </section>
        
    <!-- Footer-->
    <footer class="pt-3 bg-danger">
        <div class="row">
            <div class="col-3 ms-5 my-5 ">
                <img class="mt-5" src="assets/img/logo_ufca.png" width="300" height="50">
            </div>
            <div class="col-4 ms-5 my-5">
                <div class="text-white text-center">
                    <p>Desenvolvido por:</p>
                    <a href="https://github.com/predohenr" style="text-decoration:none" target="_blank"><p class="text-white">Pedro Henrique Lopes</p></a>
                    <a href="https://github.com/gabiqueiroga" style="text-decoration:none" target="_blank"><p class="text-white">Gabriela Queiroga Guimarães</p></a> 
                    <a href="https://github.com/arianekevinny" style="text-decoration:none" target="_blank"><p class="text-white">Ariane Kevinny Muniz Ribeiro</p></a>
                </div>
            </div>
            <div class="col my-5">
                <img src="assets/img/logoKV_branco.png">
                <img class="mx-3" src="assets/img/logoPi2.png" width="112.5" height="150">
                <img src="assets/img/logoGoogle.png" width="120" height="120">
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  </body>
</html>



