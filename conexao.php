<?php

$usuario = 'root';
$senha = '';
$database = 'metatrade';
$host = '127.0.0.1';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error){
    die("Falha ao se conectar com ao banco de dados: " . $mysqli->error);
}

?>