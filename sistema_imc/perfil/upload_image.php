<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Imagem</title>
    <style>
        body {
            background-color: #ffffff;
            /* branco */
            font-family: Arial, sans-serif;
            color: #333333;
            /* cor do texto padrão */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            /* branco */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #009933;
            /* verde */
        }

        form {
            margin-top: 20px;
        }

        input[type="file"] {
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #ff6600;
            /* laranja */
            color: #ffffff;
            /* branco */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Upload de Imagem</h2>
        <?php
        include ('../conexao.php');
        session_start();

        // Verifica se o usuário está logado
        if (!isset($_SESSION['nome'])) {
            header("Location: login.php");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['imagem'])) {
            $id_usuario = $_SESSION['id'];
            $imagem = $_FILES['imagem'];

            // Diretório onde a imagem será salva
            $diretorio = '../uploads/';
            $caminho_imagem = $diretorio . basename($imagem['name']);

            // Verifica se o diretório existe, se não, cria
            if (!is_dir($diretorio)) {
                mkdir($diretorio, 0777, true);
            }

            // Move a imagem para o diretório
            if (move_uploaded_file($imagem['tmp_name'], $caminho_imagem)) {
                $caminho_imagem = $mysqli->real_escape_string($caminho_imagem);

                // Atualiza o caminho da imagem no banco de dados
                $sql = "UPDATE usuarios SET caminho_imagem = '$caminho_imagem' WHERE id = $id_usuario";

                if ($mysqli->query($sql)) {
                    echo "Imagem enviada e salva com sucesso!";
                } else {
                    echo "Erro ao salvar o caminho da imagem no banco de dados: " . mysqli_error($conexao);
                }
            } else {
                echo "Erro ao fazer upload da imagem.";
            }
        } else {
            echo "Nenhuma imagem foi enviada.";
        }

        $mysqli->close();
        ?>
    </div>
</body>

</html>