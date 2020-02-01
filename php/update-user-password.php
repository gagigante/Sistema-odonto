<?php
    require 'conexao.php';

    $password = mysqli_real_escape_string($conexao, trim($_POST["password"]));

    //HASH DA ROTA - MD5(ID)/MD5(EMAIL)
    $user_id = mysqli_real_escape_string($conexao, trim($_POST["userId"]));

    //PEGA PRIMEIRO O ID E DEPOIS O EMAIL DO GET
    $array = explode('/', $user_id);

    //SEPARA EM 2 VARIAVEIS
    for($i = 0, $count = count($array); $i < $count; $i++) {        
        ${'var' . $i} = $array[$i];
    }

    $query = "UPDATE tb04_usuario SET tb04_senha = MD5('$password'), tb04_reset_password = 0 WHERE md5(tb04_id) ='$var0' AND md5(tb04_email) = '$var1'";
    $result = mysqli_query($conexao, $query);
    
    echo 0;
?>