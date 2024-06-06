<?php
include('../conexao.php');
session_start();
include('../protect.php');

if (!isset($_SESSION['nome'])) {
    header("Location: login.php");
    exit;
}

$id_usuario = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os valores dos campos
    $genero = $_POST['genero'];
    $telefone = $_POST['telefone'];
    $data_nascimento = $_POST['data_nascimento'];

    // Atualiza os dados no banco de dados
    $sql = "UPDATE usuarios SET genero = '$genero', telefone = '$telefone', data_nascimento = '$data_nascimento' WHERE id = $id_usuario";

    if ($mysqli->query($sql) === TRUE) {
        // Redireciona para a página de perfil com uma mensagem de sucesso
        header("Location: perfil.php?success=1");
        exit;
    } else {
        // Se houver um erro, redireciona com uma mensagem de erro
        header("Location: perfil.php?error=1");
        exit;
    }
}