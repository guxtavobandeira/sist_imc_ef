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
                    include("painel.php");
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="email"><br>
        <input type="password" name="senha"><br>
        <button type="submit">LOGAR</button>
    </form>
</body>
</html>
