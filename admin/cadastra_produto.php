<?php
include_once("../config.inc.php");

$nome = $_REQUEST['nome'];
$categoria = $_REQUEST['categoria'];
$marca = $_REQUEST['marca'];
$preco = $_REQUEST['preco'];
$imagem = null;

if (isset($_FILES['imagem'])) {
    $imagem = $_FILES['imagem'];

    if ($imagem['error']) {
        die("Falha ao enviar imagem");
    }

    if ($imagem['size'] > 2097152) {
        die("Imagem muito grande!! Max: 2MB");
    }

    $pasta = "C:/xampp/htdocs/MeuSite.com/admin/arquivos/";

    if (!is_dir($pasta)) {
        mkdir($pasta, 0777, true);
    }

    $extensao = strtolower(pathinfo($imagem['name'], PATHINFO_EXTENSION));
    $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($extensao, $extensoesPermitidas)) {
        die("Extensão de imagem não permitida. Apenas JPG, PNG, JPEG e GIF são aceitas.");
    }

    $novonomeArquivo = uniqid() . "." . $extensao;

    $deu_certo = move_uploaded_file($imagem["tmp_name"], $pasta . $novonomeArquivo);

    if ($deu_certo) {
        echo "<p>Imagem enviada com sucesso!</p>";
    } else {
        die("Falha ao mover a imagem para a pasta de upload");
    }
}

$sql = "INSERT INTO produtos (nome, categoria, marca, preco, imagem) 
        VALUES ('$nome', '$categoria', '$marca', '$preco', '$novonomeArquivo')";

$query = mysqli_query($conexao, $sql);

if ($query) {
    echo "<h2>Produto cadastrado com sucesso.</h2>";
} else {
    echo "<h2>Não foi possível cadastrar o produto.</h2>";
    echo "Erro: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>
