$(function(){

    $('#edit-btn').click(function(e){
        
        
        e.preventDefault();

        var id = $('#idpaciente').val();
        var nome = $('#name').val();
        var rg = $('#rg').val();
        var cpf = $('#cpf').val();
        var telefone = $('#phone').val();
        var email = $('#email').val();
        var data = $('#dateOfBirth').val();    
        document.getElementById("nomeUser").innerHTML = nome; //////////////////////////////     

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
});