<?php
	include_once "conexao.php";

	$nome = $_POST["name"];
	$descricao = $_POST["description"];
	$preco = str_replace(",",".", $_POST["price"]);
	
	$queryInsereCadastroEstoque = "INSERT INTO tb03_tratamentos VALUES('".$nome."','".$descricao."','".$preco."', NULL)";
	$resultadoInsereCadastroEstoque = mysqli_query($conexao, $queryInsereCadastroEstoque);	
?>