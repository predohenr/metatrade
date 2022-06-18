<?php

define('HOST', '127.0.0.1');
define('USUARIO', 'root');
define('SENHA', '');
define('DATABASE', 'metatrade');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DATABASE) or die ('Não possivel se conectar a base de dados!');

?>