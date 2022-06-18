<?php

if(!isset($_GET['busca_produto'])){
    header("Location: index.html");
    exit;
}

$nome = "%".trim($_GET['busca_produto'])."%";

$dbh = new PDO('mysql:host=127.0.0.1; dbname=metatrade', 'root', '');
$sth = $dbh->prepare('SELECT * FROM `produto` WHERE `nome_produto` LIKE :nome');
$sth->bindParam(':nome', $nome, PDO::PARAM_STR);
$sth->execute();

$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);

print_r($resultados); 
exit;

?>