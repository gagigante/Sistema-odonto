$(document).ready(function(e) {

    let selectedTreatmentId = 0;
    let treatmentsData = 0;
    
    //PEGA O ID VIA GET
    var url_string = window.location.href;
    var url = new URL(url_string);
    var idPaciente = url.searchParams.get("id");

    //AUTOCOMPLETE DO CAMPO DE TRATAMENTO
    $("#treatment").autocomplete({        
        source: 'php/autoCompleteAddTreatment.php',     
        change: function(e, ui) {
            if (!ui.item) {
                $(this).val("");
            }
        },
        response: function(e, ui) {
            if (ui.content.length == 0) {
                $(this).val("");
            }
        },
        select: function (event, ui) {
            selectedTreatmentId = ui.item.id;                    
        }
    }).on("keydown", function(e) {
        if (e.keyCode == 27) {
            $(this).val("");
        }
    });
    
    $('.btAddTreatment').click(function() {
               
        if(selectedTreatmentId != 0) {

            //let divContent = $('#treatmentsTableContent').html();            
            let divContent;
            let price = 0;
            
            $.ajax({
                url: 'php/add-query-treatments.php',
                type: 'POST',
                data: {
                    treatmentId: selectedTreatmentId,                    
                    data: treatmentsData,                    
                },
                success: function(response) {
             
                    let result = $.parseJSON(response);  
                    treatmentsData = result;                      
                                            
                    for(let i = 0; i < treatmentsData.length; i++){
                        price = parseFloat(price) + parseFloat(treatmentsData[i].price);

                        divContent = divContent + "<tr><td>" +treatmentsData[i].name+ "</td><td>R$" +treatmentsData[i].price.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL'})+ "</td><td><button type='button' id='" +i+ "' class='btn btn-sm btn-danger btDeleteButton'>Remover</button></td</tr>";
                    }   
                    
                    console.log(treatmentsData);
           
                    $('#treatmentsTableContent').html(divContent);
                    $('#total-price').val(price);
          
                    selectedTreatmentId = 0;
                    $('#treatment').val('');

                    //VERIFICA SE O EMPTY-PLACEHOLDER DEVE SER EXIBIDO
                    if(treatmentsData != 0) {
                        if(treatmentsData.length > 0) {
                            $('#emptyPlaceholder').hide();
                        }
                    }            
                },
            });
        }        
    });

    //REMOVE O ITEM DO HTML E DO ARRAY DE TRATAMENTOS
    $(document).on('click', '.btDeleteButton', function () {
                
        let divContent = '';
        let treatmentId = $(this).attr("id");   
        let price = 0;

        //REMOVE O TRATAMENTO DO ARRAY
        treatmentsData.splice(treatmentId, 1);                   

        //PERCORRE O ARRAY E ARMAZENA O HTML NA VARIAVEL
        for(let i = 0; i < treatmentsData.length; i++){
            price = (price * 1) + (treatmentsData[i].price * 1);
            divContent = divContent + "<tr><td>" +treatmentsData[i].name+ "</td><td>R$" +treatmentsData[i].price+ "</td><td><button type='button' id='" +i+ "' class='btn btn-sm btn-danger btDeleteButton'>Remover</button></td</tr>";
        }
                
        //ESCREVE O CONTEÚDO NA TABELA
        $('#treatmentsTableContent').html(divContent);
        $('#total-price').val(price);

        //VERIFICA SE O EMPTY-PLACEHOLDER DEVE SER EXIBIDO
        if(treatmentsData.length == 0) {            
            $('#emptyPlaceholder').show();            
        }
    });

    $('#queryForm').submit(function(e) {

        e.preventDefault()
        
        if($('#total-price').val() != 0) {     
            alert('submit');
        } else {
            
            let alert = '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-times mx-2"></i><strong>Erro!</strong> Selecione pelo menos um tratamento! </div>';
            $('.screen-alert').html(alert); //ADICIONA O ALERT NA TELA 
            
            //SUBIR A PÁGINA PARA O TOPO 
            $('html, body').animate({scrollTop: 0}, 800);
            event.stopPropagation(); 

        }
    });
});