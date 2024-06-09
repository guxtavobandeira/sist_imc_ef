<?php
// Incluir o arquivo de conexão
include ('../conexao.php');
session_start(); // Start the session at the beginning of your script
// Captura a saída do buffer
ob_start();

// Inclui o arquivo protect.php
include ('../protect.php');

// Limpa o buffer, ignorando a saída
ob_clean();

// Exibe o conteúdo capturado no buffer
ob_end_flush();

// Verifica se o usuário está logado
if (!isset($_SESSION['nome'])) {
    // Se não estiver logado, redireciona para a página de login
    header("Location: ../../login/login.php");
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

// Consulta SQL para obter a média de peso dos alunos do sexo feminino
$sql_fem = "SELECT AVG(peso_aluno) AS media_peso_fem FROM alunos WHERE genero_aluno = 'Feminino'";
$result_fem = $mysqli->query($sql_fem);
// Consulta SQL para obter a média de peso dos alunos do sexo masculino
$sql_masc = "SELECT AVG(peso_aluno) AS media_peso_masc FROM alunos WHERE genero_aluno = 'Masculino'";
$result_masc = $mysqli->query($sql_masc);


// Verificar se as consultas retornaram resultados

// Feminino
if ($result_fem) {
    // Extrair o resultado da consulta
    $row = $result_fem->fetch_assoc();
    $media_peso_fem = $row['media_peso_fem'];
} else {
    echo "Erro na consulta de média de peso das alunas: " . $mysqli->error . "<br>";
}
// Masculino
if ($result_masc) {
    // Extrair o resultado da consulta
    $row = $result_masc->fetch_assoc();
    $media_peso_masc = $row['media_peso_masc'];
} else {
    echo "Erro na consulta de média de peso das alunos: " . $mysqli->error . "<br>";
}

// Consulta SQL para obter a média de peso dos alunos do curso enfermagem
$sql_enf = "SELECT AVG(peso_aluno) AS media_peso_enf FROM alunos WHERE curso_aluno = 'Enfermagem'";
$result_enf = $mysqli->query($sql_enf);
// Consulta SQL para obter a média de altura dos alunos do curso informática
$sql_inf = "SELECT AVG(peso_aluno) AS media_peso_inf FROM alunos WHERE curso_aluno = 'Informática'";
$result_inf = $mysqli->query($sql_inf);
// Consulta SQL para obter a média de peso dos alunos do curso comercio
$sql_com = "SELECT AVG(peso_aluno) AS media_peso_com FROM alunos WHERE curso_aluno = 'Comércio'";
$result_com = $mysqli->query($sql_com);
// Consulta SQL para obter a média de peso dos alunos do curso adm
$sql_adm = "SELECT AVG(peso_aluno) AS media_peso_adm FROM alunos WHERE curso_aluno = 'Administração'";
$result_adm = $mysqli->query($sql_adm);


// Verificar se as consultas retornaram resultados

// Enfermagem
if ($result_enf) {
    // Extrair o resultado da consulta
    $row = $result_enf->fetch_assoc();
    $media_peso_enf = $row['media_peso_enf'];
} else {
    echo "Erro na consulta de média de peso dos alunos: " . $mysqli->error . "<br>";
}
// infor
if ($result_inf) {
    // Extrair o resultado da consulta
    $row = $result_inf->fetch_assoc();
    $media_peso_inf = $row['media_peso_inf'];
} else {
    echo "Erro na consulta de média de peso dos alunos em Informática: " . $mysqli->error . "<br>";
}
// comercio
if ($result_com) {
    // Extrair o resultado da consulta
    $row = $result_com->fetch_assoc();
    $media_peso_com = $row['media_peso_com'];
} else {
    echo "Erro na consulta de média de peso dos alunos em Comércio: " . $mysqli->error . "<br>";
}
// adm
if ($result_adm) {
    // Extrair o resultado da consulta
    $row = $result_adm->fetch_assoc();
    $media_peso_adm = $row['media_peso_adm'];
} else {
    echo "Erro na consulta de média de peso dos alunos em Administração: " . $mysqli->error . "<br>";
}


// Consulta SQL para obter a média de peso dos alunos do sexo feminino para o curso "Enfermagem"
$sql_enf_fem = "SELECT AVG(peso_aluno) AS media_peso_fem_enf FROM alunos WHERE curso_aluno = 'Enfermagem' AND genero_aluno = 'Feminino'";
$result_enf_fem = $mysqli->query($sql_enf_fem);

// Consulta SQL para obter a média de peso dos alunos do sexo masculino para o curso "Enfermagem"
$sql_enf_masc = "SELECT AVG(peso_aluno) AS media_peso_masc_enf FROM alunos WHERE curso_aluno = 'Enfermagem' AND genero_aluno = 'Masculino'";
$result_enf_masc = $mysqli->query($sql_enf_masc);

// Consulta SQL para obter a média de peso dos alunos do sexo feminino para o curso "Informática"
$sql_inf_fem = "SELECT AVG(peso_aluno) AS media_peso_fem_inf FROM alunos WHERE curso_aluno = 'Informática' AND genero_aluno = 'Feminino'";
$result_inf_fem = $mysqli->query($sql_inf_fem);

// Consulta SQL para obter a média de peso dos alunos do sexo masculino para o curso "Informática"
$sql_inf_masc = "SELECT AVG(peso_aluno) AS media_peso_masc_inf FROM alunos WHERE curso_aluno = 'Informática' AND genero_aluno = 'Masculino'";
$result_inf_masc = $mysqli->query($sql_inf_masc);

// Consulta SQL para obter a média de peso dos alunos do sexo feminino para o curso "Comércio"
$sql_com_fem = "SELECT AVG(peso_aluno) AS media_peso_fem_com FROM alunos WHERE curso_aluno = 'Comércio' AND genero_aluno = 'Feminino'";
$result_com_fem = $mysqli->query($sql_com_fem);

// Consulta SQL para obter a média de peso dos alunos do sexo masculino para o curso "Comércio"
$sql_com_masc = "SELECT AVG(peso_aluno) AS media_peso_masc_com FROM alunos WHERE curso_aluno = 'Comércio' AND genero_aluno = 'Masculino'";
$result_com_masc = $mysqli->query($sql_com_masc);

// Consulta SQL para obter a média de peso dos alunos do sexo feminino para o curso "Administração"
$sql_adm_fem = "SELECT AVG(peso_aluno) AS media_peso_fem_adm FROM alunos WHERE curso_aluno = 'Administração' AND genero_aluno = 'Feminino'";
$result_adm_fem = $mysqli->query($sql_adm_fem);

// Consulta SQL para obter a média de peso dos alunos do sexo masculino para o curso "Administração"
$sql_adm_masc = "SELECT AVG(peso_aluno) AS media_peso_masc_adm FROM alunos WHERE curso_aluno = 'Administração' AND genero_aluno = 'Masculino'";
$result_adm_masc = $mysqli->query($sql_adm_masc);

// Verificar se as consultas retornaram resultados

// Enfermagem - Feminino
if ($result_enf_fem) {
    // Extrair o resultado da consulta
    $row = $result_enf_fem->fetch_assoc();
    $media_peso_fem_enf = $row['media_peso_fem_enf'];
} else {
    echo "Erro na consulta de média de peso das alunas em Enfermagem: " . $mysqli->error . "<br>";
}

// Enfermagem - Masculino
if ($result_enf_masc) {
    // Extrair o resultado da consulta
    $row = $result_enf_masc->fetch_assoc();
    $media_peso_masc_enf = $row['media_peso_masc_enf'];
} else {
    echo "Erro na consulta de média de peso dos alunos em Enfermagem: " . $mysqli->error . "<br>";
}
// Informática - Feminino
if ($result_inf_fem) {
    // Extrair o resultado da consulta
    $row = $result_inf_fem->fetch_assoc();
    $media_peso_fem_inf = $row['media_peso_fem_inf'];
} else {
    echo "Erro na consulta de média de peso das alunas em Informática: " . $mysqli->error . "<br>";
}

// Informática - Masculino
if ($result_inf_masc) {
    // Extrair o resultado da consulta
    $row = $result_inf_masc->fetch_assoc();
    $media_peso_masc_inf = $row['media_peso_masc_inf'];
} else {
    echo "Erro na consulta de média de peso dos alunos em Informática: " . $mysqli->error . "<br>";
}

// Comércio - Feminino
if ($result_com_fem) {
    // Extrair o resultado da consulta
    $row = $result_com_fem->fetch_assoc();
    $media_peso_fem_com = $row['media_peso_fem_com'];
} else {
    echo "Erro na consulta de média de peso das alunas em Comércio: " . $mysqli->error . "<br>";
}

// Comércio - Masculino
if ($result_com_masc) {
    // Extrair o resultado da consulta
    $row = $result_com_masc->fetch_assoc();
    $media_peso_masc_com = $row['media_peso_masc_com'];
} else {
    echo "Erro na consulta de média de peso dos alunos em Comércio: " . $mysqli->error . "<br>";
}

// Administração - Feminino
if ($result_adm_fem) {
    // Extrair o resultado da consulta
    $row = $result_adm_fem->fetch_assoc();
    $media_peso_fem_adm = $row['media_peso_fem_adm'];
} else {
    echo "Erro na consulta de média de peso das alunas em Administração: " . $mysqli->error . "<br>";
}

// Administração - Masculino
if ($result_adm_masc) {
    // Extrair o resultado da consulta
    $row = $result_adm_masc->fetch_assoc();
    $media_peso_masc_adm = $row['media_peso_masc_adm'];
} else {
    echo "Erro na consulta de média de peso dos alunos em Administração: " . $mysqli->error . "<br>";
}


// Fechar a conexão
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="grafico_x_peso.css">
    <title>Gráficos</title>

    <!-- Adiciona os ícones da Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


</head>

<body>
    <!-- NavBar -->
    <div class="background-verde">
        <!-- header -->
        <header>
            <!-- nav-container -->

            <div class="nav-container">
                <nav>
                    <!-- Ícone de menu -->
                    <div class="menu-icon">
                        <i class='bx bx-menu'></i>
                    </div>
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
        <!-- Ícone de setinha para fechar o menu -->
        <div class="close-menu-icon"><i class='bx bx-left-arrow-alt'></i></div>
    </section>
    <!-- Fim menu container -->

    <!-- main -->
    <section class="main-container">
        <div class="conteudo">
            <div class="arrow-back">
                <a href="../graficos/grafico.php">
                    <i class='bx bx-arrow-back'></i>
                </a>
            </div>
            <div class="title">
                <h3>Seleção de Gráfico</h3>
                <!-- Seleção de gráficos -->
                <p>Selecione uma das opções de gráfico abaixo para começar, não esqueça também de filtrar algumas
                    informações logo em seguida caso queira uma pesquisa mais precisa.
                </p>
            </div>
            <!-- Graph Selects -->
            <div class="graph-select">
                <!-- Select 1 -->
                <div class="button-select">
                    <button onclick="showGenderChart()">Média de Peso por Gênero</button>
                </div>
                <!-- Select 2 -->
                <div class="button-select">
                    <button onclick="showCourseChart()">Média de Peso por Curso</button>
                </div>
                <!-- Select 3 -->
                <div class="button-select">
                    <button onclick="showGenderCourseChart()">Média de Peso por Gênero e Curso</button>
                </div>
            </div>
            <!-- End Graph Selects -->
            <!-- linha de separação -->
            <hr class="line-menu" id="line-table">
            <!-- Graph-container -->
            <div class="graph-container">
                <style>
                    .graph-container {
                        width: 80%;
                        /* Defina a largura desejada da div */
                        margin: 0 auto;
                        /* Isso centralizará a div horizontalmente */
                        max-width: 800px;
                        /* Defina a largura máxima da div para garantir que ela seja responsiva */
                        /* Adicione estilos adicionais conforme necessário */
                    }
                </style>
                <script type="text/javascript">
                    google.charts.load('current', { 'packages': ['corechart'] });
                    google.charts.setOnLoadCallback(drawGenderChart);
                    google.charts.setOnLoadCallback(drawGenderCourseChart);

                    function drawGenderChart() {
                        var data = google.visualization.arrayToDataTable([
                            ["Gênero", "Média", { role: "style" }],
                            ["Masculino", <?php echo $media_peso_masc ?>, "#b87333"],
                            ["Feminino", <?php echo $media_peso_fem ?>, "silver"]
                        ]);

                        var view = new google.visualization.DataView(data);
                        view.setColumns([0, 1,
                            { calc: "stringify", sourceColumn: 1, type: "string", role: "annotation" },
                            2]);

                        var options = {
                            title: "Média do peso por gênero",
                            width: "100%", // Tornando o gráfico responsivo com largura 100%
                            height: 460,
                            bar: { groupWidth: "95%" },
                            legend: { position: "none" },
                        };

                        var chart = new google.visualization.ColumnChart(document.getElementById("gender_chart"));

                        // Adiciona um evento de redimensionamento para ajustar o gráfico quando o tamanho da janela for alterado
                        google.visualization.events.addListener(chart, 'ready', function () {
                            window.addEventListener('resize', function () {
                                chart.draw(view, options);
                            });
                        });

                        // Desenha o gráfico
                        chart.draw(view, options);
                    }


                    function drawGenderCourseChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Curso', 'Masculino', 'Feminino'],
                            ['Enfermagem', <?php echo $media_peso_masc_enf ?>, <?php echo $media_peso_fem_enf ?>],
                            ['Informática', <?php echo $media_peso_masc_inf ?>, <?php echo $media_peso_fem_inf ?>],
                            ['Comércio', <?php echo $media_peso_masc_com ?>, <?php echo $media_peso_fem_com ?>],
                            ['Administração', <?php echo $media_peso_masc_adm ?>, <?php echo $media_peso_fem_adm ?>]
                        ]);

                        var options = {
                            title: 'Média do peso por gênero e curso',
                            width: "100%", // Tornando o gráfico responsivo com largura 100%
                            height: 460,
                            curveType: 'function',
                            legend: { position: 'Masculino' }
                        };

                        var chart = new google.visualization.LineChart(document.getElementById('gender_course_chart'));

                        // Adiciona um evento de redimensionamento para ajustar o gráfico quando o tamanho da janela for alterado
                        google.visualization.events.addListener(chart, 'ready', function () {
                            window.addEventListener('resize', function () {
                                chart.draw(data, options);
                            });
                        });

                        // Desenha o gráfico
                        chart.draw(data, options);
                    }


                    function drawCourseChart() {
                        var data = google.visualization.arrayToDataTable([
                            ["Curso", "Média", { role: "style" }],
                            ["Enfermagem", <?php echo $media_peso_enf ?>, "#b87333"],
                            ["Informática", <?php echo $media_peso_inf ?>, "silver"],
                            ["Comércio", <?php echo $media_peso_com ?>, "red"],
                            ["Administração", <?php echo $media_peso_adm ?>, "black"],
                        ]);

                        var view = new google.visualization.DataView(data);
                        view.setColumns([0, 1,
                            { calc: "stringify", sourceColumn: 1, type: "string", role: "annotation" },
                            2]);

                        var options = {
                            title: "Média de peso por curso",
                            width: "100%", // Tornando o gráfico responsivo com largura 100%
                            height: 460,
                            bar: { groupWidth: "95%" },
                            legend: { position: "none" },
                        };

                        var chart = new google.visualization.ColumnChart(document.getElementById("course_chart"));

                        // Adiciona um evento de redimensionamento para ajustar o gráfico quando o tamanho da janela for alterado
                        google.visualization.events.addListener(chart, 'ready', function () {
                            window.addEventListener('resize', function () {
                                chart.draw(view, options);
                            });
                        });

                        // Desenha o gráfico
                        chart.draw(view, options);
                    }


                    function showGenderChart() {
                        document.getElementById("gender_chart").style.display = "block";
                        document.getElementById("gender_course_chart").style.display = "none";
                        document.getElementById("course_chart").style.display = "none";
                    }

                    function showGenderCourseChart() {
                        document.getElementById("gender_chart").style.display = "none";
                        document.getElementById("gender_course_chart").style.display = "block";
                        document.getElementById("course_chart").style.display = "none";
                    }

                    function showCourseChart() {
                        drawCourseChart();
                        document.getElementById("gender_chart").style.display = "none";
                        document.getElementById("gender_course_chart").style.display = "none";
                        document.getElementById("course_chart").style.display = "block";
                    }
                </script>
                </head>

                <body>
                    <div id="gender_chart" style="width: 600px; height: 400px; display: none;"></div>
                    <div id="gender_course_chart" style="width: 600px; height: 400px; display: none;"></div>
                    <div id="course_chart" style="width: 600px; height: 400px; display: none;"></div>
                </body>
            </div>
            <!-- End Graph-container -->

    </section>
    <!-- end main -->

    <script src="graficos.js"></script>
    <script src="../painel/menu.js"></script>