<?php
	
	include_once "conexao.php";

	$nome = $_POST["name"];
	$descricao = $_POST["description"];	
	$preco = str_replace(",",".", $_POST["price"]);
	$id = $_POST["id"];

	$qtdFinal = $quantidade + $add;


    if(!empty($nome) && !empty($descricao) && !empty($preco) && !empty($id) {
        $queryEdita = "UPDATE tb03_tratamentos SET tb03_nome = '$nome', tb03_descricao = '$descricao', tb03_preco = '$preco' WHERE tb03_id ='$id'";
        $resultadoEdita = mysqli_query($conexao, $queryEdita);
    }

?>