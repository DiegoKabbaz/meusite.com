<?php

    include_once("../config.inc.php");

    $codigo = $_REQUEST['codigo'];

    $sql = "SELECT * FROM produtos WHERE codigo = $codigo";

    $query = mysqli_query($conexao, $sql);

    $dados = mysqli_fetch_array($query);

?>

<h3> Cadastro de Produto</h3>
<form action="?pg=altera_produto&codigo=<?= $dados['codigo']; ?>" method="post"  enctype="multipart/form-data">
    <label>Nome:</label>
    <input type="text" name="nome" value="<?= $dados['nome']; ?>" required><br>
    Categoria: <input type="text" name="categoria" value="<?= $dados['categoria']; ?>"><br>
    Marca: <input type="text" name="marca" value="<?= $dados['marca']; ?>"><br>
    Preço: <input type="text" name="preco" value="<?= $dados['preco']; ?>" required><br>

    Imagem Atual: 
    <?php if (!empty($dados['imagem'])): ?>
        <img src="../admin/arquivos/<?= $dados['imagem']; ?>" width="100"><br>
    <?php endif; ?>
    Nova Imagem: <input type="file" name="imagem" id="imagem" accept="image/*"><br>


    <input type="submit" value="Enviar">
</form>