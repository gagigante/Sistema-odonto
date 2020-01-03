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
});

// $(function () {
//     $('#formStock').submit(function (event) {
//         event.preventDefault();
//         $.ajax({
//             url: 'php/add-stock.php',
//             type: 'POST',
//             data: $('#formStock').serialize(),
//         }).done(function (data) {
//             $.ajax({
//                 url: "php/select-stock.php",
//                 success: function (result) {

//                     //ESTRUTURA DO ALERT
//                     let alert = '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-check mx-2"></i><strong>Sucesso!</strong> O item foi adicionado ao estoque!</div>';

//                     $(".ajax-response").html(result);                    
//                     $('#formStock input').val(''); //LIMPA OS INPUTS      
//                     $('.screen-alert').html(alert); //ADICIONA O ALERT NA TELA          
//                 },
//                 Error: function () {
//                     $(".ajax-response").html("Error");
//                     $('#formStock input').val(''); //LIMPA OS INPUTS
//                 },
//             });
//         });
//     });
// });