$(document).ready(function() {

    //PEGA O ID VIA GET
    var url_string = window.location.href;
    var url = new URL(url_string);
    var user_id = url.searchParams.get("id");

    $.ajax({
        type: 'POST',
        url: 'php/select-user-data.php',
        data: {
            userId: user_id,                            
        },
        success: function(response) {
            let result = $.parseJSON(response);  
                        
            if (result[0].shouldReset == 0) {                
                window.location.href = 'login.php';
            }
                        
            $('span#username').text(result[0].username);
            $('span#email').text(result[0].email);
        }    
    });

    $('.form').on('submit', function(e) {
        e.preventDefault();

        const password = $('input#password').val();
        const confirmPassword = $('input#confirm-password').val();
        
        if (password.length >= 8) {
            if (password == confirmPassword) {

                $.ajax({
                    type: 'POST',
                    url: 'php/update-user-password.php',
                    data: {
                        userId: user_id,   
                        password                         
                    },
                    success: function(res) { 
                        $('#confirmModal').modal('show');
                    }    
                });

            } else {
                $('.screen-alert').html('<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-times mx-2"></i><strong>Erro!</strong> Os campos não estão iguais</div>');
            }
        } else {
            $('.screen-alert').html('<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-times mx-2"></i><strong>Erro!</strong> A sua senha precisa ter pelo menos 8 caracteres!</div>');
        }        
    });
});