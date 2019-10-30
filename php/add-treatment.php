<?php
	include_once "conexao.php";

	$nome = $_POST["name"];
	$descricao = $_POST["description"];
	$preco = str_replace(",",".", $_POST["price"]);	

	$queryInsereCadastroEstoque = "INSERT INTO tb03_tratamentos VALUES('".$nome."','".$descricao."','".$preco."', NULL)";
	$resultadoInsereCadastroEstoque = mysqli_query($conexao, $queryInsereCadastroEstoque);
	
	// $stmt = mysqli_prepare($conexao, "INSERT INTO tb03_tratamentos VALUES(?,?,?)");
	// mysqli_stmt_bind_param($stmt, $nome, $descricao, $preco);

	// $nome = $_POST["name"];
	// $descricao = $_POST["description"];
	// $preco = str_replace(",",".", $_POST["price"]);		

	// // /* execute prepared statement */
	// mysqli_stmt_execute($stmt);

	// mysqli_stmt_close($stmt);
?>