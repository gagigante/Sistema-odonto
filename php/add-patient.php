<?php

	require "conexao.php";
	
	$idLogin = $_SESSION['idUsuario'];

	$imagem = $_FILES['photo']['name'];
	$imagemtemp = $_FILES['photo']['tmp_name'];
	$imageHash = md5(date("d/m/y H:i:s"));

	$imageNameWithHash = $imageHash . $imagem; 

	$nome = mysqli_real_escape_string($conexao, trim($_POST["name"]));
	$endereco = mysqli_real_escape_string($conexao, trim($_POST["address"]));
	$profissao = mysqli_real_escape_string($conexao, trim($_POST["profession"]));
	$rg = mysqli_real_escape_string($conexao, trim($_POST["rg"]));
	$cpf = mysqli_real_escape_string($conexao, trim($_POST["cpf"]));
	$tel = mysqli_real_escape_string($conexao, trim($_POST["phone"]));
	$email = mysqli_real_escape_string($conexao, trim($_POST["email"]));

	//CONVERTER A DATA DO PADRAO BRASILEIRO PARA O FORMATO DO BANCO DE DADOS
	$data = str_replace('/', '-', mysqli_real_escape_string($conexao, trim($_POST["date"])));
	$conv_data = date("Y-m-d", strtotime($data));	

	$tamanho['tamanho'] = 1024*1024*100;

	if ($tamanho['tamanho'] < $_FILES['photo']['size']){
		echo 
			"<script type=\"text/javascript\">
				alert(\"Arquivo excede o tamanho máximo.\");
			</script>
			";
	}

	if(empty($imagem)){

		$query = "INSERT INTO tb01_pacientes (tb01_nome, tb01_rg, tb01_cpf, tb01_telefone, tb01_email, tb01_data_nascimento, tb01_profissao, tb01_endereco, tb01_id_usuario) VALUES ('$nome', '$rg', '$cpf', '$tel', '$email', '$conv_data', '$profissao', '$endereco', '$idLogin')";
		$result = mysqli_query($conexao, $query);

	} else {

		if(move_uploaded_file($imagemtemp, "../assets/images/patients-profile-images/".$imageNameWithHash)){
			$query = "INSERT INTO tb01_pacientes (tb01_nome, tb01_rg, tb01_cpf, tb01_telefone, tb01_email, tb01_data_nascimento, tb01_imagem, tb01_profissao, tb01_endereco, tb01_id_usuario) VALUES ('$nome', '$rg', '$cpf', '$tel', '$email', '$conv_data','$imageNameWithHash', '$profissao', '$endereco', '$idLogin')";
			$result = mysqli_query($conexao, $query);
		}
	}	
							           			
	header("Location:../patients.php");	
?>