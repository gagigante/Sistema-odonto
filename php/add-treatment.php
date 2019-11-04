<?php
	include_once "conexao.php";
	session_start();

    $idLogin = $_SESSION['idUsuario'];

	$nome = mysqli_real_escape_string($conexao, trim($_POST["name"]));
	$descricao = mysqli_real_escape_string($conexao, trim($_POST["description"]));
	$preco = mysqli_real_escape_string($conexao, trim(str_replace(",",".", $_POST["price"])));	

	$queryInsereCadastroEstoque = "INSERT INTO tb03_tratamentos (tb03_nome, tb03_descricao, tb03_preco, tb03_id, tb03_idUsuario) VALUES ('".$nome."','".$descricao."','".$preco."', NULL, '".$idLogin."')";
	$resultadoInsereCadastroEstoque = mysqli_query($conexao, $queryInsereCadastroEstoque);

	mysqli_close($conexao);	
	
?>