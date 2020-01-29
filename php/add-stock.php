<?php
	require "conexao.php";
	
	$idLogin = $_SESSION['idUsuario'];	

	$produto = mysqli_real_escape_string($conexao, trim($_POST["product"]));
	$quantidade = mysqli_real_escape_string($conexao, trim($_POST["amount"]));
	$preco = mysqli_real_escape_string($conexao, trim(str_replace(",",".", $_POST["price"])));

	$query = "INSERT INTO tb02_estoque (tb02_produto, tb02_quantidade, tb02_preco, tb02_id_usuario) VALUES ('$produto', '$quantidade',  '$preco', '$idLogin')";
	$result = mysqli_query($conexao, $query);	

	mysqli_close($conexao);	
?>