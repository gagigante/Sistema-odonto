<!doctype html>
<html class="no-js h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Adicionar consulta</title>

    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="assets/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/libs/shards-dashboard/css/shards-dashboards.1.1.0.min.css">

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    
    <!--Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="h-100">
          
    <?php 
        require 'php/conexao.php';
        require 'php/verificaLogin.php';
            
        //CONSULTA QUE RETORNA O NOME DO PACIENTE COM BASE NO ID FORNECIDO PELA URL
        $queryselect = "select * from tb01_pacientes where tb01_id = '".$_GET['id']."'";
        $resultadoselect = $conexao->query($queryselect);                                                

        if($resultadoselect->num_rows>=0) { 
            while ($linha = $resultadoselect->fetch_assoc()){  
                $patientName = $linha['tb01_nome'];                
            }
        } 
        
        //CONSULTA TODOS OS DENTISTAS CADASTRADOS NA BASE DE DADOS
        $queryselect = "select * from tb09_dentistas order by tb09_nome";
        $dentistas = $conexao->query($queryselect);
    ?>

    <div class="container-fluid">
        <div class="row">            

            <!-- Main Sidebar -->
            <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
                <div class="main-navbar">
                    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
                        <a class="navbar-brand w-100 mr-0" style="line-height: 25px;">
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
                                    <img class="user-avatar rounded-circle mr-2" src="assets/images/user-profile-images/<?php echo $_SESSION['image'] ?>"
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
                            <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                                <i class="material-icons">&#xE5D2;</i>
                            </a>
                        </nav>
                    </nav>
                    <!-- End Main Navbar -->
                </div>                

                <div class="screen-alert" style="position: absolute; width: 100%;"></div>

                <div class="main-content-container container-fluid px-4" style="margin-top: 30px;">

                    <!-- Page Header -->
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-8 text-center text-sm-left mb-0">
                            <h3 class="page-title"> <a href="patient-profile.php?id=<?php echo $_GET['id']; ?>"><i class="material-icons">person</i>Perfil do paciente </a> / <i class="material-icons">add_circle_outline</i>Adicionar consulta</h3>
                        </div>
                    </div>                    

                    <div class="row">
                        <div class="col-md-10" style="margin: 30px auto;">

                            <div class="card card-small mb-4">
                                <div class="card-header border-bottom">
                                    <h3 style="margin-top: 10px">Cadastro de consulta</h3>                                 
                                </div>
                                <div class="card-body p-0 pb-3 text-center">
                                    <form style="padding: 30px;" id="queryForm" method="POST">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">   
                                                <p style="text-align: left; margin: 10px; padding: 0;">Nome do paciente</p>
                                                <input type="text" class="form-control" name="patient" id="patient" placeholder="Nome do paciente *" value="<?php echo $patientName; ?>" readonly required>
                                            </div>                                            
                                            <div class="form-group col-md-6">
                                                <p style="text-align: left; margin: 10px; padding: 0;">Nome do responsável</p>    
                                                <select id="professional" name="professional" class="form-control" required>
                                                <?php foreach($dentistas as $dentista): ?>
                                                    <option value="<?php echo $dentista['tb09_id']; ?>">Dr. <?php echo $dentista['tb09_nome'];?></option>                                                    
                                                <?php endforeach ?>
                                                </select>                                               
                                            </div>
                                        </div>                                     

                                        <div class="form-row">
                                            <div class="form-group col-md-12">   
                                                <p style="text-align: left; margin: 10px; padding: 0;">Descrição da consulta</p>
                                                <input type="text" class="form-control" name="description" id="description" placeholder="Descrição da consulta *" required>
                                            </div>
                                        </div>
                                      
                                        <div style="border: 1px solid #ddd; border-radius: 6px; margin: 0 0 15px;">
                                            <div class="card-header border-bottom">
                                                <h5 style="margin-top: 10px">Procedimentos da consulta</h5>
                                                
                                                <div class="form-row">
                                                    <div class="form-group col-sm-10">
                                                        <input type="text" class="form-control" name="treatment" id="treatment" placeholder="Tratamentos *" autocomplete="off">
                                                    </div>                                            
                                                    <div class="form-group col-sm-2">
                                                        <button type='button' class='btn btn-sm btn-success btAddTreatment'
                                                        style='color: white'>Adicionar</button>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="card-body p-0 pb-3 text-center">
                                                <div class='table-responsive'>
                                                    <table class='table mb-0'>
                                                        <thead class='bg-light'>
                                                            <tr>
                                                                <th scope='col' class='border-0'>Tratamento</th>        
                                                                <th scope='col' class='border-0'>Preço</th>
                                                                <th scope='col' class='border-0'>Ações</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="treatmentsTableContent"> 
                                                        
                                                        
                                                        </tbody>
                                                    </table>

                                                    <div id="treatmentsEmptyPlaceholder">
                                                        <img style="max-width: 100%;" src="assets/images/empty-treatments-placeholder.png" />
                                                        <h5 style='margin-top: 15px;'>Adicione um ou mais tratamentos à essa consulta</h5>
                                                    </div>

                                                </div> 
                                                <div style="margin: 20px 20px 0;">
                                                    <div class="form-row">                                                  
                                                        <div class="form-group col-md-6">
                                                            <p style="text-align: left; margin: 10px; padding: 0;">Valor total</p>
                                                            <input type="text" class="form-control" name="treatments-total-price" id="treatments-total-price" placeholder="Preço total *" value="0" readonly required>
                                                        </div>   
                                                        <div class="form-group col-md-6">
                                                            <p style="text-align: left; margin: 10px; padding: 0;">Desconto (%)</p>
                                                            <input type="text" class="form-control" name="treatments-discount" id="treatments-discount" placeholder="Desconto">
                                                        </div>   
                                                    </div> 
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <p style="text-align: left; margin: 10px; padding: 0;">Preço final</p>
                                                            <input type="text" class="form-control" name="treatments-final-price" id="treatments-final-price" placeholder="Preço final" readonly required>
                                                        </div>
                                                    </div>                                               
                                                </div>
                                            </div>
                                        </div>

                                        <div style="border: 1px solid #ddd; border-radius: 6px; margin: 0 0 15px;">
                                            <div class="card-header border-bottom">
                                                <h5 style="margin-top: 10px">Região afetada</h5>
                                                
                                                <!-- <div class="form-row">
                                                    <div class="form-group col-sm-10">
                                                        <input type="text" class="form-control" name="treatment" id="treatment" placeholder="Tratamentos *" autocomplete="off">
                                                    </div>                                            
                                                    <div class="form-group col-sm-2">
                                                        <button type='button' class='btn btn-sm btn-success btAddTreatment'
                                                        style='color: white'>Adicionar</button>
                                                    </div>
                                                </div> -->

                                            </div>
                                            <div class="card-body p-0 pb-3 text-center" style="margin: 15px 15px 0 15px;">
                                                
                                            <div class="tooths-container" style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center; align-items: center; border-bottom: 0.5px solid rgba(0,0,0,0.4)">
                                                    <div class="" style="width:50%; height: 100px; border-right: 0.5px solid rgba(0,0,0,0.4);">

                                                    </div>
                                                    <div class="" style="width:50%; height: 100px; border-left: 0.5px solid rgba(0,0,0,0.4)">
                                                        
                                                    </div>                                                
                                                </div>
                                                <div class="tooths-container" style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center; align-items: center; border-top: 0.5px solid rgba(0,0,0,0.4)">
                                                    <div class="" style="width:50%; height: 100px; border-right: 0.5px solid rgba(0,0,0,0.4)">

                                                    </div>
                                                    <div class="" style="width:50%; height: 100px; border-left: 0.5px solid rgba(0,0,0,0.4)">
                                                        
                                                    </div>                                                
                                                </div>
                                            </div>
                                        </div>

                                        <div style="border: 1px solid #ddd; border-radius: 6px; margin: 0 0 15px;">
                                            <div class="card-header border-bottom">
                                                <h5 style="margin-top: 10px">Itens que serão utilizados na consulta</h5>
                                                
                                                <div class="form-row">
                                                    <div class="form-group col-sm-5">
                                                        <input type="text" class="form-control" placeholder="Nome do item" autocomplete="off">
                                                    </div>                       
                                                    <div class="form-group col-sm-5">
                                                        <input type="number" class="form-control" placeholder="Quantidade" min="0" autocomplete="off">
                                                    </div>                                            
                                                    <div class="form-group col-sm-2">
                                                        <button type='button' class='btn btn-sm btn-success' style='color: white'>Adicionar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="card-body p-0 pb-3 text-center">
                                                <div class='table-responsive'>
                                                    <table class='table mb-0'>
                                                        <thead class='bg-light'>
                                                            <tr>
                                                                <th scope='col' class='border-0'>Nome do item</th>        
                                                                <th scope='col' class='border-0'>Quantidade</th>
                                                                <th scope='col' class='border-0'>Preço unitário</th>
                                                                <th scope='col' class='border-0'>Preço total</th>
                                                                <th scope='col' class='border-0'>Ações</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="stockItensTableContent"> 
                                                        
                                                        
                                                        </tbody>
                                                    </table>

                                                    <div id="stockItensEmptyPlaceholder">
                                                        <img style="max-width: 100%;" src="assets/images/empty-stock-placeholder.png" />
                                                        <h5 style='margin-top: 15px;'>Adicione os itens que serão utilizados na consulta</h5>
                                                    </div>

                                                </div> 
                                                <div style="margin: 20px 20px 0;">
                                                    <div class="form-row">                                                  
                                                        <div class="form-group col-md-6">
                                                            <p style="text-align: left; margin: 10px; padding: 0;">Valor total</p>
                                                            <input type="text" class="form-control" name="total-price" id="total-price" placeholder="Preço total *" value="0" readonly required>
                                                        </div>                                                           
                                                    </div>                                                     
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <p style="text-align: left; margin: 40px auto 10px; padding: 0;">Data e hora do início da consulta</p>
                                        <div class="form-row">                                     
                                            <div id="dateDiv" class="col-md-3 input-daterange form-group">
                                                <input type="text" class="input-sm form-control" name="start-date" placeholder="Data" id="start-date" autocomplete="off" required>
                                            </div>

                                            <div class="col-md-2">
                                                <input type="time" class="form-control" id="start-time" name="start-time" required>
                                            </div>
                                        </div>

                                        <p style="text-align: left; margin: 15px auto 10px; padding: 0;">Data e hora do fim da consulta</p>
                                        <div class="form-row">                                     
                                            <div id="dateDiv2" class="col-md-3 input-daterange form-group">
                                                <input type="text" class="input-sm form-control" name="end-date" placeholder="Data" id="end-date" autocomplete="off" required>
                                            </div>

                                            <div class="col-md-2">
                                                <input type="time" class="form-control" id="end-time" name="end-time" required>
                                            </div>
                                        </div>
                                                                      
                                        <div class="col-md-6" style="display: flex; flex-direction: flex-start; margin: 15px 0">
                                            <button style="width: 200px" type="submit" class="btn btn-outline-success">Adicionar</button>
                                        </div>                                                
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
                    <span class="copyright ml-auto my-auto mr-2">Copyright © 2019
                        <a target="_blank" href="https://decadatech.com" rel="nofollow">Decada Technology</a>
                    </span>
                </footer>
            </main>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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
    <script type="text/javascript" src="assets/js/jquery.mask.js"></script>

    <script src="assets/js/addTreatmentFunctions.js"></script>

    <!--Fields Formating Script-->
    <script>
        $(document).ready(function() {        

            $('#dateDiv, #dateDiv2').datepicker({
                format: 'dd/mm/yyyy',
            });

            $('#query-start').mask('00/00/0000 00:00:00');
            $('#query-end').mask('00/00/0000 00:00:00');    

            $('#treatments-total-price').mask('000.000.000.000.000,00', {reverse: true});
        });
    </script>
</body>

</html>