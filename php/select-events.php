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
            'patient' => $paciente, 
            'description' => $descricao,
            'color' => $cor
        ];
    }
}    

echo json_encode($eventos);

//celke edition
// define('HOST', 'localhost');
// define('USER', 'root');
// define('PASS', '');
// define('DBNAME', 'bd_teste');
// $conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);
// $query_events = "SELECT * FROM tb04_eventos";
// $resultado_events = $conn->prepare($query_events);
// $resultado_events->execute();
// while($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
//     $id = $row_events['tb04_id'];
//     $nome = $row_events['tb04_nome'];
//     $paciente = $row_events['tb04_id_paciente'];
//     $cor = $row_events['tb04_cor'];
//     $start = $row_events['tb04_inicio'];
//     $end = $row_events['tb04_fim'];
    
//     $eventos[] = [
//         'id' => $id, 
//         'title' => $nome, 
//         'patient' => $paciente, 
//         'color' => $cor,
//         'start' => $start, 
//         'end' => $end, 
//         ];
// }
// echo json_encode($eventos);

?>