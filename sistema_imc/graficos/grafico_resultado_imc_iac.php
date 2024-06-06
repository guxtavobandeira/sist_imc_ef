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


//calculos imc

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

//calculos iac

//enfermagem 

// Consulta SQL para obter a quantidade de alunos para o curso de enfermagem e que estão com gordura muito baixa
$sql_enf_mtobaixa = "SELECT curso_aluno, COUNT(*) AS num_alunos_enf_mtobaixa FROM alunos WHERE curso_aluno = 'Enfermagem' AND resultado_iac='Gordura muito baixa'";
$result_enf_mtobaixa = $mysqli->query($sql_enf_mtobaixa);

// Consulta SQL para obter a quantidade de alunos para o curso de enfermagem e que estão com gordura baixa
$sql_enf_baixa = "SELECT curso_aluno, COUNT(*) AS num_alunos_enf_baixa FROM alunos WHERE curso_aluno = 'Enfermagem' AND resultado_iac='Gordura baixa'";
$result_enf_baixa = $mysqli->query($sql_enf_baixa);

// Consulta SQL para obter a quantidade de alunos para o curso de enfermagem e que estão com gordura baixa
$sql_enf_ideal = "SELECT curso_aluno, COUNT(*) AS num_alunos_enf_ideal FROM alunos WHERE curso_aluno = 'Enfermagem' AND resultado_iac='Gordura ideal'";
$result_enf_ideal = $mysqli->query($sql_enf_ideal);

// Consulta SQL para obter a quantidade de alunos para o curso de enfermagem e que estão com gordura moderada
$sql_enf_moderada = "SELECT curso_aluno, COUNT(*) AS num_alunos_enf_moderada FROM alunos WHERE curso_aluno = 'Enfermagem' AND resultado_iac='Gordura moderada'";
$result_enf_moderada = $mysqli->query($sql_enf_moderada);

// Consulta SQL para obter a quantidade de alunos para o curso de enfermagem e que estão com gordura excesso de gordura
$sql_enf_eg = "SELECT curso_aluno, COUNT(*) AS num_alunos_enf_eg FROM alunos WHERE curso_aluno = 'Enfermagem' AND resultado_iac='Excesso de gordura'";
$result_enf_eg = $mysqli->query($sql_enf_eg);

//informatica

// Consulta SQL para obter a quantidade de alunos para o curso de informática e que estão com gordura muito baixa
$sql_inf_mtobaixa = "SELECT curso_aluno, COUNT(*) AS num_alunos_inf_mtobaixa FROM alunos WHERE curso_aluno = 'Informática' AND resultado_iac='Gordura muito baixa'";
$result_inf_mtobaixa = $mysqli->query($sql_inf_mtobaixa);

// Consulta SQL para obter a quantidade de alunos para o curso de informática e que estão com gordura baixa
$sql_inf_baixa = "SELECT curso_aluno, COUNT(*) AS num_alunos_inf_baixa FROM alunos WHERE curso_aluno = 'Informática' AND resultado_iac='Gordura baixa'";
$result_inf_baixa = $mysqli->query($sql_inf_baixa);

// Consulta SQL para obter a quantidade de alunos para o curso de informática e que estão com gordura ideal
$sql_inf_ideal = "SELECT curso_aluno, COUNT(*) AS num_alunos_inf_ideal FROM alunos WHERE curso_aluno = 'Informática' AND resultado_iac='Gordura ideal'";
$result_inf_ideal = $mysqli->query($sql_inf_ideal);

// Consulta SQL para obter a quantidade de alunos para o curso de informática e que estão com gordura moderada
$sql_inf_moderada = "SELECT curso_aluno, COUNT(*) AS num_alunos_inf_moderada FROM alunos WHERE curso_aluno = 'Informática' AND resultado_iac='Gordura moderada'";
$result_inf_moderada = $mysqli->query($sql_inf_moderada);

// Consulta SQL para obter a quantidade de alunos para o curso de informática e que estão com excesso de gordura
$sql_inf_eg = "SELECT curso_aluno, COUNT(*) AS num_alunos_inf_eg FROM alunos WHERE curso_aluno = 'Informática' AND resultado_iac='Excesso de gordura'";
$result_inf_eg = $mysqli->query($sql_inf_eg);

