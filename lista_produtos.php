<?php
include_once("config.inc.php");

$sql = "SELECT codigo, nome, categoria, marca, preco, imagem FROM produtos LIMIT 3";
$query = mysqli_query($conexao, $sql);

if (!$query) {
    echo "<h2>Erro na consulta ao banco de dados:</h2>";
    echo "Erro: " . mysqli_error($conexao); 
    mysqli_close($conexao);
    exit; 
}

echo "<h1>Veja abaixo alguns de nossos produtos:</h1>";



?>
<style>
    .produto-galeria {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }
    .produto-item {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        max-width: 300px;
        text-align: center;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }
    .produto-item img {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
    }
    .produto-item h3 {
        margin: 10px 0 5px;
    }
    .produto-item p {
        margin: 5px 0;
    }
</style>

<section class="produto-galeria">
<?php

if (mysqli_num_rows($query) > 0) {
    while ($produto = mysqli_fetch_assoc($query)) {
        echo "<div class='produto-item'>";
        if (!empty($produto['imagem'])) {
            echo "<img src='admin/arquivos/$produto[imagem]'}' alt='{$produto['nome']}'>";
            
        } else {
            echo "<img src='img/produto-padrao.png' alt='Imagem não disponível'>"; 
        }
        echo "<h3>{$produto['nome']}</h3>";
        echo "<p>Categoria: {$produto['categoria']}</p>";
        echo "<p>Marca: {$produto['marca']}</p>";
        echo "<p>Preço: R$ " . number_format($produto['preco'], 2, ',', '.') . "</p>";
        echo "</div>";
    }
} else {
    echo "<h2>Não há produtos cadastrados no sistema.</h2>";
}
?>
</section>

<?php
mysqli_close($conexao);
?>
