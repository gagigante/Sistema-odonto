<?php
	
	include_once "conexao.php";

	
	$nome = mysqli_real_escape_string($conexao, trim($_POST["name"]));
	$descricao = mysqli_real_escape_string($conexao, trim($_POST["description"]));
	$preco = mysqli_real_escape_string($conexao, trim(str_replace(",",".", $_POST["price"])));
	$id = mysqli_real_escape_string($conexao, trim($_POST["id"]));	

    if(!empty($nome) && !empty($descricao) && !empty($preco) && !empty($id)) {
        $queryEdita = "UPDATE tb03_tratamentos SET tb03_nome = '$nome', tb03_descricao = '$descricao', tb03_preco = '$preco' WHERE tb03_id ='$id'";
        $resultadoEdita = mysqli_query($conexao, $queryEdita);
    }

?>