<?php 
    session_start();

    // $_SESSION['login'] = $login;
    // $_SESSION['senha'] = $senha;
    // $_SESSION['idUsuario'] = $idbd;
    // $_SESSION["logado"] = 1;

    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    unset($_SESSION['idUsuario']);
    unset($_SESSION['logado']);

    header("Location: ../login.php");
?>