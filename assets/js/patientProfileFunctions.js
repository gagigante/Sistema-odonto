$(document).ready(function() {
    
    //PEGA O ID DO PACIENTE NA URL
    const url = window.location.href; 
    const patientId = url.split('?')[1].split('=')[1];     

    $.ajax({
        url: 'php/select-query.php',
        type: 'POST', 
        data: {                   
            patient_id: patientId  
        },
        success: function(response) {
            $('.query-ajax-response').html(response);
        },
    });

    $('#btPayDebit').click(function(e) {        
        $('#confirmPayDebitModal').modal('show');
    });

    $('#btDeleteTreatment').click(function(e) {
        $('#confirmDeleteTreatmentModal').modal('show');
    });

    //EVENTO DISPARADO AO FECHAR O MODAL PARA RESETAR OS CAMPOS
    // $('#debitModal').on('hidden.bs.modal', function (e) { 
    //     //alert('o modal foi fechado');
    //     $('#debitDescription').val("");
    //     $('#debitPrice').val("");
    //     $('#debitDate').val("");
    // });

    $('.btDeleteDebit').click(function(e) {
        $('#deleteDebitModal').modal('show');        
    });

    $('#edit-btn').click(function(e){
                
        e.preventDefault();

        var id = $('#idpaciente').val();
        var nome = $('#name').val();
        var rg = $('#rg').val();
        var cpf = $('#cpf').val();
        var telefone = $('#phone').val();
        var email = $('#email').val();
        var data = $('#dateOfBirth').val();    
        document.getElementById("nomeUser").innerHTML = nome;  

        $.post('php/patient-profile-edita.php', {
            id:id,
            nome:nome,
            rg:rg,
            cpf:cpf,
            telefone:telefone,
            email:email,
            data:data

        }, function(resposta){

        });
        
    });

    // TAB 5 - IMAGENS

    //SELECT DAS IMAGENS
    $.ajax({
        url: 'php/select-patient-images.php',
        type: 'POST', 
        data: {                   
            patient_id: patientId  
        },
        success: function(response) {
            $('.gallery-ajax-response').html(response);
        },
    });

    //ADICIONAR IMAGEM
    $('#patient-add-image-form').on('submit', function(e) {
        
        e.preventDefault();

        var form = $('#patient-add-image-form')[0];        
        var data = new FormData(form);
        data.append('idPaciente', patientId);

        $.ajax({
            type: 'POST',
            url: 'php/add-patient-image.php',
            data: data,
            processData: false,  
            contentType: false,            
            success: function(response){                
                
                $('.screen-alert').html(response); //ADICIONA O ALERT NA TELA
                
                //SELECT DAS IMAGENS
                $.ajax({
                    url: 'php/select-patient-images.php',
                    type: 'POST', 
                    data: {                   
                        patient_id: patientId  
                    },
                    success: function(response) {                                                 
                        $('.gallery-ajax-response').html(response);
                    },
                });                
            },
        });    

        $('#image-input').val("");    
    });

    //APAGAR IMAGEM

    var selectedImageId;

    $(document).on('click', '.btDelete', function () {
        selectedImageId = $(this).attr("id");                 
        $('#deleteImageModal').modal('show');
    });  

    //BOTAO DO MODAL PARA CONFIRMAR DELETE
    $('#btConfirImageDelete').click(function() {

        const imageId = selectedImageId;

        $.ajax({
            url: 'php/delete-patient-image.php',
            type: 'POST', 
            data: {                   
                imageId: imageId,  
            },
            success: function(response) {                                                 
                                 
                //ESTRUTURA DO ALERT
                let alert = '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-check mx-2"></i><strong>Sucesso!</strong> A imagem foi removida!</div>';

                $('.screen-alert').html(alert); //ADICIONA O ALERT NA TELA   

                 //SELECT DAS IMAGENS
                 $.ajax({
                    url: 'php/select-patient-images.php',
                    type: 'POST', 
                    data: {                   
                        patient_id: patientId  
                    },
                    success: function(response) {                                                 
                        $('.gallery-ajax-response').html(response);
                    },
                });  

            },
        });    

        $('#deleteImageModal').modal('hide');
    });

    // TAB 6 - DOCUMENTOS

    //TAB 7 - DEBITOS

});