<?php
include("../conexao.php");

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

                    header("Location: /sistema_imc/painel/painel.php");
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
    <title>Login</title>
    <link rel="stylesheet" href="../login/login.css">
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
                        <li> <a href="../inicio/inicio.html"> <i class='bx bxs-home'></i> </a> </li>
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
                <p>Não possui uma conta? <a href="../index/index.php">Registrar</a></p>
            </div>
        </form>
    </div>
</main>
        <!-- end main -->
    
    <script src="menu.js"></script>        
</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Red+Hat+Display:wght@300;400;700;900&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    list-style: none;
}

body {
    font-family: "Poppins", sans-serif;
    min-height: 100vh;
    overflow: hidden;
    background: var(--cinza);
    
}

:root{
    --verde: rgb(0, 130, 65);
    --amarelo: rgb(255, 200, 5);
    --laranja: #ff7c37;
    --laranja2: #f94600;
    --degrade-btn: linear-gradient(#fe9611, #ff5c00);
    --cinza: #e2e2e2;
    --dkcinza: #333;

}

.background-verde {
    background: url("/imagens/bk-verde.jpg") no-repeat;
    background-size: 100%;
    background-position: 90%;
}

.line {
    background: linear-gradient(to right, var(--laranja2), var(--amarelo), var(--laranja2));
    height: 20px;
    width: 100%;
    border: none;
}

/* classe reutilizável */
.container {
    max-width: auto;
    padding: 0 5%;
    margin: 0 auto;
}

.btn-gradient {
    padding: 10px 25px;
    color: white;
    background-image: var(--degrade-btn);
    border: none;
    cursor: pointer;
}

/* classes do site */
nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 0;

}
.logo {
    font-size: 30px;
    font-weight: bold;
    color: white;
}

.ul {
    display: flex;
    align-items: center;
}

.ul li {
    margin: 0 0;
    font-size: 15px;
}

.ul li i{
    color: white ;
    font-size: 2.5rem;
}

.ul li i:hover{
    cursor: pointer;
}

.ul li a {
    color: white;
}

/* menu icon */
.menu-icon {
    display: none;
    position: relative;
    z-index: 10;
    cursor: pointer;
}

.menu-icon img{
    height: 40px;
}

/* end menu icon */


/* main */
main {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    backdrop-filter: blur(5px);
    background: white;
    display: flex;
}

.case{
    margin: 0 auto;
    max-width: 1400px;
    width: 420px;
    background: var(--verde);
    color: white;
    border-radius: 10px;
    padding: 100px 40px;
    position: relative;
    bottom: calc(100px/2);
    box-shadow: 5px 5px 20px rgb(0,62,34);
}

.case h1{
    font-size: 36px;
    text-align: center;
}

.case .input-box{
    width: 100%;
    height: 50px;
    margin: 30px 0;
    position: relative;
}

.input-box input{
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid var(--amarelo);
    border-radius: 40px;
    font-size: 16px;
    color: white;
    padding: 20px 45px 20px 20px;
}

.input-box input::placeholder {
    color: white;
}

.input-box i{
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 20px;
}

.case .remember-forgot{
    display: flex;
    justify-content: space-between;
    font-size: 14.5px;
    margin: -15px 0 15px ;
}

.remember-forgot label input{
    accent-color: white;
    margin-right: 3px;
}

.remember-forgot a{
    color: white;
}

.remember-forgot a:hover{
    text-decoration: underline;
}
.case .btn{
    width: 100%;
    height: 45px;
    background: white;
    border: none;
    outline: none;
    border-radius: 40px;
    box-shadow: 0 0 10px var(--amarelo);
    cursor: pointer;
    font-size: 16px;
    color: var(--verde);
    font-weight: 600;
}

.case .register-link{
    font-size: 14.5px;
    text-align: center;
    margin: 20px 0 15px;
}

.register-link p a{
    color: white;
    font-weight: 600;
}

.register-link p a:hover{
    text-decoration: underline;
}
/* end main */

/* responsivo */
@media (max-width: 960px) {
    .menu-icon {
        display: block;
    }
    .ul {
        position: fixed;
        background: var(--verde);
        top: 0;
        width: 100%;
        height: 100%;
        left: 100%;
        transition: 0.3s;
        flex-direction: column;
        justify-content: center;
    }

    .ul li{
        font-size: 20px;
        margin: 20px 0;
    }
    .ul.ativo {
        left: 0;
    }

    /* main */
    main{
        background-size: 100vw 100vh ;
    }
    main .container {
        flex-direction: column;
    }

    main .container .main-text h1{
        font-size: 4rem;
    }
    main .container .main-text div {
        justify-content: center;
    }

}

@media (max-width: 600px) {
    .resultados .resultados-numero {
        flex-direction: column;
    }
    main .container .main-text h1 {
        font-size: 3rem;
    }
}
</style>
</html>