<?php
    require "conexao.php";
    
    $idLogin = $_SESSION['idUsuario'];
    $patientId =  $_POST["patient_id"];

    $queryselect = "SELECT * FROM tb11_documentos_paciente WHERE tb11_id_usuario = ".$idLogin." AND tb11_id_paciente = " .$patientId. " ORDER BY tb11_id DESC";        

    $resultadoselect = $conexao->query($queryselect);

    if($resultadoselect->num_rows>0) { 
        
        while ($linha = $resultadoselect->fetch_assoc()){    
               
            echo '<div class="documents-item">';
                echo '<img src="assets/images/filesIcons/' .$linha['tb11_extensao']. '.png" />';
                echo '<div class="item-options">';
                    echo '<div>';
                        echo '<p>' .$linha['tb11_nome']. '</p>';
                    echo '</div>';
                    echo '<div>';
                        echo '<a href="assets/documents/patients-documents/' .$linha['tb11_documento']. '" download>Download</a>';
                        echo '<button type="button" class="btn btn-outline-danger btDeleteDoc" style="margin-left: 5px" id="' .$linha['tb11_id']. '"> Remover </button>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }                
        
    } else {        
        echo "<div style='padding: 10px;display: flex; flex-direction: column; align-items: center'>";
            echo "<img style='width: 80%; margin: 0 auto' src='assets/images/empty-documents-placeholder.png' />";
            echo "<h5 style='margin-top: 15px;text-align: center'>Ainda não há nenhum documento registrado</h5>";
        echo "</div>";
    }        
?>