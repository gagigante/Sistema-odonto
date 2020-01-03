<?php
    require "conexao.php";
    
    $idLogin = $_SESSION['idUsuario'];
    $patientId =  $_POST["patient_id"];

    $queryselect = "SELECT * FROM tb10_imagens_paciente WHERE tb10_id_usuario = ".$idLogin." AND tb10_id_paciente = " .$patientId. " ORDER BY tb10_id DESC";        

    $resultadoselect = $conexao->query($queryselect);

    if($resultadoselect->num_rows>0) { 

        $cont = 1;

        while ($linha = $resultadoselect->fetch_assoc()){    
            
            echo '<div class="gallery-item">';
                echo '<img src="assets/images/patients-images/' .$linha['tb10_url']. '">';
                echo '<div class="item-options">';
                    echo $cont;
                    echo '<button type="button" class="btDelete" id="' .$linha['tb10_id']. '" style="background: transparent; border: 0;cursor: pointer;">';
                        echo '<i class="material-icons" style="color: red">delete</i>';
                    echo '</button>';
                echo '</div>';
            echo '</div>';

            $cont++;
           
        }                
        
    }else {
        echo "<div style='padding: 10px;display: flex; flex-direction: column; align-items: center;' >";
        echo "<img style='width: 80%; margin: 0 auto' src='assets/images/empty-query-placeholder.png' />";
        echo "<h5 style='margin-top: 15px;text-align: center'>Ainda não há nenhuma consulta registrada</h5>";
        echo "</div>";
    }        
?>