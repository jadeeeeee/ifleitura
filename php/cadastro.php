<?php
session_start();
include('conexao.php');

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$idade = mysqli_real_escape_string($conexao, $_POST['idade']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']); /* tem q criptografar a senha */

$query = "select count(*) as total from usuario where email = '$email'";
$resultado = mysqli_query($conexao, $query);
$row = mysqli_fetch_assoc($resultado);

if ($row['total'] == 1) {
    $_SESSION['usuario-existe'] = true;
    header('Location: ../front/cadastroF.php');
    exit;
}

$sql = "insert into usuario (nome, idade, email, senha, data) values ('$nome', '$idade', '$email', '$senha', NOW())";

if ($conexao->query($sql) === TRUE){
    $_SESSION['status_cadastro'] = true;
}

$conexao->close();

?>
