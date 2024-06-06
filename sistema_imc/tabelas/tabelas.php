<?php
include('../conexao.php');
session_start(); // Start the session at the beginning of your script
include ('../protect.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['nome'])) {
    // Se não estiver logado, redireciona para a página de login
    header("Location: login.php");
    exit; // Encerra o script
}

// Busca o caminho da imagem e os dados do usuário no banco de dados
$id_usuario = $_SESSION['id'];
$sql = "SELECT caminho_imagem, email, senha, genero, telefone, data_nascimento FROM usuarios WHERE id = $id_usuario";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $caminho_imagem = $row['caminho_imagem'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['senha'] = $row['senha'];
    $_SESSION['genero'] = $row['genero'];
    $_SESSION['telefone'] = $row['telefone'];
    $_SESSION['data_nascimento'] = $row['data_nascimento'];
} else {
    $caminho_imagem = null;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Alunos</title>
</head>

<body>
    
</body>

</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tabelas.css">
    <title>Painel</title>

    <!-- Adiciona os ícones da Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <!-- NavBar -->
    <div class="background-verde">
        <!-- header -->
        <header>
            <!-- nav-container -->
            <div class="nav-container">
                <nav>
                    <!-- Logo da página -->
                    <div class="logo">EEEPstudio</div>
                    <!-- Lista de links de navegação -->
                    <ul class="ul">
                        <!-- Ícone de casa com link para a página inicial -->
                        <li> <a href="../painel/painel.php"> <i class='bx bxs-home'></i> </a> </li>
                    </ul>
                </nav>
                <!-- Fim do container -->
            </header>  
            <!-- Fim do background-verde -->      
        </div>
        <!-- Linha decorativa -->
        <hr class="line">
        <!-- Fim da linha -->

        <!-- Fim da NavBar -->

    <!-- Menu container -->    
    <section class="menu-container">
        <!-- caixa perfil -->
        <div class="box-profile">
            <div class="profile-img">
                <?php if ($caminho_imagem): ?>
                    <img src="<?php echo $caminho_imagem; ?>" alt="Imagem de Perfil" id="user2">
                <?php else: ?>
                    <i class='bx bx-user' id="user2"></i>
                <?php endif; ?>
            </div>
            <style>
                .profile-img,
                .profile-img2 {
                    position: relative;
                    width: 100px;
                    /* Ajuste o tamanho conforme necessário */
                    height: 100px;
                    /* Ajuste o tamanho conforme necessário */
                    border-radius: 50%;
                    overflow: hidden;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    background-color: #f0f0f0;
                    /* Cor de fundo opcional */
                }

                .profile-img img,
                .profile-img2 img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    display: block;
                }

                .profile-img i,
                .profile-img2 i {
                    font-size: 50px;
                    /* Ajuste conforme necessário */
                    color: #666;
                    /* Cor do ícone */
                }
            </style>
            <div class="text-user">
                <h2 style="color: white;"><?php echo $_SESSION['nome']; ?></h2>
                <h3 style="color: white;"><?php echo "ID: " . $_SESSION['id']; ?></h3>
            </div>
        </div>
        <!-- Fim caixa perfil -->
        <!-- line -->
        <hr class="line-menu">
        <!-- end line -->
        <!-- botões list -->
        <div class="buttons">
            <button><a href="../perfil/perfil.php"><i class='bx bx-user'></i> Perfil</a></button>
            <button><a href="../adicionar/add.php"><i class='bx bx-plus'></i> Adicionar Dados</a></button>
            <button><a href="../graficos/grafico.php"><i class='bx bx-chart'></i> Gráficos</a></button>
            <button><a href="../tabelas/tabelas.php"><i class='bx bx-table'></i> Tabelas</a></button>
            <button><a href="../logout.php"><span><i class='bx bx-log-out'></i>Sair</span></a></button>
        </div>
        <!-- end botões lst -->
    </section>
    <!-- Fim menu container -->

    <!-- main -->
    <section class="main-container">
        <form action="#">
            <div class="form-first">
                <div class="dados-alunos">
                    <span class="title">Filtro</span>
                    <!-- fields -->
                    <div class="fields">
                        <div class="input-field">
                            <label for="text">Série</label>
                            <select name="serie">
                                <option value="#" disabled selected >Selecione uma opção</option>
                                <option value="all">Todas as séries</option>
                                <option value="1ano">1º Ano</option>
                                <option value="2ano">2º Ano</option>
                                <option value="3ano">3º Ano</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label for="text">Curso</label>
                            <select name="curso">
                                <option value="#" disabled selected >Selecione uma opção</option>
                                <option value="all">Todos os cursos</option>
                                <option value="enfermagem">Enfermagem</option>
                                <option value="informatica">Informática</option>
                                <option value="comercio">Comércio</option>
                                <option value="administracao">Administração</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label for="text">Gênero</label>
                            <select name="genero">
                                <option value="#" disabled selected >Selecione uma opção</option>
                                <option value="all">Todos os gêneros</option>
                                <option value="masculino">Masculino</option>
                                <option value="feminino">Feminino</option>
                                <option value="outro">Outro</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label for="text">Ano de Cadastro</label>
                            <select name="curso">
                                <option value="#" disabled selected >Selecione uma opção</option>
                                <option value="all">Todos os anos</option>
                                <option value="enfermagem">2020</option>
                                <option value="informatica">2021</option>
                                <option value="comercio">2022</option>
                                <option value="administracao">2023</option>
                                <option value="administracao">2024</option>
                            </select>
                        </div>
                        <button type="submit" class="search-button"><i class='bx bx-search'></i>Pesquisar</button>
                    </div>
                </div>
            </div>
        </form>
        <hr class="line-menu" id="line-table">
        <div class="table-container">
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
            include ('../conexao.php');
            $sql = "SELECT * FROM alunos";
            $result = $mysqli->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id_aluno = $row['id_aluno']; // Defina o ID do aluno dentro do loop
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
            <a class='btn btn-sm btn-danger' href='#' onclick='exibir_quadrado($id_aluno)' title='Deletar'>
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
    <style>
        #quadrado {
            display: none;
            width: 400px;
            min-height: 200px;
            background-color: #f2f2f2;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            z-index: 1000;
        }

        #quadrado button {
            margin: 10px;
        }
    </style>
    <div id="quadrado" style="display: none;">
    <h3>Você realmente deseja excluir o aluno <span id="nomeAluno"></span>?</h3>
    <button id="confirmarBtn">Confirmar</button>
    <button id="cancelarBtn">Cancelar</button>
