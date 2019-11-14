<?php
	
	include_once "conexao.php";


	$id = $_POST['eventId'];

	//CONVERTER A DATA DO PADRAO BRASILEIRO PARA O FORMATO DO BANCO DE DADOS
	$start_date = str_replace('/', '-', $_POST["event-start"]);
	$converted_start_date = date("Y-m-d H:i:s", strtotime($start_date));
	$end_date = str_replace('/', '-', $_POST["event-end"]);
	$converted_end_date = date("Y-m-d H:i:s", strtotime($end_date));
	
	$titulo = $_POST["event-title"];
	$paciente = $_POST["event-patient"];
	$descricao = $_POST["event-description"];			

	$queryEdita = "UPDATE tb06_eventos SET tb06_nome='$titulo',tb06_paciente='$paciente',tb06_descricao='$descricao',tb06_inicio='$converted_start_date',tb06_fim='$converted_end_date' WHERE tb06_idEvento ='$id'";

	// //$queryEdita = "UPDATE tb06_eventos SET tb06_nome='$titulo',tb06_paciente='$paciente',tb06_descricao='$descricao',tb06_inicio='$converted_end_date',tb06_fim='$converted_start_date' WHERE tb06_idEvento = '$id'";

	$resultadoEdita = mysqli_query($conexao, $queryEdita);    

	