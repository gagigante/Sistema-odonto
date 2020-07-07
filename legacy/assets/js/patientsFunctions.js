//CARREAGA OS ITENS AO TERMINAR DE CARREGAR A PÁGINA
$(document).ready(function(e) {
    $.ajax({
        url: 'php/select-patients.php',
        success: function(response) {
            $('.ajax-response').html(response);
        },
    });
});