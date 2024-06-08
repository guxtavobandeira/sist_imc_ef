<?php
include ('../conexao.php');

session_start(); // Start the session at the beginning of your script
// Captura a saída do buffer
ob_start();

// Inclui o arquivo protect.php
include ('../protect.php');

// Limpa o buffer, ignorando a saída
ob_clean();

// Exibe o conteúdo capturado no buffer
ob_end_flush();

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
    <link rel="stylesheet" href="perfil.css">
    <title>Painel</title>

    <!-- Adiciona os ícones da Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery Mask Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

<body>
    <!-- NavBar -->
    <div class="background-verde">
        <!-- header -->
        <header>
            <!-- nav-container -->
            <div class="nav-container">
                <nav>
                    <!-- Ícone de menu -->
                    <div class="menu-icon">
                        <i class='bx bx-menu'></i>
                    </div>
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
            <button><a href="../logout.php"><span id="sair"><i class='bx bx-log-out'></i>Sair</span></a></button>
        </div>
        <!-- end botões lst -->
        <!-- Ícone de setinha para fechar o menu -->
        <div class="close-menu-icon"><i class='bx bx-left-arrow-alt'></i></div>
    </section>
    <!-- Fim menu container -->

    <!-- main -->
    <section class="main-container">
        <!-- caixa perfil -->
        <div class="box-profile2">
            <div class="profile-img2">
                <?php if ($caminho_imagem): ?>
                    <img src="<?php echo $caminho_imagem; ?>" alt="Imagem de Perfil" id="user">
                <?php else: ?>
                    <i class='bx bx-user' id="user"></i>
                <?php endif; ?>
            </div>
            <div class="text-user2">
                <h2><?php echo $_SESSION['nome']; ?></h2>
                <h4>ID: <?php echo $_SESSION['id']; ?></h4>
            </div>
        </div>
        <div class="upload-button">
            <form action="upload_image.php" method="post" enctype="multipart/form-data">
                <label for="upload-input" class="upload-label"><button type="button">Adicionar imagem</button></label>
                <input type="file" id="upload-input" name="imagem" accept="image/*" style="display: none;">
                <button type="submit">Upload</button>
            </form>
        </div>
        <!-- Fim caixa perfil -->
        <!-- line -->
        <hr class="line-menu">
        <!-- end line -->
        <!-- Dados -->
        <div class="form-first">
            <div class="dados">
                <form action="atualizar_dados.php" method="post">
                    <span class="title">Dados Pessoais</span>

                    <div class="fields">
                        <div class="input-field">
                            <label for="nomeCompleto">Nome completo</label>
                            <div class="input-container">
                                <input type="text" id="nomeCompleto" placeholder="<?php
                                echo $_SESSION['nome'];
                                ?>" disabled>
                                <button class="edit-btn"><i class='bx bx-edit'></i></button>
                            </div>
                        </div>
                        <div class="input-field">
                            <label for="email">Email</label>
                            <div class="input-container">
                                <input type="email" id="email" placeholder="<?php echo $_SESSION['email']; ?>" disabled>
                                <button class="edit-btn"><i class='bx bx-edit'></i></button>
                            </div>
                        </div>
                        <div class="input-field">
                            <label for="senha">Senha Criptografada</label>
                            <div class="input-container">
                                <input type="password" id="senha" placeholder="<?php echo $_SESSION['senha']; ?>"
                                    disabled>
                                <button class="edit-btn"><i class='bx bx-edit'></i></button>
                            </div>
                        </div>
                        <div class="input-field">
                            <label for="text">Gênero</label>
                            <select name="genero" id="genero">
                                <option value="#" disabled selected><?php echo $_SESSION['genero']; ?></option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                <option value="outro">outro</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label for="text">Número Telefone</label>
                            <input type="text" id="telefone" name="telefone" placeholder="<?php echo $_SESSION['telefone']; ?>">
                        </div>
                        <script>
                            $(document).ready(function () {
                                $('#telefone').mask('(00) 0 0000-0000');
                            });
                        </script>
                        <div class="input-field">
                            <label for="text">Data de nascimento</label>
                            <input id="data_nascimento" name="data_nascimento" type="date" placeholder="<?php echo $_SESSION['data_nascimento']; ?>">
                        </div>
                        <div class="input-field">Data de nascimento: <?php echo date('d-m-Y', strtotime($_SESSION['data_nascimento'])); ?></div>
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
    <script src="../painel/menu.js"></script>

</body>

</html>