<?php

$usuario = 'root';
$senha = '';
$database = 'metatrade';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error){
    die("Falha ao se conectar com ao banco de dados: " . $mysqli->error);
}

?>