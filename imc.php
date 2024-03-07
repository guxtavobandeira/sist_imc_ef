<?php
include('conexao.php');
include('protect.php');

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos obrigatórios foram preenchidos
    $campos_obrigatorios = ['nome', 'peso', 'altura', 'curso', 'serie', 'genero', 'datadnasc'];
    $campos_vazios = [];
    foreach ($campos_obrigatorios as $campo) {
        if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
            $campos_vazios[] = $campo;
        }
    }

    // Se houver campos obrigatórios vazios, exibe uma mensagem de erro
    if (!empty($campos_vazios)) {
    $mensagem_erro = "Os seguintes campos são obrigatórios e não foram preenchidos: " . implode(', ', $campos_vazios);
    echo "<p>$mensagem_erro</p>";
    }
    else if(isset($_POST['nome']) && isset($_POST['peso']) && isset($_POST['altura']) && isset($_POST['curso']) && isset($_POST['serie']) && isset($_POST['genero']) && isset($_POST['datadnasc'])) {
    
        $nome = $_POST['nome'];
        $altura = $_POST['altura'];
        $peso = $_POST['peso'];
        $curso = $_POST['curso'];
        $serie = $_POST['serie'];
        $genero = $_POST['genero'];
        $nascimento = $_POST['datadnasc'];

        if (!is_numeric($_POST['peso']) || !is_numeric($_POST['altura'])) {
            echo "<p>O peso e a altura devem ser valores numéricos.</p>";
        } else {
            $altura = $_POST['altura'];
            $peso = $_POST['peso'];
        
         // Calcula o IMC
         $imc = $peso / ($altura * $altura);


        // Prevenir SQL Injection usando prepared statements
        $stmt = $mysqli->prepare("INSERT INTO alunos (nome_aluno, peso_aluno, altura_aluno, curso_aluno, sala_aluno, genero_aluno, datanasc_aluno, imc_aluno) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sddssssd", $nome, $peso, $altura, $curso, $serie, $genero, $nascimento, $imc);
        $stmt->execute();
        $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo Imc</title>
</head>
<body>
    <form method="post" action="" onsubmit="return substituirVirgulaPorPonto('pesoinput') && substituirVirgulaPorPonto('alturainput')">
        <input type="text" name="nome" placeholder="Nome completo"><br>
        <input type="text" name="peso" id="pesoinput" placeholder="Peso(kg)" min="0" step="1"><br>
        <input type="text" name="altura" id="alturainput" placeholder="altura(m)" min="0" step="1"><br>
        <input type="text" name="curso" placeholder="Informe seu curso"><br>
        <input type="text" name="serie" placeholder="Informe sua serie"><br>
        <input type="text" name="genero" placeholder="Informe seu genero"><br>
        <input type="date" name="datadnasc" placeholder="Informe seu nascimento"><br>
        <button type="submit">Cadastrar</button>
    </form>

    <script>
        // Função para substituir vírgulas por pontos
        function substituirVirgulaPorPonto(inputId) {
            var input = document.getElementById(inputId);
            input.value = input.value.replace(/,/g, '.');
            return true;
        }
    </script>
</body>
</html>

