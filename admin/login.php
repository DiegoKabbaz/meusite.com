<?php
include_once "../config.inc.php";


$usuario = $_POST['usuario'];
$senha = $_POST['senha'];


$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$senha'";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    $dados = mysqli_fetch_array($resultado);
    if ($senha == $dados['senha']) {
        session_start();
        $_SESSION['user_id'] = $dados['id'];
        $_SESSION['usuario'] = $dados['usuario'];

        header("Location: index.php");
        exit();
    }
} else {
    
    echo '
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Erro de Login</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .error-container {
                background: white;
                padding: 20px 30px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                text-align: center;
                max-width: 400px;
                width: 100%;
            }
            .error-container h1 {
                color: #e74c3c;
                font-size: 24px;
                margin-bottom: 20px;
            }
            .error-container p {
                font-size: 18px;
                color: #555;
                margin-bottom: 20px;
            }
            .error-container a {
                display: inline-block;
                text-decoration: none;
                background-color: #3498db;
                color: white;
                padding: 10px 20px;
                border-radius: 4px;
                transition: background-color 0.3s;
            }
            .error-container a:hover {
                background-color: #2980b9;
            }
        </style>
    </head>
    <body>
        <div class="error-container">
            <h1>Erro de Login</h1>
            <p>Nome de usuário ou senha incorretos.</p>
            <a href="form_login.php">Tentar novamente</a>
        </div>
    </body>
    </html>
    ';
}


mysqli_close($conexao);
?>
