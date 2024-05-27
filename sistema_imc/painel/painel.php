<?php
include('../conexao.php');
include('../protect.php');
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
                    <div class="logo">EEEPstudio <i class='bx bxl-slack'></i></div>
                    <!-- Lista de links de navegação -->
                    <ul class="ul">
                        <!-- Ícone de casa com link para a página inicial -->
                        <li> <a href="../inicio/inicio.html"> <i class='bx bxs-home'></i> </a> </li>
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
            <button><a href="../perfil/perfil.php"><i class='bx bx-user'></i> Perfil</a></button>
            <button><a href="../adicionar/add.php"><i class='bx bx-plus'></i> Adicionar Dados</a></button>
            <button><a href="../graficos/grafico.php"><i class='bx bx-chart'></i> Gráficos</a></button>
            <button><a href="../tabelas/tabelas.php"><i class='bx bx-table'></i> Tabelas</a></button>
            <button><a href="../logout.php"><span><i class='bx bx-log-out'></i>Sair</span></a></button>
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
                //header("Location: login.php");
                exit; // Encerra o script
                
}
                // Agora podemos exibir o nome do usuário
                echo "Bem-vindo ao painel, " . $_SESSION['nome'] . "!";
                ?>
            </h2>
            <hr class="line-main">
            <p>
                Painel Administrativo da EEEP Manoel Mano, um sistema integrado e intuitivo 
                criado para facilitar a gestão, organização e edição de dados corporais dos nossos alunos. 
                Este painel foi desenvolvido para fornecer aos administradores uma interface eficiente e amigável, 
                garantindo que todas as informações essenciais estejam sempre ao seu alcance.
            </p>
            <h3>Funcionalidades do Painel</h3>
            <ul class="intro-list">
                <li>
                    <h4>Perfil do ADM</h4>
                    <p>Acesse e edite suas informações pessoais, além de gerenciar suas credenciais de acesso com segurança.</p>
                </li>
                <li>
                    <h4>Adicionar Dados</h4>
                    <p>Insira novos dados corporais dos alunos de forma rápida e precisa. Este módulo foi projetado para agilizar o processo de coleta e armazenamento de informações, garantindo a integridade dos dados.</p>
                </li>
                <li>
                    <h4>Gráficos</h4>
                    <p>Visualize os dados dos alunos de maneira gráfica e dinâmica. Utilize nosso sistema de filtragem avançado para obter uma visualização personalizada e detalhada, facilitando a análise de tendências e padrões.</p>
                </li>
                <li>
                    <h4>Tabelas</h4>
                    <p>Consulte os dados dos alunos em tabelas organizadas e fáceis de interpretar. A função de filtragem permite buscar e localizar informações específicas com precisão, otimizando seu tempo e esforço.</p>
                </li>
            </ul>

            <p class="conclusion">
                Nosso objetivo é proporcionar um ambiente digital que suporte e fortaleça a gestão 
                escolar, permitindo um acompanhamento mais detalhado e eficiente dos dados corporais dos alunos. 
                Explore as funcionalidades do painel e descubra como podemos ajudá-lo a manter o controle e a 
                organização de todas as informações relevantes de forma simples e eficaz.
            </p>

            <p class="thanks">
                Agradecemos por utilizar nosso sistema e esperamos que ele atenda todas as suas 
                necessidades administrativas com excelência.
            </p>

        </div>
    </section>
    <!-- end main -->