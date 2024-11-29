<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container1{
            width: 100%; /* Ajuste o tamanho horizontal (com margens incluídas) */
            height: 380px; /* Metade da altura da página */
            background-color: #333;
            display: flex;
            align-items: center;
        }
        .container2{
            width: 100%; /* Ajuste o tamanho horizontal (com margens incluídas) */
            height: 380px; /* Metade da altura da página */
            background-color: #333;
            display: flex;
            align-items: center;
            margin: 25px 0;
        }
        .container2 img{
            width: 450px;
            height: 250px;
        }
        .container3{
            width: 100%; /* Ajuste o tamanho horizontal (com margens incluídas) */
            height: 280px; /* Metade da altura da página */
            background-color: #333;
            flex-direction: column;
            margin: 25px 0;
            color: white;
        }
        .container3 p{
            font-size: 20px;
            padding: 30px 0;
            text-align: center;
        }
        .listas{
            gap: 50px;
            line-height: 25px;
            display: flex;
            justify-content: center;
            width: 100%;
            font-size: 18px;
        }
        div img{
         width: 50%;
         height: 80%;
         padding: 25px;   
        }

        h1{
            text-align: center;
            margin: 50px 0;
            font-family: sans-serif;
        }
        button{
            width: 250px;
            height: auto;
            padding: 15px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            background-color: #333;
        }
        button:hover{
            background-color: #444;
            color: black;
        }
        .centraliza-button{
            align-items: center;
            justify-content: center;
            display: flex;
        }
    </style>
</head>
<body>
    <h1>FORNECENDO SOLUÇÕES DE SAÚDE PARA SALVAR VIDAS</h1>
    <div class="container1">
        <img src="img/img8.jpg" alt="">
        <img src="img/img9.jpg" alt="">
    </div>
    <p style="font-size: 22px;">Na <strong>Heart Medical</strong>, estamos comprometidos em oferecer uma ampla linha de produtos hospitalares para atender às suas necessidades. Confira nossas principais categorias:</p>
    <h2>Equipamentos Médicos</h2>
    <ul>
        <li><strong>Aparelhos hospitalares: </strong>Equipamentos de alta tecnologia que garantem eficiência no cuidado ao paciente.</li>
        <li><strong>Macas e móveis hospitalares: </strong>Projetados para proporcionar conforto e praticidade no ambiente clínico.</li>
        <li><strong>Monitores e dispositivos diagnósticos: </strong>Ferramentas precisas para acompanhar e avaliar a saúde dos pacientes.</li>
    </ul>
    <h2>Consumíveis Hospitalares</h2>
    <ul>
        <li><strong>Luvas descartáveis: </strong>Diversos modelos para assegurar higiene e segurança em cada procedimento.</li>
        <li><strong>Seringas e agulhas: </strong>Produtos confiáveis e de alta qualidade para uso médico.</li>
        <li><strong>Aventais descartáveis e EPI's: </strong>Proteção essencial para profissionais de saúde e pacientes.</li>
    </ul>
    
    
<?php
    include("lista_produtos.php");

?>


    <form action="?pg=produtos" method="POST" style="text-decoration: none;">
        <div class="centraliza-button"><button type="">COMPRE AGORA</button></div>
    </a>
    <div class="container3">
        <p>Escolher a Heart Medical é optar por um parceiro que entende suas necessidades e se compromete com a excelência. Conheça os motivos que nos tornam únicos:</p>
        <div class="listas">
            <ul>
                <li>Qualidade garantida</li>
                <li>Atendimento personalizado</li>
                <li>Entrega rápida</li>
                <li>Experiência no mercado</li>
            </ul>
            <ul>
                <li>Parcerias estratégicas</li>
                <li>Variedade de produtos</li>
                <li>Preços competitivos</li>
                <li>Compromisso com a sustentabilidade</li>
            </ul>
        </div>
    </div>
    <p style="color: white;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid fuga, ex eum dolores itaque fugiat. Dolor dolorum sit debitis voluptatum fugiat dolorem ad ipsa laborum voluptatem commodi, placeat quasi tempora!</p>
</body>
</html>
