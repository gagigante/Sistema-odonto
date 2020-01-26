<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Login</title>
    <link rel="shortcut icon" href="#" />
   
    <!-- icons -->
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Custom CSS -->
    <link rel="stylesheet" href="assets/css/login.style.css">

    <!-- Frameworks css -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/shards-dashboards.1.1.0.min.css">    

</head>

<body class="h-100">

    <?php
        require 'php/conexao.php';
        //verifica se existe uma conta logada e redireciona para a index
        if(isset($_SESSION['logado']) && $_SESSION['logado'] == 1) {
            header("Location: index.php");
        }
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 login-form">      
                <div class="screen-alert"></div>    
            
                <form id="form-login">
                    <h2>Entrar</h2>
                    <div class="form-row">                        
                        <div class="form-group col-md-12">                            
                            <label for="user">Usuário</label>
                            <input type="text" class="form-control" name="user" id="user" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-row"> 
                        <div class="form-group col-md-12">                          
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 buttons">
                            <button type="submit" class="btn btn-success">Entrar</button>
                            <button type="button" id="createAccountBtn" class="btn btn-info">Não tem uma conta?</button>
                        </div>  
                        <div class="form-group">
                            <a href="#" id="resetPassBtn">Esqueceu sua senha?</a>
                        </div>             
                    </div>                    
                </form>
            </div>
            <div class="col-md-7 login-content">
                <img src="assets/images/shards-dashboards-logo-success.svg" />
                <h2>Nome do sistema</h2>
                <footer>
                    <span>Um produto de <a href="https://decadatech.com" target="_blank">Decada Technology</a></span>
                </footer>
            </div>  
        </div>                                                                         
    </div>

    <div class="modal fade" id="resetPassModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Redefinir senha</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="form-row">                        
                            <div class="form-group col-md-12">                            
                                <label for="email">E-mail ou nome de usuário cadastrado:</label>
                                <input type="text" class="form-control" name="email" id="email" autocomplete="off">
                            </div>
                        </div>                        
                    </div>
                    <div class="modal-alert"></div>
                </div>
                <div class="modal-footer">                         
                    <button type="button" class="btn btn-success send-email">
                        <i class="material-icons" style="font-size: 18px">send</i>
                    </button>                   
                    <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>


    <!--Jquery CDN-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>    
    <!--Bootstrap Script-->
    <script src="assets/libs/bootstrap/js/bootstrap.min.js"></script>
    <!--Bootstrap PopperJs CND-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <!--Framework required Scripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>    
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.min.js"></script>    

    <script src="assets/js/loginFunctions.js"></script>

</body>

</html>
