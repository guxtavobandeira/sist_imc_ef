<?php
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../index/index.css">
    <title>Registrar</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="background-verde">
        <header>
            <div class="container">
                <nav>
                    <div class="logo">EEEPstudio <i class='bx bxl-slack'></i></div>
                    <ul class="ul">
                        <li><a href="../inicio/inicio.html"><i class='bx bxs-home'></i></a></li>
                    </ul>
                    <div class="menu-icon">
                        <img src="/imagens/menu.png" alt="menu-icon">
                    </div>
                </nav>
            </div>
        </header>  
    </div>
    <hr class="line">
    <main class="main-protect">
    <div class="error-container">
        <div class="img-container">
            <img src="https://img.freepik.com/vetores-gratis/mao-desenhada-sem-ilustracao-de-dados_23-2150584268.jpg?t=st=1717441161~exp=1717444761~hmac=b749ee754f426825d68eed5dd5a47488cea4d3d8a6619ebabf97ef08fc5b62ca&w=826" alt="img-error">
        </div>
        <div class="error-text">
            <h1>ERROR!</h1>
        </div>
    </div>
    <div class="message-container">
        <?php
        if(!isset($_SESSION)){
            session_start();
        }

        if(!isset($_SESSION['id'])){
            echo "<p>Você não pode acessar esta página porque não está logado.</p>";
            echo "<a href=\"../index/index.php\" class=\"btn-gradient\">Entrar</a>";
            die();
        }
        ?>
    </div>
</main>

    <script src="menu.js"></script>        
</body>
</html>



