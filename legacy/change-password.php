<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Redefinir senha</title>

    <!-- icons -->
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!-- Frameworks css -->
    <link rel="stylesheet" href="assets/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/libs/shards-dashboard/css/shards-dashboards.1.1.0.min.css">

    <!--Custom CSS -->
    <link rel="stylesheet" href="assets/css/change-password.style.css">
</head>

<body class="h-100">

    <?php
        if (!isset($_GET['id']) || empty($_GET['id'])) {                     
            header("Location: login.php");
        }
    ?>

    <div class="container-fluid">

        <div class="screen-alert" style="top: 0; position: absolute; width: 100%;"></div>

        <form class="form">
            <h2>Redefinir senha</h2>
            <p><span class="label">Nome de usuário:</span> <span id="username"></span></p>
            <p><span class="label">E-mail:</span> <span id="email"></span></p>
            <br />
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" name="password" id="password" autocomplete="off"
                        required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="confirm-password">Confirme sua senha</label>
                    <input type="password" class="form-control" name="confirm-password" id="confirm-password"
                        autocomplete="off" required>
                </div>
            </div>
            <span>Pelo menos 8 caracteres*</span>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <input id="submitBtn" type="submit" class="btn btn-success" value="Redefinir senha" />
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Sucesso</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Sua senha foi alterada com sucesso!</p>
                </div>
                <div class="modal-footer">
                    <button onclick="window.location.href = 'login.php'" type="button"
                        class="btn btn-success send-email">Ir para login</button>
                </div>
            </div>
        </div>
    </div>

    <!--Jquery CDN-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.min.js"></script>
    <!--Bootstrap PopperJs CND-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>

    <!--Framework required Scripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.min.js"></script>
    <script src="assets/libs/shards-dashboard/js/shards-dashboards.1.1.0.min.js"></script>

    <script src="assets/js/changePasswordFunctions.js"></script>

</body>

</html>