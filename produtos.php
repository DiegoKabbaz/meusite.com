<?php
include_once("config.inc.php");

$sql = "SELECT codigo, nome, categoria, marca, preco, imagem FROM produtos";
$query = mysqli_query($conexao, $sql);

if (!$query) {
    echo "<h2>Erro na consulta ao banco de dados:</h2>";
    echo "Erro: " . mysqli_error($conexao); 
    mysqli_close($conexao);
    exit; 
}

echo "<h1>Nossos Produtos</h1>";
echo "<p>Veja abaixo alguns de nossos produtos:</p>";
?>
<style>
    .produto-galeria {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        margin-bottom: 50px; 
        padding: 20px; 
    
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
    .buy-button {
        display: inline-block;
        margin-top: 10px;
        padding: 10px 20px;
        background-color: #25D366;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
    }
    .buy-button:hover {
        background-color: #1da851;
    }
</style>

<section class="produto-galeria">
<?php
if (mysqli_num_rows($query) > 0) {
    while ($produto = mysqli_fetch_assoc($query)) {
        $nomeProduto = urlencode($produto['nome']);
        $categoriaProduto = urlencode($produto['categoria']);
        $precoProduto = "R$ " . number_format($produto['preco'], 2, ',', '.');
        $whatsApp = "5583993941933"; 

        $mensagem = urlencode(
            "Olá! Tenho interesse no produto: {$produto['nome']}.\n" .
            "Categoria: {$produto['categoria']}.\n" .
            "Preço: {$precoProduto}."
        );

        echo "<div class='produto-item'>";
        if (!empty($produto['imagem'])) {
            echo "<img src='admin/arquivos/$produto[imagem]' alt='{$produto['nome']}'>";
        } else {
            echo "<img src='img/produto-padrao.png' alt='Imagem não disponível'>"; 
        }
        echo "<h3>{$produto['nome']}</h3>";
        echo "<p>Categoria: {$produto['categoria']}</p>";
        echo "<p>Marca: {$produto['marca']}</p>";
        echo "<p>Preço: {$precoProduto}</p>";
        echo "<a class='buy-button' href='https://wa.me/{$whatsApp}?text={$mensagem}' target='_blank'>Comprar pelo WhatsApp</a>";
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
