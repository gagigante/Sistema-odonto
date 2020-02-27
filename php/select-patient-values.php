<?php
    require "conexao.php";
    
    $idLogin = $_SESSION['idUsuario'];
    $patientId =  $_POST["patient_id"];

    $values = array('received' => 0, 'pending' => 0);

    $query = "SELECT SUM(tb07_valor_pago) AS Received, SUM((tb07_valor - tb07_valor_desconto) - tb07_valor_pago) AS Pending FROM tb07_consultas WHERE tb07_id_usuario = " .$idLogin. " AND tb07_id_paciente = " .$patientId;
    $response = $conexao->query($query);

    if($response->num_rows>0) { 
      while ($linha = $response->fetch_assoc()){ 
        $values["received"] = str_replace(".",",", number_format($linha["Received"],2));
        $values["pending"] = str_replace(".",",", number_format($linha["Pending"],2));
      }
    }

    echo json_encode($values);
?>