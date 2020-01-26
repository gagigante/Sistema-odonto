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
   
        $corpo = "
        <html>
            <head>
                <meta charset='utf-8'>                
                <link rel='stylesheet' href='../assets/libs/bootstrap/css/bootstrap.min.css'>
                <link rel='stylesheet' href='../assets/libs/shards-dashboard/shards-dashboards.1.1.0.min.css'>
            </head> 
            <style>     
                body {
                    margin: 0;
                    padding: 0;
                    background-color: #f5f5f5;
                }
                header {
                    height: 30vh;
                    background-color: #4287f5;     
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                header img {
                    width: 70px;
                }
                div.container {
                    margin: -50px auto;
                    max-width: 720px;
                    background-color: #fff;
                    box-shadow: 10px 0px s0px rgba(0,0,0,0.1);
                    border-radius: 4px;  
                    padding: 0;
                }
                div.content {        
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    padding: 30px;
                    margin: 0;
                }
                .content p {
                    margin: 30px auto;
                }        
                .content a span{
                    color: #fff;      
                }              
                .black {
                    background-color: #000;
                }
                .black h4 {
                    color: #fff;
                }          
                .black p {
                    color: #ddd;
                }      
                .help {
                    background-color: rgba(66, 135, 245, 0.5);
                }      
            </style>
      
            <body>
                <header>
                    <img src='../assets/images/shards-dashboards-logo-success.svg' />
                </header>
                <div class='container'>
                    <div class='content'> 
                        <h2>Refinição de senha</h2>
                        <p>Ao clicar no botão abaixo você será redirecionado para um formulário de redefinição de senha</p>
                        <a href='https://ggportfolio.com.br/change-password.php?id=".$user_id."' class='btn btn-success'><span>Redefinir senha</span></a>
                    </div>
                    <div class='content black'>
                        <h4>Mantenha sua senha sempre segura!</h4>
                        <p>Nós nunca vamos pedir dados sigilosos à você, tome cuidado com sua caixa de E-mail</p>
                    </div>
                    <div class='content help'>
                        <h5>Precisa de mais ajuda?</h5>
                        <a href='https://decadatech.com'>Nós estamos aqui para isso!</a>
                    </div>
                </div>
            </body>
        </html>";

        // $corpo = "Para redefinir sua senha acesse: https://ggportfolio.com.br/change-password.php?id=".$user_id;
        
        $header = "From: contato@ggportfolio.com.br" . "\r\n" 
                . "Return-Path: contato@ggportfolio.com.br" . "\r\n"
                . "Reply-To: contato@ggportfolio.com.br" . "\r\n"
                . "Content-type: text/html" . "\r\n"
                . "X-Mailer: PHP/" .phpversion();
    
        mail($user_email, $assunto, $corpo, $header);
        
        echo $corpo;
        echo 1;

    } else {
        echo 0;
    }
?>