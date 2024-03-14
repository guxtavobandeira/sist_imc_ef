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
        $circunf = $_POST['circunf'];
        $nascimento = $_POST['datadnasc'];

        if (!is_numeric($_POST['peso']) || !is_numeric($_POST['altura'])) {
            echo "<p>O peso e a altura devem ser valores numéricos.</p>";
        } else {
            $altura = $_POST['altura'];
            $peso = $_POST['peso'];
            $circunf = $_POST['circunf'];
        
         // Calcula o IMC
         $imc = $peso / ($altura * $altura);
         // Calcula o IAC
         $iac = ($circunf / ($altura * sqrt($altura))) - 18;

        // Prevenir SQL Injection usando prepared statements
        $stmt = $mysqli->prepare("INSERT INTO alunos (nome_aluno, peso_aluno, altura_aluno, curso_aluno, sala_aluno, genero_aluno, datanasc_aluno, cir_quadril_aluno, imc_aluno, iac_aluno) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sddssssddd", $nome, $peso, $altura, $curso, $serie, $genero, $nascimento, $circunf, $imc, $iac);
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
    <form method="post" action="" onsubmit="return substituirVirgulaPorPonto('pesoinput') && substituirVirgulaPorPonto('alturainput') && substituirVirgulaPorPonto('circunferenciainput') ">
        <input type="text" name="nome" placeholder="Nome completo"><br>
        <input type="text" name="peso" id="pesoinput" placeholder="Peso(kg)" maxlength="6" min="0" step="1"><br>
        <input type="text" name="altura" id="alturainput" placeholder="altura(m)" maxlength="4" min="0" step="1"><br>
        <input type="text" name="circunf" id="circunferenciainput" placeholder="circunferÊncia quadril (cm)" maxlength="3" min="0" step="1"><br>
        
        <label for="opcoes_c">
        <select name="curso" id="opcoes_c">
        <option value="" disabled selected hidden>curso</option>
        <option value="Enfermagem">Enfermagem</option>
        <option value="Informática">Informática</option>
        <option value="Comércio">Comércio</option>
        <option value="Administração">Administração</option>
        </select>
        </label>
        <br>
        <label for="opcoes_s" >
        <select name="serie" id="opcoes_s">
        <option value="" disabled selected hidden>série</option>
        <option value="1">1º ano</option>
        <option value="2">2º ano</option>
        <option value="3">3º ano</option>
        </select>
        </label>
        <br>
        <label for="opcoes_g">
        <select name="genero" id="opcoes_g">
        <option value="" disabled selected hidden>genero</option>
        <option value="Masculino">Masculino</option>
        <option value="Feminino">Feminino</option>
        </select>
        </label>
        <br>
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

        // Seleciona o input de peso
        var inputPeso = document.getElementById('pesoinput');

        // Adiciona um listener para o evento de digitar
        inputPeso.addEventListener('input', function(event) {
        var valorAtual = event.target.value.replace(/\D/g, ''); // Remove tudo que não é número

        if (valorAtual.length == 4) {
            // Insere um ponto após o segundo número
            valorAtual = valorAtual.replace(/^(\d{2})(\d+)/, '$1.$2');
    
            }
        else if (valorAtual.length == 5) {
            // Insere um ponto após o terceiro número
            valorAtual = valorAtual.replace(/^(\d{3})(\d+)/, '$1.$2');
    
            }
            // Atualiza o valor no campo de entrada
            event.target.value = valorAtual;
            });
        
        //seleciona o valor altura
        var inputAltura = document.getElementById('alturainput');

        // Adiciona um listener para o evento de digitar
        inputAltura.addEventListener('input', function(event) {
        var valorAtual = event.target.value.replace(/\D/g, ''); // Remove tudo que não é número

        if (valorAtual.length > 2) {
        // Insere um ponto após o primeiro número
        valorAtual = valorAtual.replace(/^(\d{1})(\d+)/, '$1.$2');
        }

        // Atualiza o valor no campo de entrada
        event.target.value = valorAtual;
        });

    </script>
    
</body>
</html>
