<?php 
include('conexao.php');

$query = "SELECT * FROM livro WHERE id = '02007'";
$resultado = mysqli_query($conexao, $query);
$livros = mysqli_fetch_array($resultado);

$titulo;
$autor;
$ano_publi;
$id;
$origem;

echo $livros;









?>