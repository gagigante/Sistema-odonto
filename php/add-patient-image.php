<?php
	require "conexao.php";    
	
    $idLogin = $_SESSION['idUsuario'];
	$idPaciente = $_POST['idPaciente'];
	
	if(isset($_FILES['image']) && $_FILES['image']['size'] > 0) {  
 
		$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
		$array_extensoes   = explode('.', $_FILES['image']['name']);
	    $extensao = strtolower(end($array_extensoes));
 
		$arquivo = $_FILES['image'];				
		$imageHash = md5(date("d/m/y H:i:s"));	
		//nome da imagem com hash
		$imageNameWithHash = $imageHash . $arquivo['name'];

		// Validamos se a extensão do arquivo é aceita
	    if (array_search($extensao, $extensoes_aceitas) === false) {
				  
			//ERRO - EXTENCAO NAO SUPORTADA
			echo('<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-times mx-2"></i><strong>Erro!</strong> Extenção não suportada! </div>');

	       exit(); 
		}
	
		// Verifica se o upload foi enviado via POST   
		if(is_uploaded_file($arquivo['tmp_name'])) {  
			
			if(!file_exists("../assets/images/patients-images")) {
				mkdir("../assets/images/patients-images");  
			}
						
			// Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			if (!move_uploaded_file($arquivo['tmp_name'], '../assets/images/patients-images/' . $imageNameWithHash)){  
				
				//ERRO - ARQUIVO NAO COPIADO
				echo('<div class="alert alert-success alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-times mx-2"></i><strong>Erro!</strong> Algo não occoreu como o esperado!</div>');
				exit();  
			}

			$query = "INSERT INTO tb10_imagens_paciente (tb10_id_paciente, tb10_imagem, tb10_id_usuario) VALUES ('$idPaciente', '$imageNameWithHash', '$idLogin')";
			$result = mysqli_query($conexao, $query);	

			//SUCESSO - TUDO SAIU COMO ESPERADO
			echo('<div class="alert alert-success alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-check mx-2"></i><strong>Sucesso!</strong> Imagem adicionada!</div>');
		}		
	} else { //ERRO - UPLOAD SEM ARQUIVO
		
		echo('<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-times mx-2"></i><strong>Erro!</strong> Escolha uma imagem!</div>');
	}
?>
