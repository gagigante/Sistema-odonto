$(document).ready(function(e) {

    let selectedTreatmentId = 0;
    let treatmentsData = 0;
    
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
                        console.log(treatmentsData[i].price);
                        price = parseFloat(price).toFixed(2) + parseFloat(treatmentsData[i].price).toFixed(2);
                        divContent = divContent + "<tr><td>" +treatmentsData[i].name+ "</td><td>R$" +treatmentsData[i].price.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL'})+ "</td><td><button type='button' id='" +i+ "' class='btn btn-sm btn-danger btDeleteButton'>Remover</button></td</tr>";
                    }

                    console.log(price);
           
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
            price += treatmentsData[i].price;
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

});