<?php

if(!isset($_SESSION)) {
    session_start();
}

session_destroy();

header("Location: /sistema_imc/index/index.php");