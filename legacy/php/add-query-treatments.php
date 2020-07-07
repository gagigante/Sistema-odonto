<?php	
	require "conexao.php";

    $treatmentId = $_POST['treatmentId'];

    if(!empty($_POST['data'])) {
        $treatmentsData = $_POST['data'];
    } else {
        $treatmentsData = array();
    }
    
    $idLogin = $_SESSION['idUsuario'];    

    $query = "SELECT * FROM tb03_tratamentos WHERE tb03_id = ".$treatmentId." AND tb03_id_usuario = ".$idLogin."";    
    
	$resultQuery = mysqli_query($conexao, $query);

    if($resultQuery->num_rows>0) { 
        
        while ($linha = $resultQuery->fetch_assoc()){ 
                        
            array_push($treatmentsData, 
                [ 
                    'id' => $linha['tb03_id'], 
                    'price' => $linha['tb03_preco'],
                    'description' => $linha['tb03_descricao'],
                    'name' => $linha['tb03_nome'],
                    'userId' => $linha['tb03_id_usuario'],                    
                ]                                                                
            );                   
        }
    }
    
    mysqli_close($conexao);	
   
    echo json_encode($treatmentsData);
?>