</div>

<script>
    function exibir_quadrado(id_aluno) {
        var quadrado = document.getElementById('quadrado');
        var nomeAlunoSpan = document.getElementById('nomeAluno');

        // Fazendo a requisição AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'buscar_nome_aluno.php?id_aluno=' + id_aluno, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Se a requisição for bem-sucedida, atualiza o span com o nome do aluno
                    nomeAlunoSpan.textContent = xhr.responseText;
                } else {
                    // Se houver algum erro na requisição, exibe uma mensagem de erro genérica
                    nomeAlunoSpan.textContent = "Erro ao buscar o nome do aluno";
                }
            }
        };
        xhr.send();

        quadrado.style.display = 'block';
        
        // Adicionando event listener para o botão de confirmar
        document.getElementById('confirmarBtn').addEventListener('click', function() {
            confirmarExclusao(true, id_aluno);
        });

        // Adicionando event listener para o botão de cancelar
        document.getElementById('cancelarBtn').addEventListener('click', function() {
            confirmarExclusao(false, id_aluno);
        });
    }

    function confirmarExclusao(confirmado, id_aluno) {
        var quadrado = document.getElementById('quadrado');

        if (confirmado) {
            // Aqui você pode fazer o que precisa fazer se a exclusão for confirmada
            console.log("Exclusão confirmada para o aluno de ID " + id_aluno);
            window.location.href = 'excluir_aluno.php?id_aluno=' + id_aluno;
        } else {
            // Aqui você pode fazer o que precisa fazer se a exclusão for cancelada
            console.log("Exclusão cancelada para o aluno de ID " + id_aluno);
        }

        quadrado.style.display = 'none';
    }
</script>



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
        </div>
    </section>
    <!-- end main -->