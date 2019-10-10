<?php

	include_once "conexao.php";


	$imagem = $_FILES['photo']['name'];
	$imagemtemp = $_FILES['photo']['tmp_name'];
	$nome = $_POST["name"];
	$rg = $_POST["rg"];
	$cpf = $_POST["cpf"];
	$tel = $_POST["phone"];
	$email = $_POST["email"];
	$data = $_POST["dateOfBirth"];

	$tamanho['tamanho'] = 1024*1024*100;



	if ($tamanho['tamanho'] < $_FILES['photo']['size']){
		echo "
					<script type=\"text/javascript\">
						alert(\"Arquivo excede o tamanho máximo.\");
					</script>
				";
	}

	if(empty($imagem)){
		$queryInsereCadastro = "INSERT INTO tb01_paciente VALUES('".$nome."','".$rg."','".$cpf."','".$tel."','".$email."','".$data."', NULL, NULL)";
		$resultadoInsereCadastro = mysqli_query($conexao, $queryInsereCadastro);


	}else{
		if(move_uploaded_file($imagemtemp, "../images/patients/".$imagem)){
			$queryInsereCadastro = "INSERT INTO tb01_paciente VALUES('".$nome."','".$rg."','".$cpf."','".$tel."','".$email."','".$data."','".$imagem."', NULL)";
			$resultadoInsereCadastro = mysqli_query($conexao, $queryInsereCadastro);
		}

	}	



?>