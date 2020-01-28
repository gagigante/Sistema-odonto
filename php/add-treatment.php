<?php
	require "conexao.php";	

    $idLogin = $_SESSION['idUsuario'];

	$nome = mysqli_real_escape_string($conexao, trim($_POST["name"]));
	$descricao = mysqli_real_escape_string($conexao, trim($_POST["description"]));
	$preco = mysqli_real_escape_string($conexao, trim(str_replace(",",".", $_POST["price"])));	

	$query = "INSERT INTO tb03_tratamentos (tb03_nome, tb03_descricao, tb03_preco, tb03_id_usuario) VALUES ('$nome','$descricao','$preco', '$idLogin')";
	$result = mysqli_query($conexao, $query);

	mysqli_close($conexao);		
?>