//comercio

// Consulta SQL para obter a quantidade de alunos para o curso de comércio e que estão com gordura muito baixa
$sql_com_mtobaixa = "SELECT curso_aluno, COUNT(*) AS num_alunos_com_mtobaixa FROM alunos WHERE curso_aluno = 'Comércio' AND resultado_iac='Gordura muito baixa'";
$result_com_mtobaixa = $mysqli->query($sql_com_mtobaixa);

// Consulta SQL para obter a quantidade de alunos para o curso de comércio e que estão com gordura baixa
$sql_com_baixa = "SELECT curso_aluno, COUNT(*) AS num_alunos_com_baixa FROM alunos WHERE curso_aluno = 'Comércio' AND resultado_iac='Gordura baixa'";
$result_com_baixa = $mysqli->query($sql_com_baixa);

// Consulta SQL para obter a quantidade de alunos para o curso de comércio e que estão com gordura ideal
$sql_com_ideal = "SELECT curso_aluno, COUNT(*) AS num_alunos_com_ideal FROM alunos WHERE curso_aluno = 'Comércio' AND resultado_iac='Gordura ideal'";
$result_com_ideal = $mysqli->query($sql_com_ideal);

// Consulta SQL para obter a quantidade de alunos para o curso de comércio e que estão com gordura moderada
$sql_com_moderada = "SELECT curso_aluno, COUNT(*) AS num_alunos_com_moderada FROM alunos WHERE curso_aluno = 'Comércio' AND resultado_iac='Gordura moderada'";
$result_com_moderada = $mysqli->query($sql_com_moderada);

// Consulta SQL para obter a quantidade de alunos para o curso de comércio e que estão com excesso de gordura
$sql_com_eg = "SELECT curso_aluno, COUNT(*) AS num_alunos_com_eg FROM alunos WHERE curso_aluno = 'Comércio' AND resultado_iac='Excesso de gordura'";
$result_com_eg = $mysqli->query($sql_com_eg);

//administração

// Consulta SQL para obter a quantidade de alunos para o curso de administração e que estão com gordura muito baixa
$sql_adm_mtobaixa = "SELECT curso_aluno, COUNT(*) AS num_alunos_adm_mtobaixa FROM alunos WHERE curso_aluno = 'Administração' AND resultado_iac='Gordura muito baixa'";
$result_adm_mtobaixa = $mysqli->query($sql_adm_mtobaixa);

// Consulta SQL para obter a quantidade de alunos para o curso de administração e que estão com gordura baixa
$sql_adm_baixa = "SELECT curso_aluno, COUNT(*) AS num_alunos_adm_baixa FROM alunos WHERE curso_aluno = 'Administração' AND resultado_iac='Gordura baixa'";
$result_adm_baixa = $mysqli->query($sql_adm_baixa);

// Consulta SQL para obter a quantidade de alunos para o curso de administração e que estão com gordura ideal
$sql_adm_ideal = "SELECT curso_aluno, COUNT(*) AS num_alunos_adm_ideal FROM alunos WHERE curso_aluno = 'Administração' AND resultado_iac='Gordura ideal'";
$result_adm_ideal = $mysqli->query($sql_adm_ideal);

// Consulta SQL para obter a quantidade de alunos para o curso de administração e que estão com gordura moderada
$sql_adm_moderada = "SELECT curso_aluno, COUNT(*) AS num_alunos_adm_moderada FROM alunos WHERE curso_aluno = 'Administração' AND resultado_iac='Gordura moderada'";
$result_adm_moderada = $mysqli->query($sql_adm_moderada);

// Consulta SQL para obter a quantidade de alunos para o curso de administração e que estão com excesso de gordura
$sql_adm_eg = "SELECT curso_aluno, COUNT(*) AS num_alunos_adm_eg FROM alunos WHERE curso_aluno = 'Administração' AND resultado_iac='Excesso de gordura'";
$result_adm_eg = $mysqli->query($sql_adm_eg);





