<?php 
    // iniciando a sessão do usuario
    session_start();
    // destruindo a sessão do usuario
    session_destroy();
    // redirecionando o usuario para o login.php
    header("Location: ../login.php");
?>