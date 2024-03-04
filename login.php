<?php
include("conexao.php");

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "preencha seu e-mail";
        } else if(strlen($_POST['senha']) == 0) {
            echo "preencha sua senha";
        } else {

            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
            $sql_exec = $mysqli->query($sql_code) or die("falha na execução do código sql" . $mysqli->error);

            if($sql_exec->num_rows > 0) {
                $usuario = $sql_exec->fetch_assoc();
            
                if(password_verify($senha, $usuario['senha'])) {
                    session_start();
                    $_SESSION['id'] = $usuario['id'];
                    $_SESSION['nome'] = $usuario['nome'];

                    header("Location: painel.php");
                    exit(); //termina a ação, agr esta indo para o painel do site
                } else {
                    echo "falha, senha ou email incorretos";
                }
            } else {
                echo "Usuário não encontrado";
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>

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
                        <li> <a href="inicio.html">Home</a> </li>
                        <li> <a href="login.php">IMC</a></li>
                        <li> <a href="login.php">IAC</a> </li>
                        <li> <a href="graficos.php">Gráficos</a> </li>
                    </ul>
                    <div class="menu-icon">
                        <img src="imagens/menu.png" alt="menu-icon">
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
        <form action="" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="email" placeholder="Email" required>
                <i class='bx bx-envelope'></i>
            </div>
            <div class="input-box">
                <input type="password" name="senha" placeholder="Senha" required>
                <i class='bx bx-lock-alt' ></i>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox">Lembrar de mim</label>
                <a href="#">Esqueceu a senha?</a>
            </div>

            <form action="painel.php" method="post">
    <button type="submit" class="btn">Login</button>
</form>

            <div class="register-link">
                <p>Não possui uma conta? <a href="index.php">Registrar</a></p>
            </div>
        </form>
    </div>
</main>
        <!-- end main -->
    
    <script src="menu.js"></script>        
</body>
</html>
