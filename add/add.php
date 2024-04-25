<?php
include ('conexao.php');
include ('protect.php');

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos obrigatórios foram preenchidos
    $campos_obrigatorios = ['nome', 'peso', 'altura', 'curso', 'serie', 'genero', 'datadnasc', 'cadastro'];
    $campos_vazios = [];
    foreach ($campos_obrigatorios as $campo) {
        if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
            $campos_vazios[] = $campo;
        }
    }

    // Se houver campos obrigatórios vazios, exibe uma mensagem de erro
    if (!empty($campos_vazios)) {
        $mensagem_erro = "Os seguintes campos são obrigatórios e não foram preenchidos: " . implode(', ', $campos_vazios);
        echo "<p>$mensagem_erro</p>";
    } else if (isset($_POST['nome']) && isset($_POST['peso']) && isset($_POST['altura']) && isset($_POST['curso']) && isset($_POST['serie']) && isset($_POST['genero']) && isset($_POST['datadnasc']) && isset($_POST['cadastro'])) {

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
            <button><a href="#"><i class='bx bx-chart'></i> Gráficos</a></button>
            <button><a href="tabelas.php"><i class='bx bx-table'></i> Tabelas</a></button>
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
                                maxlength="3" min="0" step="1">
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

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Red+Hat+Display:wght@300;400;700;900&display=swap');

        /* Resetando estilos padrão */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            list-style: none;
        }

        /* Estilos gerais do corpo do documento */
        body {
            font-family: "Poppins", sans-serif;
            background: var(--cinza);

        }

        /* Definição de variáveis de cores */
        :root {
            --verde: rgb(0, 130, 65);
            --amarelo: rgb(255, 200, 5);
            --laranja: #ff7c37;
            --laranja2: #f94600;
            --degrade-btn: linear-gradient(#fe9611, #ff5c00);
            --cinza: #e2e2e2;
            --dkcinza: #333;
        }

        /* Classe para fundo verde */
        .background-verde {
            background: url('/imagens/bk-verde-2.jpg') no-repeat;
            background-position: 98%;
            max-width: 80%;
            /* Adiciona flexbox para alinhar à direita */
            margin-left: auto;
        }


        /* Linha decorativa */
        .line {
            background: linear-gradient(to right, var(--amarelo), var(--laranja2));
            height: 20px;
            width: 100%;
            border: none;
            max-width: 80%;
            /* Adiciona flexbox para alinhar à direita */
            margin-left: auto;

        }

        /* Container Navbar */
        .nav-container {
            max-width: 100%;
            padding: 0 5%;
            margin: 0 auto;
        }

        /* Classe reutilizável para container */
        .container {
            max-width: 1400px;
            padding: 0 5%;
            margin: 0 auto;
        }

        /* Botão com gradiente */
        .btn-gradient {
            padding: 10px 25px;
            color: white;
            background-image: var(--degrade-btn);
            border: none;
            cursor: pointer;
        }

        /* Estilos específicos do cabeçalho */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }

        /* Estilos do logo */
        .logo {
            font-size: 30px;
            font-weight: bold;
            color: white;
        }

        /* Estilos da lista de navegação */
        .ul {
            display: flex;
            align-items: center;
        }

        /* Estilos dos itens da lista de navegação */
        .ul li {
            margin: 0 30px;
            font-size: 15px;
        }

        /* Ícones da lista de navegação */
        .ul li i {
            color: white;
            font-size: 2.5rem;
        }

        /* Efeito de hover nos ícones */
        .ul li i:hover {
            cursor: pointer;
        }

        /* Estilos dos links da lista de navegação */
        .ul li a {
            color: white;
        }

        /* section menu */
        .menu-container {
            background: white;
            width: 20%;
            height: 100vh;
            position: fixed;
            /* Alinha o elemento na lateral esquerda da tela */
            left: 0;
            /* Alinha o elemento com o topo da tela */
            top: 0;
            /* Alinha o elemento com a parte inferior da tela */
            bottom: 0;
            display: flex;
            flex-direction: column;
        }

        /* Caixa perfil */
        .box-profile {
            background: url('/imagens/bk-verde-2.jpg') no-repeat;
            background-position: 78%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100%;
        }

        .profile-img {
            height: 90px;
            width: 90px;
            background-color: #e2e2e2;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 5px var(--amarelo) solid;
            margin-top: 20px;
        }

        .profile-img i {
            font-size: 50px;
        }

        .text-user {
            color: white;
            margin-top: 10px;
            margin-left: 5px;
            margin-right: 5px;
            text-align: center;
        }

        /* Fim Caixa perfil */
        /* Linha menu */
        .line-menu {
            background: linear-gradient(to right, var(--laranja2), var(--amarelo), var(--laranja2));
            height: 5px;
            width: 100%;
            border: none;
            /* Adiciona flexbox para alinhar à direita */
            margin-left: auto;
        }

        /* fim linha menu */
        /* Menu botões */
        .buttons {
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .buttons button {
            height: 40px;
            border: none;
            cursor: pointer;
            background: transparent;
            /* Ajuste na posição do conteúdo para não estar centralizado verticalmente */
            display: flex;
            align-items: center;
            justify-content: center;

        }

        .buttons :hover {
            background: #e2e2e2;
        }

        /* Texto do botão */
        .buttons button a {
            position: absolute;
            color: var(--verde);
            font-weight: 600;
            font-size: 16px;
            align-items: flex-start;
            /* Ajuste na posição do conteúdo para não estar centralizado verticalmente */
            left: 20px;

        }

        /* botão sair vermelho */
        #sair {
            color: red;
        }

        /* fim Section Menu */

        /* Main container */
        .main-container {
            max-width: 77%;
            margin: 20px;
            margin-left: 20px;
            background-color: white;
            /* Adiciona flexbox para alinhar à direita */
            margin-left: auto;
            height: calc(100vh - 40px);
            /* Altura ajustada para preencher o espaço disponível na tela */
            border-radius: 40px;
            box-shadow: 0px 5px 30px 2px rgb(0, 0, 0, 0.2);
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        .main-container form {
            position: relative;
            margin-top: 16px;
            min-height: 490px;
            max-width: 960px;
            width: 100%;
            /* background-color: var(--cinza); */


        }

        .main-container form .dateils {
            margin-top: 10px;
        }

        .main-container form .title {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
            font-weight: 500;
            margin: 6px 0;
            color: var(--verde);
        }

        .main-container form .fields {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        form .fields .input-field {
            display: flex;
            width: calc(100% / 3 - 15px);
            flex-direction: column;
            margin: 4px 0;

        }

        .input-field label {
            font-size: 12px;
            font-weight: 500;
            color: var(--dkcinza);
        }

        .input-field input,
        .input-field select {
            width: 100%;
            /* Define a largura para 100% para ambos os tipos de campos */
            padding: 0 15px;
            outline: none;
            font-weight: 400;
            color: var(--dkcinza);
            border: 1px solid #aaa;
            font-size: 14px;
            border-radius: 5px;
            margin: 9px 0;
            height: 42px;
        }


        .input-field input:is(:focus, :valid) {
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        form .line-menu {
            margin-top: 20px;
        }

        .main-container form button {
            margin-top: 20px;
            color: var(--verde);
            font-weight: 600;
            font-size: 16px;
            align-items: flex-start;
            /* Ajuste na posição do conteúdo para não estar centralizado verticalmente */
            left: 20px;
            padding: 10px 15px;
            border: 1px solid #aaa;
            border-radius: 10px;
            background: white;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);

        }

        .main-container form button:hover {
            transform: translateY(-2px);
            transition: 0.2s;
            cursor: pointer;
        }


        /* Media queries para diferentes tamanhos de tela */


        @media screen and (max-width: 1000px) {
            .background-verde {
                max-width: 75%;
            }

            .line {
                max-width: 75%;
            }

            /* section menu */
            .menu-container {
                width: 25%;
            }

            /* Main container */
            .main-container {
                max-width: 70%;
                /* Reduz a largura máxima para telas de até 900px */
            }

            .main-container {
                max-width: 70%;
            }

            form .fields .input-field {
                width: calc(40% - 2px);
                margin-left: 15px;
                margin-right: 15px;
            }
        }

        @media screen and (max-width:750px) {
            .main-container form {
                overflow-y: scroll;
                position: relative;
                margin-top: 16px;
                max-height: 10px;
                max-width: 490px;
                width: 100%;
            }

            .main-container form::-webkit-scrollbar {
                display: none;
            }

            form .fields .input-field {
                width: calc(100% / 1);
                margin-left: 30px;
                margin-right: 30px;
            }

            .main-container form button {
                margin-right: 60%;
                margin-left: 40%;
            }
        }

        @media screen and (max-width: 630px) {
            .main-container {
                max-width: 95%;
                /* Reduz ainda mais a largura máxima para telas de até 630px */
            }
        }

        @media screen and (max-width: 300px) {
            .main-container {
                max-width: 100%;
                /* Para telas muito estreitas, ocupar 100% do espaço disponível */
                border-radius: 20px;
                /* Reduz a borda para telas muito estreitas */
            }
        }
    </style>


</body>

</html>
