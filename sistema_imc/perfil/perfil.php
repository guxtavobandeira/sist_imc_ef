<?php 
include('../conexao.php');

session_start(); // Start the session at the beginning of your script
include('../protect.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['nome'])) {
    // Se não estiver logado, redireciona para a página de login
    header("Location: login.php");
    exit; // Encerra o script
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="perfil.css">
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
                        <li> <a href="/painel/painel.html"> <i class='bx bxs-home'></i> </a> </li>
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
                <i class='bx bx-user' id="user2"></i>
            </div>
            <div class="text-user">
                <h2 style="color: black;"><?php
                echo $_SESSION['nome'];
                ?></h2>
                <h3 style="color: black;"><?php
                echo "ID: " . $_SESSION['id'];
                ?></h3>
            </div>
        </div>
        <!-- Fim caixa perfil -->
        <!-- line -->
        <hr class="line-menu">
        <!-- end line -->
        <!-- botões list -->
        <div class="buttons">
            <button><a href="../perfil/perfil/perfil.php"><i class='bx bx-user'></i> Perfil</a></button>
            <button><a href="../adicionar/add/add.php"><i class='bx bx-plus'></i> Adicionar Dados</a></button>
            <button><a href="../graficos/grafico.php"><i class='bx bx-chart'></i> Gráficos</a></button>
            <button><a href="../tabelas/tabelas.php"><i class='bx bx-table'></i> Tabelas</a></button>
            <button><a href="../logout.php"><span><i class='bx bx-log-out'></i>Sair</span></a></button>
        </div>
        <!-- end botões lst -->
    </section>
    <!-- Fim menu container -->

    <!-- main -->
    <section class="main-container">
        <!-- caixa perfil -->
        <div class="box-profile2">
            <div class="profile-img2">
                <i class='bx bx-user' id="user"></i>
            </div>
            <div class="text-user2">
                <h2><?php
                echo $_SESSION['nome'];
                ?></h2>
                <h4><?php
                echo $_SESSION['id'];
                ?></h4>
            </div>
        </div>
        <div class="upload-button">
            <label for="upload-input" class="upload-label"><button type="button">Adicionar imagem</button></label>
            <input type="file" id="upload-input" accept="image/*" style="display: none;">
            <i class='bx bx-upload' id="up"></i>
        </div>        
        <!-- Fim caixa perfil -->
        <!-- line -->
        <hr class="line-menu">
        <!-- end line -->
        <!-- Dados -->
        <form action="#">
            <div class="form-first">
                <div class="dados">
                    <span class="title">Dados Pessoais</span>

                    <div class="fields">
                        <div class="input-field">
                            <label for="nomeCompleto">Nome completo</label>
                            <div class="input-container">
                                <input type="text" id="nomeCompleto" placeholder="Admin da Silva" disabled>
                                <button class="edit-btn"><i class='bx bx-edit'></i></button>
                            </div>
                        </div>
                        <div class="input-field">
                            <label for="email">Email</label>
                            <div class="input-container">
                                <input type="email" id="email" placeholder="AdminEEEP@gmail.com" disabled>
                                <button class="edit-btn"><i class='bx bx-edit'></i></button>
                            </div>
                        </div>
                        <div class="input-field">
                            <label for="senha">Senha</label>
                            <div class="input-container">
                                <input type="password" id="senha" placeholder="admin123" disabled>
                                <button class="edit-btn"><i class='bx bx-edit'></i></button>
                            </div>
                        </div>
                        <div class="input-field">
                            <label for="text">Gênero</label>
                            <select name="genero">
                                <option value="#" disabled selected >Selecione uma opção</option>
                                <option value="masculino">Masculino</option>
                                <option value="feminino">Feminino</option>
                                <option value="outro">outro</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label for="text">Número Telefone</label>
                            <input type="text" placeholder="(88) 9 9999-999">
                        </div>
                        <div class="input-field">
                            <label for="text">Data de nascimento</label>
                            <input type="date">
                        </div>
                        <!-- button -->
                        <button type="submit">Salvar</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- end dados -->
    </section>
    <!-- end main -->

    <script src="perfil.js"></script>

</body>
</html>
