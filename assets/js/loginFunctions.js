$(document).ready(function() {

    $('#form-login').on('submit', function(e) {
        e.preventDefault();

        const user = $('input[name=user]').val();
        const password = $('input[name=password]').val();

        $.ajax({
            type: 'POST',
            url: 'php/login.php',
            data: {
                user,                
                password
            },
            success: function(response) {
                if (response === 'login success') {
                    window.location.href = "login.php";
                } else {                    
                    $('input[name=user]').val('');
                    $('input[name=password]').val('');

                    $('.screen-alert').html('<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-times mx-2"></i><strong>Erro!</strong> Usuário e/ou Senha incorretos!</div>');
                }                
            }    
        });
    });

    $('#resetPassBtn').click(function() {        
        $('#resetPassModal').modal('show');
    });
});