<?php
include('../conexao.php');

session_start(); // Inicia a sessão
include('../protect.php');


// Verifica se o usuário está logado
if (isset($_SESSION['id']) && isset($_SESSION['nome'])) {

    // Recebe o ID do usuário da sessão
    $id_usuario = $_SESSION['id'];

    // Consulta SQL para obter o email do usuário com base no ID
    $query = "SELECT email FROM usuarios WHERE id = $id_usuario";

    // Consulta SQL para obter a senha do usuário com base no ID
    $query_s = "SELECT senha FROM usuarios WHERE id = $id_usuario";

    // Executa a consulta para o email
    $resultado_email = $mysqli->query($query);
    // Executa a consulta para a senha
    $resultado_senha = $mysqli->query($query_s);

    // Verifica se a consulta do email foi bem-sucedida
    if ($resultado_email) {
        // Obtém o email do usuário
        $linha_email = $resultado_email->fetch_assoc();
        $email = $linha_email['email'];
    } else {
        // Caso a consulta do email falhe, define um valor padrão para $email ou lida com o erro de outra forma
        $email = "Não foi possível obter o email";
    }

    // Verifica se a consulta da senha foi bem-sucedida
    if ($resultado_senha) {
        // Obtém a senha do usuário
        $linha_senha = $resultado_senha->fetch_assoc();
        $senha = $linha_senha['senha'];
    } else {
        // Caso a consulta da senha falhe, define um valor padrão para $senha ou lida com o erro de outra forma
        $senha = "Não foi possível obter a senha";
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>

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
            <button><a href="/perfil/perfil.php"><i class='bx bx-user'></i> Perfil</a></button>
            <button><a href="../adicionar/add.php"><i class='bx bx-plus'></i> Adicionar Dados</a></button>
            <button><a href="../graficos/grafico.php"><i class='bx bx-chart'></i> Gráficos</a></button>
            <button><a href="../tabelas/tabela.php"><i class='bx bx-table'></i> Tabelas</a></button>
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
                <i class='bx bx-user'></i>
            </div>
            <div class="text-user2">
                <h2>
                <?php 
                echo $_SESSION['nome'];
                ?>
                </h2>
                <h4> id: <?php 
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
                                <input type="text" id="nomeCompleto" placeholder="<?php 
                echo $_SESSION['nome'];
                ?>" disabled>
                                <button class="edit-btn"><i class='bx bx-edit'></i></button>
                            </div>
                        </div>
                        <div class="input-field">
                            <label for="email">Email</label> 
                            <div class="input-container">
                                <input type="email" id="email" placeholder="<?php 
                echo $email;
                ?>" disabled>
                                <button class="edit-btn"><i class='bx bx-edit'></i></button>
                            </div>
                        </div>
                        <div class="input-field">
                            <label for="senha">Senha criptografada (proteção)</label>
                            <div class="input-container">
                                <input type="password" id="senha" placeholder="<?php 
                echo $senha;
                ?>" disabled>
                                <button class="edit-btn"><i class='bx bx-edit'></i></button>
                            </div>
                        </div>
                        <div class="input-field">
                            <label for="text">Gênero</label>
                            <select name="genero_u">
                                <option value="#" disabled selected >Selecione uma opção</option>
                                <option value="masculino">Masculino</option>
                                <option value="feminino">Feminino</option>
                                <option value="outro">outro</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label for="text" >Número Telefone</label>
                            <input type="text" name="num" placeholder="">
                        </div>
                        <div class="input-field">
                            <label for="text">Data de nascimento</label>
                            <input type="date" name="data">
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
    
    <script>
    // Inicialize o InputMask para adicionar a máscara ao campo de número de telefone
    var telefoneMask = IMask(document.getElementById('telefone'), {
      mask: '(00) 00000-0000' // Defina a máscara desejada para o número de telefone
    });
  </script>
    <script src="perfil.js"></script>

</body>
</html>
