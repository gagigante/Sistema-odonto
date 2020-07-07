<?php
	include_once "conexao.php";

	$id = $_POST['eventID'];

	$queryDelete ="DELETE FROM tb06_eventos WHERE tb06_idEvento = $id";
	$resultadoDelete = $conexao->query($queryDelete);

		
 ?>