<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
        <button type="submit" name="redirecionar">Ir para outra página</button>
    </form>
    <?php
    if(isset($_POST['redirecionar'])) {
        header("Location: index.php");
        exit; 
    }
    ?>
</body>
</html>