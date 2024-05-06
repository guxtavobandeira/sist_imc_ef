<?php
include('conexao.php');
include('protect.php');

//enfermagem

// Consulta SQL para obter a quantidade de alunos para o curso de enfermagem e que estão no peso magreza
$sql_enf_magreza = "SELECT curso_aluno, COUNT(*) AS num_alunos_enf_magreza FROM alunos WHERE curso_aluno = 'Enfermagem' AND resultado_imc='Magreza'";
$result_enf_magreza = $mysqli->query($sql_enf_magreza);

// Consulta SQL para obter a quantidade de alunos para o curso de enfermagem e que estão no peso normal
$sql_enf_normal = "SELECT curso_aluno, COUNT(*) AS num_alunos_enf_normal FROM alunos WHERE curso_aluno = 'Enfermagem' AND resultado_imc='Normal'";
$result_enf_normal = $mysqli->query($sql_enf_normal);

// Consulta SQL para obter a quantidade de alunos para o curso de enfermagem e que estão no peso sobrepeso
$sql_enf_sobrepeso = "SELECT curso_aluno, COUNT(*) AS num_alunos_enf_sobrepeso FROM alunos WHERE curso_aluno = 'Enfermagem' AND resultado_imc='Sobrepeso'";
$result_enf_sobrepeso = $mysqli->query($sql_enf_sobrepeso);

// Consulta SQL para obter a quantidade de alunos para o curso de enfermagem e que estão no peso obesidadei
$sql_enf_obesidadei = "SELECT curso_aluno, COUNT(*) AS num_alunos_enf_obesidadei FROM alunos WHERE curso_aluno = 'Enfermagem' AND resultado_imc='Obesidade grau I'";
$result_enf_obesidadei = $mysqli->query($sql_enf_obesidadei);

// Consulta SQL para obter a quantidade de alunos para o curso de enfermagem e que estão no peso obesidadeii
$sql_enf_obesidadeii = "SELECT curso_aluno, COUNT(*) AS num_alunos_enf_obesidadeii FROM alunos WHERE curso_aluno = 'Enfermagem' AND resultado_imc='Obesidade grau II'";
$result_enf_obesidadeii = $mysqli->query($sql_enf_obesidadeii);

// Consulta SQL para obter a quantidade de alunos para o curso de enfermagem e que estão no peso obesidadeiii
$sql_enf_obesidadeiii = "SELECT curso_aluno, COUNT(*) AS num_alunos_enf_obesidadeiii FROM alunos WHERE curso_aluno = 'Enfermagem' AND resultado_imc='Obesidade grau III'";
$result_enf_obesidadeiii = $mysqli->query($sql_enf_obesidadeiii);

//informatica

// Consulta SQL para obter a quantidade de alunos para o curso de informática e que estão no peso magreza
$sql_inf_magreza = "SELECT curso_aluno, COUNT(*) AS num_alunos_inf_magreza FROM alunos WHERE curso_aluno = 'Informática' AND resultado_imc='Magreza'";
$result_inf_magreza = $mysqli->query($sql_inf_magreza);

// Consulta SQL para obter a quantidade de alunos para o curso de informática e que estão no peso normal
$sql_inf_normal = "SELECT curso_aluno, COUNT(*) AS num_alunos_inf_normal FROM alunos WHERE curso_aluno = 'Informática' AND resultado_imc='Normal'";
$result_inf_normal = $mysqli->query($sql_inf_normal);

// Consulta SQL para obter a quantidade de alunos para o curso de informática e que estão no peso sobrepeso
$sql_inf_sobrepeso = "SELECT curso_aluno, COUNT(*) AS num_alunos_inf_sobrepeso FROM alunos WHERE curso_aluno = 'Informática' AND resultado_imc='Sobrepeso'";
$result_inf_sobrepeso = $mysqli->query($sql_inf_sobrepeso);

// Consulta SQL para obter a quantidade de alunos para o curso de informática e que estão no peso obesidadei
$sql_inf_obesidadei = "SELECT curso_aluno, COUNT(*) AS num_alunos_inf_obesidadei FROM alunos WHERE curso_aluno = 'Informática' AND resultado_imc='Obesidade grau I'";
$result_inf_obesidadei = $mysqli->query($sql_inf_obesidadei);

