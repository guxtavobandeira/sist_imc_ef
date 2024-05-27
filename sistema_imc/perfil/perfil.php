<?php
include('../conexao.php');

session_start(); // Inicia a sessão
include('../protect.php');

// Verifica se o usuário está logado
if (isset($_SESSION['id']) && isset($_SESSION['nome'])) {

    // Recebe o ID do usuário da sessão
    $id_usuario = $_SESSION['id'];

    // Consulta SQL para obter o email e a senha do usuário com base no ID
    $query = "SELECT email, senha, telefone, genero, data_nascimento FROM usuarios WHERE id = ?";

    // Preparar a consulta
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        
        // Verifica se a consulta foi bem-sucedida
        if ($resultado && $resultado->num_rows > 0) {
            // Obtém os dados do usuário
            $linha = $resultado->fetch_assoc();
            $email = $linha['email'];
            $senha = $linha['senha'];
            $tel = $linha['telefone'];
            $genero = $linha['genero'];
            $data_n = $linha['data_nascimento'];
        } else {
            // Caso a consulta falhe, define valores padrão ou lida com o erro de outra forma
            $email = "Não foi possível obter o email";
            $senha = "Não foi possível obter a senha";
        }
        $stmt->close();
    }

    // Verifica se os dados foram enviados pelo formulário
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtém os dados do formulário
        $tel = $_POST['telefone'];
        $genero = $_POST['genero_u'];
        $data_n = $_POST['data'];

        // Prevenir SQL Injection usando prepared statements para atualizar os dados do usuário
        $stmt = $mysqli->prepare("UPDATE usuarios SET telefone = ?, genero = ?, data_nascimento = ? WHERE id = ?");
        $stmt->bind_param("sssi", $tel, $genero, $data_n, $id_usuario);
        $stmt->execute();
        $stmt->close();

        // Atualiza os valores das variáveis
        $email = $linha['email'];
        $senha = $linha['senha'];
        $tel = $linha['telefone'];
        $genero = $linha['genero'];
        $data_n = $linha['data_nascimento'];
    }
}
// Fechar a conexão com o banco de dados
$mysqli->close();
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
            <button><a href="/painel/Perfil/perfil.html"><i class='bx bx-user'></i> Perfil</a></button>
            <button><a href="/painel/AdicionarDD/adicionar.html"><i class='bx bx-plus'></i> Adicionar Dados</a></button>
            <button><a href="#"><i class='bx bx-chart'></i> Gráficos</a></button>
            <button><a href="/painel/Tabelas/tabela-filter.html"><i class='bx bx-table'></i> Tabelas</a></button>
            <button><a href="#"><i class='bx bx-cog'></i> Configurações</a></button>
            <button><a href="/inicio/inicio.html"><span><i class='bx bx-log-out'></i>Sair</span></a></button>
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
                <h2>Admin da Silva</h2>
                <h4>ID: 023534</h4>
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

