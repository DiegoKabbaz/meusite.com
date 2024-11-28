<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: form_login.php");
    exit();
}
?>

    <h1>Painel Admin</h1>
    <a href="logout.php">Logout</a>

    <hr>
    <a href="?pg=lista_msg">Lista de Mensagens</a>
    <hr>
    <a href="?pg=lista_produtos">Produtos</a>
    <hr>

<?php

if(empty($_SERVER["QUERY_STRING"])){
    $var = "conteudo.php";
    echo "<h2>Página inicial</h2>";
  
}else{
    $pg = $_GET['pg'];
    include_once("$pg.php");
}
    ?>
</body>
</html>