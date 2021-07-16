<?php
session_start();
include('conexao.php');

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$idade = mysqli_real_escape_string($conexao, $_POST['idade']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$senha = md5($senha);

$query = "select count(*) as total from usuario where email = '$email'";
$resultado = mysqli_query($conexao, $query);
$row = mysqli_fetch_assoc($resultado);

if ($row['total'] == 1) {
    $_SESSION['usuario-existe'] = true;
    header('Location: cadastro.php');
    exit;
}

$sql = "insert into usuario (nome, idade, email, senha, data) values ('$nome', '$idade', '$email', '$senha', NOW())";

if ($conexao->query($sql) === TRUE){
    $_SESSION['status_cadastro'] = true;
    header('Location: home.php');
}


$conexao->close();

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/css.css'>
	<link rel="shortcut icon" href="../imgs/livro3.png"/>
	<title> CADASTRO </title>
</head>

<body>
	<div class='cabeçalho'>
    	<h1 class="titulo"> IF LEITURA </h1>
    	<ul>
    		<li> <a href="home.php"> LIVROS </a> </li>
    		<li > <a href="cadastro.php"> CADASTRO </a> </li>
    		<li> <a href="login.php"> LOGIN </a> </li>
    		<li> <a href="logout.php">SAIR</a> </li>
    	</ul>
	</div>

	<div class='form'>
		<form method="POST" action="">            
			<h2> Seja bem vindo(a)! Faça seu cadastro: </h2>
			<input  type="text" name="nome" class='inputs' placeholder='Seu nome'/> <br> <br>
			<input type="number" name="idade" class='inputs' placeholder='Sua idade'/> <br> <br>
			<input  type="email" name="email" class='inputs' placeholder='Seu e-mail'/> <br> <br>
			<input  type="password" name="senha" class='inputs' placeholder='Sua senha'/> <br> <br>
			<input  type="password" name="senha" class='inputs'placeholder='Confirme sua senha'/> <br> <br>
			<input type="submit" value="Cadastrar" class='submit'/> <br> <br>
			<p class=""> Já é cadastrado(a)? Faça <a href ="login.php">login.</a> </p>
		</form>

</div>

</body>
</html>
