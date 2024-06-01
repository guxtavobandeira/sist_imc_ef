<?php
include('../conexao.php');
// Supondo que você já tenha uma conexão com o banco de dados ($mysqli)
if(isset($_GET['id_aluno'])) {
    $id_aluno = $_GET['id_aluno'];
    
    // Consulta ao banco de dados para obter o nome do aluno com base no ID
    $sql = "SELECT nome_aluno FROM alunos WHERE id_aluno = $id_aluno";
    $result = $mysqli->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['nome_aluno'];
    } else {
        echo "Aluno não encontrado";
    }
} else {
    echo "ID do aluno não fornecido";
}
