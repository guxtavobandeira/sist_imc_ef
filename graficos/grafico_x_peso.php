<?php
// Incluir o arquivo de conexão
include('conexao.php');
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
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
                title: "Média das peso por gênero",
                width: 1500,
                height: 750,
                bar: { groupWidth: "95%" },
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("gender_chart"));
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
                title: 'Média das peso por gênero e curso',
                width: 1500,
                height: 750,
                curveType: 'function',
                legend: { position: 'Masculino' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('gender_course_chart'));
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
                width: 1500,
                height: 750,
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
    <button onclick="showGenderChart()">Média de peso por gênero</button>
    <button onclick="showCourseChart()">Média de peso por curso</button>
    <button onclick="showGenderCourseChart()">Média de peso por gênero e curso</button>
    

    <div id="gender_chart" style="width: 600px; height: 400px; display: none;"></div>
    <div id="gender_course_chart" style="width: 600px; height: 400px; display: none;"></div>
    <div id="course_chart" style="width: 600px; height: 400px; display: none;"></div>
</body>
</html>
