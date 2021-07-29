<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Livro </title>
</head>
<body>
<h3> Upload pra tabela de livros </h3>
<form action="" method="POST" enctype="multipart/form-data">
    Titulo <br>
    <input type="text" name="titulo"> <br>
    Autor <br>
    <input type="text" name="autor"> <br>
    Ano de Publicação <br>
    <input type="number" name="ano"> <br>
    Id <br>
    <input type="number" name="id"> <br>
    sinopse <br>
    <input type="text" name="sinopse"> <br>
    Origem <br>
    <input type="radio" name="origem" value="Nacional" checked> Nacional <br>
    <input type="radio" name="origem" value="Internacional"> Internacional <br>
    Imagem da capa: <br>
    <input type="file" name="file"> <br>
    <input type="submit" name="submit" value="Upload">
</form>
</body>
</html>

<?php

// Incluir o bd
include 'conexao.php'; 
$erro = '';

// File upload path
$pasta = "upload/";
$capa = basename($_FILES["file"]["name"]);
$caminho = $pasta . $capa;
$tipoimg = pathinfo($caminho, PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    
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
                $erro = "A imagem '$capa' e o resto foram enviados com sucesso.";
            }
            else { echo "não inseriu";}
        }
        else{echo "não salvou";}
    }
    else{echo "segundo if";}
}
else{echo"primeiro if";}
// Display status message
echo $erro;


/*
// Get images from the database
$sql ="SELECT capa FROM livro ORDER BY id DESC";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row > 0){
    while($sql){
        $imgURL = 'upload/'.$row['capa'];
        echo "<img src= $imgURL alt='' />"; 
    }
}
else {
    echo "<p> Imagens não encontradas </p>";
} 
*/
?>