//PESQUISA DOS ELEMENTOS DA TABELA
$('.navbar-search').keyup(function() {
    //GUARDAR NA VARIÁVEL O VALOR DIGITADO
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    $('.table-responsive table tr').show();
    //FILTRAR COM O VALOR DO CAMPO PRODUTO
    $('.table-responsive table tr #selectName').filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).parent().hide();
});