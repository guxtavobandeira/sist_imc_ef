<?php
// Incluir o arquivo de conexão
include('../../conexao.php');
include('../../protect.php');

// Consulta SQL para obter a quantidade de alunos para o curso "Enfermagem"
$sql_enf = "SELECT curso_aluno, COUNT(*) AS num_alunos_enf FROM alunos WHERE curso_aluno = 'Enfermagem'";
$result_enf = $mysqli->query($sql_enf);

// Consulta SQL para obter a quantidade de alunos para o curso "Informática"
$sql_inf = "SELECT curso_aluno, COUNT(*) AS num_alunos_inf FROM alunos WHERE curso_aluno = 'Informática'";
$result_inf = $mysqli->query($sql_inf);

// Consulta SQL para obter a quantidade de alunos para o curso "Comércio"
$sql_com = "SELECT curso_aluno, COUNT(*) AS num_alunos_com FROM alunos WHERE curso_aluno = 'Comércio'";
$result_com = $mysqli->query($sql_com);

// Consulta SQL para obter a quantidade de alunos para o curso "Administração"
$sql_adm = "SELECT curso_aluno, COUNT(*) AS num_alunos_adm FROM alunos WHERE curso_aluno = 'Administração'";
$result_adm = $mysqli->query($sql_adm);

// Verificar se as consultas retornaram resultados

// Enfermagem
if ($result_enf) {
    // Extrair o resultado da consulta
    $row = $result_enf->fetch_assoc();
    $num_alunos_enfer = $row['num_alunos_enf'];
} else {
    echo "Erro na consulta de Enfermagem: " . $mysqli->error . "<br>";
}

// Informática
if ($result_inf) {
    // Extrair o resultado da consulta
    $row = $result_inf->fetch_assoc();
    $num_alunos_inf = $row['num_alunos_inf'];
} else {
    echo "Erro na consulta de Informática: " . $mysqli->error . "<br>";
}

// Comércio
if ($result_com) {
    // Extrair o resultado da consulta
    $row = $result_com->fetch_assoc();
    $num_alunos_com = $row['num_alunos_com'];
} else {
    echo "Erro na consulta de Comércio: " . $mysqli->error . "<br>";
}

// Administração
if ($result_adm) {
    // Extrair o resultado da consulta
    $row = $result_adm->fetch_assoc();
    $num_alunos_adm = $row['num_alunos_adm'];
} else {
    echo "Erro na consulta de Administração: " . $mysqli->error . "<br>";
}

// Fechar a conexão
$mysqli->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gráfico de Alunos por Curso</title>
  <!-- Biblioteca Google Charts -->
  
</head>

<body>
  
</body>

</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="alunosporcurso.css">
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
        <h3>Gráfico Alunos x Curso</h3>
        <!-- Seleção de gráficos -->
        <p>Selecione uma das opções de gráfico abaixo para começar, não esqueça também de filtrar algumas
          informações logo em seguida caso queira uma pesquisa mais precisa.
        </p>
      </div>
      <!-- linha de separação -->
      <hr class="line-menu" id="line-table">
      <!-- Graph-container -->
      <div class="graph-container">
      <div id="columnchart_values" style="width: 900px; height: 300px;"></div>

<script type="text/javascript">
  google.charts.load("current", { packages: ['corechart'] });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ["Curso", "Número de Alunos", { role: "style" }],
      ["Enfermagem", <?php echo $num_alunos_enfer ?>, "#b87333"],
      ["Informática", <?php echo $num_alunos_inf ?>, "silver"],
      ["Comércio", <?php echo $num_alunos_com ?>, "gold"],
      ["Administração", <?php echo $num_alunos_adm ?>, "color: #e5e4e2"]
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
      {
        calc: "stringify",
        sourceColumn: 1,
        type: "string",
        role: "annotation"
      },
      2]);

    var options = {
      title: "Alunos por Curso",
      width: 930,
      height: 460,
      bar: { groupWidth: "95%" },
      legend: { position: "none" },
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
    chart.draw(view, options);
  }
</script>
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