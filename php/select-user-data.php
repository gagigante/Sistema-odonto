<?php
    require 'conexao.php';

    //HASH DA ROTA - MD5(ID)/MD5(EMAIL)
	$user_id = mysqli_real_escape_string($conexao, trim($_POST['userId']));

    //PEGA PRIMEIRO O ID E DEPOIS O EMAIL DO GET
    $array = explode('/', $user_id);

    //SEPARA EM 2 VARIAVEIS
    for($i = 0, $count = count($array); $i < $count; $i++) {        
        ${'var' . $i} = $array[$i];
    }

    // FAZ O SELECT NO USUARIO COM BASE NO ID E VERIFICA SE O CAMPO DE RESETAR SENHA ESTA COMO TRUE
    $querySelect = "SELECT * FROM tb04_usuario WHERE MD5(tb04_id) = '$var0' AND MD5(tb04_email) = '$var1'";
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