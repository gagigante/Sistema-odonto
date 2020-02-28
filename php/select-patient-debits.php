<?php
    require "conexao.php";
    
    $idLogin = $_SESSION['idUsuario'];
    $patientId =  $_POST["patient_id"];

    $query = "SELECT tb07_id, tb07_descricao, tb07_valor, tb07_valor_desconto, tb07_desconto, tb07_valor_pago, tb07_data_consulta, tb07_status_pagamento FROM tb07_consultas WHERE tb07_id_usuario = ".$idLogin." AND tb07_id_paciente = ".$patientId." ORDER BY tb07_data_consulta ASC, tb07_status_pagamento ASC";
    $response = $conexao->query($query);

    if($response->num_rows>0) { 

          echo "<div class='table-responsive' style='margin-top: 15px;'>
                <table class='table mb-0'>                                            
                  <thead>
                      <tr>
                        <th scope='col' class='border-0'>Descrição</th>
                        <th scope='col' class='border-0'>Valor</th>
                        <th scope='col' class='border-0'>Desconto</th>
                        <th scope='col' class='border-0'>Valor pago</th>
                        <th scope='col' class='border-0'>Data da consulta</th>
                        <th scope='col' class='border-0'>Ações</th>
                      </tr>
                  </thead>";
      

        while ($linha = $response->fetch_assoc()){                
          echo "<tr>";
              echo "<td class='description-td ".$linha["tb07_id"]."'>".$linha["tb07_descricao"]."</td>";
              echo "<td class='price-td ".$linha["tb07_id"]."'>R$ "
                .str_replace(".",",", number_format(number_format($linha["tb07_valor"],2) - number_format($linha["tb07_valor_desconto"], 2), 2)).
              "</td>";
              echo "<td class='discount-td ".$linha["tb07_id"]."'>" 
                .str_replace(".",",", number_format($linha["tb07_desconto"],2)). 
              "%</td>";
              echo "<td class='received-td ".$linha["tb07_id"]."'>R$ "
                . str_replace(".",",", number_format($linha["tb07_valor_pago"],2)).
              "</td>";
              echo "<td>"
                .date('d/m/Y',strtotime($linha["tb07_data_consulta"])).
              "</td>"; 
              echo "<td>";
              if($linha["tb07_status_pagamento"] != 2) {
                echo "<a class='btn view-modal-debit' href='' id='".$linha["tb07_id"]."'>Efetuar pagamento</a>";
              } else {
                echo "<i class='material-icons' style='color: #32a852'>check</i>";
              }     
              echo "<a class='btn view-modal-payments' href='' id='".$linha["tb07_id"]."'>Movimentações</a>";
              echo "</td>";
          echo "</tr>";  
        }
        
      echo  
            "</tbody>
          </table>
        </div>";
        
    }else {
        echo "<div style='padding: 10px;display: flex; flex-direction: column; align-items: center;'>";
        echo "<img style='width: 80%; margin: 0 auto' src='assets/images/empty-placeholder/empty-finances-placeholder.png' />";
        echo "<h5 style='margin-top: 15px;text-align: center'>Ainda não há nenhum registro</h5>";
        echo "</div>";
    }
?>