<?php
	include_once "conexao.php";
	session_start();
	$idLogin = $_SESSION['idUsuario'];	

	$produto = mysqli_real_escape_string($conexao, trim($_POST["product"]));
	$quantidade = mysqli_real_escape_string($conexao, trim($_POST["amount"]));
	$preco = mysqli_real_escape_string($conexao, trim(str_replace(",",".", $_POST["price"])));
	
	$queryInsereCadastroEstoque = "INSERT INTO tb02_estoque (tb02_produto, tb02_quantidade, tb02_preco, tb02_idProduto, tb02_idUsuario) VALUES ('$produto', '$quantidade',  '$preco', NULL ,'$idLogin')";
	$resultadoInsereCadastroEstoque = mysqli_query($conexao, $queryInsereCadastroEstoque);	

	mysqli_close($conexao);	
?>