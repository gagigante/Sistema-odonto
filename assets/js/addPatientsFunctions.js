function verificaExtensao($photo) {
    var extPermitidas = ['png', 'jpeg', 'jpg'];
    var extArquivo = $photo.value.split('.').pop();
  
    if(typeof extPermitidas.find(function(ext){ return extArquivo == ext; }) == 'undefined') {
        alert('Extensão "' + extArquivo + '" não permitida!');
        $("#photo").val('');
    }
  }