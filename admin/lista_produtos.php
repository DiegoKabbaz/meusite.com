<h2> Listagem de produtos</h2>
<hr>
<h3><a href="?pg=form_produto">Cadastrar novo produto </a></h3>
<hr>
<?php

    include_once("../config.inc.php");

    $query = mysqli_query($conexao, "SELECT * FROM produtos");

    while($tabela = mysqli_fetch_array($query)){
        echo "Nome: $tabela[nome] <br>";
        echo "Categoria: $tabela[categoria] <br>";
        echo "Marca: $tabela[marca] <br>";
        echo "Preço: $tabela[preco] <br>";
        if (!empty($tabela['imagem'])) {
            echo "<img src='arquivos/$tabela[imagem]' width='100'><br>";
        }
    

        echo "<a href=?pg=excluir_produto&codigo=$tabela[codigo]>[x] Excluir produto</a><br>";
        echo "<a href=?pg=form_altera_produto&codigo=$tabela[codigo]>[v] Alterar produto</a><br>";
        echo "<hr>";
    }

    mysqli_close($conexao);
