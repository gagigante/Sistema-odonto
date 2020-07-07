<?php
require 'conexao.php';

$idLogin = $_SESSION['idUsuario'];

$nomeComplete = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

$queryselect = "SELECT * FROM tb01_paciente WHERE tb01_nome LIKE '%".$nomeComplete."%' AND tb01_idUsuario = '$idLogin' ORDER BY tb01_nome ASC LIMIT 7";
$resultadoselect = $conexao->query($queryselect);


if($resultadoselect->num_rows>=0) { 
    while ($linha = $resultadoselect->fetch_assoc()){

    	$data[] = $linha['tb01_nome'];
    }	
}

echo json_encode($data);

?>