<?php
// Incluir o arquivo de conexão
include('../../conexao.php');
include('../../protect.php');
// Consulta SQL para obter a média de altura dos alunos do sexo feminino
$sql_fem = "SELECT AVG(altura_aluno) AS media_altura_fem FROM alunos WHERE genero_aluno = 'Feminino'";
$result_fem = $mysqli->query($sql_fem);
// Consulta SQL para obter a média de altura dos alunos do sexo masculino
$sql_masc = "SELECT AVG(altura_aluno) AS media_altura_masc FROM alunos WHERE genero_aluno = 'Masculino'";
$result_masc = $mysqli->query($sql_masc);


// Verificar se as consultas retornaram resultados

// Feminino
if ($result_fem) {
    // Extrair o resultado da consulta
    $row = $result_fem->fetch_assoc();
    $media_altura_fem = $row['media_altura_fem'];
} else {
    echo "Erro na consulta de média de altura das alunas: " . $mysqli->error . "<br>";
}
// Masculino
if ($result_masc) {
    // Extrair o resultado da consulta
    $row = $result_masc->fetch_assoc();
    $media_altura_masc = $row['media_altura_masc'];
} else {
    echo "Erro na consulta de média de altura das alunos: " . $mysqli->error . "<br>";
}

// Consulta SQL para obter a média de altura dos alunos do curso enfermagem
$sql_enf = "SELECT AVG(altura_aluno) AS media_altura_enf FROM alunos WHERE curso_aluno = 'Enfermagem'";
$result_enf = $mysqli->query($sql_enf);
// Consulta SQL para obter a média de altura dos alunos do curso informática
$sql_inf = "SELECT AVG(altura_aluno) AS media_altura_inf FROM alunos WHERE curso_aluno = 'Informática'";
$result_inf = $mysqli->query($sql_inf);
// Consulta SQL para obter a média de altura dos alunos do curso comercio
$sql_com = "SELECT AVG(altura_aluno) AS media_altura_com FROM alunos WHERE curso_aluno = 'Comércio'";
$result_com = $mysqli->query($sql_com);
// Consulta SQL para obter a média de altura dos alunos do curso adm
$sql_adm = "SELECT AVG(altura_aluno) AS media_altura_adm FROM alunos WHERE curso_aluno = 'Administração'";
$result_adm = $mysqli->query($sql_adm);


// Verificar se as consultas retornaram resultados

// Enfermagem
if ($result_enf) {
    // Extrair o resultado da consulta
    $row = $result_enf->fetch_assoc();
    $media_altura_enf = $row['media_altura_enf'];
} else {
    echo "Erro na consulta de média de altura dos alunos: " . $mysqli->error . "<br>";
}
// infor
if ($result_inf) {
    // Extrair o resultado da consulta
    $row = $result_inf->fetch_assoc();
    $media_altura_inf = $row['media_altura_inf'];
} else {
    echo "Erro na consulta de média de altura dos alunos: " . $mysqli->error . "<br>";
}
// comercio
if ($result_com) {
    // Extrair o resultado da consulta
    $row = $result_com->fetch_assoc();
    $media_altura_com = $row['media_altura_com'];
} else {
    echo "Erro na consulta de média de altura dos alunos: " . $mysqli->error . "<br>";
}
// adm
if ($result_adm) {
    // Extrair o resultado da consulta
    $row = $result_adm->fetch_assoc();
    $media_altura_adm = $row['media_altura_adm'];
} else {
    echo "Erro na consulta de média de altura dos alunos: " . $mysqli->error . "<br>";
}


// Consulta SQL para obter a média de altura dos alunos do sexo feminino para o curso "Enfermagem"
$sql_enf_fem = "SELECT AVG(altura_aluno) AS media_altura_fem_enf FROM alunos WHERE curso_aluno = 'Enfermagem' AND genero_aluno = 'Feminino'";
$result_enf_fem = $mysqli->query($sql_enf_fem);

// Consulta SQL para obter a média de altura dos alunos do sexo masculino para o curso "Enfermagem"
$sql_enf_masc = "SELECT AVG(altura_aluno) AS media_altura_masc_enf FROM alunos WHERE curso_aluno = 'Enfermagem' AND genero_aluno = 'Masculino'";
$result_enf_masc = $mysqli->query($sql_enf_masc);

// Consulta SQL para obter a média de altura dos alunos do sexo feminino para o curso "Informática"
$sql_inf_fem = "SELECT AVG(altura_aluno) AS media_altura_fem_inf FROM alunos WHERE curso_aluno = 'Informática' AND genero_aluno = 'Feminino'";
$result_inf_fem = $mysqli->query($sql_inf_fem);

