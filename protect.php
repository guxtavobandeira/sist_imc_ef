<?php

if(!isset($_SESSION)) {
    session_start();
}

// Verificar se o usuário está autenticado
else if (!isset($_SESSION['id'])) {
    // Redirecionar para a página de login se o usuário não estiver autenticado
    header('Location: login.php');
    exit;
}
