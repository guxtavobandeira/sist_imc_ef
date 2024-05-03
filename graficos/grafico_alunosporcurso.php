<?php
// Incluir o arquivo de conexão
include('conexao.php');

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
    echo "Número de alunos em Enfermagem: " . $num_alunos_enfer . "<br>";
} else {
    echo "Erro na consulta de Enfermagem: " . $mysqli->error . "<br>";
}

// Informática
if ($result_inf) {
    // Extrair o resultado da consulta
    $row = $result_inf->fetch_assoc();
    $num_alunos_inf = $row['num_alunos_inf'];
    echo "Número de alunos em Informática: " . $num_alunos_inf . "<br>";
} else {
    echo "Erro na consulta de Informática: " . $mysqli->error . "<br>";
}

// Comércio
if ($result_com) {
    // Extrair o resultado da consulta
    $row = $result_com->fetch_assoc();
    $num_alunos_com = $row['num_alunos_com'];
    echo "Número de alunos em Comércio: " . $num_alunos_com . "<br>";
} else {
    echo "Erro na consulta de Comércio: " . $mysqli->error . "<br>";
}

// Administração
if ($result_adm) {
    // Extrair o resultado da consulta
    $row = $result_adm->fetch_assoc();
    $num_alunos_adm = $row['num_alunos_adm'];
    echo "Número de alunos em Administração: " . $num_alunos_adm . "<br>";
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
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
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
        width: 600,
        height: 400,
        bar: { groupWidth: "95%" },
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
    }
  </script>
  <br>
  <br>
  <br>
  <br>
</body>

</html>
