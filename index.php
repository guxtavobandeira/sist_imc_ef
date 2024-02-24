<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {
    
    if(strlen($_POST['email']) == 0) {
    echo "preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "preencha sua senha";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha ='$senha'";
        $sql_querry = $mysqli->query($sql_code) or die("falha na execução do código sql" . $mysqli->error);

        $quantidade = $sql_querry->num_rows;

        if($quantidade == 1) {
            $usuario = $sql_querry->fetch_assoc();

            if(!isset($SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");


        } else{
            echo "falha ao logar. email ou senha incorretos!";
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Acesse sua conta:</h1>
    <form action="" method="POST">
        <p>
            <label for="">E-mail</label>
            <input type="text" name="email">
        </p>
        <p>
            <label for="">Senha</label>
            <input type="password" name="senha">
        </p>
        <p>
            <button type="submit">Entrar</button>
        </p>
    </form>

</body>
</html>
