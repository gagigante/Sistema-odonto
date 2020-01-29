<?php
	require "conexao.php";

	$id = $_POST["id"];

	$query ="delete from tb02_estoque WHERE tb02_id=$id";
	$result = $conexao->query($query);		
 ?>