<?php
include('conexao.php');

$resenha =  mysqli_real_escape_string($conexao, $_POST['resenha']);
$nota =  mysqli_real_escape_string($conexao, $_POST['nota']);


echo $resenha, $nota;

?>