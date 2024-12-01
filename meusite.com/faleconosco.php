<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>

.container-form{
    justify-content: center;
    align-items: center;
    display: flex;
    background-color: #1C1C1C;
    padding: 25px;
    margin-bottom: 80px;
}
form{
    flex-direction: column;
    display: flex;
    width: 450px;
    height: 560px;
    background-color: #363636;
    border-radius: 15px;
}
form h1{
    text-align: center;
    font-size: 32px;
    color:  white;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}
form label{
    color:  white;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-weight: bold;
}
.itens-form{
    margin-bottom: 5px;
    flex-direction: column;
    display: flex;
    padding: 0 45px;
}
input {
    padding: 10px;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    height: 8px;
    margin-top: 5px;
    background-color: white;
    color: white;
}
button {
    width: 360px;
    padding: 10px;
    border: none;
    border-radius: 4px;
    background-color:  #0753a5;
    color: white;
    font-size: 16px;
    cursor: pointer;
    margin: 15px 45px 0 45px;
}
    </style>
</head>
<body>    
    <div class="container-form">
            <form action="?pg=envia_msg" method="POST">
                <h1>Heart Medical</h1>
                <div class="itens-form">
                    <label for="nome">Nome:</label><br>
                    <input type="text" id="nome" name="nome" required><br>
                </div>
                <div class="itens-form">
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" required><br>
                </div>
                <div class="itens-form">
                    <label for="mensagem">Mensagem:</label><br>
                    <textarea id="mensagem" name="mensagem" required></textarea><br>
                </div>
                <button type="submit" value="Enviar">Enviar</button><br>
            </form>
    </div>
</body>
</html>