//extração de resultados iac

// Enfermagem muito baixa
if ($result_enf_mtobaixa) {
  // Extrair o resultado da consulta
  $row = $result_enf_mtobaixa->fetch_assoc();
  $num_alunos_enf_mtobaixa = $row['num_alunos_enf_mtobaixa'];
} else {
  echo "Erro na consulta de Enfermagem muito baixa: " . $mysqli->error . "<br>";
}
// Enfermagem baixa
if ($result_enf_baixa) {
  // Extrair o resultado da consulta
  $row = $result_enf_baixa->fetch_assoc();
  $num_alunos_enf_baixa = $row['num_alunos_enf_baixa'];
} else {
  echo "Erro na consulta de Enfermagem baixa: " . $mysqli->error . "<br>";
}
// Enfermagem ideal
if ($result_enf_ideal) {
  // Extrair o resultado da consulta
  $row = $result_enf_ideal->fetch_assoc();
  $num_alunos_enf_ideal = $row['num_alunos_enf_ideal'];
} else {
  echo "Erro na consulta de Enfermagem ideal: " . $mysqli->error . "<br>";
}
// Enfermagem moderada
if ($result_enf_moderada) {
  // Extrair o resultado da consulta
  $row = $result_enf_moderada->fetch_assoc();
  $num_alunos_enf_moderada = $row['num_alunos_enf_moderada'];
} else {
  echo "Erro na consulta de Enfermagem moderada: " . $mysqli->error . "<br>";
}
// Enfermagem excesso de gordura
if ($result_enf_eg) {
  // Extrair o resultado da consulta
  $row = $result_enf_eg->fetch_assoc();
  $num_alunos_enf_eg = $row['num_alunos_enf_eg'];
} else {
  echo "Erro na consulta de Enfermagem excesso de gordura: " . $mysqli->error . "<br>";
}

//informatica

// Informática muito baixa
if ($result_inf_mtobaixa) {
  // Extrair o resultado da consulta
  $row = $result_inf_mtobaixa->fetch_assoc();
  $num_alunos_inf_mtobaixa = $row['num_alunos_inf_mtobaixa'];
} else {
  echo "Erro na consulta de Informática muito baixa: " . $mysqli->error . "<br>";
}
// Informática baixa
if ($result_inf_baixa) {
  // Extrair o resultado da consulta
  $row = $result_inf_baixa->fetch_assoc();
  $num_alunos_inf_baixa = $row['num_alunos_inf_baixa'];
} else {
  echo "Erro na consulta de Informática baixa: " . $mysqli->error . "<br>";
}
// Informática ideal
if ($result_inf_ideal) {
  // Extrair o resultado da consulta
  $row = $result_inf_ideal->fetch_assoc();
  $num_alunos_inf_ideal = $row['num_alunos_inf_ideal'];
} else {
  echo "Erro na consulta de Informática ideal: " . $mysqli->error . "<br>";
}
// Informática moderada
if ($result_inf_moderada) {
  // Extrair o resultado da consulta
  $row = $result_inf_moderada->fetch_assoc();
  $num_alunos_inf_moderada = $row['num_alunos_inf_moderada'];
} else {
  echo "Erro na consulta de Informática moderada: " . $mysqli->error . "<br>";
}
// Informática excesso de gordura
if ($result_inf_eg) {
  // Extrair o resultado da consulta
  $row = $result_inf_eg->fetch_assoc();
  $num_alunos_inf_eg = $row['num_alunos_inf_eg'];
} else {
  echo "Erro na consulta de Informática excesso de gordura: " . $mysqli->error . "<br>";
}

//comercio