// Consulta SQL para obter a quantidade de alunos para o curso de informática e que estão no peso obesidadeii
$sql_inf_obesidadeii = "SELECT curso_aluno, COUNT(*) AS num_alunos_inf_obesidadeii FROM alunos WHERE curso_aluno = 'Informática' AND resultado_imc='Obesidade grau II'";
$result_inf_obesidadeii = $mysqli->query($sql_inf_obesidadeii);

// Consulta SQL para obter a quantidade de alunos para o curso de informática e que estão no peso obesidadeiii
$sql_inf_obesidadeiii = "SELECT curso_aluno, COUNT(*) AS num_alunos_inf_obesidadeiii FROM alunos WHERE curso_aluno = 'Informática' AND resultado_imc='Obesidade grau III'";
$result_inf_obesidadeiii = $mysqli->query($sql_inf_obesidadeiii);

//comercio

// Consulta SQL para obter a quantidade de alunos para o curso de comércio e que estão no peso magreza
$sql_com_magreza = "SELECT curso_aluno, COUNT(*) AS num_alunos_com_magreza FROM alunos WHERE curso_aluno = 'Comércio' AND resultado_imc='Magreza'";
$result_com_magreza = $mysqli->query($sql_com_magreza);

// Consulta SQL para obter a quantidade de alunos para o curso de comércio e que estão no peso normal
$sql_com_normal = "SELECT curso_aluno, COUNT(*) AS num_alunos_com_normal FROM alunos WHERE curso_aluno = 'Comércio' AND resultado_imc='Normal'";
$result_com_normal = $mysqli->query($sql_com_normal);

// Consulta SQL para obter a quantidade de alunos para o curso de comércio e que estão no peso sobrepeso
$sql_com_sobrepeso = "SELECT curso_aluno, COUNT(*) AS num_alunos_com_sobrepeso FROM alunos WHERE curso_aluno = 'Comércio' AND resultado_imc='Sobrepeso'";
$result_com_sobrepeso = $mysqli->query($sql_com_sobrepeso);

// Consulta SQL para obter a quantidade de alunos para o curso de comércio e que estão no peso obesidadei
$sql_com_obesidadei = "SELECT curso_aluno, COUNT(*) AS num_alunos_com_obesidadei FROM alunos WHERE curso_aluno = 'Comércio' AND resultado_imc='Obesidade grau I'";
$result_com_obesidadei = $mysqli->query($sql_com_obesidadei);

// Consulta SQL para obter a quantidade de alunos para o curso de comércio e que estão no peso obesidadeii
$sql_com_obesidadeii = "SELECT curso_aluno, COUNT(*) AS num_alunos_com_obesidadeii FROM alunos WHERE curso_aluno = 'Comércio' AND resultado_imc='Obesidade grau II'";
$result_com_obesidadeii = $mysqli->query($sql_com_obesidadeii);

// Consulta SQL para obter a quantidade de alunos para o curso de comércio e que estão no peso obesidadeiii
$sql_com_obesidadeiii = "SELECT curso_aluno, COUNT(*) AS num_alunos_com_obesidadeiii FROM alunos WHERE curso_aluno = 'Comércio' AND resultado_imc='Obesidade grau III'";
$result_com_obesidadeiii = $mysqli->query($sql_com_obesidadeiii);

//adm

// Consulta SQL para obter a quantidade de alunos para o curso de administração e que estão no peso magreza
$sql_adm_magreza = "SELECT curso_aluno, COUNT(*) AS num_alunos_adm_magreza FROM alunos WHERE curso_aluno = 'Administração' AND resultado_imc='Magreza'";
$result_adm_magreza = $mysqli->query($sql_adm_magreza);

// Consulta SQL para obter a quantidade de alunos para o curso de administração e que estão no peso normal
$sql_adm_normal = "SELECT curso_aluno, COUNT(*) AS num_alunos_adm_normal FROM alunos WHERE curso_aluno = 'Administração' AND resultado_imc='Normal'";
$result_adm_normal = $mysqli->query($sql_adm_normal);

