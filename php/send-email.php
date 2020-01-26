<?php 
    require 'conexao.php';
    
    $input = mysqli_real_escape_string($conexao, trim($_POST["email"]));	

    $querySelect = "SELECT * FROM tb04_login WHERE tb04_usuario = '$input' OR tb04_email = '$input'";
    $result = $conexao->query($querySelect);

    if($result->num_rows>0) {
        while ($dados = $result->fetch_assoc()) {            
            $user_id = $dados['tb04_id'];         
            $user_email = $dados['tb04_email'];  
        }        

        // ATUALIZA O CAMPO DE RESET DE SENHA PARA TRUE
        $queryUpdate = "UPDATE tb04_login SET tb04_reset_password = 1 WHERE tb04_id ='$user_id'";
        $result = mysqli_query($conexao, $queryUpdate);	        

        $assunto = "Redefinição de senha";

        $corpo = "Para redefinir sua senha acesse: https://ggportfolio.com.br/change-password.php?id=".$user_id;
        
        $header = "From: contato@ggportfolio.com.br" . "\r\n" 
                . "Reply-To: contato@ggportfolio.com.br" . "\r\n"
                . "X-Mailer: PHP/" .phpversion();
    
        mail($user_email, $assunto, $corpo, $header);
    
        echo 1;

    } else {
        echo 0;
    }
?>