// Comércio muito baixa
if ($result_com_mtobaixa) {
  // Extrair o resultado da consulta
  $row = $result_com_mtobaixa->fetch_assoc();
  $num_alunos_com_mtobaixa = $row['num_alunos_com_mtobaixa'];
} else {
  echo "Erro na consulta de Comércio muito baixa: " . $mysqli->error . "<br>";
}
// Comércio baixa
if ($result_com_baixa) {
  // Extrair o resultado da consulta
  $row = $result_com_baixa->fetch_assoc();
  $num_alunos_com_baixa = $row['num_alunos_com_baixa'];
} else {
  echo "Erro na consulta de Comércio baixa: " . $mysqli->error . "<br>";
}
// Comércio ideal
if ($result_com_ideal) {
  // Extrair o resultado da consulta
  $row = $result_com_ideal->fetch_assoc();
  $num_alunos_com_ideal = $row['num_alunos_com_ideal'];
} else {
  echo "Erro na consulta de Comércio ideal: " . $mysqli->error . "<br>";
}
// Comércio moderada
if ($result_com_moderada) {
  // Extrair o resultado da consulta
  $row = $result_com_moderada->fetch_assoc();
  $num_alunos_com_moderada = $row['num_alunos_com_moderada'];
} else {
  echo "Erro na consulta de Comércio moderada: " . $mysqli->error . "<br>";
}
// Comércio excesso de gordura
if ($result_com_eg) {
  // Extrair o resultado da consulta
  $row = $result_com_eg->fetch_assoc();
  $num_alunos_com_eg = $row['num_alunos_com_eg'];
} else {
  echo "Erro na consulta de Comércio excesso de gordura: " . $mysqli->error . "<br>";
}

//adm

// Administração muito baixa
if ($result_adm_mtobaixa) {
  // Extrair o resultado da consulta
  $row = $result_adm_mtobaixa->fetch_assoc();
  $num_alunos_adm_mtobaixa = $row['num_alunos_adm_mtobaixa'];
} else {
  echo "Erro na consulta de Administração muito baixa: " . $mysqli->error . "<br>";
}
// Administração baixa
if ($result_adm_baixa) {
  // Extrair o resultado da consulta
  $row = $result_adm_baixa->fetch_assoc();
  $num_alunos_adm_baixa = $row['num_alunos_adm_baixa'];
} else {
  echo "Erro na consulta de Administração baixa: " . $mysqli->error . "<br>";
}
// Administração ideal
if ($result_adm_ideal) {
  // Extrair o resultado da consulta
  $row = $result_adm_ideal->fetch_assoc();
  $num_alunos_adm_ideal = $row['num_alunos_adm_ideal'];
} else {
  echo "Erro na consulta de Administração ideal: " . $mysqli->error . "<br>";
}
// Administração moderada
if ($result_adm_moderada) {
  // Extrair o resultado da consulta
  $row = $result_adm_moderada->fetch_assoc();
  $num_alunos_adm_moderada = $row['num_alunos_adm_moderada'];
} else {
  echo "Erro na consulta de Administração moderada: " . $mysqli->error . "<br>";
}
// Administração excesso de gordura
if ($result_adm_eg) {
  // Extrair o resultado da consulta
  $row = $result_adm_eg->fetch_assoc();
  $num_alunos_adm_eg = $row['num_alunos_adm_eg'];
} else {
  echo "Erro na consulta de Administração excesso de gordura: " . $mysqli->error . "<br>";
}




