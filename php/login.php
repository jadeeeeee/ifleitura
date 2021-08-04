<?php
// conexão
include('conexao.php');

// sessão
session_start();

// botão
if (isset($_POST['butao'])) {
    $erros = array();
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    //vazio
    if(empty($_POST['email']) || empty($_POST['senha'])){ 
        $erros[] = "preencha todos os campos!"; 
    }
    //com dados
    else{
        $query = "SELECT email FROM usuario WHERE email = '$email'"; //verifica se tem o email
        $resultado = mysqli_query($conexao, $query);

        if (mysqli_num_rows($resultado) > 0) { // se sim 
            $senha = md5($senha);
            $query = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'"; // verifica o email com a senha
            $resultado = mysqli_query($conexao, $query);

            if (mysqli_num_rows($resultado)== 1) { // se confere, 
                $dados = mysqli_fetch_array($resultado);
                mysqli_close($conexao);
                $_SESSION['logado'] = true;
                $_SESSION['id-usuario'] = $dados['id_usuario'];
                header('Location: home.php');
            }
            else { // se não confere
                $erros[] = "seu email e sua senha não conferem aqui! confira aí ;) </li>";
            }
        }
        else { //se não
            $erros[] = "hum.. Este usuário não existe ainda. que tal cadastró-lo? </li>";
        }
    }
}

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
    <title> Login </title>
</head>

<body>
<div class='nome'>
        <h1 id = "red">i</h1> <h1 id = "green">f</h1> <h1 class = "titulo">leitura</h1> <br>
        <ul>
        <!-- aqui o user só pode entrar logado-->
        <li> <a href="home.php"> livros </a> </li>
        <li > <a href="cadastro.php"> cadastro </a> </li>
        <li> <a href="login.php"> login </a> </li>
        <li> <a href="logout.php"> sair </a> </li>
        </ul>
    </div>

	<div class="login">
		<form method="POST" action="">
			<h2> Já é cadastrado? Faça seu login: </h2> <br>
			<input  type="email" name="email" placeholder='E-mail' class='inputs'/> <br> <br>
            <input  type="password" name="senha" placeholder='Senha' class='inputs'/> <br> <br>
			
            <button type="submit" name="butao" class="submit"> Entrar </button> <br> <br>
			
            <p> Ou <a href ="cadastro.php"> cadastre-se.</a></p>
                        
            <?php
                if (!empty($erros)) {
                    foreach($erros as $erro){
                        echo $erro;
                    }
                }
            ?>
		</form>
	</div> 
</br>
</body>