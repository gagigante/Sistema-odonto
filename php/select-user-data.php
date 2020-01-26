<?php
    require 'conexao.php';

	$user_id = mysqli_real_escape_string($conexao, trim($_POST['userId']));

    // FAZ O SELECT NO USUARIO COM BASE NO ID E VERIFICA SE O CAMPO DE RESETAR SENHA ESTA COMO TRUE
    $querySelect = "SELECT * FROM tb04_login WHERE tb04_id = '$user_id'";
    $result = $conexao->query($querySelect);

    $data = [];

    if($result->num_rows>0) {
        while ($dados = $result->fetch_assoc()) {      

            $username = $dados['tb04_usuario'];                        
            $email = $dados['tb04_email'];
            $shouldReset = $dados['tb04_reset_password'];
                        
            $data[] = [
                'shouldReset' => $shouldReset, 
                'username' => $username, 
                'email' => $email,                 
            ];
        }   
    }     

    echo json_encode($data);
?>