// Consulta SQL para obter a média de altura dos alunos do sexo masculino para o curso "Informática"
$sql_inf_masc = "SELECT AVG(altura_aluno) AS media_altura_masc_inf FROM alunos WHERE curso_aluno = 'Informática' AND genero_aluno = 'Masculino'";
$result_inf_masc = $mysqli->query($sql_inf_masc);

// Consulta SQL para obter a média de altura dos alunos do sexo feminino para o curso "Comércio"
$sql_com_fem = "SELECT AVG(altura_aluno) AS media_altura_fem_com FROM alunos WHERE curso_aluno = 'Comércio' AND genero_aluno = 'Feminino'";
$result_com_fem = $mysqli->query($sql_com_fem);

// Consulta SQL para obter a média de altura dos alunos do sexo masculino para o curso "Comércio"
$sql_com_masc = "SELECT AVG(altura_aluno) AS media_altura_masc_com FROM alunos WHERE curso_aluno = 'Comércio' AND genero_aluno = 'Masculino'";
$result_com_masc = $mysqli->query($sql_com_masc);

// Consulta SQL para obter a média de altura dos alunos do sexo feminino para o curso "Administração"
$sql_adm_fem = "SELECT AVG(altura_aluno) AS media_altura_fem_adm FROM alunos WHERE curso_aluno = 'Administração' AND genero_aluno = 'Feminino'";
$result_adm_fem = $mysqli->query($sql_adm_fem);

// Consulta SQL para obter a média de altura dos alunos do sexo masculino para o curso "Administração"
$sql_adm_masc = "SELECT AVG(altura_aluno) AS media_altura_masc_adm FROM alunos WHERE curso_aluno = 'Administração' AND genero_aluno = 'Masculino'";
$result_adm_masc = $mysqli->query($sql_adm_masc);

// Verificar se as consultas retornaram resultados

// Enfermagem - Feminino
if ($result_enf_fem) {
    // Extrair o resultado da consulta
    $row = $result_enf_fem->fetch_assoc();
    $media_altura_fem_enf = $row['media_altura_fem_enf'];
} else {
    echo "Erro na consulta de média de altura das alunas em Enfermagem: " . $mysqli->error . "<br>";
}

// Enfermagem - Masculino
if ($result_enf_masc) {
    // Extrair o resultado da consulta
    $row = $result_enf_masc->fetch_assoc();
    $media_altura_masc_enf = $row['media_altura_masc_enf'];
} else {
    echo "Erro na consulta de média de altura dos alunos em Enfermagem: " . $mysqli->error . "<br>";
}
// Informática - Feminino
if ($result_inf_fem) {
    // Extrair o resultado da consulta
    $row = $result_inf_fem->fetch_assoc();
    $media_altura_fem_inf = $row['media_altura_fem_inf'];
} else {
    echo "Erro na consulta de média de altura das alunas em Informática: " . $mysqli->error . "<br>";
}

// Informática - Masculino
if ($result_inf_masc) {
    // Extrair o resultado da consulta
    $row = $result_inf_masc->fetch_assoc();
    $media_altura_masc_inf = $row['media_altura_masc_inf'];
} else {
    echo "Erro na consulta de média de altura dos alunos em Informática: " . $mysqli->error . "<br>";
}

// Comércio - Feminino
if ($result_com_fem) {
    // Extrair o resultado da consulta
    $row = $result_com_fem->fetch_assoc();
    $media_altura_fem_com = $row['media_altura_fem_com'];
} else {
    echo "Erro na consulta de média de altura das alunas em Comércio: " . $mysqli->error . "<br>";
}

// Comércio - Masculino
if ($result_com_masc) {
    // Extrair o resultado da consulta
    $row = $result_com_masc->fetch_assoc();
    $media_altura_masc_com = $row['media_altura_masc_com'];
} else {
    echo "Erro na consulta de média de altura dos alunos em Comércio: " . $mysqli->error . "<br>";
}

// Administração - Feminino
if ($result_adm_fem) {
    // Extrair o resultado da consulta
    $row = $result_adm_fem->fetch_assoc();
    $media_altura_fem_adm = $row['media_altura_fem_adm'];
} else {
    echo "Erro na consulta de média de altura das alunas em Administração: " . $mysqli->error . "<br>";
}

// Administração - Masculino
if ($result_adm_masc) {
    // Extrair o resultado da consulta
    $row = $result_adm_masc->fetch_assoc();
    $media_altura_masc_adm = $row['media_altura_masc_adm'];
} else {
    echo "Erro na consulta de média de altura dos alunos em Administração: " . $mysqli->error . "<br>";
}


