<?php

if(isset($_POST['email'])) {
    
include('conexao.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $mysqli->query("INSERT INTO usuarios (nome, email, senha) VALUES('$nome','$email', '$senha')");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Registrar</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <div class="background-verde">
        <!-- header -->
        <header>
            <!-- container -->
            <div class="container">
                <nav>
                    <div class="logo">EEEPstudio</div>
                    <ul class="ul">
                        <li> <a href="/inicio/inicio.php"> <i class='bx bxs-home'></i> </a> </li>
                    </ul>
                    <div class="menu-icon">
                        <img src="/imagens/menu.png" alt="menu-icon">
                    </div>
                </nav>
                <!-- end conntainer -->
            </header>  
            <!-- end background-verde -->      
        </div>
        <!-- line -->
        <hr class="line">
        <!-- end line -->
        <!-- end header -->

        <!-- main -->
        <main>
            <div class="case">
                <form action="">
                    <h1>Registre-se</h1>
                    <div class="input-box">
                        <input type="text"  name="nome" placeholder="Nome Completo" required>
                        <i class='bx bx-user'></i>
                    </div>
                    <div class="input-box">
                        <input type="text" name="email" placeholder="Email" required>
                        <i class='bx bx-envelope'></i>
                    </div>
                    <div class="input-box">
                        <input type="password" name="senha" placeholder="Senha" required>
                        <i class='bx bx-lock-alt' ></i>
                    </div>
    
                    <button type="submit" class="btn">Registrar</button>
    
                    <div class="register-link">
                        <p>Já possui uma conta? <a href="login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </main>
        <!-- end main -->
    
    <script src="menu.js"></script>        
</body>
</html>
