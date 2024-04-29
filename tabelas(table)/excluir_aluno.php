<?php
include_once('conexao.php');

// Verifica se o ID do aluno foi fornecido e se o formulário de confirmação foi submetido
if (!empty($_GET['id_aluno']) && isset($_POST['confirmacao'])) {
    $id = $_GET['id_aluno'];
    
    // Se o usuário confirmou a exclusão
    if ($_POST['confirmacao'] == 'sim') {
        // Query SQL para excluir o aluno com o ID fornecido
        $sqlDelete = "DELETE FROM alunos WHERE id_aluno=$id";

        // Executa a query de exclusão
        if ($mysqli->query($sqlDelete) === TRUE) {
            echo "Aluno excluído com sucesso!";
        } else {
            echo "Erro ao excluir aluno: " . $mysqli->error;
        }
        
        // Redireciona de volta para a página de tabelas após a exclusão
        header('Location: tabelas.php');
        exit(); // Encerra o script após o redirecionamento
    } else {
        // Se o usuário cancelou a exclusão, redireciona de volta para a página de tabelas
        header('Location: tabelas.php');
        exit(); // Encerra o script após o redirecionamento
    }
} elseif (!empty($_GET['id_aluno'])) {
    // Se o ID do aluno foi fornecido, exibe o formulário de confirmação
    $id = $_GET['id_aluno'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Confirmação de Exclusão</title>
</head>
<body>
    <h2>Você realmente deseja excluir o aluno?</h2>
    <form method="post">
        <input type="hidden" name="confirmacao" value="sim">
        <button type="submit">Sim</button>
    </form>
    <form action="tabelas.php" method="get">
        <button type="submit">Cancelar</button>
    </form>
</body>
</html>
<?php
} else {
    echo "ID de aluno inválido!";
}
?>
