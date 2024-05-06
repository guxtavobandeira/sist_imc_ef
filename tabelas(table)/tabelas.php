<?php
include('protect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Alunos</title>
</head>

<body>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <h2>Tabela de Alunos</h2>

    <input id="input-busca" type="text">
    <label for="opcoes_g">
        <select name="genero" id="opcoes_g">
            <option value="" disabled selected hidden>Genero</option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            <option value="Todos">Todos</option>
        </select>
    </label>
    <label for="opcoes_c">
        <select name="curso" id="opcoes_c">
            <option value="" disabled selected hidden>Curso</option>
            <option value="Enfermagem">Enfermagem</option>
            <option value="Informática">Informática</option>
            <option value="Comércio">Comércio</option>
            <option value="Administração">Administração</option>
            <option value="Todos">Todos</option>
        </select>
    </label>
    <label for="opcoes_s">
        <select name="serie" id="opcoes_s">
            <option value="" disabled selected hidden>Série</option>
            <option value="1">1º ano</option>
            <option value="2">2º ano</option>
            <option value="3">3º ano</option>
            <option value="Todas">Todas</option>
        </select>
    </label>
    <label name="cadastro" for="text">Data de cadastro</label>
    <input type="date" id="data-cadastro" name="cadastro">
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Peso</th>
                <th>Altura</th>
                <th>Curso</th>
                <th>Série</th>
                <th>Gênero</th>
                <th>Data de Nascimento</th>
                <th>Circunferência</th>
                <th>IMC</th>
                <th>IAC</th>
                <th>Resultado IMC</th>
                <th>Resultado IAC</th>
                <th>Data de Cadastro</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="tabela-alunos">
            <?php
            include ('conexao.php');
            $sql = "SELECT * FROM alunos";
            $result = $mysqli->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['nome_aluno'] . "</td>";
                    echo "<td>" . $row['peso_aluno'] . "</td>";
                    echo "<td>" . $row['altura_aluno'] . "</td>";
                    echo "<td>" . $row['curso_aluno'] . "</td>";
                    echo "<td>" . $row['sala_aluno'] . "</td>";
                    echo "<td>" . $row['genero_aluno'] . "</td>";
                    echo "<td>" . date('Y-m-d', strtotime($row['datanasc_aluno'])) . "</td>";
                    echo "<td>" . $row['cir_quadril_aluno'] . "</td>";
                    echo "<td>" . $row['imc_aluno'] . "</td>";
                    echo "<td>" . $row['iac_aluno'] . "</td>";
                    echo "<td>" . $row['resultado_imc'] . "</td>";
                    echo "<td>" . $row['resultado_iac'] . "</td>";
                    echo "<td>" . date('Y-m-d', strtotime($row['datacadas_aluno'])) . "</td>";
                    echo "<td>   
                    <a class='btn btn-sm btn-danger' href='excluir_aluno.php?id_aluno=" . $row['id_aluno'] . "' title='Deletar'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                        </svg>
                    </a>
                </td>";

                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='12'>Nenhum aluno encontrado</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <script src="eventos.js"></script>

    <script>
        // Adiciona eventos de escuta para os campos relevantes
        document.getElementById('opcoes_g').addEventListener('change', filtrar);
        document.getElementById('opcoes_c').addEventListener('change', filtrar);
        document.getElementById('opcoes_s').addEventListener('change', filtrar);
        document.getElementById('data-cadastro').addEventListener('change', filtrar); // Adiciona um evento de escuta para a mudança na data de cadastro

        function filtrar() {
            // GÊNERO
            const GENERO = document.getElementById('opcoes_g');
            // CURSO
            const CURSO = document.getElementById('opcoes_c');
            // SÉRIE
            const SERIE = document.getElementById('opcoes_s');
            // DATA DE CADASTRO
            const DATA_CADASTRO = document.getElementById('data-cadastro');
            // TABELA
            const TABELA_ALUNOS = document.getElementById('tabela-alunos');

            // Obtém o valor do gênero selecionado em letras minúsculas
            var generoSelecionado = GENERO.value.toLowerCase();
            // Obtém o valor do curso selecionado em letras minúsculas
            var cursoSelecionado = CURSO.value.toLowerCase();
            // Obtém o valor da série selecionada
            var serieSelecionada = SERIE.value;
            // Obtém a data de cadastro selecionada
            var dataCadastroSelecionada = DATA_CADASTRO.value;

            // Obtém todas as linhas da tabela de alunos, incluindo o cabeçalho
            var linhas = TABELA_ALUNOS.querySelectorAll("tr");

            // Itera sobre as linhas da tabela (começando pela segunda linha, pois a primeira é o cabeçalho)
            for (var i = 0; i < linhas.length; i++) {
                var linha = linhas[i];

                // Obtém o texto do gênero na célula correspondente
                var generoCelula = linha.querySelector("td:nth-child(6)"); // Seleciona a célula de gênero (sexta célula)
                var generoAluno = generoCelula.textContent.toLowerCase() || generoCelula.innerText.toLowerCase();

                // Obtém o texto do curso na célula correspondente
                var cursoCelula = linha.querySelector("td:nth-child(4)"); // Seleciona a célula de curso (quarta célula)
                var cursoAluno = cursoCelula.textContent.toLowerCase() || cursoCelula.innerText.toLowerCase();

                // Obtém o texto da série na célula correspondente
                var serieCelula = linha.querySelector("td:nth-child(5)"); // Seleciona a célula de série (quinta célula)
                var serieAluno = serieCelula.textContent || serieCelula.innerText;

                // Obtém o texto da data de cadastro na célula correspondente
                var dataCadastroCelula = linha.querySelector("td:nth-child(13)"); // Seleciona a célula de data de cadastro (décima terceira célula)
                var dataCadastroAluno = dataCadastroCelula.textContent || dataCadastroCelula.innerText;

                // Converte a data de cadastro do aluno para um objeto Date (considerando o fuso horário local)
                var dataCadastroAlunoObj = new Date(dataCadastroAluno + 'T00:00:00');
                // Converte a data de cadastro selecionada pelo usuário para um objeto Date (considerando o fuso horário local)
                var dataCadastroSelecionadaObj = new Date(dataCadastroSelecionada + 'T00:00:00');

                // Define a flag para controlar se a linha deve ser ocultada ou exibida
                var deveOcultarLinha = false;

                // Verifica se a data de cadastro do aluno é válida
                if (!isNaN(dataCadastroAlunoObj.getTime())) {
                    // Verifica se a data de cadastro do aluno é diferente da data selecionada pelo usuário
                    if (dataCadastroAlunoObj.toDateString() !== dataCadastroSelecionadaObj.toDateString()) {
                        // Define a flag como verdadeira para ocultar a linha
                        deveOcultarLinha = true;
                    }
                } else {
                    // Se a data de cadastro do aluno for inválida, a linha deve ser ocultada
                    deveOcultarLinha = true;
                }

                // Verifica se algum dos campos de filtro está preenchido e se a linha corresponde ao filtro
                if ((generoSelecionado && generoAluno !== generoSelecionado && generoSelecionado !== "todos") ||
                    (cursoSelecionado && cursoAluno !== cursoSelecionado && cursoSelecionado !== "todos") ||
                    (serieSelecionada && serieAluno !== serieSelecionada && serieSelecionada !== "Todas") ||
                    (dataCadastroSelecionada && deveOcultarLinha)) {
                    linha.style.display = "none"; // Oculta a linha se não corresponder ao filtro
                } else {
                    linha.style.display = ""; // Exibe a linha se corresponder ao filtro
                }
            }
        }

    </script>
</body>

</html>
