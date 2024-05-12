<?php
include_once('conexao.php');

if (!empty($_GET['id_aluno'])) {
    $id = $_GET['id_aluno'];

    // Query SQL para excluir o aluno com o ID fornecido
    $sqlDelete = "DELETE FROM alunos WHERE id_aluno=$id";

    // Executa a query de exclusão
    if ($mysqli->query($sqlDelete) === TRUE) {
        echo "Aluno excluído com sucesso!";
    } else {
        echo "Erro ao excluir aluno: " . $mysqli->error;
    }
} else {
    echo "ID de aluno inválido!";
}

// Redireciona de volta para a página de tabelas após a exclusão
header('Location: tabelas.php');
