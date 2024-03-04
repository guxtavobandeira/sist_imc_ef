<?php

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['id'])){
    die("você não pode acessar esta pagina pq n esta logado.<p><a href=\"index.php\">entrar</p>");
}
