<?php
include('../conexao.php');
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['nome'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['imagem'])) {
    $id_usuario = $_SESSION['id'];
    $imagem = $_FILES['imagem'];

    // Diretório onde a imagem será salva
    $diretorio = '../uploads/';
    $caminho_imagem = $diretorio . basename($imagem['name']);

    // Verifica se o diretório existe, se não, cria
    if (!is_dir($diretorio)) {
        mkdir($diretorio, 0777, true);
    }

    // Move a imagem para o diretório
    if (move_uploaded_file($imagem['tmp_name'], $caminho_imagem)) {
        $caminho_imagem = $mysqli->real_escape_string($caminho_imagem);

        // Atualiza o caminho da imagem no banco de dados
        $sql = "UPDATE usuarios SET caminho_imagem = '$caminho_imagem' WHERE id = $id_usuario";

        if ($mysqli->query($sql)) {
            echo "Imagem enviada e salva com sucesso!";
        } else {
            echo "Erro ao salvar o caminho da imagem no banco de dados: " . mysqli_error($conexao);
        }
    } else {
        echo "Erro ao fazer upload da imagem.";
    }
} else {
    echo "Nenhuma imagem foi enviada.";
}

$mysqli->close();