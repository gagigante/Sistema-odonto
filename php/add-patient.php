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

	} else {

		if(move_uploaded_file($imagemtemp, "../assets/images/patients-profile-images/".$imageNameWithHash)){
			$queryInsereCadastro = "INSERT INTO tb01_paciente (tb01_nome, tb01_rg, tb01_cpf, tb01_telefone, tb01_email, tb01_data, tb01_imagem, tb01_proficao, tb01_endereco, tb01_idUsuario) VALUES ('$nome', '$rg', '$cpf', '$tel', '$email', '$data','$imageNameWithHash', '$proficao', '$endereco', '$idLogin')";
			$resultadoInsereCadastro = mysqli_query($conexao, $queryInsereCadastro);
		}

	}	
							           			
	header("Location:../patients.php");	
?>