<h2> Listagem de mensagens</h2>

<?php

    include_once("../config.inc.php");

    $query = mysqli_query($conexao, "SELECT * FROM contatos");

    while($tabela = mysqli_fetch_array($query)){
        echo "Nome: $tabela[nome] <br>"; 
        echo "e-mail: $tabela[email] <br>";
        echo "mensagem: $tabela[mensagem] <br>";
        echo "<a href=?pg=excluir_menssagem&id=$tabela[id]>[x] Excluir mensagem</a><br>";
        echo "<hr>";
    }

    mysqli_close($conexao);
