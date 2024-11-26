<?php

include_once("../config.inc.php");

$codigo = $_REQUEST['codigo'];


$sqlImagem = "SELECT imagem FROM produtos WHERE codigo = $codigo";
$result = mysqli_query($conexao, $sqlImagem);

if ($result) {
    $produto = mysqli_fetch_assoc($result);

    if (!empty($produto['imagem'])) {
        $caminhoImagem = "C:/xampp/htdocs/aula_php/MeuSite.com/admin/arquivos/" . $produto['imagem'];

        if (file_exists($caminhoImagem)) {
            if (unlink($caminhoImagem)) {
                echo "Imagem do produto excluída com sucesso.<br>";
            } else {
                echo "Erro ao excluir a imagem do produto.<br>";
            }
        } else {
            echo "A imagem do produto não foi encontrada.<br>";
        }
    }
} else {
    echo "Erro ao buscar imagem: " . mysqli_error($conexao) . "<br>";
}

$sql = "DELETE FROM produtos WHERE codigo = $codigo";
$query = mysqli_query($conexao, $sql);

if ($query) {
    echo "<h2>Produto excluído com sucesso.</h2>";
} else {
    echo "<h2>Não foi possível apagar o produto.</h2>";
    echo "Erro: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>
