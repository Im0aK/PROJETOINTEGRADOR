<?php
include('conectadb.php');
// Exibir erros para facilitar o debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download - Missão Espacial</title>
    <style>
        body {
            font-family: Arial, sans-serif; 
            background-color: #0a0e14; /* Fundo escuro */
            color: #ffffff; 
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            opacity: 0; 
            transition: opacity 1s ease; 
            position: relative; /* Adicionado para os elementos posicionados */
        }

        /* Estilos do container */
        .container {
            text-align: center; 
            background: rgba(0, 0, 0, 0.8); /* Fundo semi-transparente para contraste */
            padding: 40px; 
            border-radius: 10px; /* Bordas arredondadas */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5); /* Sombra suave */
            max-width: 500px; /* Largura máxima do container */
        }

        /* Estilos para a logo */
        .logo {
            max-width: 200px; /* Largura máxima da logo */
            margin-bottom: 20px; /* Espaçamento abaixo da logo */
            cursor: pointer; /* Cursor de ponteiro ao passar o mouse */
            transition: transform 0.3s ease; /* Transição suave para transformação */
        }

        /* Efeito de animação ao passar o mouse */
        .logo:hover {
            transform: scale(1.1) rotate(5deg); /* Aumenta o tamanho e rotaciona */
        }

        .download-message {
            margin-top: 30px; /* Espaçamento acima da seção de download */
        }

        .download-message h1 {
            color: #1e90ff; /* Cor do título */
        }

        .download-message p {
            margin: 10px 0; /* Margem entre os parágrafos */
            line-height: 1.5; /* Altura da linha */
        }

        .download-message .btn-download {
            display: inline-block; /* Faz o link se comportar como um botão */
            padding: 15px 30px; /* Espaçamento interno do botão */
            background: linear-gradient(90deg, #1e90ff, #00bfff); /* Gradiente de cor */
            color: white; /* Cor do texto do botão */
            text-decoration: none; /* Remove sublinhado do link */
            border-radius: 50px; /* Bordas arredondadas */
            font-size: 20px; /* Tamanho da fonte */
            font-weight: bold; /* Negrito */
            box-shadow: 0 4px 20px rgba(30, 144, 255, 0.5); /* Sombra do botão */
            transition: background 0.4s ease, transform 0.3s ease, box-shadow 0.3s ease; /* Transições para a cor de fundo e transformação */
            cursor: pointer; /* Cursor de ponteiro ao passar o mouse */
            transform: translateY(-10px); /* Eleva o botão inicialmente */
            opacity: 0; /* Inicialmente invisível */
        }

        .download-message .btn-download:hover {
            background: linear-gradient(90deg, #00bfff, #1e90ff); /* Gradiente invertido ao passar o mouse */
            transform: translateY(-5px); /* Eleva o botão ao passar o mouse */
            box-shadow: 0 8px 25px rgba(30, 144, 255, 0.6); /* Aumenta a sombra ao passar o mouse */
        }

        .download-message .btn-download:active {
            transform: translateY(2px); /* Efeito de pressionar o botão */
            box-shadow: 0 4px 15px rgba(30, 144, 255, 0.5); /* Reduz a sombra ao pressionar */
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.html">
            <img src="img/ArcadeRocket logo.png" alt="Logo ArcadeRocket" class="logo">
        </a>
        <div class="download-message">
            <h1>Parabéns!</h1>
            <p>Seu cadastro foi realizado com sucesso. Você está prestes a embarcar em uma incrível jornada espacial!</p>
            <p>Para começar sua aventura, clique no botão abaixo para fazer o download do seu kit de astronauta:</p>
            <a href="downloads/ProjetoArcadeFoguete (2).zip" class="btn-download" id="download-button">Download do Kit de Astronauta</a>
            </div>
    </div>

    <script>
        // Função para animar a entrada da página
        function fadeIn() {
            document.body.style.opacity = '1'; // Torna o corpo visível
        }

        // Função para animar o botão de download
        function animateButton() {
            const button = document.getElementById('download-button');
            button.style.opacity = '1'; // Torna o botão visível
            button.style.transition = 'opacity 0.5s ease';
            button.style.transform = 'translateY(0)'; // Reposiciona o botão
        }

        // Executa as animações ao carregar a página
        window.onload = function() {
            fadeIn(); // Animação do fundo
            setTimeout(animateButton, 500); // Animação do botão após meio segundo
        };
    </script>
</body>
</html>
