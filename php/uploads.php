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

if ($dados['id_usuario'] != 26){
    header('Location:home.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='../css/css.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../imgs/livro3.png"/>
    <title> Livro </title>
    <style>
        #up{
            width: 30vw;
            height: 70vh;
            margin-left: 35vw;
            margin-right: 35vw;
            border: .9 double black 12px;
            border-radius: 20px;
            text-align: center;
        }

        input[type="file"] {
            display: none;
        }
        #file{
            width: 15vw;
            height: 5vh;
            background-color: black;
            color: white;
            text-align: center;
            margin-top: 10px;
            padding: 0px 0px;
            border-radius: 12px;
            border: none;
            text-align: center;
            display: block;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class='nome'>
    <h1 id="red"> i </h1> <h1 id="green"> f </h1> <h1 class="titulo"> leitura </h1> <br>
    <ul>
    <li> <a href="home.php"> livros </a> </li>
    <li> <a href="logout.php">sair</a> </li>
    <li> <a href="">|</a></li>
    <img src="../imgs/user2.png" alt="" id="user">
    <li> <a href=""><?php echo $dados['nome']; ?> </a>  </li>
    </ul>
</div>


<div id="up">
<h3> upload pra tabela de livros </h3> <br>
   <form action="" method="POST" enctype="multipart/form-data">
        <table>
            <tr><td><label for="titulo"> titulo </label> </td><td><input type="text" name="titulo" class='inputs'> </td> </tr>
            <tr><td><label for="autor"> autor </label> </td><td> <input type="text" name="autor" class='inputs'> </td></tr>
            <tr><td><label for=""> ano de publicação </label></td><td><input type="number" name="ano" class='inputs'></td></tr>
            <tr><td><label for="id"> id </label></td><td><input type="number" name="id" class='inputs'></td></tr>
            <tr><td><label for="sinopse"> sinopse </label></td><td><input type="text" name="sinopse" class='inputs'></td></tr>
            <tr><td><label for="origem "> origem </label></td><td><input type="radio" name="origem" value="Nacional" checked> Nacional <input type="radio" name="origem" value="Internacional"> Internacional</td></tr>
            <tr><td>imagem de capa:</td><td><label for="file" id="file"> Adicionar capa </label></td><td><input type="file" name="file"></td></tr>
        </table>
        <br>
        <input type="submit" name="submit" value="Upload" class='submit'>
    </form>
</div>
<hr>
</body>
</html>

<?php

$erro = '';

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    //caminho do arquivo uploaded
    $pasta = "upload/";
    $capa = basename($_FILES["file"]["name"]);
    $caminho = $pasta . $capa;
    $tipoimg = pathinfo($caminho, PATHINFO_EXTENSION);
    
    $titulo = mysqli_real_escape_string($conexao, $_POST['titulo']);
    $autor = mysqli_real_escape_string($conexao, $_POST['autor']);
    $ano = mysqli_real_escape_string($conexao, $_POST['ano']);
    $id = mysqli_real_escape_string($conexao, $_POST['id']);
    $sinopse = mysqli_real_escape_string($conexao, $_POST['sinopse']);
    $origem = mysqli_real_escape_string($conexao, $_POST['origem']);

    // formatos permitidos
    $permitipos = array('jpg','png','jpeg','gif','pdf');

    if(in_array($tipoimg, $permitipos)){
        // salvar imagem
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $caminho)){
            // inserir no banco
            $insert = "INSERT INTO livro (titulo, autor, ano_publi, id, sinopse, origem, capa) VALUES ('$titulo', '$autor', '$ano', '$id', '$sinopse', '$origem', '$capa')";
            $conexao->query($insert);

            if($insert){
                $erro = "Livro '$titulo', de '$autor' foi adicionado a base de dados com sucesso.";
            }
            else { echo "não inseriu";}
        }
        else{echo "não salvou";}
    }
    else{echo "segundo if";}
}
// Display status message
echo $erro;

?>