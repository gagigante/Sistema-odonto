<?php
	include_once "conexao.php";

	$produto = $_POST["product"];
	$quantidade = $_POST["amount"];
	$preco = $_POST["price"];

	echo $produto;
	echo $quantidade;
	echo $preco;
	
	$queryInsereCadastroEstoque = "INSERT INTO estoque VALUES('".$produto."','".$quantidade."','".$preco."', NULL)";
	$resultadoInsereCadastroEstoque = mysqli_query($conexao, $queryInsereCadastroEstoque);	
?>