?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="grafico_resultado_imc_iac.css">
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
          <button onclick="mostrarGraficoImcCurso()">Mostrar Gráfico IMC por Curso</button>
        </div>
        <!-- Select 2 -->
        <div class="button-select">
          <button onclick="mostrarGraficoIacCurso()">Mostrar Gráfico IAC por Curso</button>
        </div>

      </div>
      <!-- End Graph Selects -->
      <!-- linha de separação -->
      <hr class="line-menu" id="line-table">
      <!-- Graph-container -->
      <div class="graph-container">
        <script type="text/javascript">
          google.charts.load('current', { 'packages': ['corechart'] });
          google.charts.load('current', { 'packages': ['corechart'] });

          function drawVisualizationImcCurso() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
              ['Curso', 'Magreza', 'Normal', 'Sobrepeso', 'Obesidade grau I', 'Obesidade grau II', 'Obesidade grau III'],
              ['Enfermagem', <?php echo $num_alunos_enf_magreza ?>,     <?php echo $num_alunos_enf_normal ?>,    <?php echo $num_alunos_enf_sobrepeso ?>,             <?php echo $num_alunos_enf_obesidadei ?>,           <?php echo $num_alunos_enf_obesidadeii ?>,      <?php echo $num_alunos_enf_obesidadeiii ?>],
              ['Informática', <?php echo $num_alunos_inf_magreza ?>,  <?php echo $num_alunos_inf_normal ?>,    <?php echo $num_alunos_inf_sobrepeso ?>,             <?php echo $num_alunos_inf_obesidadei ?>,           <?php echo $num_alunos_inf_obesidadeii ?>,      <?php echo $num_alunos_inf_obesidadeiii ?>],
              ['Comércio', <?php echo $num_alunos_com_magreza ?>,      <?php echo $num_alunos_com_normal ?>,    <?php echo $num_alunos_com_sobrepeso ?>,             <?php echo $num_alunos_com_obesidadei ?>,           <?php echo $num_alunos_com_obesidadeii ?>,      <?php echo $num_alunos_com_obesidadeiii ?>],
              ['Administração', <?php echo $num_alunos_adm_magreza ?>,      <?php echo $num_alunos_adm_normal ?>,    <?php echo $num_alunos_adm_sobrepeso ?>,             <?php echo $num_alunos_adm_obesidadei ?>,           <?php echo $num_alunos_adm_obesidadeii ?>,      <?php echo $num_alunos_adm_obesidadeiii ?>]
            ]);

            var options = {
              title: 'Resultados IMC por curso',
              width: 930,
              height: 460,
              vAxis: { title: 'Resultados IMC' },
              hAxis: { title: 'Curso' },
              seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
          }
          function drawVisualizationIacCurso() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
              ['Curso', 'Gordura muito baixa', 'Gordura baixa', 'Gordura ideal', 'Gordura moderada', 'Excesso de gordura'],
              ['Enfermagem', <?php echo $num_alunos_enf_mtobaixa ?>,      <?php echo $num_alunos_enf_baixa ?>,         <?php echo $num_alunos_enf_ideal ?>,             <?php echo $num_alunos_enf_moderada ?>,           <?php echo $num_alunos_enf_eg ?>],
              ['Informática', <?php echo $num_alunos_inf_mtobaixa ?>,      <?php echo $num_alunos_inf_baixa ?>,         <?php echo $num_alunos_inf_ideal ?>,             <?php echo $num_alunos_inf_moderada ?>,           <?php echo $num_alunos_inf_eg ?>],
              ['Comércio', <?php echo $num_alunos_com_mtobaixa ?>,      <?php echo $num_alunos_com_baixa ?>,         <?php echo $num_alunos_com_ideal ?>,             <?php echo $num_alunos_com_moderada ?>,           <?php echo $num_alunos_com_eg ?>],
              ['Administração', <?php echo $num_alunos_adm_mtobaixa ?>,      <?php echo $num_alunos_adm_baixa ?>,         <?php echo $num_alunos_adm_ideal ?>,             <?php echo $num_alunos_adm_moderada ?>,           <?php echo $num_alunos_adm_eg ?>]
            ]);

            var options = {
              title: 'Resultados IAC por curso',
              width: 930,
              height: 460,
              vAxis: { title: 'Resultados IAC' },
              hAxis: { title: 'Curso' },
              seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
          }


          function mostrarGraficoImcCurso() {
            drawVisualizationImcCurso();
          }
          function mostrarGraficoIacCurso() {
            drawVisualizationIacCurso();
          }
        </script>
        </head>

        <body>
          <div id="chart_div" style="width: 900px; height: 500px;"></div>
        </body>
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
                  <option value="#" disabled selected>Selecione uma opção</option>
                  <option value="all">Todas as séries</option>
                  <option value="1ano">1º Ano</option>
                  <option value="2ano">2º Ano</option>
                  <option value="3ano">3º Ano</option>
                </select>
              </div>
              <div class="input-field">
                <label for="text">Ano de Cadastro</label>
                <select name="curso">
                  <option value="#" disabled selected>Selecione uma opção</option>
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