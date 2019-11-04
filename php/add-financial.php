<?php	
	include_once "conexao.php";

    $idLogin = $_SESSION['idUsuario'];

	$nome = mysqli_real_escape_string($conexao, trim($_POST["name"]));
	$tipo = mysqli_real_escape_string($conexao, trim($_POST["type"]));
	$valor = mysqli_real_escape_string($conexao, trim($_POST["price"]));
	$data = mysqli_real_escape_string($conexao, date('Y/m/d',strtotime($_POST["date"])));
	//$data = 
	$situacao = 0;
	
	$queryInsereCadastroEstoque = "INSERT INTO tb05_financeiro(tb05_nome, tb05_tipo, tb05_valor, tb05_data, tb05_situacao, tb05_idUsuario, tb05_idPaciente, tb05_idItem) VALUES ('".$nome."','".$tipo."','".$valor."','".$data."','".$situacao."','".$idLogin."', NULL, NULL)";
	$resultadoInsereCadastroEstoque = mysqli_query($conexao, $queryInsereCadastroEstoque);

	mysqli_close($conexao);	
?>