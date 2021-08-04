<?php
include('conexao.php');
session_start();

if (!isset($_SESSION['logado'])) {
    header('Location:login.php');
}

$id = $_SESSION['id-usuario'];
$query = "SELECT * FROM usuario WHERE id_usuario = '$id'";
$resultado = mysqli_query($conexao, $query);
$dados = mysqli_fetch_array($resultado);
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='../css/css.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../imgs/livro3.png"/>
    <title> HOME </title>
</head>

<body>
<div class='nome'>
    <h1 id = "red">I</h1> <h1 id = "green">F</h1> <h1 class = "titulo">leitura</h1> <br>
    <ul>
    <li> <a href="home.php"> livros </a> </li>
    <li> <a href="logout.php">sair</a> </li>
    <li> <a href="">|</a></li>
    <img src="../imgs/user2.png" alt="" id="user">
    <li> <a href=""><?php echo $dados['nome']; ?></a>  </li>
    </ul>
</div>

<h4>NACIONAIS</h4> <br>
<div class='conteudo'>
    <?php //carregar dados do bd e mostrar - consulta
        $query = "SELECT  titulo, autor, ano_publi, id, sinopse, capa FROM livro WHERE origem = 'Nacional'";
        $executar = mysqli_query($conexao, $query);
        
        // exibição - assoc ou array? os dois dão certo
        while($exibir = mysqli_fetch_array($executar)){ 
            $imgURL = 'upload/'.$exibir['capa']; //faz o caminho da imagem de capa
            echo "<div class='livro'> <a href='livro.php?id=", $exibir['id'],"'> <img src='", $imgURL, "' alt='", $exibir['titulo'], "' class='img-home'> </a> </div>";
        }
    ?>
</div>

<h4>INTERNACIONAIS</h4> <br>
<div class='conteudo'>
    <?php //mesma coisa
        $query = "SELECT  titulo, autor, ano_publi, id, sinopse, capa FROM livro WHERE origem = 'Internacional'";
        $executar = mysqli_query($conexao, $query);
        
        while($exibir = mysqli_fetch_assoc($executar)){ 
            $imgURL = 'upload/'.$exibir['capa'];
            echo "<div class='livro'> <a href='livro.php?id=", $exibir['id'],"'> <img src='", $imgURL, "' alt='", $exibir['titulo'], "' class='img-home'> </a> </div>";
        }
    ?>
</div>


</body>
</html>