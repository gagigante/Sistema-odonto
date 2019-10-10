<?php
	include_once "conexao.php";

	$produto = $_POST["product"];
	$quantidade = $_POST["amount"];
	$preco = str_replace(",",".", $_POST["price"]);
	
	$queryInsereCadastroEstoque = "INSERT INTO tb02_estoque VALUES('".$produto."','".$quantidade."','".$preco."', NULL)";
	$resultadoInsereCadastroEstoque = mysqli_query($conexao, $queryInsereCadastroEstoque);	
?>