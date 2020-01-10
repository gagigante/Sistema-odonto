<?php
    require "conexao.php";
    
    $id = mysqli_real_escape_string($conexao, trim($_POST["idPaciente"]));
    $nome = mysqli_real_escape_string($conexao, trim($_POST["name"]));
    $endereco = mysqli_real_escape_string($conexao, trim($_POST["address"]));
    $rg = mysqli_real_escape_string($conexao, trim($_POST["rg"]));
    $cpf = mysqli_real_escape_string($conexao, trim($_POST["cpf"]));
    $tel = mysqli_real_escape_string($conexao, trim($_POST["phone"]));
    $email = mysqli_real_escape_string($conexao, trim($_POST["email"]));    

    //CONVERTER A DATA DO PADRAO BRASILEIRO PARA O FORMATO DO BANCO DE DADOS
	$data = str_replace('/', '-', mysqli_real_escape_string($conexao, trim($_POST["dateOfBirth"])));
	$conv_data = date("Y-m-d", strtotime($data));

	$queryEditaCadastro = "UPDATE tb01_paciente SET tb01_nome = '$nome', tb01_rg = '$rg', tb01_cpf = '$cpf', tb01_telefone = '$tel',  tb01_email = '$email', tb01_endereco = '$endereco', tb01_data = '$conv_data' WHERE tb01_idpaciente='$id'";
    $resultadoEditaCadastro = mysqli_query($conexao, $queryEditaCadastro);	
        
    if(isset($_FILES['profile-photo']) && $_FILES['profile-photo']['size'] > 0) {  
 
		$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
		$array_extensoes   = explode('.', $_FILES['profile-photo']['name']);
	    $extensao = strtolower(end($array_extensoes));
 
		$arquivo = $_FILES['profile-photo'];				
		$imageHash = md5(date("d/m/y H:i:s"));	
		//nome da imagem com hash
		$imageNameWithHash = $imageHash . $arquivo['name'];

		// Validamos se a extensão do arquivo é aceita
	    if (array_search($extensao, $extensoes_aceitas) === false) {
				  
			//ERRO - EXTENSAO NAO SUPORTADA
			echo('<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-times mx-2"></i><strong>Erro!</strong> Extensão da foto não suportada! </div>');

	       exit(); 
		}
	
		// Verifica se o upload foi enviado via POST   
		if(is_uploaded_file($arquivo['tmp_name'])) {  
			
			if(!file_exists("../assets/images/patients-profile-images")) {
				mkdir("../assets/images/patients-profile-images");  
			}
						
			// Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			if (!move_uploaded_file($arquivo['tmp_name'], '../assets/images/patients-profile-images/' . $imageNameWithHash)){  
				
				//ERRO - ARQUIVO NAO COPIADO
				echo('<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-times mx-2"></i><strong>Erro!</strong> Algo não occoreu como o esperado!</div>');
				exit();  
			}

            //PEGA O NOME DA FOTO DE PERFIL ATUAL
            $queryselect = "SELECT * FROM tb01_paciente WHERE tb01_idPaciente = " .$id;        
            $resultadoselect = $conexao->query($queryselect);
            
            while($row = $resultadoselect->fetch_assoc()) {
                if ($row['tb01_imagem'] != "patient-default-profile-image.png") {                   
                    unlink('../assets/images/patients-profile-images/' . $row['tb01_imagem']);  
                }
            }

            //ATUALIZA A FOTO DE PERFIL
			$query = "UPDATE tb01_paciente SET tb01_imagem = '$imageNameWithHash' WHERE tb01_idpaciente = '$id'";
			$result = mysqli_query($conexao, $query);	
        }		             
    }
    
    //SUCESSO - TUDO SAIU COMO ESPERADO
    echo('<div class="alert alert-success alert-dismissible fade show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-check mx-2"></i><strong>Sucesso!</strong> Os dados foram atualizados!</div>');
?>