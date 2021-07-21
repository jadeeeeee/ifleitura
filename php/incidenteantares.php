<?php
include('../conexao.php');
session_start();

if (!isset($_SESSION['logado'])) {
    header('Location:../login.php');
}

//
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
    <link rel='stylesheet' type='text/css' media='screen' href='../../css/css.css'>
    <link rel="shortcut icon" href="../../imgs/livro3.png"/>
    <title> Incidente em Antares </title>
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
        <h2> Incidente em Antares </h2> <h3> Érico Veríssimo </h3> <br>
        <img src="../../imgs/incidente1.jpg" alt="Incidente em Antares" class="capa-livro"/> <br>
        <h3> Sinopse do livro </h3>
        <p class="sinopse"> traiu ou não traiu? </p>
    </div>

    <div class="resenha">
        <h2> Adicione sua resenha/avaliação sobre essa obra! </h2> <br>
        <form method="POST" action="">
            <textarea name=resenha class="resenha-input" placeholder="Escreva aqui"></textarea><br>
            <label for="nota"> Classifique a obra de 1 a 5: </label>
            <input type="range" name="nota" class="nota" min="1" max="10"> <br>
            <input type="hidden" name="id_livro" value="01002">
            <button type="submit" name="Enviar" class="submit-resenha"> Enviar </button><br>
            <button type=reset value=Limpar class="submit-resenha"> Limpar </button>
        </form>
    </div>
</div>
<h3>Resenhas e notas</h3>
<hr> <br>

<?php
//form e comentarios
if (isset($_POST['Enviar'])){
    $resenha = mysqli_real_escape_string($conexao, $_POST['resenha']);
    $nota = mysqli_real_escape_string($conexao, $_POST['nota']);
    $id_livro = mysqli_real_escape_string($conexao, $_POST['id_livro']);
    

    //insere no bd
    $query = "INSERT INTO avaliacao(resenha, nota, data, id_livro, id_usuario) VALUES ('$resenha', '$nota', NOW(), '$id_livro', '$id')";
    mysqli_query($conexao, $query);
}

$query = "SELECT nome FROM usuario, avaliacao WHERE usuario.id_usuario = avaliacao.id_usuario";
$executa = mysqli_query($conexao, $query);
$autor =  mysqli_fetch_array($executa);

//filtrar o id do livro
$query1 = "SELECT * FROM avaliacao WHERE id_livro='$id_livro' ORDER BY id desc";
$executar = mysqli_query($conexao, $query1);
$exibir = mysqli_fetch_array($executar);
while($exibir = mysqli_fetch_array($executar)){ 
    echo "Postado por: ", $autor['nome'], "<br>";
    echo "Nota: ", $exibir['nota'], "<br>";
    echo "Resenha: ", $exibir['resenha'],"</br>";
    echo "Data: ", $exibir['data'], "<hr>";

}

?>

</body>
</html>