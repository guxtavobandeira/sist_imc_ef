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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Cadastrar Senha
    <form action="" method="post">
        <input type="text" name="nome">
        <input type="text" name="email">
        <input type="text" name="senha">
        <button type="submit">Cadastrar senha</button>
        <br>
        Já tem uma conta? <br>
        acesse <a href="login.php">Acessar</a>
    </form>
</body>
</html>