// Consulta SQL para obter a quantidade de alunos para o curso de administração e que estão no peso sobrepeso
$sql_adm_sobrepeso = "SELECT curso_aluno, COUNT(*) AS num_alunos_adm_sobrepeso FROM alunos WHERE curso_aluno = 'Administração' AND resultado_imc='Sobrepeso'";
$result_adm_sobrepeso = $mysqli->query($sql_adm_sobrepeso);

// Consulta SQL para obter a quantidade de alunos para o curso de administração e que estão no peso obesidadei
$sql_adm_obesidadei = "SELECT curso_aluno, COUNT(*) AS num_alunos_adm_obesidadei FROM alunos WHERE curso_aluno = 'Administração' AND resultado_imc='Obesidade grau I'";
$result_adm_obesidadei = $mysqli->query($sql_adm_obesidadei);

// Consulta SQL para obter a quantidade de alunos para o curso de administração e que estão no peso obesidadeii
$sql_adm_obesidadeii = "SELECT curso_aluno, COUNT(*) AS num_alunos_adm_obesidadeii FROM alunos WHERE curso_aluno = 'Administração' AND resultado_imc='Obesidade grau II'";
$result_adm_obesidadeii = $mysqli->query($sql_adm_obesidadeii);

// Consulta SQL para obter a quantidade de alunos para o curso de administração e que estão no peso obesidadeiii
$sql_adm_obesidadeiii = "SELECT curso_aluno, COUNT(*) AS num_alunos_adm_obesidadeiii FROM alunos WHERE curso_aluno = 'Administração' AND resultado_imc='Obesidade grau III'";
$result_adm_obesidadeiii = $mysqli->query($sql_adm_obesidadeiii);


//extração de resultados


