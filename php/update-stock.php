<?php
	
	include_once "conexao.php";

	$nome = $_POST["name"];
	$quantidade = $_POST["qtd"];
	$add = $_POST["add"];
	$preco = str_replace(",",".", $_POST["price"]);
	$id = $_POST["id"];

	$qtdFinal = $quantidade + $add;

    if(!empty($nome) && !empty($qtdFinal) && !empty($preco)) {
        $queryEdita = "UPDATE tb02_estoque SET tb02_produto = '$nome', tb02_quantidade = '$qtdFinal', tb02_preco = '$preco' WHERE tb02_idProduto ='$id'";
	   $resultadoEdita = mysqli_query($conexao, $queryEdita);    
    }	
?>