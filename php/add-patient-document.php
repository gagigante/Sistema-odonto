<?php
	require "conexao.php";    
	
    $idLogin = $_SESSION['idUsuario'];
	$idPaciente = $_POST['idPaciente'];
    
    $docDesc = $_POST['documentName'];

	if(isset($_FILES['document']) && $_FILES['document']['size'] > 0) {  
 
		$extensoes_aceitas = array('docx' ,'pdf', 'ppt', 'txt', 'xlsx', 'zip');
		$array_extensoes   = explode('.', $_FILES['document']['name']);
	    $extensao = strtolower(end($array_extensoes));
 
		$arquivo = $_FILES['document'];				
		$docHash = md5(date("d/m/y H:i:s"));	
		//nome da imagem com hash
        $docNameWithHash = $docHash . $arquivo['name'];
        //extencao da imagem        
        $ext = pathinfo($arquivo['name'], PATHINFO_EXTENSION);

		// Validamos se a extensão do arquivo é aceita
	    if (array_search($extensao, $extensoes_aceitas) === false) {
				  
			//ERRO - EXTENCAO NAO SUPORTADA
			echo('<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-times mx-2"></i><strong>Erro!</strong> Extenção não suportada! </div>');

	       exit(); 
		}
	
		// Verifica se o upload foi enviado via POST   
		if(is_uploaded_file($arquivo['tmp_name'])) {  
			
			if(!file_exists("../assets/documents/patients-documents")) {
				mkdir("../assets/documents/patients-documents");  
			}
						
			// Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			if (!move_uploaded_file($arquivo['tmp_name'], '../assets/documents/patients-documents/' . $docNameWithHash)){  
				
				//ERRO - ARQUIVO NAO COPIADO
				echo('<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-times mx-2"></i><strong>Erro!</strong> Algo não occoreu como o esperado!</div>');
				exit();  
			}

            $query = "INSERT INTO tb11_documentos_paciente (tb11_id_paciente, tb11_documento, tb11_nome, tb11_extencao, tb11_id_usuario) VALUES ('$idPaciente', '$docNameWithHash', '$docDesc', '$ext', '$idLogin');";
			$result = mysqli_query($conexao, $query);	

			//SUCESSO - TUDO SAIU COMO ESPERADO
			echo('<div class="alert alert-success alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-check mx-2"></i><strong>Sucesso!</strong> Documento adicionado!</div>');
		}		
	} else { //ERRO - UPLOAD SEM ARQUIVO
		
		echo('<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-times mx-2"></i><strong>Erro!</strong> Escolha um documento!</div>');
	}
?>
