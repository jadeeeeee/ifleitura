<?php
session_start();
include('conexao.php');

if (isset($_POST['enviou'])){ // botão, existe?
	$erros1 = array();
	$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
	$idade = mysqli_real_escape_string($conexao, $_POST['idade']);
	$email = mysqli_real_escape_string($conexao, $_POST['email']);
	$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
	$senha2 = mysqli_real_escape_string($conexao, $_POST['confirm']);

	if(empty($_POST['nome']) || empty($_POST['email'])){ 
        $erros1[] = "<li> Preencha os campos! </li>"; 
	}
	else{
		// confirmação e verificação da senha
		if ($senha != $senha2) { //campos errados
			$erros1[] = "Campos não conferem"; 
		}
		else{ // campos ok - verifica o tamanho
			$tamanho = strlen($senha);
			if ($tamanho >= 6){
				$senha = md5($senha);
				unset($senha2);
				
				$query = "SELECT COUNT(*) AS total FROM usuario WHERE email = '$email'";
				$resultado = mysqli_query($conexao, $query);
				$row = mysqli_fetch_assoc($resultado);

				if ($row['total'] == 1) {
					$_SESSION['usuario-existe'] = true;
					$erros1[] = "ei, você já está cadastrado(a)!";
				}
				else{
					$sql1 = "INSERT INTO usuario (nome, idade, email, senha, data) VALUES ('$nome', '$idade', '$email', '$senha', NOW())";
					$sql2 = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
					if ($conexao->query($sql1) === TRUE){
						//tentando resolver o problema da nome que não aparece depois que cadastra
						$result = mysqli_query($conexao, $sql2);
						$dados = mysqli_fetch_array($result);

						$_SESSION['logado'] = true;
						$_SESSION['id-usuario'] = $dados['id_usuario'];

						header('Location: home.php');
					}
				
					$conexao->close();
				}
			}
			else{
				$erros1[] = "põe uma senha maior!! no mínimo 6 caracteres :)";
			}			

		}
	}
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/css.css'>
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="../imgs/livro3.png"/>
	<title> CADASTRO </title>
</head>

<body>
	<div class='nome'>
	<h1 id = "red">i</h1> <h1 id = "green">f</h1> <h1 class = "titulo">leitura</h1> <br>
    	<ul>
    		<li> <a href="home.php"> livros </a> </li>
    		<li > <a href="cadastro.php"> cadastro </a> </li>
    		<li> <a href="login.php"> login </a> </li>
    		<li> <a href="logout.php"> sair </a> </li>
    	</ul>
	</div>

	<div class='form'>
		<form method="POST" action="">            
			<h2> seja bem vindo(a)! faça seu cadastro: </h2>
			<!-- value='-->
			<input  type="text" name='nome' class='inputs' value="<?php if(isset( $_POST['nome'])){echo $_POST['nome'];}?>" placeholder='Seu nome'/> <br> <br>
			<input type="number" name="idade" class='inputs' value="<?php if(isset( $_POST['nome'])){echo $_POST['nome'];}?>" placeholder='Sua idade'/> <br> <br>
			<input  type="email" name="email" class='inputs' value="<?php if(isset( $_POST['nome'])){echo $_POST['nome'];}?>" placeholder='Seu e-mail'/> <br> <br>
			<input  type="password" name="senha" class='inputs' placeholder='Sua senha'/> <br> <br>
			<input  type="password" name="confirm" class='inputs'placeholder='Confirme sua senha'/> <br> <br>
			<button type="submit" name="enviou" class="submit"> Entrar </button> <br> <br>
			<p> Já é cadastrado(a)? Faça <a href ="login.php">login.</a> </p>
		</form>
		<?php
            if (!empty($erros1)) {
                foreach($erros1 as $erro){
                    echo $erro;
                }
            }
        ?>
</div>
</body>
</html>