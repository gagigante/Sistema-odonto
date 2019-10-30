<?php

require "config.php";

global $pdo;

$sql = $pdo->query("SELECT * FROM tb04_eventos");
//$response = $sql->fetch();

$eventos = [];

while($event = $sql->fetch(PDO::FETCH_ASSOC)) {

    $id = $event['tb04_id'];
    $nome = $event['tb04_nome'];
    $paciente = $event['tb04_id_paciente'];
    $descricao = $event['tb04_descricao'];
    $cor = $event['tb04_cor'];
    $inicio = $event['tb04_inicio'];
    $fim = $event['tb04_fim'];
    
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