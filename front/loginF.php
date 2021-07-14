<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='../css/css.css'>
    <link rel="shortcut icon" href="../imgs/livro3.png"/>
    <title> Login </title>
</head>

<body>
<div class='cabeçalho'>
        <h1 class="titulo"> IF LEITURA </h1>
        <ul>
        <!-- aqui o user só pode entrar logado-->
        <li> <a href="home.php"> LIVROS </a> </li>
        <li > <a href="cadastroF.php"> CADASTRO </a> </li>
        <li> <a href="loginF.php"> LOGIN </a> </li>
        <li> <a href="index.php">SAIR</a> </li>
        </ul>
    </div>

	<div class="login">
		<form method="POST" action="../php/login.php">
			<h2> Já é cadastrado? Faça seu login: </h2> 
			<input  type="email" name="email" placeholder='E-mail' class='inputs'/> <br> <br>
            <input  type="password" name="senha" placeholder='Senha' class='inputs'/> <br> <br>
			<input type="submit" value="Entrar" class='submit'/>
			
            <p> Ou <a href ="../front/cadastroF.php">cadastre-se.</a></p>
                        
            <?php if(isset($_SESSION['errado'])): ?>
            <div class="erro">
                <p> Algo está errado! Tente novamente. </p>
            </div>
            <?php
            endif;
            unset($_SESSION['errado']);
            ?>
		</form>
	</div> 
</br>
</body>
                        