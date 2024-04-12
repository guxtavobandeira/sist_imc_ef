<?php
include ('conexao.php');
include ('protect.php');

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos obrigatórios foram preenchidos
    $campos_obrigatorios = ['nome', 'peso', 'altura', 'curso', 'serie', 'genero', 'datadnasc', 'cadastro'];
    $campos_vazios = [];
    foreach ($campos_obrigatorios as $campo) {
        if (!isset ($_POST[$campo]) || empty ($_POST[$campo])) {
            $campos_vazios[] = $campo;
        }
    }

    // Se houver campos obrigatórios vazios, exibe uma mensagem de erro
    if (!empty ($campos_vazios)) {
        $mensagem_erro = "Os seguintes campos são obrigatórios e não foram preenchidos: " . implode(', ', $campos_vazios);
        echo "<p>$mensagem_erro</p>";
    } else if (isset ($_POST['nome']) && isset ($_POST['peso']) && isset ($_POST['altura']) && isset ($_POST['curso']) && isset ($_POST['serie']) && isset ($_POST['genero']) && isset ($_POST['datadnasc']) && isset ($_POST['cadastro'])) {

        $nome = $_POST['nome'];
        $altura = $_POST['altura'];
        $peso = $_POST['peso'];
        $curso = $_POST['curso'];
        $serie = $_POST['serie'];
        $genero = $_POST['genero'];
        $circunf = $_POST['circunf'];
        $nascimento = $_POST['datadnasc'];
        $cadastro = $_POST['cadastro'];

        if (!is_numeric($_POST['peso']) || !is_numeric($_POST['altura'])) {
            echo "<p>O peso e a altura devem ser valores numéricos.</p>";
        } else {
            $altura = $_POST['altura'];
            $peso = $_POST['peso'];
            $circunf = $_POST['circunf'];

            // Calcula o IMC
            $imc = $peso / ($altura * $altura);
            if ($imc <= 18.5) {
                $result_imc = 'Magreza';
            } else if ($imc > 18.5 && $imc < 24.9) {
                $result_imc = 'Normal';
            } else if ($imc >= 24.9 && $imc < 29.9) {
                $result_imc = 'Sobrepeso';
            } else if ($imc >= 29.9 && $imc < 34.9) {
                $result_imc = 'Obesidade grau I';
            } else if ($imc >= 34.9 && $imc < 39.9) {
                $result_imc = 'Obesidade grau II';
            } else {
                $result_imc = 'Obesidade grau III';
            }
            // Calcula o IAC
            $iac = ($circunf / ($altura * sqrt($altura))) - 18;
            if ($genero == 'Feminino') {
                if ($iac < 16) {
                    $result_iac = 'Gordura muito baixa';
                } else if ($iac >= 16 && $iac < 20) {
                    $result_iac = 'Gordura baixa';
                } else if ($iac >= 20 && $iac < 26) {
                    $result_iac = 'Gordura ideal';
                } else if ($iac >= 26 && $iac < 30) {
                    $result_iac = 'Gordura moderada';
                } else {
                    $result_iac = 'Excesso de gordura';
                }
            } else {
                if ($iac < 11) {
                    $result_iac = 'Gordura muito baixa';
                } else if ($iac >= 11 && $iac < 15) {
                    $result_iac = 'Gordura baixa';
                } else if ($iac >= 15 && $iac < 19) {
                    $result_iac = 'Gordura ideal';
                } else if ($iac >= 19 && $iac < 25) {
                    $result_iac = 'Gordura moderada';
                } else {
                    $result_iac = 'Excesso de gordura';
                }
            }

            // Prevenir SQL Injection usando prepared statements
            $stmt = $mysqli->prepare("INSERT INTO alunos (nome_aluno, peso_aluno, altura_aluno, curso_aluno, sala_aluno, genero_aluno, datanasc_aluno, datacadas_aluno, cir_quadril_aluno, imc_aluno, iac_aluno, resultado_imc, resultado_iac) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sddsssssdddss", $nome, $peso, $altura, $curso, $serie, $genero, $nascimento, $cadastro, $circunf, $imc, $iac, $result_imc, $result_iac);
            $stmt->execute();
            $stmt->close();
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add.css">
    <title>Adicionar dados</title>

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
            <button><a href="#"><i class='bx bx-user'></i> Perfil</a></button>
            <button><a href="add.php"><i class='bx bx-plus'></i> Adicionar Dados</a></button>
            <button><a href="#"><i class='bx bx-trash'></i> Deletar Dados</a></button>
            <button><a href="#"><i class='bx bx-edit'></i> Editar Dados</a></button>
            <button><a href="#"><i class='bx bx-chart'></i> Gráficos</a></button>
            <button><a href="#"><i class='bx bx-table'></i> Tabelas</a></button>
            <button><a href="#"><i class='bx bx-cog'></i> Configurações</a></button>
            <button><a href="inicio.html"><span id="sair"><i class='bx bx-log-out'></i>Sair</span></a></button>
        </div>
        <!-- end botões lst -->
    </section>
    <!-- Fim menu container -->

    <!-- main -->
    <section class="main-container">
        <form method="post" action=""
            onsubmit="return substituirVirgulaPorPonto('pesoinput') && substituirVirgulaPorPonto('alturainput') && substituirVirgulaPorPonto('circunferenciainput') ">
            <div class="form-first">
                <div class="dados-alunos">
                    <span class="title">Dados do Aluno</span>

                    <div class="fields">
                        <div class="input-field">
                            <label for="text">Nome completo</label>
                            <input type="text" name="nome" id="nomeinput" placeholder="Nome completo">
                        </div>

                        <div class="input-field">
                            <label for="text">Série</label>
                            <label for="opcoes_s">
                                <select name="serie" id="opcoes_s">
                                    <option value="" disabled selected hidden>Selecione uma opção</option>
                                    <option value="1">1º ano</option>
                                    <option value="2">2º ano</option>
                                    <option value="3">3º ano</option>
                                </select>
                            </label>
                        </div>
                        <div class="input-field">
                            <label for="text">Curso</label>
                            <label for="opcoes_c">
                                <select name="curso" id="opcoes_c">
                                    <option value="" disabled selected hidden>Selecione uma opção</option>
                                    <option value="Enfermagem">Enfermagem</option>
                                    <option value="Informática">Informática</option>
                                    <option value="Comércio">Comércio</option>
                                    <option value="Administração">Administração</option>
                                </select>
                            </label>
                        </div>
                        <div class="input-field">
                            <label for="text">Gênero</label>
                            <label for="opcoes_g">
                                <select name="genero" id="opcoes_g">
                                    <option value="" disabled selected hidden>Selecione uma opção</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino">Feminino</option>
                                </select>
                            </label>
                        </div>
                        <div class="input-field">
                            <label for="text">Data de nascimento</label>
                            <input type="date" name="datadnasc" placeholder="Informe seu nascimento">
                        </div>
                        <div class="input-field">
                            <label name="cadastro" for="text">Data de cadastro</label>
                            <input type="date" name="cadastro">
                        </div>
                        <div class="input-field">
                            <label for="text">Peso</label>
                            <input type="text" name="peso" id="pesoinput" placeholder="Digite o peso(kg)" maxlength="6"
                                min="0" step="1">
                        </div>
                        <div class="input-field">
                            <label for="text">Altura</label>
                            <input type="text" name="altura" id="alturainput" placeholder="Digite a altura(m)"
                                maxlength="4" min="0" step="1">
                        </div>
                        <div class="input-field">
                            <label for="text">Circunferência do Quadril</label>
                            <input type="text" name="circunf" id="circunferenciainput" placeholder="Circunferência (cm)"
                                maxlength="3" min="0" step="1"><br>
                        </div>
                    </div>
                    <hr class="line-menu">
                    <button type="submit">Cadastrar</button>
                </div>
            </div>
        </form>
    </section>
    <!-- end main -->



    <script>
        // Função para validar apenas letras no campo de nome
        function validarNome(event) {
            var inputNome = event.target;
            inputNome.value = inputNome.value.replace(/[^a-zA-ZÀ-ÿ\s]/g, '');
        }

        // Seleciona o input de nome
        var inputNome = document.getElementById('nomeinput');

        // Adiciona um listener para o evento de digitar
        inputNome.addEventListener('input', validarNome);
        // Função para substituir vírgulas por pontos
        function substituirVirgulaPorPonto(inputId) {
            var input = document.getElementById(inputId);
            input.value = input.value.replace(/,/g, '.');
            return true;
        }

        // Seleciona o input de peso
        var inputPeso = document.getElementById('pesoinput');

        // Adiciona um listener para o evento de digitar
        inputPeso.addEventListener('input', function (event) {
            var valorAtual = event.target.value.replace(/\D/g, ''); // Remove tudo que não é número

            if (valorAtual.length == 4) {
                // Insere um ponto após o segundo número
                valorAtual = valorAtual.replace(/^(\d{2})(\d+)/, '$1.$2');

            }
            else if (valorAtual.length == 5) {
                // Insere um ponto após o terceiro número
                valorAtual = valorAtual.replace(/^(\d{3})(\d+)/, '$1.$2');

            }
            // Atualiza o valor no campo de entrada
            event.target.value = valorAtual;
        });

        //seleciona o valor altura
        var inputAltura = document.getElementById('alturainput');

        // Adiciona um listener para o evento de digitar
        inputAltura.addEventListener('input', function (event) {
            var valorAtual = event.target.value.replace(/\D/g, ''); // Remove tudo que não é número

            if (valorAtual.length > 1) {
                // Insere um ponto após o primeiro número
                valorAtual = valorAtual.replace(/^(\d{1})(\d+)/, '$1.$2');
            }

            // Atualiza o valor no campo de entrada
            event.target.value = valorAtual;
        });

    </script>


</body>

</html>
