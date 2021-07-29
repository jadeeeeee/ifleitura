<?php
//pega o id do link que veio da home.php
$id_livro = $_GET['id'];
include('conexao.php');
session_start();

if (!isset($_SESSION['logado'])) {
    header('Location:login.php');
}

//coisa do usuario
$id = $_SESSION['id-usuario'];
$query = "SELECT * FROM usuario WHERE id_usuario = '$id'";
$resultado = mysqli_query($conexao, $query);
$dados = mysqli_fetch_array($resultado);

//coisa do livro
$sql = "SELECT * FROM livro WHERE id = '$id_livro'";
$result = mysqli_query($conexao, $sql);
$dados_livro = mysqli_fetch_array($result);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='../css/css.css'>
    <link rel="shortcut icon" href="../imgs/livro3.png"/>
    <title> <?php echo $dados_livro['titulo']; ?> </title>
</head>

<body>
<div class='cabeçalho'>
    <h1 class="titulo"> IF LEITURA </h1>
    <ul>
    <li> <a href="home.php"> LIVROS </a> </li>
    <li> <a href="logout.php">SAIR</a> </li>
    <li> <a href=""><?php echo strtoupper($dados['nome']); ?></a>  </li>
    </ul>
</div>

<div class="livro-pag">

    <div class="conteudo-livro">
        <h2> <?php echo $dados_livro['titulo']; ?> </h2> <h3> <?php echo $dados_livro['autor']; ?> </h3> <br>
        <!--imagem do bd? -->
        <?php  $imgURL = 'upload/'.$dados_livro['capa']; ?>
        <img src="<?php echo $imgURL;?>" alt="<?php echo $dados_livro['titulo']; ?>" class="capa-livro"/> <br>
        <h3> Sinopse do livro </h3>
        <p class="sinopse"> <?php echo $dados_livro['sinopse']; ?> </p>
    </div>

    <div class="resenha">
        <h2> Adicione sua resenha/avaliação sobre essa obra! </h2> <br>
        <form method="POST" action="">
            <textarea name=resenha class="resenha-input" placeholder="Escreva aqui"></textarea><br>
            <label for="nota"> Classifique a obra de 1 a 5: </label>
            <input type="range" name="nota" class="nota" min="1" max="10"> <br>
            <button type="submit" name="Enviar" class="submit-resenha"> Enviar </button><br>
            <button type=reset value=Limpar class="submit-resenha"> Limpar </button>
        </form>
    </div>
</div>
<h3>Resenhas e notas</h3>
<hr> <br>

<?php
$query = "SELECT  titulo, autor, ano_publi, id, sinopse, capa FROM livro WHERE origem = 'Internacional'";
$executar = mysqli_query($conexao, $query);




//form e comentarios
//insere no bd
if (!empty($_POST['resenha'])){
    $resenha = mysqli_real_escape_string($conexao, $_POST['resenha']);
    $nota = mysqli_real_escape_string($conexao, $_POST['nota']);

    $query = "INSERT INTO avaliacao(resenha, nota, data, id_livro, id_usuario) VALUES ('$resenha', '$nota', NOW(), '$id_livro', '$id')";
    mysqli_query($conexao, $query);
}
    


//filtrar o id do livro
$query1 = "SELECT DISTINCT nome, resenha, nota, avaliacao.data FROM avaliacao, usuario 
WHERE avaliacao.id_usuario = usuario.id_usuario and avaliacao.id_livro=".$id_livro." ORDER BY id desc";
$executar = mysqli_query($conexao, $query1);


while($exibir = mysqli_fetch_array($executar)){
    echo "<div class='comentarios'> Postado por: ", $exibir['nome'], "<br> Nota: ", $exibir['nota'], "<br> Resenha: ", $exibir['resenha'],"</br> Data: ", $exibir['data'], '<br>', $id_livro, "</div> <br>";
}


?>
</body>
</html>
</body>
</html>