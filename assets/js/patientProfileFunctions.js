$(document).ready(function() {
    
    //PEGA O ID DO PACIENTE NA URL
    const url = window.location.href; 
    const patientId = url.split('?')[1].split('=')[1];  
    
    // LIMITE DAS PASTAS DE DOCUMENTOS E DE IMAGENS POR USUARIO
    const docDirectoryLimit = 80;
    const imageDirectoryLimit = 120;

    // TAB 1 - SOBRE

    //SELECT DOS DADOS DO PACIENTE
    $.ajax({
        url: 'php/select-patient-data.php',
        type: 'POST', 
        data: {                   
            patient_id: patientId  
        },
        success: function(response) {  

            var data = JSON.parse(response);
 
            $('#nomeUser').text(data[0].nome);
            $("#userProfileImage").attr("src","assets/images/patients-profile-images/" +data[0].imagem); 

            $('#name').val(data[0].nome);
            $('#address').val(data[0].endereco);
            $('#rg').val(data[0].rg);
            $('#cpf').val(data[0].cpf);
            $('#phone').val(data[0].telefone);
            $('#email').val(data[0].email);
            $('#dateOfBirth').val(data[0].data);
            $('#profession').val(data[0].profissao);
        },
    });

    //UPDATE DOS DADOS    
    $('#about-patient-form').on('submit', function(e) {
        
        e.preventDefault();

        const BtValue = $('#edit-btn').val();

        if (BtValue === "Editar perfil") {

            $("#name").attr("readonly", false);
            $("#address").attr("readonly", false);
            $("#rg").attr("readonly", false);
            $("#cpf").attr("readonly", false);
            $("#phone").attr("readonly", false);
            $("#email").attr("readonly", false);
            $("#dateOfBirth").attr("readonly", false);
            $('#profession').attr("readonly", false);

            $('#edit-btn').val("Salvar alterações");

        } else {

            let form = $('#about-patient-form')[0];        
            let data = new FormData(form);
            data.append('idPaciente', patientId);

            $.ajax({
                type: 'POST',
                url: 'php/update-patient-data.php',
                data: data,
                processData: false,  
                contentType: false,            
                success: function(response) {    

                    $('.screen-alert').html(response); //ADICIONA O ALERT NA TELA

                    //SELECT DOS DADOS DO PACIENTE
                    $.ajax({
                        url: 'php/select-patient-data.php',
                        type: 'POST', 
                        data: {                   
                            patient_id: patientId  
                        },
                        success: function(response) {  

                            var data = JSON.parse(response);
                
                            $('#nomeUser').text(data[0].nome);
                            $("#userProfileImage").attr("src","assets/images/patients-profile-images/" +data[0].imagem);

                            $('#name').val(data[0].nome);
                            $('#address').val(data[0].endereco);
                            $('#rg').val(data[0].rg);
                            $('#cpf').val(data[0].cpf);
                            $('#phone').val(data[0].telefone);
                            $('#email').val(data[0].email);
                            $('#dateOfBirth').val(data[0].data);
                            $('#profession').val(data[0].profissao);
                        },
                    });
                }
            });

            $("#name").attr("readonly", true);
            $("#address").attr("readonly", true);
            $("#rg").attr("readonly", true);
            $("#cpf").attr("readonly", true);
            $("#phone").attr("readonly", true);
            $("#email").attr("readonly", true);
            $("#dateOfBirth").attr("readonly", true);
            $('#profession').attr("readonly", true);

            $('#edit-btn').val("Editar perfil");

            $('#profile-photo').val("");   
        }
    });

    // TAB 2 - ORCAMENTOS

    // TAB 3 - CONSULTAS

    // SELECT DAS CONSULTAS
    $.ajax({
        url: 'php/select-patient-queries.php',
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

    $('.btDeleteDebit').click(function(e) {
        $('#deleteDebitModal').modal('show');        
    });

    $('#edit-btn').click(function(e){
                
        // e.preventDefault();

        // var id = $('#idpaciente').val();
        // var nome = $('#name').val();
        // var rg = $('#rg').val();
        // var cpf = $('#cpf').val();
        // var telefone = $('#phone').val();
        // var email = $('#email').val();
        // var data = $('#dateOfBirth').val();    
        // document.getElementById("nomeUser").innerHTML = nome;  

        // $.post('php/patient-profile-edita.php', {
        //     id:id,
        //     nome:nome,
        //     rg:rg,
        //     cpf:cpf,
        //     telefone:telefone,
        //     email:email,
        //     data:data

        // }, function(resposta){

        // });
        
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
   
    //SELECT DOS DOCUMENTOS
    $.ajax({
        url: 'php/select-patient-documents.php',
        type: 'POST', 
        data: {                   
            patient_id: patientId  
        },
        success: function(response) {
            $('.document-ajax-response').html(response);

            //CALCULA ESPAÇO DISPONÍVEL
            $.ajax({
                url: 'php/get-patient-document-directory-size.php',
                type: 'POST', 
                data: {                   
                    patient_id: patientId  
                },
                success: function(response) {
                    const directorySize = response;
                    const avaiblePercent = (directorySize/docDirectoryLimit) * 100;
                                
                    $('#document-avaible-space div').css({ width: `${avaiblePercent}%` }); 
                    $('#document-avaible-space div').html(Math.round(avaiblePercent * 10) / 10 + "%"); 

                    $('#doc-used').html(Math.round(directorySize * 10) / 10);
                    $('#doc-avaiable').html(docDirectoryLimit);
                },
            });
        },
    });

    //ADICIONAR DOCUMENTO
    $('#patient-add-document-form').on('submit', function(e) {
        
        e.preventDefault();

        var form = $('#patient-add-document-form')[0];        
        var data = new FormData(form);
        data.append('idPaciente', patientId);
        data.append('space_limit', docDirectoryLimit);        

        $.ajax({
            type: 'POST',
            url: 'php/add-patient-document.php',
            data: data,
            processData: false,  
            contentType: false,            
            success: function(response){                
                
                $('.screen-alert').html(response); //ADICIONA O ALERT NA TELA
                
                //SELECT DOS DOCUMENTOS
                $.ajax({
                    url: 'php/select-patient-documents.php',
                    type: 'POST', 
                    data: {                   
                        patient_id: patientId                      
                    },
                    success: function(response) {
                        $('.document-ajax-response').html(response);

                        //CALCULA ESPAÇO DISPONÍVEL
                        $.ajax({
                            url: 'php/get-patient-document-directory-size.php',
                            type: 'POST', 
                            data: {                   
                                patient_id: patientId  
                            },
                            success: function(response) {
                                const directorySize = response;
                                const avaiblePercent = (directorySize/docDirectoryLimit) * 100;
                                            
                                $('#document-avaible-space div').css({ width: `${avaiblePercent}%` }); 
                                $('#document-avaible-space div').html(Math.round(avaiblePercent * 10) / 10 + "%"); 

                                $('#doc-used').html(Math.round(directorySize * 10) / 10);
                                $('#doc-avaiable').html(docDirectoryLimit);
                            },
                        });
                    },
                });      
            },
        });    

        $('#document-input').val("");    
        $('#documentName').val("");    
    });

    //APAGAR DOCUMENTO
    var selectedDocId;

    $(document).on('click', '.btDeleteDoc', function () {
        selectedDocId = $(this).attr("id");        
        $('#deleteDocModal').modal('show');
    });  

    //BOTAO DO MODAL PARA CONFIRMAR DELETE
    $('#btConfirDocDelete').click(function() {

        const docId = selectedDocId;

        $.ajax({
            url: 'php/delete-patient-document.php',
            type: 'POST', 
            data: {                   
                docId: docId,  
                patient_id: patientId,                
            },
            success: function(response) {                                                 
                                 
                //ESTRUTURA DO ALERT
                let alert = '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-check mx-2"></i><strong>Sucesso!</strong> O documento foi removido!</div>';

                $('.screen-alert').html(alert); //ADICIONA O ALERT NA TELA   

                //SELECT DOS DOCUMENTOS
                $.ajax({
                    url: 'php/select-patient-documents.php',
                    type: 'POST', 
                    data: {                   
                        patient_id: patientId  
                    },
                    success: function(response) {
                        $('.document-ajax-response').html(response);

                        //CALCULA ESPAÇO DISPONÍVEL
                        $.ajax({
                            url: 'php/get-patient-document-directory-size.php',
                            type: 'POST', 
                            data: {                   
                                patient_id: patientId  
                            },
                            success: function(response) {
                                const directorySize = response;
                                const avaiblePercent = (directorySize/docDirectoryLimit) * 100;
                                            
                                $('#document-avaible-space div').css({ width: `${avaiblePercent}%` }); 
                                $('#document-avaible-space div').html(Math.round(avaiblePercent * 10) / 10 + "%"); 

                                $('#doc-used').html(Math.round(directorySize * 10) / 10);
                                $('#doc-avaiable').html(docDirectoryLimit);
                            },
                        });
                    },
                });     

            },
        });    

        $('#deleteDocModal').modal('hide');
    });

    //TAB 7 - DEBITOS
      
    //SELECT DOS DADOS DE DÉBITO DA CONSULTA DO PACIENTE
    $.ajax({
        url: 'php/select-patient-values.php',
        type: 'POST', 
        data: {                   
            patient_id: patientId  
        },
        success: function(response) {

            const data = JSON.parse(response)

            $(".debit-received").text("R$ " + data.received);
            $(".debit-pending").text("R$ " + data.pending);
        },
    });
    
    //SELECT DOS DÉBITOS DA CONSULTA
    $.ajax({
        url: 'php/select-patient-debits.php',
        type: 'POST', 
        data: {                   
            patient_id: patientId  
        },
        success: function(response) {
            $('.debits-ajax-response').html(response);
        },
    });

    var selectedDebit;
    
    // ABRE MODAL DE PAGAMENTO 
    $(document).on('click', '.view-modal-debit', function (e) {

        e.preventDefault();

        selectedDebit = $(this).attr('id');  
        
        let totalPrice = $('.price-td.'+selectedDebit).text().replace('R$', '');
        let received = $('.received-td.'+selectedDebit).text().replace('R$', '');
        
        let parsedTotalPrice = totalPrice.replace(',', '.');
        let parsedReceived = received.replace(',', '.');

        let receivable = parseFloat(parsedTotalPrice - parsedReceived);
        
        $('#modal-received').text('R$' + parsedReceived.replace('.', ','));
        $('#modal-pending').text('R$' + receivable.toString().replace('.', ','));
        $('#modal-description').text($('.description-td.'+selectedDebit).text());

        $('#PayDebitModal').modal('show');
    });  

    // CHECKBOX DE PAGAMENTO COMPLETO
    $('#modal-check').click(function() {
        if ($(this).is(':checked')) {
            $("#modal-paid-out").attr("readonly", true);
            $("#modal-paid-out").val($('#modal-pending').text().replace('R$', ''));
        } else {
            $("#modal-paid-out").attr("readonly", false);
            $("#modal-paid-out").val("");
        };
    });

    // REGISTRA PAGAMENTO
    $('#modal-debit-form').on('submit', function(e) {
        
        e.preventDefault();

        let paymentDate = $('#modal-payment-date').val();
        let payment = $('#modal-payment').val();
        let paidOut = parseFloat($('#modal-paid-out').val().replace(',', '.'));

        // DETERMINA O VALOR MÁXIMO À SER PAGO
        let totalPrice = $('.price-td.'+selectedDebit).text().replace('R$', '');
        let received = $('.received-td.'+selectedDebit).text().replace('R$', '');
        let parsedTotalPrice = totalPrice.replace(',', '.');
        let parsedReceived = received.replace(',', '.');
        let receivable = parseFloat(parsedTotalPrice - parsedReceived);
        
        if(paymentDate.length === 10 && paidOut <= receivable) {
            $.ajax({
                url: 'php/add-patient-payment.php',
                type: 'POST', 
                data: {                   
                    queryId: selectedDebit,
                    paid: paidOut,
                    payment: payment,
                    date: paymentDate
                },
                success: function(response) {
                    
                    //SELECT DOS DADOS DE DÉBITO DA CONSULTA DO PACIENTE
                    $.ajax({
                        url: 'php/select-patient-values.php',
                        type: 'POST', 
                        data: {                   
                            patient_id: patientId  
                        },
                        success: function(response) {
    
                            const data = JSON.parse(response)
    
                            $(".debit-received").text("R$ " + data.received);
                            $(".debit-pending").text("R$ " + data.pending);
                        },
                    });
                    
                    //SELECT DOS DÉBITOS DA CONSULTA
                    $.ajax({
                        url: 'php/select-patient-debits.php',
                        type: 'POST', 
                        data: {                   
                            patient_id: patientId  
                        },
                        success: function(response) {
                            $('.debits-ajax-response').html(response);
                        },
                    });

                    // SELECT DAS CONSULTAS
                    $.ajax({
                        url: 'php/select-patient-queries.php',
                        type: 'POST', 
                        data: {                   
                            patient_id: patientId  
                        },
                        success: function(response) {
                            $('.query-ajax-response').html(response);
                        },
                    });

                    $('#modal-payment').val('');
                    $('#modal-paid-out').val('');
                    $('#modal-payment-date').val('');
                },
            });

            $('#PayDebitModal').modal('hide');
        } else {

        }
    });

    // ABRE O MODAL DE VISUALIZAÇÃO DE MOVIMENTAÇÕES
    $(document).on('click', '.view-modal-payments', function (e) {
        
        e.preventDefault();

        selectedDebit = $(this).attr('id');

        // SELECT DAS MOVIMENTAÇÕES DA CONSULTA
        $.ajax({
            url: 'php/select-patient-payments.php',
            type: 'POST', 
            data: {                   
                queryId: selectedDebit  
            },
            success: function(response) {
                $('.payments-ajax-response').html(response);
            },
        });

        $('#paymentsModal').modal('show');
    })

    //------------
});