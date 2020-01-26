<?php
    require 'conexao.php';

    $password = mysqli_real_escape_string($conexao, trim($_POST["password"]));
    $user_id = mysqli_real_escape_string($conexao, trim($_POST["userId"]));

    $query = "UPDATE tb04_login SET tb04_senha = MD5('$password'), tb04_reset_password = 0 WHERE tb04_id ='$user_id'";
    $result = mysqli_query($conexao, $query);
    
    echo 0;
?>