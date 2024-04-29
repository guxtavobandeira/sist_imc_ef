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
    <!-- Adicione os arquivos de estilo e script do Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmação de Exclusão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Você realmente deseja excluir o aluno?</p>
                </div>
                <div class="modal-footer">
                    <form method="post">
                        <input type="hidden" name="confirmacao" value="sim">
                        <button type="submit" class="btn btn-danger">Sim</button>
                    </form>
                    <!-- Adicione o link para voltar para a página de tabelas -->
                    <a href="tabelas.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Adicione os arquivos de script do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- Ative o modal automaticamente -->
    <script>
        $(document).ready(function() {
            $('.modal').modal('show');
        });
    </script>
</body>
</html>
<?php
} else {
    echo "ID de aluno inválido!";
}
?>