// Enfermagem magreza
if ($result_enf_magreza) {
  // Extrair o resultado da consulta
  $row = $result_enf_magreza->fetch_assoc();
  $num_alunos_enf_magreza = $row['num_alunos_enf_magreza'];
} else {
  echo "Erro na consulta de Enfermagem magreza: " . $mysqli->error . "<br>";
}
// Enfermagem normal
if ($result_enf_normal) {
  // Extrair o resultado da consulta
  $row = $result_enf_normal->fetch_assoc();
  $num_alunos_enf_normal = $row['num_alunos_enf_normal'];
} else {
  echo "Erro na consulta de Enfermagem normal: " . $mysqli->error . "<br>";
}
// Enfermagem sobrepeso
if ($result_enf_sobrepeso) {
  // Extrair o resultado da consulta
  $row = $result_enf_sobrepeso->fetch_assoc();
  $num_alunos_enf_sobrepeso = $row['num_alunos_enf_sobrepeso'];
} else {
  echo "Erro na consulta de Enfermagem - Sobrepeso: " . $mysqli->error . "<br>";
}
// Enfermagem obesidadei
if ($result_enf_obesidadei) {
  // Extrair o resultado da consulta
  $row = $result_enf_obesidadei->fetch_assoc();
  $num_alunos_enf_obesidadei = $row['num_alunos_enf_obesidadei'];
} else {
  echo "Erro na consulta de Enfermagem - obesidadei: " . $mysqli->error . "<br>";
}
// Enfermagem obesidadeii
if ($result_enf_obesidadeii) {
  // Extrair o resultado da consulta
  $row = $result_enf_obesidadeii->fetch_assoc();
  $num_alunos_enf_obesidadeii = $row['num_alunos_enf_obesidadeii'];
} else {
  echo "Erro na consulta de Enfermagem - obesidadeii: " . $mysqli->error . "<br>";
}
// Enfermagem obesidadeiii
if ($result_enf_obesidadeiii) {
  // Extrair o resultado da consulta
  $row = $result_enf_obesidadeiii->fetch_assoc();
  $num_alunos_enf_obesidadeiii = $row['num_alunos_enf_obesidadeiii'];
} else {
  echo "Erro na consulta de Enfermagem - obesidadeiii: " . $mysqli->error . "<br>";
}
// Informática magreza
if ($result_inf_magreza) {
  // Extrair o resultado da consulta
  $row = $result_inf_magreza->fetch_assoc();
  $num_alunos_inf_magreza = $row['num_alunos_inf_magreza'];
} else {
  echo "Erro na consulta de Informática - Magreza: " . $mysqli->error . "<br>";
}
// Informática normal
if ($result_inf_normal) {
  // Extrair o resultado da consulta
  $row = $result_inf_normal->fetch_assoc();
  $num_alunos_inf_normal = $row['num_alunos_inf_normal'];
} else {
  echo "Erro na consulta de Informática - Normal: " . $mysqli->error . "<br>";
}
// Informática sobrepeso
if ($result_inf_sobrepeso) {
  // Extrair o resultado da consulta
  $row = $result_inf_sobrepeso->fetch_assoc();
  $num_alunos_inf_sobrepeso = $row['num_alunos_inf_sobrepeso'];
} else {
  echo "Erro na consulta de Informática - Sobrepeso: " . $mysqli->error . "<br>";
}
// Informática obesidadei
if ($result_inf_obesidadei) {
  // Extrair o resultado da consulta
  $row = $result_inf_obesidadei->fetch_assoc();
  $num_alunos_inf_obesidadei = $row['num_alunos_inf_obesidadei'];
} else {
  echo "Erro na consulta de Informática - Obesidade grau I: " . $mysqli->error . "<br>";
}
// Informática obesidadeii
if ($result_inf_obesidadeii) {
  // Extrair o resultado da consulta
  $row = $result_inf_obesidadeii->fetch_assoc();
  $num_alunos_inf_obesidadeii = $row['num_alunos_inf_obesidadeii'];
} else {
  echo "Erro na consulta de Informática - Obesidade grau II: " . $mysqli->error . "<br>";
}
// Informática obesidadeiii
if ($result_inf_obesidadeiii) {
  // Extrair o resultado da consulta
  $row = $result_inf_obesidadeiii->fetch_assoc();
  $num_alunos_inf_obesidadeiii = $row['num_alunos_inf_obesidadeiii'];
} else {
  echo "Erro na consulta de Informática - Obesidade grau III: " . $mysqli->error . "<br>";
}
// Comércio magreza
if ($result_com_magreza) {
  // Extrair o resultado da consulta
  $row = $result_com_magreza->fetch_assoc();
  $num_alunos_com_magreza = $row['num_alunos_com_magreza'];
} else {
  echo "Erro na consulta de Comércio - Magreza: " . $mysqli->error . "<br>";
}
// Comércio normal
if ($result_com_normal) {
  // Extrair o resultado da consulta
  $row = $result_com_normal->fetch_assoc();
  $num_alunos_com_normal = $row['num_alunos_com_normal'];
} else {
  echo "Erro na consulta de Comércio - Normal: " . $mysqli->error . "<br>";
}
// Comércio sobrepeso
if ($result_com_sobrepeso) {
  // Extrair o resultado da consulta
  $row = $result_com_sobrepeso->fetch_assoc();
  $num_alunos_com_sobrepeso = $row['num_alunos_com_sobrepeso'];
} else {
  echo "Erro na consulta de Comércio - Sobrepeso: " . $mysqli->error . "<br>";
}
// Comércio obesidadei
if ($result_com_obesidadei) {
  // Extrair o resultado da consulta
  $row = $result_com_obesidadei->fetch_assoc();
  $num_alunos_com_obesidadei = $row['num_alunos_com_obesidadei'];
} else {
  echo "Erro na consulta de Comércio - Obesidade grau I: " . $mysqli->error . "<br>";
}
// Comércio obesidadeii
if ($result_com_obesidadeii) {
  // Extrair o resultado da consulta
  $row = $result_com_obesidadeii->fetch_assoc();
  $num_alunos_com_obesidadeii = $row['num_alunos_com_obesidadeii'];
} else {
  echo "Erro na consulta de Comércio - Obesidade grau II: " . $mysqli->error . "<br>";
}
// Comércio obesidadeiii
if ($result_com_obesidadeiii) {
  // Extrair o resultado da consulta
  $row = $result_com_obesidadeiii->fetch_assoc();
  $num_alunos_com_obesidadeiii = $row['num_alunos_com_obesidadeiii'];
} else {
  echo "Erro na consulta de Comércio - Obesidade grau III: " . $mysqli->error . "<br>";
}

