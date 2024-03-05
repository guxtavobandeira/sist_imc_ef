<?php
include('conexao.php');
include('protect.php');

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['nome']) && isset($_POST['peso']) && isset($_POST['altura']) && isset($_POST['curso']) && isset($_POST['serie']) && isset($_POST['genero']) && isset($_POST['datadnasc'])) {
    
        $nome = $_POST['nome'];
        $altura = $_POST['altura'];
        $peso = $_POST['peso'];
        $curso = $_POST['curso'];
        $serie = $_POST['serie'];
        $genero = $_POST['genero'];
        $nascimento = $_POST['datadnasc'];
        
         // Calcula o IMC
         $imc = $peso / ($altura * $altura);


        // Prevenir SQL Injection usando prepared statements
        $stmt = $mysqli->prepare("INSERT INTO alunos (nome_aluno, peso_aluno, altura_aluno, curso_aluno, sala_aluno, genero_aluno, datanasc_aluno, imc_aluno) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sddssssd", $nome, $peso, $altura, $curso, $serie, $genero, $nascimento, $imc);
        $stmt->execute();
        $stmt->close();
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
    <form method="post" action="">
        <input type="text" name="nome" placeholder="Informe seu nome"><br>
        <input type="number" name="peso" id="pesoinput" placeholder="Informe seu peso" min="0" step="1"><br> 
        <input type="number" name="altura" placeholder="Informe sua altura" min="0" step="1"><br>
        <input type="text" name="curso" placeholder="Informe seu curso"><br>
        <input type="text" name="serie" placeholder="Informe sua serie"><br>
        <input type="text" name="genero" placeholder="Informe seu genero"><br>
        <input type="date" name="datadnasc" placeholder="Informe seu nascimento"><br>
        <button type="submit">Cadastrar</button>
    </form>
    <script>
    // Função para validar o número inserido
    function validarNumero() {
        var input = document.getElementById('numeroInput').value;
        // Substitua vírgulas por pontos para garantir a representação decimal
        input = input.replace(/,/g, '.');
        // Verifique se o valor inserido é um número válido
        if (!isNaN(input)) {
            console.log('Número válido: ' + input);
            // Aqui você pode prosseguir com outras ações, como enviar o formulário
        } else {
            alert('Por favor, insira um número válido.');
            // Limpar o campo de entrada ou tomar outras medidas
        }
    }
</script>
</body>
</html>
