<?php

    include_once("config.inc.php");

    $nome = $_REQUEST['nome'];
    $email = $_REQUEST['email'];
    $mensagem = $_REQUEST['mensagem'];

    $sql = "INSERT INTO contatos
    (nome, email, mensagem)

    VALUES
    ('$nome','$email','$mensagem')";

    $query = mysqli_query($conexao,$sql);

if($query){
    echo "<h2> Mensagem enviada com sucesso. </h2>";
}else{
    echo "<h2> Não foi possível enviar mensagem. </h2>";
}

mysqli_close($conexao);