$(document).ready(function() {
    
    //CARREAGA OS ITENS AO TERMINAR DE CARREGAR A PÁGINA
    $.ajax({
        url: 'php/select-treatments.php',
        success: function(response) {
            $('.ajax-response').html(response);
        },
    });

    //AO DAR SUBMIT NO FORM ADICIONA O ITEM E ATUALIZA O CONTEÚDO DA TABELA    
    $('#formTreatment').submit(function (event) {
        event.preventDefault();

        $.ajax({
            url: 'php/add-treatment.php',
            type: 'POST',
            data: $('#formTreatment').serialize(),
        }).done(function (data) {
            $.ajax({
                url: "php/select-treatments.php",
                success: function (result) {

                    //ESTRUTURA DO ALERT
                    let alert = '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-check mx-2"></i><strong>Sucesso!</strong> O item foi adicionado ao catálogo!</div>';

                    $(".ajax-response").html(result);                    
                    $('#formTreatment input').val(''); //LIMPA OS INPUTS      
                    $('.screen-alert').html(alert); //ADICIONA O ALERT NA TELA          
                }          
            });
        });
    });    

    //ABRE O MODAL DE EDICAO COM AS INFORMACOES DO TRATAMENTO CORRESPONDENTE
    $(document).on('click', '.view-modal', function() {

        let treatmentId = $(this).attr("id"); //ID DO PRODUTO SELECIONADO
        let buttonId = '#'+treatmentId; //ID DO BOTAO PRESSIONADO\
        
        //alert($('.description-col-'+treatmentId).html())
             
        //PEGA O VALOR CONTIDO DENTRO DAS COLUNAS DO ITEM SELECIONADO
        const description = $('.description-col-'+treatmentId).html();
        const name = $('.name-col-'+treatmentId).html();

        //PEGA PRECO PELO O DATA ATRIBUTE DO BOTAO PRESSIONADO E ATRIBUI OS VALORES AO FORM
        $('#edit-name').val(name);
        $('#edit-description').val(description);
        $('#edit-price').val($(buttonId).data('price'));
                
        $('#treatmentModal').modal('show'); //ABRE O MODAL
        
        //PASSA O ID DO PRODUTO COMO DATA-ATRIBUTE PARA OS BOTOES DE SALVAR E APAGAR
        $('.save').data('treatmentId', treatmentId);        
    });
    
    //SALVA AS ALTERAÇÕES E FAZ O SELECT NOVAMENTE
    $('.save').click(function (event) {
        event.preventDefault();

        $.ajax({
            url: 'php/update-treatment.php',
            type: 'POST',
            data: {
                name: $('#edit-name').val(),
                price: $('#edit-price').val(),
                description: $('#edit-description').val(),                
                id: $('.save').data('treatmentId')
            },              
        }).done(function () { 
            $.ajax({
                url: "php/select-treatments.php",
                success: function (result) {

                    //ESTRUTURA DO ALERT
                    let alert = '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-check mx-2"></i><strong>Sucesso!</strong> O item foi atualizado!</div>';

                    $(".ajax-response").html(result);                    
                    $('#formEditTreatment input').val(''); //LIMPA OS INPUTS      
                    $('.screen-alert').html(alert); //ADICIONA O ALERT NA TELA          
                },
                Error: function () {
                    $(".ajax-response").html("Error");
                    $('#formEditTreatment input').val(''); //LIMPA OS INPUTS
                },
            });
                        
            $('#treatmentModal').modal('toggle'); //FECHA O MODAL NO FINAL DAS REQUISIÇÕES
        });
    });

    //ABRE O MODAL DE DELETE
    $(document).on('click', '.view-modal-delete', function() {               
        let treatmentId = $(this).attr("id"); //ID DO PRODUTO SELECIONADO        

        $('.confirm-delete').data('treatmentId', treatmentId); //PASSA O ID COMO DATA ATTRIBUTES    
        $('#modalDelete').modal('show'); //ABRE O MODAL
    });

    //APAGA O REGISTRO SELECIONADO E FAZ NOVAMENTE O SELECT 
    $('.confirm-delete').click(function() {
        let treatmentId = $('.confirm-delete').data('treatmentId');

        $.ajax({
            url: 'php/delete-treatment.php',
            type: 'POST',
            data: {               
                id: treatmentId
            },              
        }).done(function () { 
            $.ajax({
                url: "php/select-treatments.php",
                success: function (result) {

                    //ESTRUTURA DO ALERT
                    let alert = '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-check mx-2"></i><strong>Sucesso!</strong> O item foi removido!</div>';

                    $(".ajax-response").html(result);                    
                    $('#formEditTreatment input').val(''); //LIMPA OS INPUTS      
                    $('.screen-alert').html(alert); //ADICIONA O ALERT NA TELA          
                }               
            });
            $('#modalDelete').modal('toggle'); //FECHA O MODAL NO FINAL DAS REQUISIÇÕES
        });
    });
});

