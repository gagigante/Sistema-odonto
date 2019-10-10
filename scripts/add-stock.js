$(function(){

    $('#add-btn').click(function(e){
        
        
        e.preventDefault();

        var produto = $('#product').val();
        var quantidade = $('#amount').val();
        var preco = $('#price').val();       

        $.post('../php/patient-profile-edita.php', {
            produto:produto,
            quantidade:quantidade,
            preco:preco,            

        }, function(resposta){

        });
        
    });
});