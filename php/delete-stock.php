<?php
	include_once "conexao.php";

	$id = $_POST["id"];

	$queryDelete ="delete from tb02_estoque WHERE tb02_idProduto=$id";
	$resultadoDelete = $conexao->query($queryDelete);

		
 ?>