<?php
	require "conexao.php";
	
	$idLogin = $_SESSION['idUsuario'];	

	$produto = mysqli_real_escape_string($conexao, trim($_POST["product"]));
	$quantidade = mysqli_real_escape_string($conexao, trim($_POST["amount"]));
	$preco = mysqli_real_escape_string($conexao, trim(str_replace(",",".", $_POST["price"])));

	$queryInsereCadastroEstoque = "INSERT INTO tb02_estoque (tb02_produto, tb02_quantidade, tb02_preco, tb02_idProduto, tb02_idUsuario) VALUES ('$produto', '$quantidade',  '$preco', NULL ,'$idLogin')";
	$resultadoInsereCadastroEstoque = mysqli_query($conexao, $queryInsereCadastroEstoque);	

	// $queryInsereCadastroEstoque = "INSERT INTO tb05_financeiro (tb05_nome, tb05_tipo, tb05_valor, tb05_data, tb05_situacao, tb05_idUsuario) VALUES ('Compra do estoque', '$quantidade',  '$preco', NULL ,'$idLogin')";
	// $resultadoInsereCadastroEstoque = mysqli_query($conexao, $queryInsereCadastroEstoque);

	mysqli_close($conexao);	
?>