<?php

if(!isset($_GET['busca_categoria'])){
    header("Location: index.php");
    exit;
}

$nome = "%".trim($_GET['busca_categoria'])."%";

$dbh = new PDO('mysql:host=127.0.0.1; dbname=metatrade', 'root', '');
$sth = $dbh->prepare('SELECT * FROM `produto` INNER JOIN `categoria_produto` ON `produto`.`cod_categoria` = `categoria_produto`.`cod_categoria_produto` WHERE `categoria_produto`.`nome_categoria` LIKE :nome');
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
        <title>metatrade - Catálogo</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
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


        <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        </style>
    </head>

    <body>

        <!--- CABEÇALHO PADRÃO --->
        <header>
            <!-- Responsive navbar-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.php">metatrade</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link ms-2" aria-current="page" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link ms-2" href="aboutus.html">Sobre nós</a></li>
                            <li class="nav-item"><a class="btn btn-outline-light ms-3" href="verifica_login.php">Acesse seu Perfil</a></li>
                    </ul>
                    </div>
                </div>
            </nav>
        </header>

        <!---nome catalogo e texto--->
            <section class="py-5 text-center container">
            <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw">Catálogo</h1>
            <p class="lead text-muted">Esses foram os produtos encontrados após sua busca textual!</p>
            </div>
            </div>
            </section>

    
        <!---catalogo--->

        <div class="album py-5 bg-light">
        <div class="container px-5">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
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

            </div>
        </div>
        </div>

    </body>
</html>