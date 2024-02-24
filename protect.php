<?php

if(!isset($_SESSION)) {
    session_start();
}

else if(!isset($_SESSION['id'])) {
    die("vc n pode acessar esta pagina, pq n esta logado.<p><a href=\"login.php\">Entrar</a></p>");
}
