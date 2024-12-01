<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: form_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        header img {
            max-width: 200px;
            height: auto;
        }
        nav {
            background-color: #444;
            padding: 10px;
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        nav a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        nav a:hover {
            background-color: #666;
        }
        main {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: white;
            margin-top: 20px;
        }   
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <img src="../img/logo1.jpg" alt="Logo do Painel Admin">
    </header>

    <nav>
        <a href="?pg=lista_msg">Lista de Mensagens</a>
        <a href="?pg=lista_produtos">Produtos</a>
        <a href="logout.php">Logout</a>
    </nav>

    <main>
        <?php
        if (empty($_SERVER["QUERY_STRING"])) {
            if (file_exists("conteudo.php")) {
                include_once("conteudo.php");
            } else {
                echo "<h2>PAINEL ADMIN</h2>";
            }
        } else {
            $pg = $_GET['pg'];
            if (file_exists("$pg.php")) {
                include_once("$pg.php");
            } else {
                echo "<h2>Página não encontrada</h2>";
            }
        }
        ?>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Painel Admin - Todos os direitos reservados</p>
    </footer>
</body>
</html>
