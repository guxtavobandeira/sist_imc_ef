<?php

if(isset($_POST['email'])) {
    include('../conexao.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    if ($stmt = $mysqli->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)")) {
        $stmt->bind_param("sss", $nome, $email, $senha);
        $stmt->execute();
        $stmt->close();
    } else {
        // Handle errors with prepare operation
        echo "Error: " . $mysqli->error;
    }
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
        <header>
            <div class="container">
                <nav>
                    <div class="logo">EEEPstudio <i class='bx bxl-slack'></i></div>
                    <ul class="ul">
                        <li><a href="../inicio/inicio.html"><i class='bx bxs-home'></i></a></li>
                    </ul>
                    <div class="menu-icon">
                        <img src="/imagens/menu.png" alt="menu-icon">
                    </div>
                </nav>
            </div>
        </header>  
    </div>
    <hr class="line">
    <main>
        <div class="case">
            <form action="index.php" method="post">
                <h1>Registre-se</h1>
                <div class="input-box">
                    <input type="text" name="nome" placeholder="Nome Completo" required>
                    <i class='bx bx-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" required>
                    <i class='bx bx-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="senha" placeholder="Senha" required>
                    <i class='bx bx-lock-alt'></i>
                </div>
                <button type="submit" class="btn">Registrar</button>
                <div class="register-link">
                    <p>Já possui uma conta? <a href="../login/login.php">Login</a></p>
                </div>
            </form>
        </div>
    </main>
    <script src="menu.js"></script>        
</body>
</html>
