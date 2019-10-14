<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'bd_teste');

$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);

$query_events = "SELECT * FROM tb04_eventos";
$resultado_events = $conn->prepare($query_events);
$resultado_events->execute();

$eventos = [];

while($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
    $id = $row_events['tb04_id'];
    $nome = $row_events['tb04_nome'];
    $paciente = $row_events['tb04_id_paciente'];
    $start = $row_events['tb04_inicio'];
    $end = $row_events['tb04_fim'];
    
    $eventos[] = [
        'id' => $id, 
        'title' => $nome, 
        'paciente' => $paciente, 
        'start' => $start, 
        'end' => $end, 
        ];
}

echo json_encode($eventos);