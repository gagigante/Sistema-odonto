<!doctype html>
<html class="no-js h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>DECADA ODONTO</title>

    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="assets/css/extras.1.1.0.min.css">


    <!--Jquery CDN-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
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
    <script src="scripts/app/app-blog-new-post.1.1.0.js"></script>
    <!--MaskJs Script-->
    <script type="text/javascript" src="assets/js/jquery.mask.js"></script>
    <script src="scripts/edita-patient.js"></script>
    <script src="scripts/select-patient.js"></script>
    
    <!--Fields Formating Script-->
    <script>
        $(document).ready(function() {
            $('#phone').mask('(00) 0 0000-0000');
            $('#rg').mask('00.000.000-00');
            $('#cpf').mask('000.000.000-00');
            $('#dateOfBirth').mask('00/00/0000');
            var nome = $('#name').val();
            document.getElementById("nomeUser").innerHTML = nome;

            $('#edit-btn').click(function() {
                var BtValue = $(this).val();

                if (BtValue === "Editar perfil") {
                    $("#name").attr("readonly", false);
                    $("#rg").attr("readonly", false);
                    $("#cpf").attr("readonly", false);
                    $("#phone").attr("readonly", false);
                    $("#email").attr("readonly", false);
                    $("#dateOfBirth").attr("readonly", false);

                    $(this).val("Salvar alterações");
                } else {
                    $("#name").attr("readonly", true);
                    $("#rg").attr("readonly", true);
                    $("#cpf").attr("readonly", true);
                    $("#phone").attr("readonly", true);
                    $("#email").attr("readonly", true);
                    $("#dateOfBirth").attr("readonly", true);
                    $(this).val("Editar perfil");
                }
            });
        });
    </script>

       
    </head>

    <body class="h-100" style="overflow-x: hidden;">

        <?php

            require 'php/conexao.php';
            require 'php/verificaLogin.php';

            $queryselect = "select * from tb01_paciente where tb01_idpaciente = $id and tb01_idUsuario = $idLogin";
            $resultadoselect = $conexao->query($queryselect);

            if ($resultadoselect->num_rows > 0) {
                while ($linha = $resultadoselect->fetch_assoc()) {

                    if (empty($linha["tb01_imagem"])) {
                        $linha["tb01_imagem"] = "0.jpg";
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
                                            <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="images/shards-dashboards-logo.svg" alt="Shards Dashboard">
                                            <span class="d-none d-md-inline ml-1">ODONTO FRONT-END</span>
                                        </div>
                                    </a>
                                    <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                                        <i class="material-icons">&#xE5C4;</i>
                                    </a>
                                </nav>
                            </div>
                            <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
                                <div class="input-group input-group-seamless ml-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                    <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search">
                                </div>
                            </form>
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
                                                <a class="dropdown-item notification__all text-center" href="#"> Ver todas as
                                                    notificações </a>
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
                            <div class="main-content-container container-fluid px-4">
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
                                                    <img class="user-avatar rounded-circle mr-2" <?php echo "src='assets/images/avatars/" . $linha["tb01_imagem"] . "'"; ?> alt="User Avatar" width="60px">
                                                    <p style="margin: auto 10px" id="nomeUser"></p>
                                                </div>
                                            </div>
                                            <div class="card-body p-0 pb-3">

                                                <nav>
                                                    <div class="nav nav-tabs" id="nav-tab" role="tablist" style="padding-left: 10px;">
                                                        <a style="margin-right: 5px;" class="nav-item nav-link active" data-toggle="tab" href="#tab1" role="tab">Sobre</a>
                                                        <a style="margin-right: 5px;" class="nav-item nav-link" data-toggle="tab" href="#tab2" role="tab">Orçamentos</a>
                                                        <a style="margin-right: 5px;" class="nav-item nav-link" data-toggle="tab" href="#tab3" role="tab">Tratamentos</a>
                                                        <a style="margin-right: 5px;" class="nav-item nav-link" data-toggle="tab" href="#tab4" role="tab">Anamnese</a>
                                                        <a style="margin-right: 5px;" class="nav-item nav-link" data-toggle="tab" href="#tab5" role="tab">Imagens</a>
                                                        <a style="margin-right: 5px;" class="nav-item nav-link" data-toggle="tab" href="#tab6" role="tab">Documentos</a>
                                                        <a style="margin-right: 5px;" class="nav-item nav-link" data-toggle="tab" href="#tab7" role="tab">Débitos</a>
                                                    </div>
                                                </nav>

                                                <div class="tab-content" id="nav-tabContent">

                                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                                        <form class="col-md-8" style="padding: 30px;" id="formEdita">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nome completo" value="<?php echo $linha["tb01_nome"];; ?>" readonly>
                                                                    <input type="hidden" name="idpaciente" id="idpaciente" value="<?php echo $linha["tb01_idpaciente"];; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <input type="text" class="form-control" name="rg" id="rg" placeholder="RG" value="<?php echo $linha["tb01_rg"];; ?>" readonly>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF" value="<?php echo $linha["tb01_cpf"];; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Telefone" value="<?php echo $linha["tb01_telefone"];; ?>" readonly>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" value="<?php echo $linha["tb01_email"];; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <input type="text" class="form-control" name="dateOfBirth" id="dateOfBirth" placeholder="Data de nascimento" value="<?php echo $linha["tb01_data"];; ?>" readonly>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <input type="file" accept="image/png, image/jpeg, image/jpg" onchange="verificaExtensao(this)" id="photo" name="photo" class="btn">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="button" name="button" type="button" id="edit-btn" class="btn btn-outline-success" value="Editar perfil" style="width: 125px;" />
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <div class="col-md-4">
                                                        </div>
                                                    </div>
                                            <?php }
                                                } else {
                                                    header("Location: patients.php");
                                                }

                                                ?>

                                            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="nav-profile-tab" style="padding: 30px;">

                                                <a href="add-budget.php" class="btn btn-outline-success" style="width: 140px; margin: 10px">Adicionar orçamento</a>

                                                <table class="table">
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
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons" style="color: #999">find_in_page</i>
                                                                </button>
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons" style="color: #999">file_copy</i>
                                                                </button>
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons" style="color: #999">local_printshop</i>
                                                                </button>
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
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
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons" style="color: #999">find_in_page</i>
                                                                </button>
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons" style="color: #999">file_copy</i>
                                                                </button>
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons" style="color: #999">local_printshop</i>
                                                                </button>
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
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
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons" style="color: #999">find_in_page</i>
                                                                </button>
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons" style="color: #999">file_copy</i>
                                                                </button>
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons" style="color: #999">local_printshop</i>
                                                                </button>
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons" style="color: red">delete</i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="nav-contact-tab" style="padding: 30px;">


                                                <a href="add-budget.php" class="btn btn-outline-success" style="width: 140px; margin: 10px">Adicionar orçamento</a>

                                                <table class="table">
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
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons" style="color: #999">find_in_page</i>
                                                                </button>
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons" style="color: #999">file_copy</i>
                                                                </button>
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons" style="color: #999">local_printshop</i>
                                                                </button>
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
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
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons" style="color: #999">find_in_page</i>
                                                                </button>
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons" style="color: #999">file_copy</i>
                                                                </button>
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons" style="color: #999">local_printshop</i>
                                                                </button>
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
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
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons" style="color: #999">find_in_page</i>
                                                                </button>
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons" style="color: #999">file_copy</i>
                                                                </button>
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons" style="color: #999">local_printshop</i>
                                                                </button>
                                                                <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                    <i class="material-icons" style="color: red">delete</i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>





                                                <!-- Image Map Generated by http://www.image-map.net/ -->
                                                <img src="assets/images/bb4744f30c13ba63bf1c10f620cfa550.jpg" usemap="#image-map">

                                                <map name="image-map">
                                                    <area target="" alt="" title="" href="" coords="335,351,335,337,344,324,354,324,370,328,375,340,374,351,370,363,361,368,346,370,335,363" shape="poly">
                                                    <area target="" alt="" href="#" onclick="alert('dente')" coords="323,386,326,375,344,371,358,373,364,381,360,402,350,409,333,414,320,404" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="305,439,309,420,323,415,333,416,343,421,345,444,337,454,319,461,306,450" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="293,476,294,465,309,460,321,465,322,472,317,487,306,492,296,486" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="276,506,276,494,284,486,296,487,302,495,301,510,292,518,283,515" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="260,531,255,510,261,503,271,508,280,520,280,531,272,538,263,538" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="238,538,240,519,248,518,255,529,261,542,258,549,249,551,240,550" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="221,542,224,523,232,516,236,529,236,554,222,554" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="201,546,206,524,213,520,216,526,216,542,217,553,205,554,197,532,196,515,185,518,178,535,178,546,191,555" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="162,540,152,519,162,507,176,501,185,516,174,540" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="133,502,136,488,147,481,156,484,165,496,161,504,149,520,138,512" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="116,473,116,461,124,458,138,454,146,461,149,468,149,478,132,492,122,487" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="98,432,97,418,114,409,130,408,137,427,142,443,138,450,116,459,102,446" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="78,391,76,373,90,362,108,362,116,369,124,386,123,399,113,408,90,408" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="66,329,78,318,101,319,106,335,110,357,78,364,67,346" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="72,269,64,241,74,233,83,235,96,239,100,249,104,261,100,273,88,275" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="72,219,75,195,88,194,106,200,112,210,118,228,105,242,78,232" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="83,181,84,167,89,154,104,151,116,153,120,158,128,176,125,191,117,201,90,191" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="98,141,99,123,117,119,130,125,135,138,133,151,118,153" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="110,107,119,92,138,87,143,99,145,109,147,121,138,124,115,115" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="132,73,138,60,152,58,159,70,164,82,164,89,154,94,131,84" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="154,53,161,68,170,76,176,78,182,67,182,54,174,44" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="184,46,184,56,188,65,194,72,202,74,210,66,218,55,217,44,203,42" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="219,45,221,62,230,76,243,74,251,64,254,50,240,43" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="255,79,253,59,262,50,272,52,278,61,279,74,266,84" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="272,97,278,83,281,68,292,66,300,73,305,83,304,97,288,106,280,106" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="290,131,289,117,298,103,312,99,324,103,326,116,324,123,308,135" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="306,161,304,144,315,129,333,128,340,139,339,151,322,161" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="314,195,313,173,332,157,350,154,354,167,356,183,354,192,334,207" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="330,235,328,213,350,201,368,203,372,226,371,235,344,245" shape="poly">
                                                    <area target="" alt="" title="" href="" coords="337,274,333,254,346,247,376,243,380,256,377,270,368,283,354,283" shape="poly">
                                                </map>



                                            </div>
                                            <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="nav-contact-tab">tab4</div>
                                            <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                <form style="margin: 30px">
                                                    <input type="file" class="btn btn-outline-success" /> Adicionar
                                                    imagem
                                                </form>


                                                <div class="gallery">
                                                    <div class="gallery-item">
                                                        <img src="assets/images/profile-images/download.jpg">
                                                        <div class="item-options">
                                                            Image name goes here
                                                            <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                <i class="material-icons" style="color: red">delete</i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="gallery-item">
                                                        <img src="assets/images/profile-images/download.jpg">
                                                        <div class="item-options">
                                                            Image name goes here
                                                            <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                <i class="material-icons" style="color: red">delete</i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="gallery-item">
                                                        <img src="assets/images/profile-images/download.jpg">
                                                        <div class="item-options">
                                                            Image name goes here
                                                            <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                <i class="material-icons" style="color: red">delete</i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="gallery-item">
                                                        <img src="assets/images/profile-images/download.jpg">
                                                        <div class="item-options">
                                                            Image name goes here
                                                            <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                <i class="material-icons" style="color: red">delete</i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="gallery-item">
                                                        <img src="assets/images/profile-images/download.jpg">
                                                        <div class="item-options">
                                                            Image name goes here
                                                            <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                <i class="material-icons" style="color: red">delete</i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="gallery-item">
                                                        <img src="assets/images/profile-images/download.jpg">
                                                        <div class="item-options">
                                                            Image name goes here
                                                            <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                <i class="material-icons" style="color: red">delete</i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="gallery-item">
                                                        <img src="assets/images/profile-images/download.jpg">
                                                        <div class="item-options">
                                                            Image name goes here
                                                            <button type="button" style="background: transparent; border: 0;cursor: pointer;">
                                                                <i class="material-icons" style="color: red">delete</i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab6" role="tabpanel" aria-labelledby="nav-contact-tab">tab6</div>
                                            <div class="tab-pane fade" id="tab7" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                <a href="#" class="btn btn-outline-success" style="width: 140px; margin: 30px">Adicionar novo</a>
                                                <div style="display: flex; flex-direction: row; justify-content: flex-start; align-itens: center">
                                                    <div class="border-bottom" style="padding: 10px 30px; margin: 10px;">
                                                        <p style="margin: 0">Total pago</p>
                                                        <h5 style="margin: 0; color: #32a852">R$ 10.000,00</h5>
                                                    </div>
                                                    <div class="border-bottom" style="padding: 10px 30px; margin: 10px;">
                                                        <p style="margin: 0">Total a receber</p>
                                                        <h5 style="margin: 0; color: #a83232">R$ 10.000,00</h5>
                                                    </div>
                                                </div>

                                                <table class="table" style="margin: 30px; ">
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
                                                                <a href="#">Pagar</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Plano tratamento de fulano</td>
                                                            <td>R$ 80.00</td>
                                                            <td>99/99/9999</td>
                                                            <td>
                                                                <i class="material-icons" style="color: #32a852">check</i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Plano tratamento de fulano</td>
                                                            <td>R$ 80.00</td>
                                                            <td>99/99/9999</td>
                                                            <td>
                                                                <i class="material-icons" style="color: #32a852">check</i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Plano tratamento de fulano</td>
                                                            <td>R$ 80.00</td>
                                                            <td>99/99/9999</td>
                                                            <td>
                                                                <i class="material-icons" style="color: #32a852">check</i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Plano tratamento de fulano</td>
                                                            <td>R$ 80.00</td>
                                                            <td>99/99/9999</td>
                                                            <td>
                                                                <i class="material-icons" style="color: #32a852">check</i>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                                </div>
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
    </body>

    </html>
