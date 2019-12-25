<?php
require 'conexao.php';

$idLogin = $_SESSION['idUsuario'];

$nomeComplete = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

$queryselect = "SELECT * FROM tb03_tratamentos WHERE tb03_nome LIKE '%".$nomeComplete."%' AND tb03_idUsuario = '$idLogin' ORDER BY tb03_nome ASC LIMIT 7";
$resultadoselect = $conexao->query($queryselect);


if($resultadoselect->num_rows>=0) { 
    while ($linha = $resultadoselect->fetch_assoc()){                
        $data[] = [ 
            'id' => $linha['tb03_id'],
            'label' => $linha['tb03_nome']
        ];
    }	
}

echo json_encode($data);

?>