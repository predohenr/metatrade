<?php
    
    session_start();
    include('protect.php');
    if($_SESSION['tipo_user'] == 1){
        echo"Você não tem aceso a essa página!";
        header('Location: index.html');
        exit();
    }

?>


<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>metatrade - Editar Perfil</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/perfilcomerciante.css" rel="stylesheet" />
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html">metatrade</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link ms-2" aria-current="page" href="index.html">Home</a></li>
                            <li class="nav-item"><a class="nav-link ms-2" href="aboutus.html">Sobre nós</a></li>
                            <li class="nav-item"><a class="btn btn-outline-light ms-3" href="#!">Meu Perfil</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <div class="my-5">
                                <img class="rounded-circle mt-5" width="150px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSD46x50hPY8U1nHHImUIBvB6C8Edqvs2iKlw&usqp=CAU">
                            </div>
                            <span class="font-weight-bold">José Pereira da Silva</span>
                            <span class="text-black-50">josepereiradasilva@gmail.com</span>
                            <span> </span>
                        </div>
                    </div>
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Meu Perfil</h4>
                            </div>
                            <div class="row mt-3">
                                <h5>Informações Cadastrais</h5>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12"><label class="labels">Nome Completo</label><input type="text" class="form-control" value="José Pereira da Silva"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Número</label><input type="text" class="form-control" value="(12)93456-7890"></div>
                                <div class="col-md-12"><label class="labels">E-mail</label><input type="text" class="form-control" value="josepereiradasilva@gmail.com"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">CNPJ</label><input type="text" class="form-control" value="12.345.678/0001-90"></div>
                                <div class="col-md-12"><label class="labels">Endereço</label><input type="text" class="form-control" value="Rua 1, nº1"></div>
                            </div>
                            <div class="row mt-5">
                                <h5>Catálogo</h5>
                                <a class="btn btn-secondary btn-sm my-1" href="#!">Adicionar Produto</a>
                                <a class="btn btn-secondary btn-sm my-1" href="#!">Remover Produto</a>
                            </div>
                            <div class="row mt-5">
                                <h5>Alterar Senha</h5>
                                <div class="col-md-6"><label class="labels">Senha</label><input type="password" class="form-control" placeholder="Senha" value=""></div>
                                <div class="col-md-6"><label class="labels">Confirmar Senha</label><input type="password" class="form-control" placeholder="Confirmar Senha" value=""></div>
                            </div>
                            <div class="mt-5 text-center">
                                <a class="btn btn-primary profile-button" href="#!">Salvar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <footer class="py-5 bg-dark">
                <div class="text-muted text-center">Desenvolvido por:
                    <a href="https://github.com/predohenr" target="_blank"><img src="assets/img/github.png", height="25", width="25"></a>
                    <a href="https://github.com/gabiqueiroga" target="_blank"><img src="assets/img/github.png", height="25", width="25"></a>
                    <a href="https://github.com/arianekevinny" target="_blank"><img src="assets/img/github.png", height="25", width="25"></a>
                </div>
            </footer>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>