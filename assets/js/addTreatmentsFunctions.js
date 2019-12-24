$(document).ready(function(e) {
    $('#treatment').autocomplete({
        source: '../../php/autoCompleteAddTreatment.php',
        select: function (event, ui) {
            // $("#txtAllowSearch").val(ui.item.label); // display the selected text
            // $("#txtAllowSearchID").val(ui.item.value); // save selected id to hidden input
        }
    });
    
    // $('#button').click(function() {
    //     alert($("#txtAllowSearchID").val()); // get the id from the hidden input
    // }); 
});