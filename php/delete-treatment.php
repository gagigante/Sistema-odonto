<?php
	include_once "conexao.php";

	$id = $_POST["id"];

	$queryDelete ="delete from tb03_tratamentos WHERE tb03_id=$id";
	$resultadoDelete = $conexao->query($queryDelete);

		
 ?>