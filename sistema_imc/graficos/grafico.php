<?php
include('../protect.php');
include('../protect.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="graficos.css">
    <title>Gráficos</title>

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
            <button><a href="../perfil/perfil.php"><i class='bx bx-user'></i> Perfil</a></button>
            <button><a href="../adicionar/add.php"><i class='bx bx-plus'></i> Adicionar Dados</a></button>
            <button><a href="../graficos/grafico.php"><i class='bx bx-chart'></i> Gráficos</a></button>
            <button><a href="../tabelas/tabelas.php"><i class='bx bx-table'></i> Tabelas</a></button>
            <button><a href="#"><i class='bx bx-cog'></i> Configurações</a></button>
            <button><a href="../logout.php"><span><i class='bx bx-log-out'></i>Sair</span></a></button>
        </div>
        <!-- end botões lst -->
    </section>
    <!-- Fim menu container -->

    <!-- main -->
<section class="main-container">
    <div class="conteudo">
        <!-- Titulo de introdução da aba -->
        <div class="title">
            <h1>Gráficos</h1>
            <!-- line main -->
            <hr class="line-main">
            <!-- Seleção de gráficos -->
            <p>Selecione uma das opções abaixo para visualizar os dados dos alunos cadastrados 
                de maneira dinâmica e prática.</p>
        </div>
    
        <!-- Cards de gráficos -->
        <div class="card-container">
            <!-- Card Gráfico de Linhas -->
            <!-- Card 1 -->
            <div class="card">
                <div class="card-header">
                    <img src="graph-colum.webp" alt="Gráfico de Linhas">
                </div>
                <div class="card-content">
                    <h2>Gráfico <br> Alunos x Curso</h2>
                    <p>Visualize os dados dos alunos por curso ao longo do tempo.</p>
                    <a href="../graficos/grafico_alunos/grafico_alunosporcurso.php">Ver Gráfico</a>
                </div>
            </div>
            <div class="card">
                <!-- Card 2 -->
                <div class="card-header">
                    <img src="graph-colum2.webp" alt="Gráfico de Linhas">
                </div>
                <div class="card-content">
                    <h2>Gráfico <br> Média de alturas</h2>
                    <p>Veja a média das alturas dos alunos cadastrados.</p>
                    <a href="../graficos/grafico_altura/grafico_x_altura.php">Ver Gráfico</a>
                </div>
            </div>
            <div class="card">
                <!-- Card 3 -->
                <div class="card-header">
                    <img src="graph-lines.webp" alt="Gráfico de Linhas">
                </div>
                <div class="card-content">
                    <h2>Gráfico <br> Média dos Pesos</h2>
                    <p>Veja a média das pesos dos alunos cadastrados.</p>
                    <a href="../graficos/grafico_peso/grafico_x_peso.php">Ver Gráfico</a>
                </div>
            </div>
            <div class="card">
                <!-- Card 4 -->
                <div class="card-header">
                    <img src="graph-bar2.jpg" alt="Gráfico de Linhas">
                </div>
                <div class="card-content">
                    <h2>Gráfico <br> % dos Resultados</h2>
                    <p>Veja a média de resultados dos alunos cadastrados.</p>
                    <a href="../graficos/grafico_resultado/grafico_resultado_imc_iac.php">Ver Gráfico</a>
                </div>
            </div>
            <!-- Card Gráfico de Barras -->
        </div>
        <!-- End Cards de gráficos -->
    </section>
    <!-- end main -->

    <script src="graficos.js"></script>