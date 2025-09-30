<?php 
    include ("cabecalho.php");

    session_destroy();
    
    setcookie('usuario', '', time() - 3600);
    setcookie('senha', '', time() - 3600);

    session_start();
    session_regenerate_id();

    header('Location: index.php');
?>