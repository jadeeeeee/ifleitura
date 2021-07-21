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
        $erros[] = "<li> Preencha os campos! </li>"; 
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
                $erros[] = "<li> Seu email e sua senha não conferem aqui! Confira aí ;) </li>";
            }
        }
        else { //se não
            $erros[] = "<li> Hum.. Este usuário não existe ainda. Que tal cadastró-lo? </li>";
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
    <link rel="shortcut icon" href="../imgs/livro3.png"/>
    <title> Login </title>
</head>

<body>
<div class='cabeçalho'>
        <h1 class="titulo"> IF LEITURA </h1>
        <ul>
        <!-- aqui o user só pode entrar logado-->
        <li> <a href="home.php"> LIVROS </a> </li>
        <li > <a href="cadastro.php"> CADASTRO </a> </li>
        <li> <a href="login.php"> LOGIN </a> </li>
        <li> <a href="logout.php">SAIR</a> </li>
        </ul>
    </div>

	<div class="login">
		<form method="POST" action="">
			<h2> Já é cadastrado? Faça seu login: </h2> 
			<input  type="email" name="email" placeholder='E-mail' class='inputs'/> <br> <br>
            <input  type="password" name="senha" placeholder='Senha' class='inputs'/> <br> <br>
			
            <button type="submit" name="butao" class="submit"> Entrar </button>
			
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