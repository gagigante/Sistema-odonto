<!doctype html>
<html class="no-js h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>DECADA ODONTO</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="assets/css/extras.1.1.0.min.css">

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!--Jquery CDN-->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
    <!--Bootstrap Script-->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <!--Bootstrap PopperJs CND-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    
    <!--Framework required Scripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.min.js"></script>    
        
    <!--MomentJS-->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js'></script>

    <!--FULLCALENDAR CSS-->
    <link href='assets/fullcalendar-4.3.1/packages/core/main.css' rel='stylesheet' />
    <link href='assets/fullcalendar-4.3.1/packages/daygrid/main.css' rel='stylesheet' />
    <link href='assets/fullcalendar-4.3.1/packages/timegrid/main.css' rel='stylesheet' />
    <link href='assets/fullcalendar-4.3.1/packages/list/main.css' rel='stylesheet' />    

    <!--FULLCALENDAR JS-->
    <script src='assets/fullcalendar-4.3.1/packages/core/main.js'></script>
    <script src='assets/fullcalendar-4.3.1/packages/interaction/main.js'></script>
    <script src='assets/fullcalendar-4.3.1/packages/daygrid/main.js'></script>
    <script src='assets/fullcalendar-4.3.1/packages/timegrid/main.js'></script>
    <script src='assets/fullcalendar-4.3.1/packages/list/main.js'></script>
    <script src="assets/fullcalendar-4.3.1/packages/core/locales/pt-br.js"></script>
    
    <!--MaskJs Script-->
    <script type="text/javascript" src="assets/js/jquery.mask.js"></script>
    <!--Fields Formating Script-->  


    <script>
      $(document).ready(function() {
            $('#add-start, #event-start').mask('00/00/0000 00:00:00');
            $('#add-end, #event-end').mask('00/00/0000 00:00:00');                      

            $("#add-patient, #event-patient").autocomplete({
                source: 'php/autoComplete.php'
            });
      });     
    </script>

    <script src="assets/js/scheduleFunctions.js"></script>
    
</head>

