<!doctype html>
<html class="no-js h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Perfil do paciente</title>

    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/libs/shards-dashboard/css/shards-dashboards.1.1.0.min.css">

    <link rel="stylesheet" href="assets/css/patient-profile.style.css">
</head>

<body class="h-100">

    <?php        
        require 'php/conexao.php';
        require 'php/verificaLogin.php';
        
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            header("Location: patients.php");                
        }                         
    ?>

    <div class="container-fluid">
        <div class="row">
            <!-- Main Sidebar -->
            <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
                <div class="main-navbar">
                    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
                        <a class="navbar-brand w-100 mr-0" style="line-height: 25px;">
                            <div class="d-table m-auto">
                                <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;"
                                    src="assets/images/shards-dashboards-logo.svg" alt="Shards Dashboard">
                                <span class="d-none d-md-inline ml-1">PLUS ODONTO</span>
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
                            <a class="nav-link " href="schedule.php">
                                <i class="material-icons">schedule</i>
                                <span>Agenda</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="patients.php">
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
                                <a class="nav-link nav-link-icon text-center" href="#" role="button"
                                    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
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
                                    <a class="dropdown-item notification__all text-center" href="#"> Ver todas as
                                        notificações </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#"
                                    role="button" aria-haspopup="true" aria-expanded="false">
                                    <img class="user-avatar rounded-circle mr-2" src="assets/images/avatars/0.jpg"
                                        alt="User Avatar">
                                    <span class="d-none d-md-inline-block"> <?php echo $_SESSION['login'] ?> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-small">
                                    <!-- <a class="dropdown-item" href="#">
                                        <i class="material-icons">&#xE7FD;</i> Perfil
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="material-icons">settings_applications</i> Configurações
                                    </a>
                                    <div class="dropdown-divider"></div> -->
                                    <a class="dropdown-item text-danger" href="logout.php">
                                        <i class="material-icons text-danger">&#xE879;</i> Sair
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <nav class="nav">
                            <a href="#"
                                class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left"
                                data-toggle="collapse" data-target=".header-navbar" aria-expanded="false"
                                aria-controls="header-navbar">
                                <i class="material-icons">&#xE5D2;</i>
                            </a>
                        </nav>
                    </nav>

                </div>
                <!-- / .main-navbar -->

                <div class="screen-alert" style="position: absolute; width: 100%;"></div>

                <div class="main-content-container container-fluid px-4" style="margin-top: 30px;">
                    <!-- Page Header -->
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-8 text-center text-sm-left mb-0">
                            <h3 class="page-title"> <a href="patients.php">
                                <i class="material-icons">supervisor_account</i>Pacientes </a> / 
                                <i class="material-icons">person</i>Perfil do paciente</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card card-small mb-4">

                                <div class="card-header">
                                    <div style="display: flex; flex-direction: row;height: 100%;padding-left: 10px;">
                                        <img width="60px" height="60px" id="userProfileImage" class="user-avatar rounded-circle mr-2" alt="User Avatar">
                                        <p style="margin: auto 10px" id="nomeUser"> </p>
                                    </div>
                                </div>

                                <div class="card-body p-0 pb-3">
                                    
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist"
                                            style="padding-left: 10px;">
                                            <a style="margin-right: 5px;" class="nav-item nav-link active"
                                                data-toggle="tab" href="#tab1" role="tab">Sobre</a>
                                            <a style="margin-right: 5px;" class="nav-item nav-link" data-toggle="tab"
                                                href="#tab2" role="tab">Orçamentos</a>
                                            <a style="margin-right: 5px;" class="nav-item nav-link" data-toggle="tab"
                                                href="#tab3" role="tab">Consultas</a>
                                            <a style="margin-right: 5px;" class="nav-item nav-link" data-toggle="tab"
                                                href="#tab4" role="tab">Anamnese</a>
                                            <a style="margin-right: 5px;" class="nav-item nav-link" data-toggle="tab"
                                                href="#tab5" role="tab">Imagens</a>
                                            <a style="margin-right: 5px;" class="nav-item nav-link" data-toggle="tab"
                                                href="#tab6" role="tab">Documentos</a>
                                            <!-- <a style="margin-right: 5px;" class="nav-item nav-link" data-toggle="tab"
                                            href="#tab6" role="tab">Atestados</a>
                                            <a style="margin-right: 5px;" class="nav-item nav-link" data-toggle="tab"
                                            href="#tab6" role="tab" disabled>Receitas</a> -->
                                            <a style="margin-right: 5px;" class="nav-item nav-link" data-toggle="tab"
                                                href="#tab7" role="tab">Débitos</a>
                                        </div>
                                    </nav>                                  

                                    <div class="tab-content" id="nav-tabContent">


                                        <!-- TAB 1 - SOBRE -->
                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                            <form method="POST" enctype="multipart/form-data" id="about-patient-form" class="col-md-8" style="padding: 30px;">                                            

                                                <div class="form-row" style="margin-top: 10px;">                                                    
                                                    <div class="form-group col-md-12">
                                                        <label for="name">Nome completo:</label>
                                                        <input type="text" class="form-control" name="name" id="name" placeholder="Nome completo *" autocomplete="off" required readonly>  
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="address">Endereço:</label>
                                                        <input type="text" class="form-control" name="address" id="address" placeholder="Endereço *" autocomplete="off" required readonly>  
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="rg">RG:</label>
                                                        <input type="text" class="form-control" name="rg" id="rg" placeholder="RG" autocomplete="off" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="cpf">CPF:</label>
                                                        <input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF" autocomplete="off" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="phone">Telefone:</label>
                                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Telefone *" autocomplete="off" required readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="email">E-mail:</label>
                                                        <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" autocomplete="off" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-row">                                                    
                                                    <div id="dateDiv" class="col-md-6 input-daterange form-group">
                                                        <label for="dateOfBirth">Data de nascimento:</label>
                                                        <input type="text" class="input-sm form-control" name="dateOfBirth" id="dateOfBirth" placeholder="Data de nascimento *" autocomplete="off" required readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="profession">Profissão:</label>
                                                        <input type="text" class="form-control" name="profession" id="profession" placeholder="Profissão" autocomplete="off" readonly>
                                                    </div>                                                    
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">  
                                                        <label for="profile-photo">Foto de perfil:</label>
                                                        <input type="file" id="profile-photo" name="profile-photo" class="btn">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="submit" name="button" type="button" id="edit-btn"
                                                            class="btn btn-outline-success" value="Editar perfil"
                                                            style="width: 125px;" />
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="col-md-4"> </div>
                                        </div>                                   

                                        <!-- TAB 2 - ORCAMENTOS -->
                                        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="nav-profile-tab" style="padding: 30px;">

                                            <a href="add-budget.php" class="btn btn-outline-success" style="width: 140px; margin: 10px">Adicionar orçamento</a>

                                            <div class='table-responsive'>
                                                <table class='table mb-0'> 
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="border-0">Descrição</th>
                                                            <th scope="col" class="border-0">Valor</th>
                                                            <th scope="col" class="border-0">Data</th>
                                                            <th scope="col" class="border-0">Ações</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Plano tratamento de fulano</td>
                                                            <td>R$ 80.00</td>
                                                            <td>99/99/9999</td>
                                                            <td>
                                                                <a href="edit-budget.php" class="btn">Editar</a>
                                                                <button type="button"
                                                                    style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons"
                                                                        style="color: #999">find_in_page</i>
                                                                </button>
                                                                <button type="button"
                                                                    style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons"
                                                                        style="color: #999">local_printshop</i>
                                                                </button>
                                                                <button type="button"
                                                                    style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons" style="color: red">delete</i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Plano tratamento de fulano</td>
                                                            <td>R$ 80.00</td>
                                                            <td>99/99/9999</td>
                                                            <td>
                                                                <a href="edit-budget.php" class="btn">Editar</a>
                                                                <button type="button"
                                                                    style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons"
                                                                        style="color: #999">find_in_page</i>
                                                                </button> 
                                                                <button type="button"
                                                                    style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons"
                                                                        style="color: #999">local_printshop</i>
                                                                </button>
                                                                <button type="button"
                                                                    style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons" style="color: red">delete</i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Plano tratamento de fulano</td>
                                                            <td>R$ 80.00</td>
                                                            <td>99/99/9999</td>
                                                            <td>
                                                                <a href="edit-budget.php" class="btn">Editar</a>
                                                                <button type="button"
                                                                    style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons"
                                                                        style="color: #999">find_in_page</i>
                                                                </button>                                                          
                                                                <button type="button"
                                                                    style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons"
                                                                        style="color: #999">local_printshop</i>
                                                                </button>
                                                                <button type="button"
                                                                    style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons" style="color: red">delete</i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <!-- TAB 3 - CONSULTAS -->
                                        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="nav-contact-tab" style="padding: 30px;">
                                        
                                            <a href="add-treatment.php?id=<?php echo $_GET['id']; ?>" class="btn btn-outline-success" style="width: 140px; margin: 10px">Adicionar consulta</a>

                                            <div class="query-ajax-response"> </div>

                                        </div>

                                        <!-- TAB 4 - ANAMNESE -->
                                        <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="nav-contact-tab">tab4</div>

                                        <!-- TAB 5 - IMAGENS -->
                                        <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="nav-contact-tab">
                                            
                                            <form style="margin: 30px" method="POST" enctype="multipart/form-data" id="patient-add-image-form">
                                                <input type="file" name="image" id="image-input" required /> 
                                                <Button type="submit" class="btn btn-outline-success" id="bt-add-image">Adicionar imagem</Button>
                                            </form>
                                                                                        
                                            <div class="gallery gallery-ajax-response"> </div>

                                            <!-- MODAL DE CONFIRMACAO DE DELETE-->
                                            <div class="modal fade" id="deleteImageModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalLabel">Confirmar ação</h5>                                
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div>
                                                            <div class="modal-body" style="padding-bottom: 0;">
                                                                <p>Deseja mesmo apagar esta imagem?</p>      
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" id="btConfirImageDelete" class="btn btn-danger save"><i class="material-icons" style="font-size: 18px">check</i></button>     
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- TAB 6 - DOCUMENTOS -->
                                        <div class="tab-pane fade" id="tab6" role="tabpanel" aria-labelledby="nav-contact-tab">

                                            <p style="margin: 30px auto 0 30px;">Consumo de espaço de documentos</p>
                                            <div id="document-avaible-space" class="progress" style="margin: 10px 30px 0 30px;">
                                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <small style="margin-left: 30px;"><span id="doc-used"></span>mb / <span id="doc-avaiable"></span>mb (Esse é o limite compartilhado entre os pacientes deste perfil)</small>

                                            <form style="margin: 30px" method="POST" enctype="multipart/form-data" id="patient-add-document-form">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <input type="file" accept=".docx, .xlsx, application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf," name="document" id="document-input" required /> 
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control" name="documentName" id="documentName" placeholder="Nome do documento" required />
                                                    </div>                                          
                                                    <div class="form-group col-md-4">
                                                        <Button type="submit" class="btn btn-outline-success" id="bt-add-document">Adicionar documento</Button>
                                                    </div>  
                                                </div>    
                                            </form>

                                            <div class="documents document-ajax-response"> </div>                                            
                
                                            <!-- MODAL DE CONFIRMACAO DE DELETE-->
                                            <div class="modal fade" id="deleteDocModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalLabel">Confirmar ação</h5>                                
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div>
                                                            <div class="modal-body" style="padding-bottom: 0;">
                                                                <p>Deseja mesmo apagar este documento?</p>      
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" id="btConfirDocDelete" class="btn btn-danger save"><i class="material-icons" style="font-size: 18px">check</i></button>     
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- TAB 7 - DEBITOS -->
                                        <div class="tab-pane fade" id="tab7" role="tabpanel" aria-labelledby="nav-contact-tab" style="padding: 30px;">                                            

                                            <div style="display: flex; flex-direction: row; justify-content: flex-start; align-items: center; flex-wrap: wrap">

                                                <div class="border-bottom" style="padding: 10px 30px; margin: 10px;">
                                                    <p style="margin: 0">Total pago</p>
                                                    <h5 style="margin: 0; color: #32a852" class="debit-received">R$ 0</h5>
                                                </div>
                                                <div class="border-bottom" style="padding: 10px 30px; margin: 10px;">
                                                    <p style="margin: 0">Total a receber</p>
                                                    <h5 style="margin: 0; color: #a83232" class="debit-pending">R$ 0</h5>
                                                </div>   
                                            </div>

                                            <div class="debits-ajax-response"> </div>
                                           
                                            <!-- MODAL DE VISUALIZAÇÃO DE MOVIMENTAÇÕES -->
                                            <div class="modal fade" id="paymentsModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalLabel">Movimentações</h5>                                
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body payments-ajax-response"> </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- MODAL DE PAGAMENTOS -->
                                            <div class="modal fade" id="PayDebitModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalLabel">Realizar pagamento</h5>
                                                            <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST" id="modal-debit-form">
                                                            <div class="modal-body"> 
                                                                <div style='display: flex; flex-direction: row; justify-content: flex-start; align-items: center; flex-wrap: wrap'>
                                                                    <div class='border-bottom' style='padding: 10px 30px; margin: 10px;'>
                                                                        <p style='margin: 0'>Total recebido</p>
                                                                        <h5 style='margin: 0; color: #32a852' id="modal-received"></h5>
                                                                    </div>
                                                                    <div class='border-bottom' style='padding: 10px 30px; margin: 10px;'>
                                                                        <p style='margin: 0'>Total a receber</p>
                                                                        <h5 style='margin: 0; color: #a83232' id="modal-pending">0</h5>
                                                                    </div>   
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="modal-description">Descrição da consulta</label>
                                                                        <textarea type="text" class="form-control" id="modal-description" rows="6" readonly></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="modal-payment">Forma de pagamento</label>
                                                                        <input type="text" class="form-control" name="modal-payment" id="modal-payment" autocomplete="off" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="modal-paid-out">Valor pago</label>
                                                                        <input type="text" class="form-control" name="modal-paid-out" id="modal-paid-out" autocomplete="off" required>
                                                                    </div>
                                                                    <div id="dateDiv" class="form-group col-md-6 input-daterange" style="padding: 0;">
                                                                        <label for="modal-payment-date">Data do pagamento:</label>
                                                                        <input type="text" class="form-control" name="modal-payment-date" id="modal-payment-date" autocomplete="off" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-md-6">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="modal-check" name="modal-check">
                                                                            <label class="custom-control-label" for="modal-check" required>Valor todo pago</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">                         
                                                                <button type="submit" class="btn btn-success saveDebit"><i class="material-icons" style="font-size: 18px">save</i></button>                                                            
                                                                <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Fechar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
                    <span class="copyright ml-auto my-auto mr-2">Copyright © 2020
                        <a target="_blank" href="https://decadatech.com" rel="nofollow">Decada Technology</a>
                    </span>
                </footer>
            </main>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.min.js"></script>     
    
    <script src="assets/libs/shards-dashboard/js/shards-dashboards.1.1.0.min.js"></script>
    
    <!--MaskJs Script-->
    <script type="text/javascript" src="assets/libs/jquery-mask/jquery.mask.js"></script>

    <script src="assets/js/patientProfileFunctions.js"></script>    

    <!--Fields Formating Script-->
    <script>
        $(document).ready(function () {

            $('#dateDiv').datepicker({
                format: 'dd/mm/yyyy',
            });        
            
            $('#phone').mask('(00) 0 0000-0000');
            $('#rg').mask('00.000.000-00');
            $('#cpf').mask('000.000.000-00');
            $('#dateOfBirth').mask('00/00/0000');                   
            
            $('#modal-payment-date').mask('00/00/0000');
            $('#modal-paid-out').mask('000.000.000.000.000,00', {reverse: true});
        });
    </script>

</body>

</html>