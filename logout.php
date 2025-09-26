<?php 
    include ("cabecalho.php");

    session_destroy();
    setcookie("PHPSESSID", "", -1);

    session_start();
    session_regenerate_id();

    header('Location: index.php');
?>