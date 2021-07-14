<?php
session_start();
include('conexao.php');

if(empty($_POST['email']) || empty($_POST['senha'])){  
    header('Location: ../front/loginF.php');
    exit();
}

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select email from usuario where email = '{$email}' and senha = '{$senha}'";
//md5?

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);


if ($row == 1){
    $_SESSION['email'] = $email;
    header('Location: ../front/home.php');
    exit();
}
else {
    $_SESSION['errado'] = true;
    header('Location: ../front/loginF.php');
    exit();
}

// verificação
if(!$_SESSION['email']){
	header('Location: ../front/index.php');
}

// logout
session_destroy();
header('Location: ../front/index.php');
exit();
?>