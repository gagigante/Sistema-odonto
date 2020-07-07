function verificaExtensao($photo) {
    var extPermitidas = ['png', 'jpeg', 'jpg'];
    var extArquivo = $photo.value.split('.').pop();
  
    if(typeof extPermitidas.find(function(ext) { return extArquivo == ext; }) == 'undefined') {        
        $('#modalText').text('A extensão "' +extArquivo+ '" não é permitida!');
        $('#alertModal').modal('show');
        $("#photo").val('');
    }
  }