<body class="h-100">
    
    <?php 
        require 'php/conexao.php';
        require 'php/verificaLogin.php';
    ?>

    <div class="container-fluid">
        <div class="row">
            <!-- Main Sidebar -->
            <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
                <div class="main-navbar">
                    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
                        <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                            <div class="d-table m-auto">
                                <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="assets/images/shards-dashboards-logo.svg">
                                <span class="d-none d-md-inline ml-1">ODONTO FRONT-END</span>
                            </div>
                        </a>
                        <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                            <i class="material-icons">&#xE5C4;</i>
                        </a>
                    </nav>
                </div>
                              
                <div class="nav-wrapper">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="index.php">
                                <i class="material-icons">dashboard</i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="schedule.php">
                                <i class="material-icons">schedule</i>
                                <span>Agenda</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="patients.php">
                                <i class="material-icons">supervisor_account</i>
                                <span>Pacientes</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="stock.php">
                                <i class="material-icons">table_chart</i>
                                <span>Estoque</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="financial.php">
                                <i class="material-icons">monetization_on</i>
                                <span>Financeiro</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="treatments.php">
                                <i class="material-icons">drag_indicator</i>
                                <span>Catálogo de tratamentos</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
            <!-- End Main Sidebar -->

            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <div class="main-navbar sticky-top bg-white">
                    <!-- Main Navbar -->
                    <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
                        <span class="main-navbar__search w-100 d-none d-md-flex d-lg-flex"></span>

                        <ul class="navbar-nav border-left flex-row ">
                            <li class="nav-item border-right dropdown notifications">
                                <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="nav-link-icon__wrapper">
                                        <i class="material-icons">&#xE7F4;</i>
                                        <span class="badge badge-pill badge-danger">2</span>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">
                                        <div class="notification__icon-wrapper">
                                            <div class="notification__icon">
                                                <i class="material-icons">schedule</i>
                                            </div>
                                        </div>
                                        <div class="notification__content">
                                            <span class="notification__category">Agenda</span>
                                            <p>Não se esqueça de checar a agenda, você tem
                                                <span class="text-success text-semibold">2</span> consultas hoje!</p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="notification__icon-wrapper">
                                            <div class="notification__icon">
                                                <i class="material-icons">monetization_on</i>
                                            </div>
                                        </div>
                                        <div class="notification__content">
                                            <span class="notification__category">Financeiro</span>
                                            <p>Confira o painel de finanças</p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item notification__all text-center" href="#"> Ver todas as notificações </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <img class="user-avatar rounded-circle mr-2" src="assets/images/avatars/0.jpg" alt="User Avatar">
                                    <span class="d-none d-md-inline-block">Dra. Sierra Brooks</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-small">
                                    <a class="dropdown-item" href="#">
                                        <i class="material-icons">&#xE7FD;</i> Perfil
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="material-icons">settings_applications</i> Configurações
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="logout.php">
                                        <i class="material-icons text-danger">&#xE879;</i> Sair
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <nav class="nav">
                            <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                                <i class="material-icons">&#xE5D2;</i>
                            </a>
                        </nav>
                    </nav>
                </div>
                <!-- / .main-navbar -->
                <div class="screen-alert" style="position: absolute; width: 100%;">
                    <?php 
                        if(isset($_SESSION['alert']) && !empty($_SESSION['alert'])) {
                            echo $_SESSION['alert'];
                            $_SESSION['alert'] = '';
                        }                        
                    ?>
                </div>

                <div class="main-content-container container-fluid px-4" style="margin-top: 30px;">
                    <!-- Page Header -->
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                            <h3 class="page-title"><i class="material-icons">schedule</i>Agenda</h3>
                        </div>
                    </div>
                    <!-- End Page Header -->
                    <div class="row">
                        <div class="col-sm-12">  

                            <div class="card">
                                <div class="card-header border-bottom">
                                    <div class="form-row"style="margin-top: 15px;">
                                        <div class="form-group col-md-3">
                                            <button type="button" onclick="$('#registerModal').modal('show');" class="btn btn-success">Adicionar evento à agenda</button>
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="card-body p-0 pb-3 text-center" style="padding: 15px;">
                                    <div style="margin: 15px;" id="calendar"></div>
                                </div>
                            </div>

                            <!-- MODAL UPDATE -->
                            <div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabel">Detalhes</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form id="modalForm" method="POST">    
                                            <div class="modal-body">
                                                <div>
                                                    <p style="text-align: left; margin: 10px; padding: 0;">Paciente</p>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <input type="text" class="form-control" name="event-patient" id="event-patient" autocomplete="off" required>
                                                        </div>
                                                    </div>

                                                    <p style="text-align: left; margin: 10px; padding: 0;">Título</p>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <input type="text" class="form-control" name="event-title" id="event-title">
                                                        </div>
                                                    </div>
                                                    
                                                    <p style="text-align: left; margin: 10px; padding: 0;">Descrição</p>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <textarea type="text" class="form-control" name="event-description" id="event-description"></textarea>
                                                        </div>                 
                                                    </div>
                                                    
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <p style="text-align: left; margin: 10px; padding: 0;">Início</p>
                                                            <input type="text" class="form-control" name="event-start" id="event-start">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <p style="text-align: left; margin: 10px; padding: 0;">Fim</p>
                                                            <input type="text" class="form-control" name="event-end" id="event-end">
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button id="save-update" type="submit" class="btn btn-success save"><i class="material-icons" style="font-size: 18px">save</i></button>
                                                <button id="delete-update" type="submit" class="btn btn-danger delete"><i class="material-icons" style="font-size: 18px">delete_outline</i></button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                            </div>
                                        </div>
                                     </form>   
                                </div>
                            </div>

                            <!-- MODAL INSERT -->
                            <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabel">Adicionar evento à agenda</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form id="scheduleForm" method="POST" action="">
                                            <div class="modal-body">                                             
                                                <p style="text-align: left; margin: 10px; padding: 0;">Paciente</p>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <input type="text" class="form-control" name="add-patient" id="add-patient" required autocomplete="off">
                                                    </div>
                                                </div>

                                                <p style="text-align: left; margin: 10px; padding: 0;">Título</p>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <input type="text" class="form-control" name="add-title" id="add-title" required>
                                                    </div>
                                                </div>

                                                <p style="text-align: left; margin: 10px; padding: 0;">Descrição</p>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <textarea type="text" class="form-control" name="add-description" id="add-description"></textarea>
                                                    </div>                 
                                                </div>
                                                
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <p style="text-align: left; margin: 10px; padding: 0;">Início</p>
                                                        <input type="text" class="form-control" name="add-start" id="add-start" autocomplete="off" placeholder="00/00/0000 00:00:00" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <p style="text-align: left; margin: 10px; padding: 0;">Fim</p>
                                                        <input type="text" class="form-control" name="add-end" id="add-end" autocomplete="off" placeholder="00/00/0000 00:00:00" required>
                                                    </div>
                                                </div>
                                                
                                                <p style="text-align: left; margin: 10px; padding: 0;">Cor do evento</p>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">           
                                                        <select id="color" name="color" class="form-control">
                                                            <option value="#ffd700" style="color: #ffd700" selected>Amarelo</option>
                                                            <option value="#78c0f5" style="color: #78c0f5">Azul</option>
                                                            <option value="#ffa280" style="color: #ffa280;">Laranja</option>
                                                            <option value="#e8a06d" style="color: #e8a06d">Marrom</option>
                                                            <option value="#b5b5b5" style="color: #b5b5b5">Cinza</option>
                                                            <option value="#c982f5" style="color: #c982f5;">Roxo</option>
                                                            <option value="#40e0d0" style="color: #40e0d0;">Turquesa</option>
                                                            <option value="#91f291" style="color: #91f291;">Verde</option>
                                                            <option value="#ff6363" style="color: #ff6363;">Vermelho</option>
                                                        </select>
                                                    </div>                                                    
                                                </div>   
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success save"><i class="material-icons" style="font-size: 18px">save</i></button>                                          
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

                <footer class="main-footer d-flex p-2 px-3 bg-white border-top" style="margin-top: 30px;">
                    <span class="copyright ml-auto my-auto mr-2">Copyright © 2019
                        <a target="_blank" href="https://decadatech.com" rel="nofollow">Decada Technology</a>
                    </span>
                </footer>
            </main>
        </div>
    </div>

</body>

</html>
