<?php

session_start();

$nome = $_SESSION['cnpj'];

$dbh = new PDO('mysql:host=127.0.0.1; dbname=metatrade', 'root', '');
$sth = $dbh->prepare('SELECT * FROM `produto` WHERE `idfornecedor` LIKE :nome');
$sth->bindParam(':nome', $nome, PDO::PARAM_STR);
$sth->execute();

$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>metatrade - Catálogo do Fornecedor</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/metatrade_logoBranco.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>


    <!-- Bootstrap core CSS -->
<link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">
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
                        <li class="nav-item"><a class="btn btn-outline-light ms-3" href="verifica_login.php">Meu Perfil</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

<!-- MAIN -->
<main class="bg-light">

    <section class="pt-5 text-center container">
      <div class="row py-lg-4">
        <div class="mt-5 col-lg-6 col-md-8 mx-auto">
          <h1 class="fw">Seu Catálogo</h1>
          <p class="lead text-muted">Todos os seus produtos serão listados a seguir:</p>
        </div>
        <div class="mt-3">
          <a class="btn btn-danger" href="addproduct.php">Adicionar Produto</a>
        </div>
      </div>
    </section>
  
    <div class="container ">
      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>      
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
      </svg>
      
      <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          Produto adicionado com sucesso.
        </div>
      </div>

      <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Não foi possível adicionar este produto.
        </div>
      </div>
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
                        
                        <!--   
                        <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                        </div>
                        -->
                    
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

        <div>
    </div>
  </div>

</main>

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


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      
  </body>
</html>
