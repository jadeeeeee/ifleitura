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
mysqli_close($conexao);
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='../css/css.css'>
    <link rel="shortcut icon" href="../imgs/livro3.png"/>
    <title> HOME </title>
</head>

<body>
<div class='cabeçalho'>
    <h1 class="titulo"> IF LEITURA </h1>
    <ul>
    <li> <a href="home.php"> LIVROS </a> </li>
    <li> <a href="logout.php">SAIR</a> </li>
    <li> <a href=""> PERFIL </a> </li>
    </ul>
    <p> <?php echo $dados['nome']; ?> </p> 
</div>

<h4>NACIONAIS</h4> <br>
<div class='conteudo'>
    <div class="livro">
    <a href="livros/domcasmurro.php"> <img src="../imgs/domcasmurro.jpg" alt="Dom Casmurro" class="img-home"> </a>
    </div>
    <div class="livro">
    <a href="livros/incidenteantares.php"> <img src="../imgs/incidente1.jpg" alt="Incidente em Antares" class="img-home"> </a>
    </div>
    <div class="livro">
    <a href="livros/ocortico.php"> <img src="../imgs/cortico.jpg" alt="O Cortiço" class="img-home"> </a>
    </div>
    <div class="livro">
    <a href="livros/horadaestrela.php"> <img src="../imgs/ahoradaestrela.jpg" alt="A hora da estrela" class="img-home"> </a>
    </div>
    <div class="livro">
    <a href="livros/cidadededeus.php"> <img src="../imgs/cidade.jpg" alt="Cidade de Deus" class="img-home"> </a>
    </div>
    <div class="livro">
    <a href="livros/senhora.php"> <img src="../imgs/senhora.jpg" alt="Senhora" class="img-home"> </a>
    </div>
    <div class="livro">
    <a href="livros/oalienista.php"> <img src="../imgs/alienista.jpg" alt="O Alienista" class="img-home"> </a>
    </div>
</div>

<h4>INTERNACIONAIS</h4> <br>
<div class='conteudo'>
    <div class="livro">
    <a href="livros/cronicasdenarnia.php"> <img src="../imgs/narnia.jpg" alt="As Crônicas de Nárnia" class="img-home"> </a>
    </div>
    <div class="livro">
    <a href="livros/admiravelmundonovo.php"> <img src="../imgs/admiravel.jpg" alt="Admirável Mundo Novo" class="img-home"> </a>
    </div>
    <div class="livro">
    <a href="livros/orgulhoepreconceito.php"> <img src="../imgs/orgulho.jpg" alt="Orgulho e Preconceito" class="img-home"> </a>
    </div>
    <div class="livro">
    <a href="livros/harrypotter.php"> <img src="../imgs/harry.jpg" alt="Harry Potter e a Pedra Filosofal" class="img-home"> </a>
    </div>
    <div class="livro">
    <a href="livros/madamebovary.php"> <img src="../imgs/madame.jpg" alt="Madame Bovary" class="img-home"> </a>
    </div>
    <div class="livro">
    <a href="livros/coraline.php"> <img src="../imgs/coraline.jpg" alt="Coraline" class="img-home"> </a>
    </div>
    <div class="livro">
    <a href="livros/revolucaodosbichos.php"> <img src="../imgs/bichos.jpg" alt="A Revolução dos Bichos" class="img-home"> </a>
    </div>
</div>

</body>
</html>