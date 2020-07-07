$(document).ready(function() {

    // LOGIN
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
   
    // CRIAR CONTA 
    $('#createAccountBtn').click(function() {          
        window.location.href = 'create-account.php';
    });
    
    // ABRE MODAL DE RESET DE SENHA
    $('#resetPassBtn').click(function(e) {  
        e.preventDefault();      
        $('#resetPassModal').modal('show');
    });

    // Evento ao fechar modal
    $('#resetPassModal').on('hidden.bs.modal', function () {                
        $('.modal-body .modal-alert').html('');
    });    

    // CONFIRMA MODAL DE RESET DE SENHA
    $(document).on('click', '.send-email', function() {
        if ($('input[name=email]').val() != '') {
            $.ajax({
                type: 'POST',
                url: 'php/send-email.php',
                data: {
                    email: $('input[name=email]').val()
                },
                success: function(response) {  
                    $('input[name=email]').val('');
                    if (response == 0) {      
                        $('.modal-body .modal-alert').html('<div class="alert alert-danger" role="alert">Nenhum usuário foi encontrado com esse nome de usuário ou E-mail!</div>');
                    } else {       
                        $('.modal-body .modal-alert').html('<div class="alert alert-success" role="alert">Um E-mail de redefinição de senha foi enviado para você! Cheque também a sua caixa de Spam e de Lixo Eletrônico.</div>');
                        startCountdown();              
                        setTimeout(() => $('#resetPassModal').modal('hide'), 8000);
                    }                
                }
            });
        }        
    });

    let seg = new Number();
    seg = 30;

    function startCountdown() {

        // Se o tempo não for zerado
        if ((seg - 1) >= 0) {       
        
            // Formata o número menor que dez, ex: 08, 07, ...
            if (seg <= 9) {
                seg = "0" + seg;
            }                        
            $("#sessao").html("Tente novamente em " + seg + " segundos");
            
            setTimeout(startCountdown, 1000);

            //Desabilita o botão
            $(".send-email").attr('disabled','disabled');

            // diminui o tempo
            seg--;

        // Quando o contador chegar a zero faz esta ação
        } else {
            $(".send-email").removeAttr('disabled');
            $("#sessao").html("");
            //TEMPO DE ESPERA DO BOTAO DE RESET SENHA
            seg = 30;
        }
    }
});