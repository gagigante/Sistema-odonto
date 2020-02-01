<?php
	require "conexao.php";

	$id = $_POST["id"];

	$query ="delete from tb05_financeiro WHERE tb05_id=$id";
	$result = $conexao->query($query);		
 ?>