<?php

// Conexão do vídeo
define('HOST', '127.0.0.1');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'if-leitura');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Conexão não realizada');

?>