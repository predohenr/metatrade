<?php
    session_start();
    include('protect.php');
    if($_SESSION['tipo_user'] == 2){
        echo"Você não tem aceso a essa página!";
        header('Location: index.php');
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
                    <a class="navbar-brand" href="index.php">metatrade</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link ms-2" aria-current="page" href="index.php">Home</a></li>
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
                            <span class="font-weight-bold"><?php echo $_SESSION['razao_social']; ?></span>
                            <span class="text-black-50"><?php echo $_SESSION['email']; ?></span>
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
                            <form action="editarUsuario.php" method="POST">
                            <div class="row mt-2">
                                <div class="col-md-12">
                                <label class="labels">Razão Social</label>
                                <input type="text" name ="razao_social" class="form-control" value="<?php echo $_SESSION['razao_social']; ?>"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4"><label class="labels">DDD</label><input type="number" name ="ddd" class="form-control" value="<?php echo $_SESSION['ddd']; ?>"></div>
                                <div class="col-md-8"><label class="labels">Número</label><input type="tel" placeholder="12345-6789" name ="telefone" class="form-control" value="<?php echo $_SESSION['telefone']; ?>"></div>
                                <div class="col-md-12"><label class="labels">E-mail</label><input type="email" name ="email" class="form-control" value="<?php echo $_SESSION['email']; ?>"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">CNPJ</label><input type="text" name ="cnpj" class="form-control" value="<?php echo $_SESSION['cnpj']; ?>"></div>
                                <div class="col-md-12"><label class="labels">Data de Abertura</label><input type="date" name="data_abertura" class="form-control" value="<?php echo $_SESSION['data_abertura'];?>"></div>
                                <div class="col-md-12"><label class="labels">Endereço</label><input type="text" name="rua_endereco" class="form-control" value="<?php echo $_SESSION['rua_endereco'];?>"></div>
                                <div class="col-md-12"><label class="labels">Endereço</label><input type="text" name="cidade_endereco" class="form-control" value="<?php echo $_SESSION['cidade_endereco'];?>"></div>
                                <div class="col-md-12"><label class="labels">Endereço</label><input type="text" name="numero_endereco" class="form-control" value="<?php echo $_SESSION['numero_endereco'];?>"></div>
                                <div class="col-md-12"><label class="labels">CEP</label><input type="number" name ="cep" class="form-control" pattern="[0-9]{5}-[0-9]{3}" value="<?php echo $_SESSION['cep_endereco']; ?>"></div>
                                <div class="col-md-12"><label class="labels">CÓDIGO UF</label><input type="text" name ="uf" class="form-control" value="<?php echo $_SESSION['cod_uf_endereco']; ?>"></div>
                            </div>

                            <div class="row mt-5">
                                <h5>Confirme a senha para realizar alterações</h5>
                                <div class="col-md-6"><label class="labels">Senha</label><input name ="senha" type="password" class="form-control" placeholder="Senha" required></div>
                                 <div class="col-md-6"><label class="labels">Confirmar Senha</label><input name = "senhaconfirme" type="password" class="form-control" placeholder="Confirmar Senha" required></div>
                            </div>
                            <div class="mt-5 text-center">
                                <button class="btn btn-primary profile-button" type="submit">Salvar Mudanças</button>
                            </div>

                            </form>

                            <div class="row mt-5">
                                <a class="btn btn-secondary btn-sm my-1" href="logout.php?logout=true">Sair da Conta</a>
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