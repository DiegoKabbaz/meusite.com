<?php

include_once "../config.inc.php";

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$senha'";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    $dados = mysqli_fetch_array($resultado);
    if ($senha == $dados['senha']){
    session_start();
    $_SESSION['user_id'] = $dados['id'];
    $_SESSION['usuario'] = $dados['usuario'];

    header("Location: index.php");
    exit();
} }else {
    echo "Nome de usuário ou senha incorretos.";
    echo '<br><a href="form_login.php">Tentar novamente</a>';
}

mysqli_close($conexao);
