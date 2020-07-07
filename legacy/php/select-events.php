<?php

require "conexao.php";
    
$idLogin = $_SESSION['idUsuario'];

$queryselect = "select * from tb06_eventos where tb06_idUsuario = '$idLogin'";
$resultadoselect = $conexao->query($queryselect);

$eventos = [];

if($resultadoselect->num_rows>=0) { 
    while ($linha = $resultadoselect->fetch_assoc()){  

        $id = $linha['tb06_idEvento'];
        $idUsuario = $linha['tb06_idUsuario'];
        $nome = $linha['tb06_nome'];
        $paciente = $linha['tb06_paciente'];
        $descricao = $linha['tb06_descricao'];
        $cor = $linha['tb06_cor'];
        $inicio = $linha['tb06_inicio'];
        $fim = $linha['tb06_fim'];
        
        $eventos[] = [
            'id' => $id, 
            'title' => $nome, 
            'start' => $inicio, 
            'end' => $fim, 
            //'url' => $paciente, 
            //'groupId' => $descricao,
            'color' => $cor,
            'extendedProps' => array( 'description' => $descricao, 'patient' => $paciente )
        ];
    }
}    

echo json_encode($eventos);

?>