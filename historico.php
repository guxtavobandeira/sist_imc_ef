<?php

include('conexao.php');
// Consulta ao banco de dados para recuperar os dados dos alunos
$sql = "SELECT * FROM alunos";
$result = $mysqli->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <h2>Tabela de Alunos</h2>

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
        </tr>
    </thead>
    <tbody>
    <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['nome_aluno'] . "</td>";
                echo "<td>" . $row['peso_aluno'] . "</td>";
                echo "<td>" . $row['altura_aluno'] . "</td>";
                echo "<td>" . $row['curso_aluno'] . "</td>";
                echo "<td>" . $row['sala_aluno'] . "</td>";
                echo "<td>" . $row['genero_aluno'] . "</td>";
                echo "<td>" . $row['datanasc_aluno'] . "</td>";
                echo "<td>" . $row['cir_quadril_aluno'] . "</td>";
                echo "<td>" . $row['imc_aluno'] . "</td>";
                echo "<td>" . $row['iac_aluno'] . "</td>";
                echo "<td>" . $row['resultado_imc'] . "</td>";
                echo "<td>" . $row['resultado_iac'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='12'>Nenhum aluno encontrado</td></tr>";
        }
        ?>
    </tbody>
</table>
</body>
</html>
