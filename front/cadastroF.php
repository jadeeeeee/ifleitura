<?php
session_start();
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
    		<li > <a href="cadastroF.php"> CADASTRO </a> </li>
    		<li> <a href="loginF.php"> LOGIN </a> </li>
    		<li> <a href="index.php">SAIR</a> </li>
    	</ul>
	</div>

	<div class='form'>
		<form method="POST" action='../php/cadastro.php'>            
			<h2> Seja bem vindo(a)! Faça seu cadastro: </h2>
			<input  type="text" name="nome" class='inputs' placeholder='Seu nome'/> <br> <br>
			<input type="number" name="idade" class='inputs' placeholder='Sua idade'/> <br> <br>
			<input  type="email" name="email" class='inputs' placeholder='Seu e-mail'/> <br> <br>
			<input  type="password" name="senha" class='inputs' placeholder='Sua senha'/> <br> <br>
			<input  type="password" name="senha" class='inputs'placeholder='Confirme sua senha'/> <br> <br>
			<input type="submit" value="Cadastrar" class='submit'/> <br> <br>
			<p class=""> Já é cadastrado(a)? Faça <a href ="../front/loginF.php">login.</a> </p>
		</form>

</div>

</body>
</html>