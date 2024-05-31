<?php
include('../conexao.php');
session_start(); // Start the session at the beginning of your script
include ('../protect.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['nome'])) {
    // Se não estiver logado, redireciona para a página de login
    header("Location: login.php");
    exit; // Encerra o script
}

// Busca o caminho da imagem e os dados do usuário no banco de dados
$id_usuario = $_SESSION['id'];
$sql = "SELECT caminho_imagem, email, senha, genero, telefone, data_nascimento FROM usuarios WHERE id = $id_usuario";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $caminho_imagem = $row['caminho_imagem'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['senha'] = $row['senha'];
    $_SESSION['genero'] = $row['genero'];
    $_SESSION['telefone'] = $row['telefone'];
    $_SESSION['data_nascimento'] = $row['data_nascimento'];
} else {
    $caminho_imagem = null;
}
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
                        <li> <a href="../painel/painel.php"> <i class='bx bxs-home'></i> </a> </li>
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
                <?php if ($caminho_imagem): ?>
                    <img src="<?php echo $caminho_imagem; ?>" alt="Imagem de Perfil" id="user2">
                <?php else: ?>
                    <i class='bx bx-user' id="user2"></i>
                <?php endif; ?>
            </div>
            <style>
                .profile-img,
                .profile-img2 {
                    position: relative;
                    width: 100px;
                    /* Ajuste o tamanho conforme necessário */
                    height: 100px;
                    /* Ajuste o tamanho conforme necessário */
                    border-radius: 50%;
                    overflow: hidden;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    background-color: #f0f0f0;
                    /* Cor de fundo opcional */
                }

                .profile-img img,
                .profile-img2 img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    display: block;
                }

                .profile-img i,
                .profile-img2 i {
                    font-size: 50px;
                    /* Ajuste conforme necessário */
                    color: #666;
                    /* Cor do ícone */
                }
            </style>
            <div class="text-user">
                <h2 style="color: white;"><?php echo $_SESSION['nome']; ?></h2>
                <h3 style="color: white;"><?php echo "ID: " . $_SESSION['id']; ?></h3>
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
                    <a href="../graficos/grafico_alunosporcurso.php">Ver Gráfico</a>
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
                    <a href="../graficos/grafico_x_altura.php">Ver Gráfico</a>
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
                    <a href="../graficos/grafico_x_peso.php">Ver Gráfico</a>
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
                    <a href="../graficos/grafico_resultado_imc_iac.php">Ver Gráfico</a>
                </div>
            </div>
            <!-- Card Gráfico de Barras -->
        </div>
        <!-- End Cards de gráficos -->
    </section>
    <!-- end main -->

    <script src="graficos.js"></script>