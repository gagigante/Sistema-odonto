//CARREAGA OS ITENS AO TERMINAR DE CARREGAR A PÁGINA
$(document).ready(function(e) {
    $.ajax({
        url: 'php/select-stock.php',
        success: function(response) {
            $('.ajax-response').html(response);
        },
    });
});

//AO DAR SUBMIT NO FORM ADICIONA O ITEM E ATUALIZA O CONTEÚDO DA TABELA
$(function () {
    $('#formStock').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: 'php/add-stock.php',
            type: 'POST',
            data: $('#formStock').serialize(),
        }).done(function (data) {
            $.ajax({
                url: "php/select-stock.php",
                success: function (result) {

                    //ESTRUTURA DO ALERT
                    let alert = '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-check mx-2"></i><strong>Sucesso!</strong> O item foi adicionado ao estoque!</div>';

                    $(".ajax-response").html(result);                    
                    $('#formStock input').val(''); //LIMPA OS INPUTS      
                    $('.screen-alert').html(alert); //ADICIONA O ALERT NA TELA          
                },
                Error: function () {
                    $(".ajax-response").html("Error");
                    $('#formStock input').val(''); //LIMPA OS INPUTS
                },
            });
        });
    });
});


//ABRE O MODAL COM AS INFORMACOES DO PRODUTO CORRESPONDENTE
$(document).on('click', '.view-modal', function() {

    let productId = $(this).attr("id"); //ID DO PRODUTO SELECIONADO
    let buttonId = '#'+productId; //ID DO BOTAO PRESSIONADO
    
    $('#stockModal').modal('show'); //ABRE O MODAL

    //PEGA OS DATA ATRIBUTES DO BOTAO PRESSIONADO E ADICIONA AOS INPUTS DO FORM
    $('#edit-name').val($(buttonId).data('name'));
    $('#qtd').val($(buttonId).data('amount'));
    $('#edit-price').val($(buttonId).data('price'));
    
    //PASSA O ID DO PRODUTO COMO DATA-ATRIBUTE PARA OS BOTOES DE SALVAR E APAGAR
    $('.save').data('productId', productId);
    $('.delete').data('productId', productId);
});

$(function () {
    //SALVA AS ALTERAÇÕES E FAZ O SELECT NOVAMENTE
    $('.save').click(function (event) {
        event.preventDefault();

        $.ajax({
            url: 'php/update-stock.php',
            type: 'POST',
            data: {
                name: $('#edit-name').val(),
                price: $('#edit-price').val(),
                qtd: $('#qtd').val(),
                add: $('#add').val(),
                id: $('.save').data('productId')
            },  
            //data: $('#formEditStock').serialize(),
        }).done(function (data) { 
            $.ajax({
                url: "php/select-stock.php",
                success: function (result) {

                    //ESTRUTURA DO ALERT
                    let alert = '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-check mx-2"></i><strong>Sucesso!</strong> O item foi atualizado!</div>';

                    $(".ajax-response").html(result);                    
                    $('#formEditStock input').val(''); //LIMPA OS INPUTS      
                    $('.screen-alert').html(alert); //ADICIONA O ALERT NA TELA          
                },
                Error: function () {
                    $(".ajax-response").html("Error");
                    $('#formStock input').val(''); //LIMPA OS INPUTS
                },
            });
            $('#stockModal').modal('toggle'); //FECHA O MODAL NO FINAL DAS REQUISIÇÕES
        });
    });

    //APAGA O ITEM SELECIONADO E FAZ O SELECT NOVAMENTE
    $('.delete').click(function (event) {
        event.preventDefault();

        $.ajax({
            url: 'php/delete-stock.php',
            type: 'POST',
            data: {
                name: $('#edit-name').val(),
                price: $('#edit-price').val(),
                qtd: $('#qtd').val(),
                add: $('#add').val(),
                id: $('.save').data('productId')
            },  
            //data: $('#formEditStock').serialize(),
        }).done(function (data) { 
            $.ajax({
                url: "php/select-stock.php",
                success: function (result) {

                    //ESTRUTURA DO ALERT
                    let alert = '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-check mx-2"></i><strong>Sucesso!</strong> O item foi removido!</div>';

                    $(".ajax-response").html(result);                    
                    $('#formEditStock input').val(''); //LIMPA OS INPUTS      
                    $('.screen-alert').html(alert); //ADICIONA O ALERT NA TELA          
                },
                Error: function () {
                    $(".ajax-response").html("Error");
                    $('#formStock input').val(''); //LIMPA OS INPUTS
                },
            });
            $('#stockModal').modal('toggle'); //FECHA O MODAL NO FINAL DAS REQUISIÇÕES
        });
    });
});

