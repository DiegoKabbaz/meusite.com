<?php

    include_once("../config.inc.php");

    $codigo = $_REQUEST['codigo'];
    $nome = $_REQUEST['nome'];
    $categoria = $_REQUEST['categoria'];
    $marca = $_REQUEST['marca'];
    $preco = $_REQUEST['preco'];
   

    $novaImagem = null;

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $imagem = $_FILES['imagem'];
    
        if ($imagem['size'] > 2097152) {
            die("Imagem muito grande! Tamanho máximo permitido é de 2MB.");
        }
    
        $pasta = "C:/xampp/htdocs/aula_php/MeuSite.com/admin/arquivos/";
        $extensao = strtolower(pathinfo($imagem['name'], PATHINFO_EXTENSION));
        $novoNomeArquivo = uniqid() . '.' . $extensao;
    
        if (!in_array($extensao, ['jpg', 'jpeg', 'png', 'gif'])) {
            die("Tipo de arquivo não permitido. Apenas JPG, PNG e GIF são aceitos.");
        }
    
        $deu_certo = move_uploaded_file($imagem["tmp_name"], $pasta . $novoNomeArquivo);
        if ($deu_certo) {
            $novaImagem = $novoNomeArquivo; 
           
            $result = mysqli_query($conexao, "SELECT imagem FROM produtos WHERE codigo = $codigo");
            $produto = mysqli_fetch_assoc($result);
            if (!empty($produto['imagem'])) {
                $imagemAntiga = $pasta . $produto['imagem'];
                if (file_exists($imagemAntiga)) {
                    unlink($imagemAntiga);
                }
            }






        } else {
            die("Erro ao enviar a imagem.");
        }
    }
    
    $sql = "UPDATE produtos SET
            nome = '$nome', 
            categoria = '$categoria', 
            marca = '$marca', 
            preco = '$preco'";
    
    if ($novaImagem) {
        $sql .= ", imagem = '$novaImagem'";
    }
    
    $sql .= " WHERE codigo = $codigo";
    
    $query = mysqli_query($conexao, $sql);
    


    
    if($query){
            echo "<h2> Produto alterado com sucesso.<qh2>";
        } else{
            echo "<h2> Não foi possível alterar o produto. </h2>";   
        }
    
        mysqli_close($conexao);