// Fechar a conexão
$mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
    
    
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="grafico_x_altura.css">
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
                    <!-- Logo da página -->
                    <div class="logo">EEEPstudio</div>
                    <!-- Lista de links de navegação -->
                    <ul class="ul">
                        <!-- Ícone de casa com link para a página inicial -->
                        <li> <a href="/inicio/inicio.html"> <i class='bx bxs-home'></i> </a> </li>
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
                <i class='bx bx-user'></i>
            </div>
            <div class="text-user">
                <h2>Admin da Silva</h2>
                <h3>ID: 023534</h3>
            </div>
        </div>
        <!-- Fim caixa perfil -->
        <!-- line -->
        <hr class="line-menu">
        <!-- end line -->
        <!-- botões list -->
        <div class="buttons">
        <button><a href="../../perfil/perfil.php"><i class='bx bx-user'></i> Perfil</a></button>
            <button><a href="../../adicionar/add.php"><i class='bx bx-plus'></i> Adicionar Dados</a></button>
            <button><a href="../../graficos/grafico.php"><i class='bx bx-chart'></i> Gráficos</a></button>
            <button><a href="../../tabelas/tabelas.php"><i class='bx bx-table'></i> Tabelas</a></button>
            <button><a href="#"><i class='bx bx-cog'></i> Configurações</a></button>
            <button><a href="../../logout.php"><span><i class='bx bx-log-out'></i>Sair</span></a></button>
          </div>
        <!-- end botões lst -->
    </section>
    <!-- Fim menu container -->

    <!-- main -->
<section class="main-container">
  <div class="conteudo">
    <div class="arrow-back">
      <a href="/painel/graficos/graficos.html">
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
          <button onclick="showGenderChart()">Média de Altura por Gênero</button>
        </div>
        <!-- Select 2 -->
        <div class="button-select">
          <button  onclick="showCourseChart()">Média de Altura por Curso</button>
        </div>
        <!-- Select 3 -->
        <div class="button-select">
          <button onclick="showGenderCourseChart()">Média de Altura por Gênero e Curso</button>
        </div>
      </div>
      <!-- End Graph Selects -->
      <!-- linha de separação -->
      <hr class="line-menu" id="line-table">
      <!-- Graph-container -->
      <div class="graph-container">
      <script type="text/javascript">
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawGenderChart);
        google.charts.setOnLoadCallback(drawGenderCourseChart);

        function drawGenderChart() {
            var data = google.visualization.arrayToDataTable([
                ["Gênero", "Média", { role: "style" }],
                ["Masculino", <?php echo $media_altura_masc ?>, "#b87333"],
                ["Feminino", <?php echo $media_altura_fem ?>, "silver"]
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify", sourceColumn: 1, type: "string", role: "annotation" },
                2]);

            var options = {
                title: "Média das alturas por gênero",
                width: 930,
                height: 460,
                bar: { groupWidth: "95%" },
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("gender_chart"));
            chart.draw(view, options);
        }

        function drawGenderCourseChart() {
            var data = google.visualization.arrayToDataTable([
                ['Curso', 'Masculino', 'Feminino'],
                ['Enfermagem', <?php echo $media_altura_masc_enf ?>, <?php echo $media_altura_fem_enf ?>],
                ['Informática', <?php echo $media_altura_masc_inf ?>, <?php echo $media_altura_fem_inf ?>],
                ['Comércio', <?php echo $media_altura_masc_com ?>, <?php echo $media_altura_fem_com ?>],
                ['Administração', <?php echo $media_altura_masc_adm ?>, <?php echo $media_altura_fem_adm ?>]

            ]);

            var options = {
                title: 'Média das alturas por gênero e curso',
                width: 930,
                height: 460,
                curveType: 'function',
                legend: { position: 'Masculino' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('gender_course_chart'));
            chart.draw(data, options);
        }

        function drawCourseChart() {
            var data = google.visualization.arrayToDataTable([
                ["Curso", "Média", { role: "style" }],
                ["Enfermagem", <?php echo $media_altura_enf ?>, "#b87333"],
                ["Informática", <?php echo $media_altura_inf ?>, "silver"],
                ["Comércio", <?php echo $media_altura_com ?>, "red"],
                ["Administração", <?php echo $media_altura_adm ?>, "black"],
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify", sourceColumn: 1, type: "string", role: "annotation" },
                2]);

            var options = {
                title: "Média de altura por curso",
                width: 730,
                height: 460,
                bar: { groupWidth: "95%" },
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("course_chart"));
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
      </div>
      <!-- End Graph-container -->
      
      <!-- Form de filtragem -->
      <form action="#">
        <div class="form-first">
            <div class="dados-alunos">
                <span class="title">Filtrar Gráfico</span>
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
    <!-- Fim do form de filtragem -->
    
</section>
<!-- end main -->

    <script src="graficos.js"></script>