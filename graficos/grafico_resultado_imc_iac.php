<?php
include('conexao.php');
// Consulta SQL para obter a quantidade de alunos para o curso de enfermagem e que estão no peso normal
$sql_enf = "SELECT curso_aluno, COUNT(*) AS num_alunos_enf_normal FROM alunos WHERE curso_aluno = 'Enfermagem' AND resultado_imc='Normal'";
$result_enf = $mysqli->query($sql_enf);
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Curso', 'Magreza', 'Normal', 'Sobrepeso', 'Obesidade grau I', 'Obesidade grau II', 'Obesidade grau III'],
          ['Enfermagem',  165,      938,         522,             998,           450,      600],
          ['Informática',  135,      1120,        599,             1268,          288,      600],
          ['Comércio',  157,      1167,        587,             807,           397,      600],
          ['Administração',  139,      1110,        615,             968,           215,      600]
        ]);

        var options = {
          title : 'Resultados IMC',
          vAxis: {title: 'Resultados'},
          hAxis: {title: 'Curso'},
          seriesType: 'bars'
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>
