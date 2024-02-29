<?php
include('conexao.php');
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o campo 'peso' foi enviado
    if (isset($_POST['peso'])) {
        // Recebe o valor do campo 'peso' e converte para um número
        $peso = floatval($_POST['peso']);
        
        // Insere o peso na tabela 'alunos'
        $query = "INSERT INTO alunos (peso_aluno) VALUES ('$peso')";
        if ($mysqli->query($query)) {
            echo "Peso cadastrado com sucesso.";
        } else {
            echo "Erro ao cadastrar o peso: " . $mysqli->error;
        }
    } else {
        // Se o campo 'peso' não foi enviado, exiba uma mensagem de erro
        echo "O campo 'peso' não foi enviado.";
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
<form method="post" action="">
        <input type="text" name="nome" placeholder="nome aluno">
        <input type="text" name="serie" placeholder="serie aluno">
        <input type="text" name="curso" placeholder="nome aluno">
        <input type="text" name="peso" placeholder="Informe seu peso">
        <input type="text" name="altura" placeholder="nome aluno">
        <input type="text" name="circunf" placeholder="nome aluno">
        <input type="text" name="genero" placeholder="nome aluno">
        
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
