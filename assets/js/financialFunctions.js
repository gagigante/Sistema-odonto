$(document).ready(function (e) {
    //CARREAGA OS ITENS AO TERMINAR DE CARREGAR A PÁGINA
    $.ajax({
        url: 'php/select-financial.php',
        success: function (response) {
            $('.ajax-response').html(response);
        },
    });

    //AO DAR SUBMIT NO FORM ADICIONA O ITEM E ATUALIZA O CONTEÚDO DA TABELA
    $('#formFinancial').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: 'php/add-financial.php',
            type: 'POST',
            data: $('#formFinancial').serialize(),
        }).done(function (data) {
            $.ajax({
                url: "php/select-financial.php",
                success: function (result) {

                    //ESTRUTURA DO ALERT
                    let alert = '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-check mx-2"></i><strong>Sucesso!</strong> O item foi adicionado ao estoque!</div>';

                    $(".ajax-response").html(result);
                    $('#formFinancial input').val(''); //LIMPA OS INPUTS      
                    $('.screen-alert').html(alert); //ADICIONA O ALERT NA TELA          
                },
                Error: function () {
                    $(".ajax-response").html("Error");
                    $('#formFinancial input').val(''); //LIMPA OS INPUTS
                },
            });
        });
    });

    $(document).on('click', '.view-modal-delete', function () {
        let itemId = $(this).attr("id");

        $('.confirm-delete').data('itemId', itemId);
        $('#modalDelete').modal('show');
    });

    //APAGA O ITEM SELECIONADO E FAZ O SELECT NOVAMENTE
    $('.confirm-delete').click(function () {
        let itemId = $('.confirm-delete').data('itemId');

        $.ajax({
            url: 'php/delete-financial.php',
            type: 'POST',
            data: {
                id: itemId
            },
        }).done(function () {
            $.ajax({
                url: "php/select-financial.php",
                success: function (result) {

                    //ESTRUTURA DO ALERT
                    let alert = '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-check mx-2"></i><strong>Sucesso!</strong> O item foi removido!</div>';

                    $('.ajax-response').html(result);
                    $('.screen-alert').html(alert); //ADICIONA O ALERT NA TELA          
                },
            });
            $('#modalDelete').modal('toggle'); //FECHA O MODAL NO FINAL DAS REQUISIÇÕES
        });
    });
});

