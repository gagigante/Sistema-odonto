<?php
	require "conexao.php";

	$idLogin = $_SESSION['idUsuario'];	

	$paciente = mysqli_real_escape_string($conexao, trim($_POST["add-patient"]));
	$titulo = mysqli_real_escape_string($conexao, trim($_POST["add-title"]));
	$descricao = mysqli_real_escape_string($conexao, trim($_POST["add-description"]));
	$comeco = mysqli_real_escape_string($conexao, date('Y/m/d h:i:s',strtotime($_POST["add-start"])));
	$fim = mysqli_real_escape_string($conexao, date('Y/m/d h:i:s',strtotime($_POST["add-end"])));
	$cor = $_POST["color"];

	$queryInsereCadastroEstoque = "INSERT INTO tb06_eventos(tb06_nome, tb06_paciente, tb06_descricao, tb06_cor, tb06_inicio, tb06_fim, tb06_idEvento, tb06_idUsuario) VALUES ('$titulo', '$paciente', '$descricao', '$cor', '$comeco', '$fim', NULL ,'$idLogin')";
	$resultadoInsereCadastroEstoque = mysqli_query($conexao, $queryInsereCadastroEstoque);	


	header("Location: ../schedule.php");

	mysqli_close($conexao);	
?>