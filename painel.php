<?php
include('protect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="painel.css">
    <title>Painel</title>

    <!-- Adiciona os ícones da Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- NavBar -->
    <div class="background-verde">
        <!-- header -->
        <header>
            <!-- nav-container -->
            <div class="nav-container">
                <nav>
                    <!-- Logo da página -->
                    <div class="logo">EEEPstudio</div>
                    <!-- Lista de links de navegação -->
                    <ul class="ul">
                        <!-- Ícone de casa com link para a página inicial -->
                        <li> <a href="/inicio/inicio.html"> <i class='bx bxs-home'></i> </a> </li>
                    </ul>
                </nav>
                <!-- Fim do container -->
            </header>  
            <!-- Fim do background-verde -->      
        </div>
        <!-- Linha decorativa -->
        <hr class="line">
        <!-- Fim da linha -->

        <!-- Fim da NavBar -->

    <!-- Menu container -->    
    <section class="menu-container">
        <!-- caixa perfil -->
        <div class="box-profile">
            <div class="profile-img">
                <i class='bx bx-user'></i>
            </div>
            <div class="text-user">
                <h2>Admin da Silva</h2>
                <h3>ID: 023534</h3>
            </div>
        </div>
        <!-- Fim caixa perfil -->
        <!-- line -->
        <hr class="line-menu">
        <!-- end line -->
        <!-- botões list -->
        <div class="buttons">
            <button><a href="#"><i class='bx bx-user'></i> Perfil</a></button>
            <button><a href="add.php"><i class='bx bx-plus'></i> Adicionar Dados</a></button>
            <button><a href="#"><i class='bx bx-trash'></i> Deletar Dados</a></button>
            <button><a href="#"><i class='bx bx-edit'></i> Editar Dados</a></button>
            <button><a href="#"><i class='bx bx-chart'></i> Gráficos</a></button>
            <button><a href="#"><i class='bx bx-table'></i> Tabelas</a></button>
            <button><a href="#"><i class='bx bx-cog'></i> Configurações</a></button>
            <button><a href="/inicio/inicio.html"><span><i class='bx bx-log-out'></i>Sair</span></a></button>
        </div>
        <!-- end botões lst -->
    </section>
    <!-- Fim menu container -->

    <!-- main -->
    <section class="main-container">
        <div class="text-container">
            <h2>
                <?php 
                // Verifica se o usuário está logado
                if (!isset($_SESSION['nome'])) {
                // Se não estiver logado, redireciona para a página de login
                header("Location: login.php");
                exit; // Encerra o script
                
}
                // Agora podemos exibir o nome do usuário
                echo "Bem-vindo ao painel, " . $_SESSION['nome'] . "!";
                ?>
            </h2>
            <hr class="line-main">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Architecto minus ipsa quia dolore 
                dicta explicabo corrupti eius distinctio quibusdam fuga omnis obcaecati et rerum, est officia 
                ex repellendus quisquam nisi. Sapiente in unde voluptatum quibusdam quasi provident vitae soluta 
                sit officia impedit deserunt distinctio facere illo, corrupti, nesciunt voluptatem? Aperiam 
                perspiciatis nesciunt tempore repudiandae eligendi optio dolore, est esse ducimus.</p>

        </div>
    </section>
    <!-- end main -->