// Administração magreza
if ($result_adm_magreza) {
  // Extrair o resultado da consulta
  $row = $result_adm_magreza->fetch_assoc();
  $num_alunos_adm_magreza = $row['num_alunos_adm_magreza'];
} else {
  echo "Erro na consulta de Administração - Magreza: " . $mysqli->error . "<br>";
}
// Administração normal
if ($result_adm_normal) {
  // Extrair o resultado da consulta
  $row = $result_adm_normal->fetch_assoc();
  $num_alunos_adm_normal = $row['num_alunos_adm_normal'];
} else {
  echo "Erro na consulta de Administração - Normal: " . $mysqli->error . "<br>";
}
// Administração sobrepeso
if ($result_adm_sobrepeso) {
  // Extrair o resultado da consulta
  $row = $result_adm_sobrepeso->fetch_assoc();
  $num_alunos_adm_sobrepeso = $row['num_alunos_adm_sobrepeso'];
} else {
  echo "Erro na consulta de Administração - Sobrepeso: " . $mysqli->error . "<br>";
}
// Administração obesidadei
if ($result_adm_obesidadei) {
  // Extrair o resultado da consulta
  $row = $result_adm_obesidadei->fetch_assoc();
  $num_alunos_adm_obesidadei = $row['num_alunos_adm_obesidadei'];
} else {
  echo "Erro na consulta de Administração - Obesidade grau I: " . $mysqli->error . "<br>";
}
// Administração obesidadeii
if ($result_adm_obesidadeii) {
  // Extrair o resultado da consulta
  $row = $result_adm_obesidadeii->fetch_assoc();
  $num_alunos_adm_obesidadeii = $row['num_alunos_adm_obesidadeii'];
} else {
  echo "Erro na consulta de Administração - Obesidade grau II: " . $mysqli->error . "<br>";
}
// Administração obesidadeiii
if ($result_adm_obesidadeiii) {
  // Extrair o resultado da consulta
  $row = $result_adm_obesidadeiii->fetch_assoc();
  $num_alunos_adm_obesidadeiii = $row['num_alunos_adm_obesidadeiii'];
} else {
  echo "Erro na consulta de Administração - Obesidade grau III: " . $mysqli->error . "<br>";
}



?>
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});

        function drawVisualization() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['Curso', 'Magreza', 'Normal', 'Sobrepeso', 'Obesidade grau I', 'Obesidade grau II', 'Obesidade grau III'],
                ['Enfermagem',  <?php echo $num_alunos_enf_magreza?>,      <?php echo $num_alunos_enf_normal?>,         <?php echo $num_alunos_enf_sobrepeso?>,             <?php echo $num_alunos_enf_obesidadei?>,           <?php echo $num_alunos_enf_obesidadeii?>,      <?php echo $num_alunos_enf_obesidadeiii?>],
                ['Informática',  <?php echo $num_alunos_inf_magreza?>,      <?php echo $num_alunos_inf_normal?>,         <?php echo $num_alunos_inf_sobrepeso?>,             <?php echo $num_alunos_inf_obesidadei?>,           <?php echo $num_alunos_inf_obesidadeii?>,      <?php echo $num_alunos_inf_obesidadeiii?>],
                ['Comércio',  <?php echo $num_alunos_com_magreza?>,      <?php echo $num_alunos_com_normal?>,         <?php echo $num_alunos_com_sobrepeso?>,             <?php echo $num_alunos_com_obesidadei?>,           <?php echo $num_alunos_com_obesidadeii?>,      <?php echo $num_alunos_com_obesidadeiii?>],
                ['Administração',  <?php echo $num_alunos_adm_magreza?>,      <?php echo $num_alunos_adm_normal?>,         <?php echo $num_alunos_adm_sobrepeso?>,             <?php echo $num_alunos_adm_obesidadei?>,           <?php echo $num_alunos_adm_obesidadeii?>,      <?php echo $num_alunos_adm_obesidadeiii?>]
            ]);

            var options = {
                title : 'Resultados IMC',
                width: 1500,
                height: 750,
                vAxis: {title: 'Resultados'},
                hAxis: {title: 'Curso'},
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }

        function mostrarGrafico() {
            drawVisualization();
        }
    </script>
</head>
<body>
    <button onclick="mostrarGrafico()">Mostrar Gráfico</button>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
</body>
</html>

