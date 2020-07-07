<?php
    require "conexao.php";
    
    $idLogin = $_SESSION['idUsuario'];
    $patientId =  $_POST["patient_id"];

    $queryselect = "SELECT tb07_descricao, tb07_valor, tb07_data_consulta, tb07_status_pagamento, tb07_id FROM tb07_consultas WHERE tb07_id_usuario = ".$idLogin." AND tb07_id_paciente = " .$patientId. " ORDER BY tb07_data_consulta ASC";        

    $resultadoselect = $conexao->query($queryselect);

    if($resultadoselect->num_rows>0) { 

        echo "<div class='table-responsive'>
                <table class='table mb-0'>                                            
                    <thead>
                        <tr>
                            <th scope='col' class='border-0'>Descrição</th>
                            <th scope='col' class='border-0'>Valor</th>
                            <th scope='col' class='border-0'>Data</th>
                            <th scope='col' class='border-0'>Pagamento</th>
                            <th scope='col' class='border-0'>Ações</th>
                        </tr>
                    </thead>
                <tbody>";       

        while ($linha = $resultadoselect->fetch_assoc()){                
            echo "<tr>";
                echo "<td class='description-td'>".$linha["tb07_descricao"]."</td>";                
                echo "<td>R$ ". str_replace(".",",", number_format($linha["tb07_valor"],2))."</td>";
                echo "<td>".date('d/m/Y',strtotime($linha["tb07_data_consulta"]))."</td>";  
                if($linha["tb07_status_pagamento"] == 0){
                    echo "<td> <i class='material-icons' style='color: #cf4536'>check_circle</i> </td>";                  
                } 
                if($linha["tb07_status_pagamento"] == 1) {
                    echo "<td> <i class='material-icons' style='color: #cfcf36'>check_circle</i> </td>";
                }
                if($linha["tb07_status_pagamento"] == 2) {
                    echo "<td> <i class='material-icons' style='color: #32a852'>check_circle</i> </td>";
                }     
                echo "<td>
                        <a href='edit-treatment.php?id=" .$linha["tb07_id"]. "' class='btn'>Editar</a>
                            <button type='button'
                                style='background: transparent; border: 0;cursor: pointer;'>
                                <i class='material-icons'
                                    style='color: #999'>find_in_page</i>
                            </button>

                            <button class='btDeleteQuery' id='".$linha["tb07_id"]."' type='button'
                                style='background: transparent; border: 0;cursor: pointer;'>
                                <i class='material-icons' style='color: red'>delete</i>
                            </button>
                    </td>";
            echo "</tr>";  
        }
        
        
        echo        "</tbody>
            </table>
    </div>";
        
    }else {
        echo "<div style='padding: 10px;display: flex; flex-direction: column; align-items: center;' >";
        echo "<img style='width: 80%; margin: 0 auto' src='assets/images/empty-query-placeholder.png' />";
        echo "<h5 style='margin-top: 15px;text-align: center'>Ainda não há nenhuma consulta registrada</h5>";
        echo "</div>";
    }        


?>