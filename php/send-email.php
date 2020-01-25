<?php 
    require 'conexao.php';
    
    $para = mysqli_real_escape_string($conexao, trim($_POST["email"]));	
    $assunto = "Redefinição de senha";

    $corpo = "Este é o email de refefinição de senha!!";
    
    $header = "From: contato@ggportfolio.com.br" . "\r\n" 
            . "Reply-To: contato@ggportfolio.com.br" . "\r\n"
            . "X-Mailer: PHP/" .phpversion();

    mail($para, $assunto, $corpo, $header);

    echo '<h2>E-mail enviado com sucesso!</h2>';
?>