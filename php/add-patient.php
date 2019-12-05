<?php

	require "conexao.php";
	
	$idLogin = $_SESSION['idUsuario'];

	$imagem = $_FILES['photo']['name'];
	$imagemtemp = $_FILES['photo']['tmp_name'];
	$imageHash = md5(date("d/m/y H:i:s"));

	$imageNameWithHash = $imageHash . $imagem; 

	$nome = mysqli_real_escape_string($conexao, trim($_POST["name"]));
	$endereco = mysqli_real_escape_string($conexao, trim($_POST["address"]));
	$proficao = mysqli_real_escape_string($conexao, trim($_POST["profession"]));
	$rg = mysqli_real_escape_string($conexao, trim($_POST["rg"]));
	$cpf = mysqli_real_escape_string($conexao, trim($_POST["cpf"]));
	$tel = mysqli_real_escape_string($conexao, trim($_POST["phone"]));
	$email = mysqli_real_escape_string($conexao, trim($_POST["email"]));
	$data = mysqli_real_escape_string($conexao, trim($_POST["date"]));

	$tamanho['tamanho'] = 1024*1024*100;

	if ($tamanho['tamanho'] < $_FILES['photo']['size']){
		echo 
			"<script type=\"text/javascript\">
				alert(\"Arquivo excede o tamanho máximo.\");
			</script>
			";
	}

	if(empty($imagem)){

		$queryInsereCadastro = "INSERT INTO tb01_paciente (tb01_nome, tb01_rg, tb01_cpf, tb01_telefone, tb01_email, tb01_data, tb01_proficao, tb01_endereco, tb01_idUsuario) VALUES ('$nome', '$rg', '$cpf', '$tel', '$email', '$data', '$proficao', '$endereco', '$idLogin')";
		$resultadoInsereCadastro = mysqli_query($conexao, $queryInsereCadastro);

	}else{
		if(move_uploaded_file($imagemtemp, "../assets/images/patients-images/".$imageNameWithHash)){
			$queryInsereCadastro = "INSERT INTO tb01_paciente (tb01_nome, tb01_rg, tb01_cpf, tb01_telefone, tb01_email, tb01_data, tb01_imagem, tb01_proficao, tb01_endereco, tb01_idUsuario) VALUES ('$nome', '$rg', '$cpf', '$tel', '$email', '$data','$imageNameWithHash', '$proficao', '$endereco', '$idLogin')";
			$resultadoInsereCadastro = mysqli_query($conexao, $queryInsereCadastro);
		}

	}	

		
					           
			// $destino = '';
			
			// if(count($photo) > 0) {
						
			// 	$nome = $photo[0][ 'name' ];
			// 	$arquivo_tmp = $photo[0][ 'tmp_name' ];        
	
			// 	$extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
	
			// 	$extensao = strtolower ( $extensao );
	
			// 	if(in_array($extensao, array('.jpeg', 'jpg', 'png'))) {            
					
			// 		$novoNome = uniqid ( time () ) . '.' . $extensao;
					
			// 		$destino = 'assets/images/alunos/' . $novoNome;
	
			// 		@move_uploaded_file ( $arquivo_tmp, $destino );
			// 	}                    
			// }
			   
			//adiciona os dados basicos do aluno
			// $sql = $pdo->prepare(
			// 	"INSERT INTO tb02_alunos SET tb02_nome = :nome, tb02_id_academia = :id_academia, tb02_rg = :rg, tb02_cpf = :cpf, tb02_foto_url = :foto; 
			// 	INSERT INTO tb03_dados_alunos SET tb03_id_aluno = (SELECT tb02_id FROM tb02_alunos ORDER BY tb02_id desc LIMIT 1), tb03_genero = :genero, tb03_data_nascimento = :data, tb03_peso = :peso, tb03_altura = :altura, tb03_cargo = :cargo;
			// 	INSERT INTO tb04_contato_alunos SET tb04_id_aluno = (SELECT tb02_id FROM tb02_alunos ORDER BY tb02_id desc LIMIT 1), tb04_email = :email, tb04_telefone= :telefone;
			// 	INSERT INTO tb05_graduacao_alunos SET tb05_id_aluno = (SELECT tb02_id FROM tb02_alunos ORDER BY tb02_id desc LIMIT 1), tb05_graduacao = :graduacao, tb05_data_exame = :data_exame;"
			// );            
			//    $sql->bindValue(":nome", $name);
			// $sql->bindValue(":id_academia", $academy);	
			// $sql->bindValue(":rg", $rg);		
			// $sql->bindValue(":cpf", $cpf);	   
			// $sql->bindValue(":foto", $destino);
			// $sql->bindValue(":genero", $gender);
			// $sql->bindValue(":data", $date);
			// $sql->bindValue(":peso", $weight);
			// $sql->bindValue(":altura", $height);
			// $sql->bindValue(":cargo", 0);
			// $sql->bindValue(":telefone", $phone);
			// $sql->bindValue(":email", $email);
			// $sql->bindValue(":graduacao", 1);
			// $sql->bindValue(":data_exame", date('d/m/y'));
			// $sql->execute();                        


	header("Location:../patients.php");	
?>