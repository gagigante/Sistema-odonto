<?php	
	require "conexao.php";

	$nome = mysqli_real_escape_string($conexao, trim($_POST["name"]));
	$quantidade = mysqli_real_escape_string($conexao, trim($_POST["qtd"]));
	$add = mysqli_real_escape_string($conexao, trim($_POST["add"]));
	$preco = mysqli_real_escape_string($conexao, trim(str_replace(",",".", $_POST["price"])));
	$id = $_POST["id"];

	$qtdFinal = $quantidade + $add;

    if(!empty($nome) && !empty($qtdFinal) && !empty($preco)) {
        $query = "UPDATE tb02_estoque SET tb02_produto = '$nome', tb02_quantidade = '$qtdFinal', tb02_preco = '$preco' WHERE tb02_id ='$id'";
	   	$result = mysqli_query($conexao, $query);    
    }	
?>