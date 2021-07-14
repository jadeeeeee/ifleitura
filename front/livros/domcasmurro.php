<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='../../css/css.css'>
    <link rel="shortcut icon" href="../../imgs/livro3.png"/>
    <title> Dom Casmurro </title>
</head>

<body>
<div class='cabeçalho'>
    <h1 class="titulo"> IF LEITURA </h1>
    <ul>
    <li> <a href="../home.php"> LIVROS </a> </li>
    <li > <a href="../cadastroF.php"> CADASTRO </a> </li>
    <li> <a href="../loginF.php"> LOGIN </a> </li>
    <li> <a href="../index.php">SAIR</a> </li>
    </ul>
</div>

<div class="livro-pag">

    <div class="conteudo-livro">
        <h2> Dom Casmurro </h2> <h3> Machado de Assis </h3> <br>
        <img src="../../imgs/domcasmurro.jpg" alt="Dom Casmurro" class="capa-livro"/> <br>
        <h3> Sinopse do livro </h3>
        <p class="sinopse"> traiu ou não traiu? </p>
    </div>

    <div class="resenha">
        <h2> Adicione sua resenha/avaliação sobre essa obra! </h2> <br>
        <form method="POST" action="../../php/resenha.php">
            <input type="text" name="resenha" class="resenha-input" placeholder="E aí, traiu ou não traiu?"> <br>
            
            <label for="nota"> Classifique a obra de 1 a 5: </label>
            <input type="range" name="nota" id="nota" min="1" max="5"> <br>
            
            <input type="submit" value="Enviar" class="submit-resenha">
        </form>
    </div>
</div>


</body>
</html>