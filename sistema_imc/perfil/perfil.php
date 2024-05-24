<?php
include('../conexao.php');

session_start(); // Inicia a sessão
include('../protect.php');

// Verifica se o usuário está logado
if (isset($_SESSION['id']) && isset($_SESSION['nome'])) {

    // Recebe o ID do usuário da sessão
    $id_usuario = $_SESSION['id'];

    // Consulta SQL para obter o email e a senha do usuário com base no ID
    $query = "SELECT email, senha FROM usuarios WHERE id = ?";

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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>
</head>
<body>
    <!-- NavBar -->
    <div class="background-verde">
        <header>
            <div class="nav-container">
                <nav>
                    <div class="logo">EEEPstudio</div>
                    <ul class="ul">
                        <li> <a href="/painel/painel.html"> <i class='bx bxs-home'></i> </a> </li>
                    </ul>
                </nav>
            </div>
        </header>  
        <hr class="line">
    </div>

    <!-- Menu container -->    
    <section class="menu-container">
        <div class="box-profile">
            <div class="profile-img">
                <i class='bx bx-user'></i>
            </div>
            <div class="text-user">
                <h2><?php echo htmlspecialchars($_SESSION['nome']); ?></h2>
                <h3><?php echo htmlspecialchars($_SESSION['id']); ?></h3>
            </div>
        </div>
        <hr class="line-menu">
        <div class="buttons">
            <button><a href="/perfil/perfil.php"><i class='bx bx-user'></i> Perfil</a></button>
            <button><a href="../adicionar/add.php"><i class='bx bx-plus'></i> Adicionar Dados</a></button>
            <button><a href="../graficos/grafico.php"><i class='bx bx-chart'></i> Gráficos</a></button>
            <button><a href="../tabelas/tabela.php"><i class='bx bx-table'></i> Tabelas</a></button>
            <button><a href="../logout.php"><span><i class='bx bx-log-out'></i>Sair</span></a></button>
        </div>
    </section>

    <!-- Main -->
    <section class="main-container">
        <div class="box-profile2">
            <div class="profile-img2">
                <i class='bx bx-user'></i>
            </div>
            <div class="text-user2">
                <h2><?php echo htmlspecialchars($_SESSION['nome']); ?></h2>
                <h4> id: <?php echo htmlspecialchars($_SESSION['id']); ?></h4>
            </div>
        </div>
        <div class="upload-button">
            <label for="upload-input" class="upload-label"><button type="button">Adicionar imagem</button></label>
            <input type="file" id="upload-input" accept="image/*" style="display: none;">
            <i class='bx bx-upload' id="up"></i>
        </div>        
        <hr class="line-menu">

        <!-- Dados -->
        <form method="POST" action="">
            <div class="form-first">
                <div class="dados">
                    <span class="title">Dados Pessoais</span>

                    <div class="fields">
                        <div class="input-field">
                            <label for="nomeCompleto">Nome completo</label>
                            <div class="input-container">
                                <input type="text" id="nomeCompleto" value="<?php echo htmlspecialchars($_SESSION['nome']); ?>" disabled>
                                <button class="edit-btn"><i class='bx bx-edit'></i></button>
                            </div>
                        </div>
                        <div class="input-field">
                            <label for="email">Email</label> 
                            <div class="input-container">
                                <input type="email" id="email" value="<?php echo htmlspecialchars($email); ?>" disabled>
                                <button class="edit-btn"><i class='bx bx-edit'></i></button>
                            </div>
                        </div>
                        <div class="input-field">
                            <label for="senha">Senha criptografada (proteção)</label>
                            <div class="input-container">
                                <input type="password" id="senha" value="<?php echo htmlspecialchars($senha); ?>" disabled>
                                <button class="edit-btn"><i class='bx bx-edit'></i></button>
                            </div>
                        </div>
                        <div class="input-field">
                            <label for="genero_u">Gênero</label>
                            <select id="genero_u" name="genero_u">
                                <option value="#" disabled selected >Selecione uma opção</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                <option value="outro">Outro</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label for="telefone">Número Telefone</label>
                            <input type="text" name="telefone" id="telefone" placeholder="">
                        </div>
                        <div class="input-field">
                            <label for="data">Data de nascimento</label>
                            <input type="date" id="data" name="data">
                        </div>
                        <button type="submit">Salvar</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
    
    <script>
        // Inicialize o InputMask para adicionar a máscara ao campo de número de telefone
        var telefoneMask = IMask(document.getElementById('telefone'), {
            mask: '(00) 00000-0000' // Defina a máscara desejada para o número de telefone
        });
    </script>
    <script src="perfil.js"></script>
</body>
</html>
