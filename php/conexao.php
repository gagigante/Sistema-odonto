<?php
    //include 'verificaLogin.php';
    session_start();

    // $servidor = "localhost";
    // $usuario = "root";
    // $senha = "";
    // $banco = "bd_teste";

    $servidor = "mysql669.umbler.com";
    $usuario = "plus_odonto_adm";
    $senha = "JrMp7_4T-MpAZ";
    $banco = "bd_plus_odonto";

    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
    mysqli_set_charset($conexao,"utf8");
    
    if(!$conexao){
        die("Falha na conexao: " .mysqli_connect_error());
    }		
?>
