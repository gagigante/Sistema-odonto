<?php

	require "conexao.php";

	$id = $_POST["id"];
	$nome = $_POST["nome"];
	$rg = $_POST["rg"];
	$cpf = $_POST["cpf"];
	$tel = $_POST["telefone"];
	$email = $_POST["email"];
	$data = $_POST["data"];


	$queryEditaCadastro = "UPDATE tb01_paciente SET tb01_nome = '$nome', tb01_rg = '$rg', tb01_cpf = '$cpf', tb01_telefone = '$tel',  tb01_email = '$email', tb01_data = '$data' WHERE tb01_idpaciente='$id'";
	$resultadoEditaCadastro = mysqli_query($conexao, $queryEditaCadastro);		
?>